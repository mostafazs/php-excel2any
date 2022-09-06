<?php


namespace excel2any\Formats;


use excel2any\Exception\InvalidArgumentException;
use excel2any\Exception\RuntimeException;

class FormatCSV implements FormatInterface
{
    /**
     * @inheritDoc
     */
    public function flat(array $array, array &$result, $parentKey = '')
    {
        $keySeparator=",";
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $this->flat($value, $result, $parentKey.$key.$keySeparator);
            } else {
                $result[$parentKey.$key] = $value;
            }
        }
    }

    /**
     * @inheritDoc
     */
    function Format(array $data){
        if(gettype($data) != "array"){
            throw new InvalidArgumentException("Argument must be array");
        }
        $delimiter = ",";$enclosure = '"';$escapeChar = "\\";
        $handle = fopen('php://temp,', 'w+');
        if (!is_array($data)) {
            $data = array(array($data));
        } elseif (empty($data)) {
            $data = array(array());
        } else {
            $i = 0;
            foreach ($data as $key => $value) {
                if ($i !== $key || !is_array($value)) {
                    $data = array($data);
                    break;
                }
                ++$i;
            }
        }

        $headers = null;
        foreach ($data as $value) {
            $result = array();
            $this->flat($value, $result);
            if (null === $headers) {
                $headers = array_keys($result);
                fputcsv($handle, $headers, $delimiter, $enclosure, $escapeChar);
            } elseif (array_keys($result) !== $headers) {
                throw new RuntimeException('To use the CSV encoder, each line in the data array must have the same structure.');
            }

            fputcsv($handle, $result, $delimiter, $enclosure, $escapeChar);
        }

        rewind($handle);
        $value = stream_get_contents($handle);
        fclose($handle);

        return $value;
        //replace space with new line
        //return str_replace("","\n",$value);//@TODO we can replace here
    }
}