<?php
namespace MineFields\Field\Builder;

use MineFields\Field\Object\Cell;

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
	 * @return array
	 */
	public function build()
	{
		$rows = explode(PHP_EOL, $this->input);
		$header = explode(' ', array_shift($rows));
		$field = [];

		for ($i = 0; $i < $header[1]; $i++) {
			$field[] = [];
			for ($j = 0; $j < $header[0]; $j++) {
				$field[$i][] = new Cell($rows[$i][$j], $i, $j);
			}
		}

		return $field;
	}
}