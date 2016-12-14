<?php


namespace MineFields\Field\Object;

class Cell
{
    /**
     * @var string
     */
    private $value;

    /**
     * @var int
     */
    private $x;

    /**
     * @var int
     */
    private $y;

    /**
     * @param string $value
     * @param int $x
     * @param int $y
     */
    public function __construct($value, $x, $y)
    {
        $this->value = $value;
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return int
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * @return int
     */
    public function getY()
    {
        return $this->y;
    }
}
