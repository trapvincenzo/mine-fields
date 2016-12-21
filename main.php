<?php

use MineFields\Field\Builder\FieldBuilder;
use MineFields\Field\FieldManager;
use MineFields\Solver;

require_once 'vendor/autoload.php';

$given = <<<EOD
4 3
*...
..*.
....
EOD;

$field = new FieldBuilder();
$field->setInput($given);

$solver = new Solver(new FieldManager());
$solved = $solver->solve($field->build());

$output = new MineFields\Output\Formatter\SimpleTextFormatter();
print $output->format($solved);