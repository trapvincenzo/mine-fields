<?php


namespace Tests\Unit\MineFields;

use MineFields\Field\FieldManager;
use MineFields\Field\Object\Cell;
use MineFields\Field\Object\Field;
use MineFields\Field\Object\Row;
use MineFields\Solver;
use Prophecy\Argument;

class SolverTest extends \PHPUnit_Framework_TestCase
{
    public function testSolverWillReturnTheRightFieldSchema()
    {
        $given = new Field(3, 3, [
            new Row([new Cell('.', 0, 0), new Cell('.', 1, 0), new Cell('.', 2, 0)]),
            new Row([new Cell('*', 0, 1), new Cell('.', 1, 1), new Cell('.', 2, 1)]),
            new Row([new Cell('.', 0, 2), new Cell('*', 1, 2), new Cell('.', 2, 2)]),
        ]);


        $solver = new Solver($this->getFieldManager());
        $solved = $solver->solve($given);

        $this->assertInstanceOf(Field::class, $solved);
        $this->assertCount(3, $solved->getData());
        $this->assertEquals(3, $solved->getColumns());
    }

    /**
     * @return FieldManager
     */
    private function getFieldManager()
    {
        $fieldManager = $this->prophesize(FieldManager::class);
        $fieldManager->getCellByPosition(Argument::type(Field::class), Argument::type('int'), Argument::type('int'))
            ->will(function ($args) {
                return new Cell($args[0], $args[1], $args[2]);
            });
        return $fieldManager->reveal();
    }
}
