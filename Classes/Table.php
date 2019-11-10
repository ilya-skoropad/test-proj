<?php

class Table
{
    public static function create(array $data) : string
    {
        $markup = '<table>';

        foreach($data as $row) {
            $markup .= '<tr><td class="cell-id">'
                .$data[$row[0] - 1][Excel::ID].'</td><td class="cell-val">'
                .$data[$row[0] - 1][Excel::NAME].'</td><td class="cell-val">'
                .$data[$row[0] - 1][Excel::VALUE].'</td></tr>';
        }
        $markup .= '</table>';

        return $markup;
    }
}