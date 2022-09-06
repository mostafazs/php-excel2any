<?php

namespace excel2any;

use PhpOffice\PhpSpreadsheet\Reader\IReadFilter;

class MyReadFilter implements IReadFilter
{
    private $startRow = 0;

    private $endRow = 0;

    private $columns = [];

    private $inputFileType = "xlsx";

    private $inputFileName;

    private $sheetname;

    private $range_start = "A";

    private $range_end = "D";

    private $method = "1"; //@TODO future 1=use phpspreadsheet 2= user other

    public function __construct($config) // $startRow, $endRow, $columns
    {
        $this->startRow = $config['startRow'];
        $this->endRow = $config['endRow'];
        $this->inputFileType = $config['inputFileType'];
        $this->inputFileName = $config['inputFileName'];
        $this->sheetname = $config['sheetname'];
        $this->range_start = $config['range_start'];
        $this->range_end = $config['range_end'];
        $this->method = $config['method'];
    }

    public function readCell($columnAddress, $row, $worksheetName = '')
    {
        $this->columns = $this->create_columns_range($this->range_start,$this->range_end);
        if ($row >= $this->startRow && $row <= $this->endRow) {
            if (in_array($columnAddress, $this->columns)) {
                return true;
            }
        }

        return false;
    }

    function create_columns_range(String $start, String $end){
        $return_range = [];
        for ($i = $start; $i !== $end; $i++){
            $return_range[] = $i;
        }
        return $return_range;
    }
}

