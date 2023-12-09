<?php
namespace App\Model;

use App\Model\Model;
use PDO;

class Comment extends Model
{
    public int $comment_id;
    public int $user_id;
    public int $id_pin;
    public $name;
    public $title;
    public $content;
    public $time;
    public $likes;

    public function all()
    {
        $sql = "SELECT `comment`.*, `user`.*, `pin`.*
                FROM `comment`
                LEFT JOIN `pin`
                    ON `pin`.`id_pin` = `comment`.`id_pin`
                LEFT JOIN  `user`
                    ON `user`.`user_id`= `comment`.`user_id`";
        $stmt = $this->db->prepare($sql);
        if ($stmt->execute()) {
            $comment = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $comment = null;
        }
        return $comment;
    }

    public function allObject()
    {
        return true;
    }

    public function setUser(User $user)
    {
        $this->user_id = $user->user_id;
    }

    public function setPin(Pin $pin)
    {
        $this->id_pin = $pin->id_pin;
    }

    public function detail($comment_id)
    {
        $stmt = $this->db->prepare("SELECT user.name, pin.title, content, likes, time FROM comment, user, pin WHERE comment_id = :comment_id");
        $stmt->bindParam(':comment_id', $comment_id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $komen = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->name = $komen['name'];
            $this->title = $komen['title'];
            $this->content = $komen['content'];
            $this->time = $komen['time'];
            $this->likes = $komen['likes'];
        } else {
            $komen = null;
        }
    }

    public function save()
    {
        $this->generateId();
        
        $stmt = $this->db->prepare("INSERT INTO comment (comment_id, user_id, id_pin, content, time, likes)
                    VALUES (:comment_id, :user_id, :id_pin, :content, :time, :likes)");
        $stmt->bindParam(':comment_id', $this->comment_id, PDO::PARAM_INT);
        $stmt->bindParam(':user_id', $this->user_id, PDO::PARAM_INT); // Assuming user_id is an integer
        $stmt->bindParam(':id_pin', $this->id_pin, PDO::PARAM_INT);
        $stmt->bindParam(':content', $this->content);
        $stmt->bindParam(':time', $this->time);
        $stmt->bindParam(':likes', $this->likes);
        if ($stmt->execute()) {
            // Insert user_id into user_pin table if needed
            // Assuming there's a user_pin table to manage the relationship
            // Example: INSERT INTO user_pin (user_id, pin_id) VALUES (:user_id, :pin_id)
            return true;
        } else {
            return false;
        }
    }


    public function generateId()
    {
        $sql = 'SELECT MAX(comment_id) AS comment_id FROM comment';
        $stmt = $this->db->prepare($sql);
        if ($stmt->execute()) {
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->comment_id = ($data['comment_id'] !== null) ? $data['comment_id'] + 1 : 1;
        } else {
            return 0;
        }
    }
}
?>
