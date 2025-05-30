![License](https://img.shields.io/github/license/mostafazs/php-excel2any) ![PHP](https://img.shields.io/packagist/php-v/mostafazs/php-excel2any) ![Version](https://img.shields.io/packagist/v/mostafazs/php-excel2any) 
# PHP Excel2Any
Convert Excel to CSV

# installation
Use `composer` for installation

`composer require mostafazs/php-excel2any`


or

Require the package using composer in `composer.json` file of your project:

```json
"require": {
    "mostafazs/php-excel2any": "1.*"
}
```

# Usage
```php
<?php
include("./vendor/autoload.php");
use excel2any\excel2any;
use excel2any\RealRead;
use excel2any\Formats\FormatCSV;
use excel2any\Saver\SaveCSV;
$filename = __DIR__."/Products.xlsx";//Excel file name
$config = [
    "startRow"=>1,//Excel file start row
    "endRow"=>37,//Excel file end row
    "inputFileType"=>"Xlsx",//dont change
    "inputFileName"=>$filename,//Excel file name
    "sheetname"=>"Sheet1",//Default sheet name
    "range_start"=>"A",//Column start from
    "range_end"=>"AM",//Column end to
];

$excel = new excel2any();
//Read excel file
$excel_read = new RealRead($config);
$readed = $excel_read->Read();
//Select Format Output Format..and pass read data
$csvFormat = new FormatCSV();
$csvdata = $csvFormat->Format($readed);
//Save Saver Class
$savecsv = new SaveCSV();
//Save File..pass $savecsv , $csvdata and input file name
$result = $excel->convert()->save($savecsv,$csvdata,$config['inputFileName']);
if($result){
    echo "CSV File created";
}
?>
```

# Issue
[Issue](https://github.com/mostafazs/php-excel2any/issues)

# Test
`> phpunit tests`

# License
MIT

# TODO 
~~Write test~~
Convert excel 2 json
Convert excel 2 CSV
Convert excel 2 ?? seperted values
Convert excel 2 ics
Convert excel 2 xml
Convert excel 2 vcf
Convert excel 2 qif

# Donation

Your Stars Matter

If you find this package useful and you want to encourage me to maintain and work on it, Just press the star button to declare your willing.
Reward me with a cup of tea 🍵

Send me as much as a cup of tea worth in your country, so I'll have the energy to maintain this package.

    Ethereum(ETH): 0xe8284B27554F051659f31ff2BbD6b5f584814160
	
[![Paypal](https://cdn.iconscout.com/icon/free/png-256/paypal-54-675727.png)](https://paypal.com/mostafazs)
[![buymecofe](https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQeVqmgBQgNlp5hWejA9UcnCqgy2W0RFwyFUyc5lbEu5w9ORL2w3azuh3lCuZjNS-0WuRE&usqp=CAU)](https://buymeacoffee.com/mostafazs)
