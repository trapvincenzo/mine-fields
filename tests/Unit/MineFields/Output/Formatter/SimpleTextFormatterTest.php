<?php
namespace Tests\Unit\MineFields\Output\Formatter;

use MineFields\Field\Object\Cell;
use MineFields\Field\Object\Field;
use MineFields\Field\Object\Row;
use MineFields\Output\Formatter\FormatterInterface;
use MineFields\Output\Formatter\SimpleTextFormatter;

class SimpleTextFormatterTest extends \PHPUnit_Framework_TestCase
{
    public function testFormatterImplementTheFormatterInterface()
    {
        $this->assertInstanceOf(FormatterInterface::class, new SimpleTextFormatter());
    }

    public function testOutputIsFormattedAsExpected()
    {
        $expected = <<<EOD
2*1
*21
121
01*
EOD;
        $field = new Field(3, 4, [
            new Row([new Cell(2, 0, 0), new Cell('*', 1, 0), new Cell(1, 2, 0)]),
            new Row([new Cell('*', 0, 1), new Cell(2, 1, 1), new Cell(1, 2, 1)]),
            new Row([new Cell(1, 0, 2), new Cell(2, 1, 2), new Cell(1, 2, 2)]),
            new Row([new Cell(0, 0, 3), new Cell(1, 1, 3), new Cell('*', 2, 3)]),
        ]);

        $formatter = new SimpleTextFormatter();
        $this->assertEquals($expected, $formatter->format($field));
    }
}
