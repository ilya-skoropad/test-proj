<?php

class Validator
{
    // максимально доступный размер файла
    private const MAX_SIZE = 1024*8;
    private const MIN_PAGES_COUNT = 2;

    public const NO_FILES = 1; // Файлы не передавались
    public const WRONG_TYPE = 2; // Неверное расширение файла
    public const WRONG_SIZE = 3; // Файл слишком большой
    public const WRONG_COUNT = 4; // Слишком мало листов в книге Excel
    public const WRONG_FIO = 5; // Неправильное ФИО
    public const WRONG_CASH = 6; // Значение бюджета должно быть числовым


    public static function validateFile() : bool
    {
        if(empty($_FILES))
            throw new Exception("There is no files!", Validator::NO_FILES);

        if(!Validator::validateFileName($_FILES['document']['name']))
            throw new Exception("wrong type of file!", self::WRONG_TYPE);

        if(!Validator::validateFileSize($_FILES['document']['size']))
            throw new Exception("wrong size of file!", self::WRONG_SIZE);

        if(Excel::getPagesCount($_FILES['document']['tmp_name']) < self::MIN_PAGES_COUNT)
            throw new Exception("wrong list count of the Excel book!", self::WRONG_COUNT);

        return true;
    }

    public static function validateData(array $data) : bool
    {
        foreach($data as $row) {
            if(!is_float($data[$row[0] - 1][Excel::VALUE]))
                throw new Exception("wrong cash!", self::WRONG_FIO);
            if(!self::validateDataName($data[$row[0] - 1][Excel::NAME]))
                throw new Exception("wrong ФИО!", self::WRONG_CASH);
        }

        return true;
    }

    private static function validateFileName(string $file) : bool
    {
        $regex = "/xlsx/i";
        preg_match($regex, $file, $matches);
        if(!empty($matches)) return true;

        return false;
    }
    private static function validateFileSize(int $size) : bool
    {
        if($size > self::MAX_SIZE) return true;

        return false;
    }

    private static function validateDataName(string $name) : bool
    {
        $regex = "/([А-Я]{1}[а-я ]{1,9}|[А-Я]{1}[.]{0,1}){1,3}/";
        preg_match($regex, $name, $matches);
        if(!empty($matches)) return true;

        return false;
    }
}