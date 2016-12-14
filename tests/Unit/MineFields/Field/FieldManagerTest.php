<?php
namespace Tests\Unit\MineFields\Field;

use MineFields\Field\Exception\InvalidCellPosition;
use MineFields\Field\FieldManager;
use MineFields\Field\Object\Cell;
use MineFields\Field\Object\Field;
use MineFields\Field\Object\Row;

class FieldManagerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param int $x
     * @param int $y
     * @param string $expected
     *
     * @dataProvider getData
     *
     * @throws \MineFields\Field\Exception\InvalidCellPosition
     */
    public function testGetCellByPositionReturnTheCorrectOne($x, $y, $expected)
    {
        $field = new Field(4, 2, [
            new Row([new Cell('.', 0, 0), new Cell('*', 0, 1), new Cell('.', 0, 2)]),
            new Row([new Cell('*', 1, 0), new Cell('.', 1, 1), new Cell('.', 1, 2)])
        ]);


        $fieldManager = new FieldManager();

        $cell = $fieldManager->getCellByPosition($field, $x, $y);
        $this->assertEquals($expected, $cell->getValue());
    }

    public function testThrowAnExceptionIfXOutOfBound()
    {
        $this->setExpectedException(InvalidCellPosition::class);
        $field = new Field(4, 2, [
            new Row([new Cell('.', 0, 0), new Cell('*', 0, 1), new Cell('.', 0, 2)]),
            new Row([new Cell('*', 1, 0), new Cell('.', 1, 1), new Cell('.', 1, 2)])
        ]);


        $fieldManager = new FieldManager();
        $fieldManager->getCellByPosition($field, -5, 1);
    }

    public function testThrowAnExceptionIfYOutOfBound()
    {
        $this->setExpectedException(InvalidCellPosition::class);
        $field = new Field(4, 2, [
            new Row([new Cell('.', 0, 0), new Cell('*', 0, 1), new Cell('.', 0, 2)]),
            new Row([new Cell('*', 1, 0), new Cell('.', 1, 1), new Cell('.', 1, 2)])
        ]);


        $fieldManager = new FieldManager();
        $fieldManager->getCellByPosition($field, 1, -7);
    }

    /**
     * @return array
     */
    public function getData()
    {
        return [
            [
                0,
                1,
                '*'
            ],
            [
                2,
                1,
                '.'
            ]
        ];
    }
}
