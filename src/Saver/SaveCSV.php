<?php

namespace excel2any\Saver;

use excel2any\Exception\InvalidArgumentException;
use excel2any\Exception\RuntimeException;

Class SaveCSV implements SaverInterface{

    /**
     * @inheritDoc
     */
    public function save(String $data, String $filename)
    {
            if(gettype($data) != "string"){
                throw new InvalidArgumentException("Argument must be string");
            }
            if(gettype($data) != "string"){
                throw new InvalidArgumentException("Argument must be string");
            }
            //add lines
            $data = str_replace("","\n",$data);
            $output  = "\xEF\xBB\xBF";
            $output .= $data;
            $filename = $filename.".csv";//TODO improvement
            $fh = fopen($filename,"w");
            if($fh!=true){
                throw new RuntimeException("File open exception");
            }
            $result = fwrite($fh,$output);
            if($result==false){
                throw new RuntimeException("File write exception");
            }
            if($result == FALSE){
                throw new RuntimeException("Error write file");
            }else{
                return true;
            }
    }
}