<?php

namespace excel2any;

use excel2any\Formats\FormatInterface;

Interface ConvertInterface{

    /**
     * @param $data String data to save
     * @param $method 1=library 2=other
     * @return mixed
     * @param $config array config array ["start_row"=>1,"end_row"=>1,"range_cells"=>array("A","B"),"inputFileType"=>"xlsx",
     * "inputFileName"=>"filename.xlsx","sheetname"=>"Sheet1"]
     * @TODO better description
     */
    public function convert($data,$config);

}