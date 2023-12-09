<?php
namespace App\Model;

use App\Model\Model;
use PDO;

class User extends Model
{
    public $user_id;
    public $username;
    public $password;
    public $name;
    public $email;
    public $follower;
    public $following;

    public function all()
    {
        $stmt = $this->db->prepare("SELECT * FROM user");
        if ($stmt->execute()) {
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $users = null;
        }
        return $users;
    }

    public function viewProfile($user_id)
    {
        $stmt = $this->db->prepare("SELECT username, name, email, following, follower FROM user WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            // Assign fetched values to object properties
            $this->username = $user['username'];
            $this->name = $user['name'];
            $this->email = $user['email'];
            $this->following = $user['following'];
            $this->follower = $user['follower'];
        } else {
            $user = null;
        }
    }


    public function editUser() : bool
    {
        $stmt = $this->db->prepare("UPDATE user SET name = :name, email = :email, password = :password WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $this->user_id);
        $name = $this->name;
        $email = $this->email;
        $password = $this->password;
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        return $stmt->execute();
    }
    
    
    public function save(): bool
    {
        $stmt = $this->db->prepare("INSERT INTO user (user_id, username, password, name, email, follower, following) VALUES (:user_id, :username, :password, :name, :email, :follower, :following)");
        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':follower', $this->follower);
        $stmt->bindParam(':following', $this->following);
        
        return $stmt->execute();
    }

    public function generateId()
    {
        $sql = 'SELECT MAX(user_id) AS user_id FROM user';
        $stmt = $this->db->prepare($sql);
        if ($stmt->execute()) {
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            return ($data['user_id'] !== null) ? $data['user_id'] + 1 : 1;
        } else {
            return 0;
        }
    }
    
}
?>
