<?php

namespace excel2any\Saver;

use excel2any\Exception\RuntimeException;

Class SaveCSV implements SaverInterface{

    /**
     * @inheritDoc
     */
    public function save(String $data,String $format, String $filename)
    {
        if($format == "csv"){//@TODO bad practise here
            //add lines
            $data = str_replace("","\n",$data);
            $filename = $filename.".csv";//TODO improvement
            $fh = fopen($filename,"w");//TODO improvement catch bool(resource) exception
            $result = fwrite($fh,$data);
            if($result == FALSE){
                throw new RuntimeException("Error write file");
            }
        }else{
            throw new RuntimeException("Format Not Supported Yet");
        }
    }
}