<?php
namespace MineFields\Output\Formatter;

use MineFields\Field\Object\Field;

interface FormatterInterface
{
    /**
     * @param Field $field
     * @return string
     */
    public function format(Field $field);
}
