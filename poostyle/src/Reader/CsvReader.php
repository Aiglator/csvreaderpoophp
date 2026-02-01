<?php

namespace App\Reader;

class CsvReader
{
    private string $filepath;

    public function __construct(string $filepath)
    {
        $this->filepath = $filepath;
    }

    public function read(): array
    {
        $handle = fopen($this->filepath, 'r');
        $rows = [];
        while (($row = fgetcsv($handle, 1000, ',', '"', '\\')) !== false) {
            $rows[] = $row;
        }
        fclose($handle);
        return $rows;
    }
}