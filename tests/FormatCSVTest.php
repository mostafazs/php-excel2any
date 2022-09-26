<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use excel2any\Formats\FormatCSV;

final class FormatCSVTest extends TestCase
{
	public function testConvertArray2CSV()
	{
		$formater = new FormatCSV();
		$csv_liner = $formater->Format($this->createArray());
		$lines = explode("\n",$csv_liner);
		$this->assertEquals($lines[0],"first,second");
		$this->assertEquals($lines[1],"1,2");
	}

	public function createArray()
	{
		return array("first"=>1,"second"=>2);
	}
}

