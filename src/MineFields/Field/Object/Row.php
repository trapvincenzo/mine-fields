<?php


namespace MineFields\Field\Object;


class Row
{
	/**
	 * @var Cell[]
	 */
	private $cols = [];

	/**
	 * Row constructor.
	 * @param Cell[] $cols
	 */
	public function __construct(array $cols)
	{
		$this->cols = $cols;
	}


	/**
	 * @return Cell[]
	 */
	public function getCols()
	{
		return $this->cols;
	}
}