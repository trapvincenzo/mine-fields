<?php
namespace Tests\Unit\MineFields\Field\Builder;

use MineFields\Field\Builder\FieldBuilder;
use MineFields\Field\Object\Cell;
use MineFields\Field\Object\Field;
use MineFields\Field\Object\Row;

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

        $expected = new Field(4, 3,
            [
                new Row([new Cell('*', 0, 0), new Cell('.', 1, 0), new Cell('.', 2, 0), new Cell('.', 3, 0)]),
                new Row([new Cell('.', 0, 1), new Cell('.', 1, 1), new Cell('*', 2, 1), new Cell('.', 3, 1)]),
                new Row([new Cell('.', 0, 2), new Cell('.', 1, 2), new Cell('.', 2, 2), new Cell('.', 3, 2)]),
            ]);

        $builder = new FieldBuilder();
        $builder->setInput($given);

        $this->assertEquals($expected, $builder->build());
    }
}
