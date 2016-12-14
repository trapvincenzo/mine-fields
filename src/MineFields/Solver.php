<?php
namespace MineFields;

use MineFields\Field\FieldManager;
use MineFields\Field\Object\Cell;
use MineFields\Field\Object\Field;
use MineFields\Field\Object\Row;

class Solver
{
    const MINE = '*';

    /**
     * @var array
     */
    private $directions = [
        [0, -1],
        [0, 1],
        [-1, -1],
        [-1, 1],
        [1, -1],
        [1, 1],
        [-1, 0],
        [1, 0],
    ];

    /**
     * @var FieldManager
     */
    private $fieldManager;

    /**
     * @param FieldManager $fieldManager
     */
    public function __construct(FieldManager $fieldManager)
    {
        $this->fieldManager = $fieldManager;
    }


    /**
     * @param Field $field
     * @return string
     */
    public function solve(Field $field)
    {
        $transformedField = [];

        foreach ($field->getData() as $y => $row) {
            $newCols = [];
            foreach ($row->getCols() as $x => $col) {
                $newCols[] = new Cell($this->getValueFor($col, $field), $x, $y);
            }

            $transformedField[] = new Row($newCols);
        }

        return $this->getOutput(new Field($field->getColumns(), $field->getRows(), $transformedField));
    }

    /**
     * @param Field $field
     *
     * @return string
     */
    private function getOutput(Field $field)
    {
        $output = [];

        foreach ($field->getData() as $row) {
            $newRow = '';

            foreach ($row->getCols() as $col) {
                $newRow .= $col->getValue();
            }
            $output[] = $newRow;
        }

        return implode("\n", $output);
    }

    /**
     * @param Cell $cell
     * @param Field $field
     *
     * @return int
     */
    private function getValueFor(Cell $cell, Field $field)
    {
        $mines = 0;

        if (self::MINE === $cell->getValue()) {
            return self::MINE;
        }

        foreach ($this->directions as $direction) {
            $x = $cell->getX() + $direction[0];
            $y = $cell->getY() + $direction[1];

            if ($x < 0 || $x > ($field->getColumns() - 1) || $y < 0 || $y > ($field->getRows() - 1)) {
                continue;
            }

            $cellByPosition = $this->fieldManager->getCellByPosition($field, $x, $y);
            if (self::MINE === $cellByPosition->getValue()) {
                $mines++;
            }
        }

        return $mines;
    }
}
