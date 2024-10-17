<?php
declare(strict_types = 1);

require_once('vendor/autoload.php');

use Bfg\Task\PinGenerator;


$obj = new PinGenerator;
$pins = $obj->generate();

print_r($pins);