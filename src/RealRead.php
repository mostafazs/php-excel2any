<?php
namespace excel2any;


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
        $default_config = [//@TODO improvement remove this
            "startRow"=>1,
            "endRow"=>2,
            "inputFileType"=>"xlsx",
            "inputFileName"=>"filename.xlsx",
            "sheetname"=>"Sheet1",
            "range_start"=>"A",
            "range_end"=>"B",
            "method"=>"1"
        ];
        if(isset($this->config) == false){
            throw new RuntimeException("config argument missing");
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