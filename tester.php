<?php

/**
 * Runs a function with given input and prints result
 * 
 * @var string $input
 * @var string $func
 * 
 * @return null
 */
function TestFunction($input, $func)
{
    $result = $func($input);
    echo "Input:  \"$input\";\n";
    echo "Output: \"$result\";\n\n"; 
}