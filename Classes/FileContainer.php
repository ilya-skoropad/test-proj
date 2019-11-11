<?php

class FileContainer
{
    private $name;
    private $path;
    private $size;

    public function __construct()
    {
        $this->name = $_FILES['document']['name'];
        $this->size = $_FILES['document']['size'];
        $this->path = $_FILES['document']['tmp_name'];
    }

    public function getName() : string
    { 
        return $this->name; 
    }
    public function getPath() : string
    { 
        return $this->path; 
    }
    public function getSize() : int
    { 
        return $this->size; 
    }
}
