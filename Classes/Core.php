<?php

class Core
{
    public function init() : void
    {
        try {
            $file = new FileContainer();
            Validator::Validate($file);

        } catch(Exception $e) {
            die("Упс, что-то пошло не так <br> одробнее тут: ".$e->getMessage());
        }

        $data = Table::create($file);
        echo $data;
    }
}