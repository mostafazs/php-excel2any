<?php
namespace excel2any;


use excel2any\Exception\InvalidArgumentException;
use excel2any\Exception\RuntimeException;
use PhpOffice\PhpSpreadsheet\IOFactory;

Class RealRead{
    protected $config;
    public function __construct($config)
    {
        $this->config = $config;
    }

    public function Read()
    {
        if(isset($this->config) == false){
            throw new RuntimeException("config argument missing");
        }
        if(gettype($this->config) != "array"){
            throw new InvalidArgumentException("Argument must be array");
        }
        try {
            $filterSubset = new MyReadFilter($this->config); // range($this->config['range_start'], $this->$config['range_end'])

            $reader = IOFactory::createReader($this->config['inputFileType']);
            $reader->setLoadSheetsOnly($this->config['sheetname']);
            $reader->setReadFilter($filterSubset);
            $spreadsheet = $reader->load($this->config['inputFileName']);
            $sheetData = $spreadsheet->getActiveSheet()->toArray(null, false, false, false);;
            return $sheetData;
        } catch(\PhpOffice\PhpSpreadsheet\Reader\Exception $e) {
            die('Error loading file: '.$e->getMessage());//TODO better exception
        }
    }
}