<?php

class Author{
    public string $name, $description;

    public function show($type) : array{
        return [];
    }
}

class Book{
    public int $ISBN, $numberOfPage; 
    public string $title, $description, $category, $language, $author, $publisher;

    public function showAll() : array{
        return [];
    }

    public function detail($ISBN){

    }
}

class Publisher{
    public string $name, $address;
    private string $phone;

    public function setPhone($int) : void{
        $this->phone

    }
    public function getPhone() : int{
        return $this->phone;
    }
}