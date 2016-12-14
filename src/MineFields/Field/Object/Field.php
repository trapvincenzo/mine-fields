<?php
namespace MineFields\Field\Object;

class Field
{
	/**
	 * @var int
	 */
	private $columns = 0;

	/**
	 * @var int
	 */
	private $rows = 0;

	/**
	 * @var array
	 */
	private $data = [];

	/**
	 * @param int $columns
	 * @param int $rows
	 * @param array $data
	 */
	public function __construct($columns, $rows, array $data)
	{
		$this->columns = $columns;
		$this->rows = $rows;
		$this->data = $data;
	}

	/**
	 * @return int
	 */
	public function getRows()
	{
		return $this->rows;
	}

	/**
	 * @return int
	 */
	public function getColumns()
	{
		return $this->columns;
	}

	/**
	 * @return Row[]
	 */
	public function getData()
	{
		return $this->data;
	}
}