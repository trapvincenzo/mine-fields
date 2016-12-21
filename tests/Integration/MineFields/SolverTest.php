<?php
namespace Tests\Integration\MineFields;

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

        $expected = new Field(3, 4, [
            new Row([new Cell(2, 0, 0), new Cell('*', 1, 0), new Cell(1, 2, 0)]),
            new Row([new Cell('*', 0, 1), new Cell(2, 1, 1), new Cell(1, 2, 1)]),
            new Row([new Cell(1, 0, 2), new Cell(2, 1, 2), new Cell(1, 2, 2)]),
            new Row([new Cell(0, 0, 3), new Cell(1, 1, 3), new Cell('*', 2, 3)]),
        ]);

        $given = new Field(3, 4, [
            new Row([new Cell('.', 0, 0), new Cell('*', 1, 0), new Cell('.', 2, 0)]),
            new Row([new Cell('*', 0, 1), new Cell('.', 1, 1), new Cell('.', 2, 1)]),
            new Row([new Cell('.', 0, 2), new Cell('.', 1, 2), new Cell('.', 2, 2)]),
            new Row([new Cell('.', 0, 3), new Cell('.', 1, 3), new Cell('*', 2, 3)]),
        ]);

        $this->assertEquals($expected, $solver->solve($given));

        $expected = new Field(3, 3, [
            new Row([new Cell(1, 0, 0), new Cell(1, 1, 0), new Cell(0, 2, 0)]),
            new Row([new Cell('*', 0, 1), new Cell(2, 1, 1), new Cell(1, 2, 1)]),
            new Row([new Cell(2, 0, 2), new Cell('*', 1, 2), new Cell(1, 2, 2)]),
        ]);

        $given = new Field(3, 3, [
            new Row([new Cell('.', 0, 0), new Cell('.', 1, 0), new Cell('.', 2, 0)]),
            new Row([new Cell('*', 0, 1), new Cell('.', 1, 1), new Cell('.', 2, 1)]),
            new Row([new Cell('.', 0, 2), new Cell('*', 1, 2), new Cell('.', 2, 2)]),
        ]);

        $this->assertEquals($expected, $solver->solve($given));

        $expected = new Field(3, 3, [
            new Row([new Cell('*', 0, 0), new Cell(2, 1, 0), new Cell(1, 2, 0)]),
            new Row([new Cell(1, 0, 1), new Cell(2, 1, 1), new Cell('*', 2, 1)]),
            new Row([new Cell(0, 0, 2), new Cell(1, 1, 2), new Cell(1, 2, 2)]),
        ]);

        $given = new Field(3, 3, [
            new Row([new Cell('*', 0, 0), new Cell('.', 1, 0), new Cell('.', 2, 0)]),
            new Row([new Cell('.', 0, 1), new Cell('.', 1, 1), new Cell('*', 2, 1)]),
            new Row([new Cell('.', 0, 2), new Cell('.', 1, 2), new Cell('.', 2, 2)]),
        ]);

        $this->assertEquals($expected, $solver->solve($given));
    }
}
