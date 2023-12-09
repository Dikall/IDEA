<?php
namespace App\Model;




use App\Model\Model;
use App\Model\Category;
use PDO;


class Book extends Model
{
    public int $id;
    public string $tittle;
    public string $description;
    public string $publisher;
    private Category $category;
    private $authors = [];


    public function all()
    {
        $sql = "SELECT `tittle`,
                        `books`.`description`,
                        `categories`.`name`,
                        `authors`.`full_name`
                FROM `books`
                LEFT JOIN `categories`
                    ON `categories`.`id` = `books`.`category_id`
                RIGHT JOIN `book_author`
                    ON `book_author`.`book_id` = `books`.`id`
                LEFT JOIN `authors`
                    ON `authors`.`id` = `book_author`.`author_id`";
        $stmt = $this->db->prepare($sql);
        if ($stmt->execute()) {
            $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $books = null;
        }
        return $books;
    }


    public function allObject()
    {
        return true;
    }


    public function setCategory(Category $category)
    {
        $this->category = $category;
    }


    public function setAuthor($index,Author $author)
    {
        $this->authors[$index] = $author;
    }


    public function detail($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM books WHERE id=$id");
        if ($stmt->execute()) {
            $book = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->id = $book['id'];
            $this->tittle = $book['tittle'];
            $this->description = $book['description'];
            $this->publisher = $book['publisher'];
        } else {
            $book = null;
        }
    }


    public function save()
    {
        $stmt = $this->db->prepare("INSERT INTO books (id, tittle, description, publisher, category_id)
                    VALUES (:id, :tittle, :description, :publisher, :category_id)");
        $this->generateId();
        $stmt2 = $this->db->prepare("INSERT INTO book_author (author_id, book_id) VALUES (:author_id,:book_id)");
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':tittle', $this->tittle);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':publisher', $this->publisher);
        $stmt->bindParam(':category_id', $this->category->id);
       
        if($stmt->execute()){
            foreach ($this->authors as $author) {
                $stmt2->bindParam(':author_id', $author->id);
                $stmt2->bindParam(':book_id', $this->id);
                $stmt2->execute();
            }
            return true;
        } else {
            return false;
        }
    }


    public function generateId()
    {
        $sql = 'SELECT MAX(id) AS id FROM books';
        $stmt = $this->db->prepare($sql);
        if ($stmt->execute()) {
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->id = $data['id']+1;
        } else {
            return 0;
        }
    }
}
