<?php
namespace MineFields\Field\Builder;

use MineFields\Field\Object\Cell;
use MineFields\Field\Object\Field;
use MineFields\Field\Object\Row;

class FieldBuilder
{
    /**
     * @var string
     */
    private $input;

    /**
     * @param string $input
     */
    public function setInput($input)
    {
        $this->input = $input;
    }

    /**
     * @return Field
     */
    public function build()
    {
        $rows = explode(PHP_EOL, $this->input);
        $header = explode(' ', array_shift($rows));
        $finalRows = [];

        for ($y = 0; $y < $header[1]; $y++) {
            $cells = [];
            for ($x = 0; $x < $header[0]; $x++) {
                $cells[] = new Cell($rows[$y][$x], $x, $y);
            }

            $finalRows[] = new Row($cells);
        }

        return new Field((int)$header[0], (int)$header[1], $finalRows);
    }
}
