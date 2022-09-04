<?php

namespace excel2any\Formats;

Interface FormatInterface{

    /**
     * @param $data array csv array data
     * @return String csv output string
     */
    public function Format(array $data);

}