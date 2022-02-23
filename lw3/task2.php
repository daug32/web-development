<?php

header('Content-type: text/plain');

/**
 * Check whether this id is current or not
 * 
 * @var string $id
 * 
 * @return string 
 */
function CheckIdentifier($id)
{
    $length = strlen($id);
    if($length < 1 || !ctype_alpha($id[0])) 
        return 'no';
    for($i = 1; $i < $length; $i++)
    {
        $cond = is_numeric($id[$i]) || ctype_alpha($id[$i]);
        if(!$cond) return 'no';
    }
    return 'yes';
}

$id = $_GET["identifier"];
echo CheckIdentifier($id);

// require '../tester.php';
// TestFunction('a', 'CheckIdentifier');
// TestFunction('abc', 'CheckIdentifier');
// TestFunction('a44', 'CheckIdentifier');
// TestFunction('a44b', 'CheckIdentifier');
// TestFunction('44a', 'CheckIdentifier');
// TestFunction('44', 'CheckIdentifier');