<?php
namespace App\Model;

use App\Model\Model;
use PDO;

class Pin extends Model
{
    public int $id_pin;
    public User $user_id;
    public $title;
    public $description;
    public $destination_link;
    public $time_stamp;
    public $viewer; 

    public function all()
    {
        $sql = "SELECT `user`.*, `pin`.*
                FROM `user`
                LEFT JOIN `pin`
                    ON `user`.`user_id` = `pin`.`user_id`";
        $stmt = $this->db->prepare($sql);
        if ($stmt->execute()) {
            $pin = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $pin = null;
        }
        return $pin;
    }

    public function setUser(User $user)
    {
        $this->user_id = $user;
    }

    public function detail($title)
    {
        $stmt = $this->db->prepare("SELECT * FROM pin WHERE title = :title");
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        if ($stmt->execute()) {
            $pinData = $stmt->fetch(PDO::FETCH_ASSOC);
            // Assign fetched values to object properties
            $this->title = $pinData['title'];

            $this->description = $pinData[ 'description'];
            $this->destination_link = $pinData['destination_link'];
            $this->time_stamp = $pinData['time_stamp'];
            $this->viewer = $pinData['viewer'];
        } else {
            $pinData = null;
        }
    }

    public function save()
    {
        $this->generateId();
        
        $stmt = $this->db->prepare("INSERT INTO pin (id_pin, user_id, title, description, destination_link, time_stamp, viewer)
                    VALUES (:id_pin, :user_id, :title, :description, :destination_link, :time_stamp, :viewer)");
        $stmt->bindParam(':id_pin', $this->id_pin, PDO::PARAM_INT);
        $stmt->bindParam(':user_id', $this->user_id->user_id, PDO::PARAM_INT); // Assuming user_id is an integer
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':destination_link', $this->destination_link);
        $stmt->bindParam(':time_stamp', $this->time_stamp);
        $stmt->bindParam(':viewer', $this->viewer);

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
        $sql = 'SELECT MAX(id_pin) AS id_pin FROM pin';
        $stmt = $this->db->prepare($sql);
        if ($stmt->execute()) {
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->id_pin = ($data['id_pin'] !== null) ? $data['id_pin'] + 1 : 1;
        } else {
            return 0;
        }
    }
}
?>
