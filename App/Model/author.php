<?php
namespace App\Model;


use App\Model\Model;
use PDO;


class Author extends Model
{
    public $id;
    public $full_name;
    public $email;


    public function all()
    {
        $stmt = $this->db->prepare("SELECT * FROM authors");
        if ($stmt->execute()) {
            $author = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $author = null;
        }
        return $author;
    }


    public function detail($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM authors WHERE id=$id");
        if ($stmt->execute()) {
            $author = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->id = $author['id'];
            $this->full_name = $author['full_name'];
            $this->email = $author['email'];
        } else {
            $author = null;
        }
    }




    public function save() : bool
    {
        $stmt = $this->db->prepare("INSERT INTO authors (id, full_name, email) VALUES (:id, :full_name, :email)");
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':full_name', $this->full_name);
        $stmt->bindParam(':email', $this->email);
        return $stmt->execute();
    }


    public function generateId()
    {
        $sql = 'SELECT MAX(id) AS id FROM authors';
        $stmt = $this->db->prepare($sql);
        if ($stmt->execute()) {
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            return $data['id']+1;
        } else {
            return 0;
        }
    }


}