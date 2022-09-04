<?php

namespace excel2any;

use excel2any\Saver\SaveCSV;

class excel2any implements ConvertInterface {


    /**
     * @inheritDoc
     */
    public function convert($data,$config)
    {
        $save = new SaveCSV();
        $save->save($data,"csv",$config['inputFileName']);
    }
}