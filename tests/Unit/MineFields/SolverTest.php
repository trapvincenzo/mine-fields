<?php
namespace Tests\Unit\MineFields;

use MineFields\Field\FieldManager;
use MineFields\Field\Object\Cell;
use MineFields\Field\Object\Field;
use MineFields\Field\Object\Row;
use MineFields\Solver;

class SolverTest extends \PHPUnit_Framework_TestCase
{
	public function testSolverWillReturnTheRightSolvedField()
	{
		$solver = new Solver(new FieldManager());

		$given = new Field(4, 3, [
			new Row([new Cell('.', 0, 0), new Cell('*', 0, 1), new Cell('.', 0, 2)]),
			new Row([new Cell('*', 1, 0), new Cell('.', 1, 1), new Cell('.', 1, 2)]),
			new Row([new Cell('.', 2, 0), new Cell('.', 2, 1), new Cell('.', 2, 2)]),
			new Row([new Cell('.', 3, 0), new Cell('.', 3, 1), new Cell('*', 3, 2)]),
		]);

		$expected = <<<EOD
2*1
*21
121
01*
EOD;

		$this->assertEquals($expected, $solver->solve($given));

		/*$given = new Field(3, 3, [
			new Row([new Cell('.', 0, 0), new Cell('.', 0, 1), new Cell('.', 0, 2)]),
			new Row([new Cell('*', 1, 0), new Cell('.', 1, 1), new Cell('.', 1, 2)]),
			new Row([new Cell('.', 2, 0), new Cell('*', 2, 1), new Cell('.', 2, 2)]),
		]);

		$expected = <<<EOD
110
*21
2*1
EOD;

		$this->assertEquals($expected, $solver->solve($given));*/
	}
}