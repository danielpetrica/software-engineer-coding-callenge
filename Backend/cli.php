<?php
include ("vendor/autoload.php");
$file_name = "input.txt";
require_once 'main.php';


if (file_exists($file_name))
{
    // parse input file in an array
    $input = file($file_name, FILE_IGNORE_NEW_LINES);
    $input = handle($input);
    echo $input . "\n";
} else {
    echo "Input file missing\n";
}
