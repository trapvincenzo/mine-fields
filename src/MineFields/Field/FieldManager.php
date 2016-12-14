<?php
namespace MineFields\Field;

use MineFields\Field\Exception\InvalidCellPosition;
use MineFields\Field\Object\Cell;
use MineFields\Field\Object\Field;
use MineFields\Field\Object\Row;

class FieldManager
{
    /**
     * @param Field $field
     * @param int $x
     * @param int $y
     * @return Cell
     *
     * @throws InvalidCellPosition
     */
    public function getCellByPosition(Field $field, $x, $y)
    {
        if ($x < 0 || $x > $field->getColumns() || $y < 0 || $y > $field->getRows()) {
            throw new InvalidCellPosition(sprintf('%s, %s', $x, $y));
        }

        $fieldData = $field->getData();

        /** @var Row $row */
        $row = $fieldData[$y];
        $columns = $row->getCols();

        return $columns[$x];
    }
}
