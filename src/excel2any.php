<?php

namespace excel2any;

use excel2any\Exception\InvalidArgumentException;
use excel2any\Saver\SaveCSV;
use excel2any\Saver\SaverInterface;

class excel2any {


    public $save_format;
    public function convert()
    {
        return $this;
    }

    /**
     * @param SaverInterface $saver;
     * @return $this
     */
    public function save(SaverInterface $saver,$data,$filename)
    {
        if( ($saver instanceof SaverInterface) == false ){
            throw new InvalidArgumentException("Argument must be of type SaverInterface");
        }
        if(gettype($data) != "string"){
            throw new InvalidArgumentException("Argument data must be string");
        }
        if(gettype($filename) != "string"){
            throw new InvalidArgumentException("Argument filename must be string");
        }
        $this->save_format = $saver;
        $r = $saver->save($data,$filename);
        return $r;
    }
}