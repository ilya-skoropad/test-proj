<?php 

class Validator 
{
    // максимально доступный размер файла
    const MAX_SIZE = 999999;

    public static function validate(FileContainer $file)
    {
        if(!Validator::validateName($file->getName()))
            throw new Exception("wrong type of file!", 2);

        if(!Validator::validateSize($file->getSize()))
            throw new Exception("wrong size of file!", 3);
    }

    private static function validateName(string $file) : bool
    {
        $regex = "/xlsx/i";
        preg_match($regex, $file, $matches);
        if(!empty($matches)) return true;
    
        return false;
    }

    private static function validateSize(int $size) : bool
    {
        if($size < self::MAX_SIZE) return true;

        return false;
    }
}