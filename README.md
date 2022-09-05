![License](https://img.shields.io/packagist/l/mostafazs/php-validator?style=plastic)
# PHP Excel2Any
Convert Excel to CSV

# installation
Use `composer` for installation

`composer require php-excel2any`


or

Require package to your project like:

```json
"require": {
    "mostafazs/php-excel2any": "1.*"
}
```

# Usage
```php
<?php
include ("./vendor/autoload.php");
use excel2any\excel2any;
use excel2any\Formats\FormatCSV;
use excel2any\RealRead;
$filename = __DIR__."/Products.xlsx";//Input file path
$config = [
    "startRow"=>1,//Excel start row
    "endRow"=>37,//Excel end row
    "inputFileType"=>"Xlsx",//dont change it
    "inputFileName"=>$filename,//Input file path
    "sheetname"=>"Sheet1",//Excel Sheet name
    "range_start"=>"A",//Start column name
    "range_end"=>"AM",//End column name
    "method"=>"1"//Dont change it
];
$excel = new excel2any();
$readed = new RealRead($config);
$readed = $readed->Read();
$csvFormat = new FormatCSV();
$csvFormat = $csvFormat->Format($readed);
$result = $excel->convert($csvFormat,$config);
?>
```

# Issue
[Issue](https://github.com/mostafazs/php-excel2any/issues)

# License
MIT