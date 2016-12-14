<?php
namespace Tests\Unit\MineFields\Field\Object;

use MineFields\Field\Object\Cell;
use MineFields\Field\Object\Row;

class RowTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param Cell[] $cols
     *
     * @dataProvider getData
     */
    public function testRowHasTheRightDataWhenCreated(array $cols)
    {
        $row = new Row($cols);
        $this->assertEquals($cols, $row->getCols());
    }

    /**
     * @return array
     */
    public function getData()
    {
        return [
            [
                [new Cell('.', 1, 1)],
            ],
            [
                [new Cell('*', 2, 1), new Cell('*', 2, 2)],
            ],
        ];
    }
}
