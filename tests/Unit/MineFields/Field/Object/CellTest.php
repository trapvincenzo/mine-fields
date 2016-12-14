<?php
namespace Tests\Unit\MineFields\Field\Object;

use MineFields\Field\Object\Cell;

class CellTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param string $value
     * @param int $x
     * @param int $y
     *
     * @dataProvider getData
     */
    public function testCellHasTheRightDataWhenCreated($value, $x, $y)
    {
        $cell = new Cell($value, $x, $y);
        $this->assertEquals($value, $cell->getValue());
        $this->assertEquals($x, $cell->getX());
        $this->assertEquals($y, $cell->getY());
    }

    /**
     * @return array
     */
    public function getData()
    {
        return [
            [
                '.',
                0,
                1
            ],
            [
                '*',
                1,
                1
            ],
        ];
    }
}
