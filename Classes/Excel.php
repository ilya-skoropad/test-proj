<?php 

// @todo - переписать на основе другой библиотеки

class Excel
{
    public const PAGE_ONE = 0; // первая страница таблицы
    public const PAGE_TWO = 1; // вторая страница

    public const ID = 0; // ID клиента из таблицы
    public const NAME = 1; // ФИО клиента
    public const VALUE = 2; // изначальное кол-во денег клиента

    public const TRANS = 1; // транзакции (из второго листа)

    public static function parseSheet(string $file, int $num) : array
    {
        $xls = PHPExcel_IOFactory::load($file);
        $xls->setActiveSheetIndex($num);
        $sheet = $xls->getActiveSheet()->ToArray();

        return $sheet;
    }

    public static function getPagesCount(string $file) : int
    {
        $xls = PHPExcel_IOFactory::load($file);
        return $xls->getSheetCount();
    }
}
