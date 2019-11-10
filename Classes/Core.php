<?php

class Core
{
    public function init() : void
    {
        try {
            $file = new FileContainer();
            Validator::validateFile($file);

        } catch(Exception $e) {
            die("Упс, что-то пошло не так <br> Подробнее тут: ".$e->getMessage());
        }

        try {
            $data = Excel::parseSheet($file->getPath(), Excel::PAGE_ONE);
            $trans = Excel::parseSheet($file->getPath(), Excel::PAGE_TWO);
            Validator::validateData($data);

        } catch (Exception $e) {
            die("Упс, что-то пошло не так <br> Подробнее тут: ".$e->getMessage());
        }

        foreach($trans as $row) {
            $data[$row[0] - 1][Excel::VALUE] += $row[Excel::TRANS];
        }

        $data = Table::create($data);
        echo $data;
    }
}