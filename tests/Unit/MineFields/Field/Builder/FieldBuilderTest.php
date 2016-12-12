<?php
namespace Tests\Unit\MineFields\Field\Builder;

use MineFields\Field\Builder\FieldBuilder;

class FieldBuilderTest extends \PHPUnit_Framework_TestCase
{
	public function testBuilderBuildsTheExpectedFieldFromTextInput()
	{
		$given = <<<EOD
4 3
*...
..*.
....
EOD;

		$expected = [
			['*', '.', '.', '.'],
			['.', '.', '*', '.'],
			['.', '.', '.', '.'],
		];

		$builder = new FieldBuilder();
		$builder->setInput($given);

		$this->assertEquals($expected, $builder->build());
	}
}