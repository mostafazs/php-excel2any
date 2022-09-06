<?php

namespace excel2any\Saver;

Interface SaverInterface{

    /**
     * @param String $data
     * @param String $filename
     * @return mixed
     */
    public function save(String $data,String $filename);
}