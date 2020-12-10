<?php
namespace App\Helper;

class ExcelHelper {
    public  static function convertCVSToArray($file)
    {
        $csvData = \file_get_contents($file);
        $lines   = \explode(\PHP_EOL, $csvData);
        $results = [];

        foreach ($lines as $line) {
            $results[] = \str_getcsv(\trim($line), ';');
        }

        return $results;
    }
}
