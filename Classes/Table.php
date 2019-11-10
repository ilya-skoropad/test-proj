<?php

class Table
{
    public static function create(FileContainer $file) : string
    {
        $data = Excel::parseSheet($file->getPath(), 0);
        $trans = Excel::parseSheet($file->getPath(), 1);

        foreach($trans as $row) {
            $data[$row[0] - 1][2] += $row[1];
        }

        $markup = '<table>';
        foreach($data as $row) {
            $markup .= '<tr><td class="cell-id">'.$data[$row[0] - 1][0].'</td><td class="cell-val">'
                .$data[$row[0] - 1][1]. '</td><td class="cell-val">'
                .$data[$row[0] - 1][2].'</td></tr>';
        }
        $markup .= '</table>';

        return $markup;
    }
}