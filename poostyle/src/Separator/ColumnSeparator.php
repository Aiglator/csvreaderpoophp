<?php

namespace App\Separator;

class ColumnSeparator
{
    public function separate(array $rows): array
    {
        $leftcolumn = [];
        $rightcolumn = [];

        foreach ($rows as $row) {
            $leftcolumn[] = $row[0];
            $rightcolumn[] = $row[1];
        }

        return [$leftcolumn, $rightcolumn];
    }
}