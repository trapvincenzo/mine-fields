<?php
namespace Tests\Unit\MineFields\Field\Object;

use MineFields\Field\Object\Field;

class FieldTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @param array $data
	 * @param int $columns
	 * @param int $row
	 *
	 * @dataProvider getData
	 */
	public function testFieldHasTheRightDataWhenCreated(array $data, $columns, $row)
	{
		$field = new Field($columns, $row, $data);
		$this->assertEquals($row, $field->getRows());
		$this->assertEquals($columns, $field->getColumns());

		$this->assertEquals($data, $field->getData());
	}

	/**
	 * @return array
	 */
	public function getData()
	{
		return [
			[
				[
					['*', '.', '.', '.'],
					['.', '.', '*', '.'],
					['.', '.', '.', '.'],
				],
				4,
				3
			],
			[
				[
					['*', '.', '.', '.'],
					['.', '.', '*', '.'],
					['.', '.', '.', '.'],
					['.', '*', '.', '.'],
				],
				4,
				4
			],
		];
	}
}