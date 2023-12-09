<?php
namespace App\Model;

use App\Model\Model;
use PDO;

class Category extends Model
{
    public int $id;
    public string $name;
    public string $description;

    public function all()
    {
        $stmt = $this->db->prepare("SELECT * FROM categories");
        if ($stmt->execute()) {
            $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $categories = null;
        }
        return $categories;
    }

    public function detail($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM categories WHERE id=$id");
        if ($stmt->execute()) {
            $category = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->id = $category['id'];
            $this->name = $category['name'];
            $this->description = $category['description'];
        } else {
            $category = null;
        }
    }

    public function save() : bool
    {
        $stmt = $this->db->prepare("INSERT INTO categories (id, name, description) VALUES (:id, :name, :desciption)");
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':description', $this->description);
        return $stmt->execute();
    }

    public function generateId()
    {
        $sql = 'SELECT MAX(id) AS id FROM categories';
        $stmt = $this->db->prepare($sql);
        if ($stmt->execute()) {
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            return $data['id']+1;
        } else {
            return 0;
        }
    }


}
