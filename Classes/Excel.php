<?php 

class Excel
{
    public static function parseSheet(string $file, int $num) : array
    {
        $xls = PHPExcel_IOFactory::load($file);
        $xls->setActiveSheetIndex($num);
        $sheet = $xls->getActiveSheet()->ToArray();

        return $sheet;
    }
}