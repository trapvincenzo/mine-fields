<?php

namespace MineFields\Output\Formatter;

use MineFields\Field\Object\Field;

class SimpleTextFormatter implements FormatterInterface
{

    /**
     * @param Field $field
     *
     * @return string
     */
    public function format(Field $field)
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
}
