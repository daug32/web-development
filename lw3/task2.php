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
        return "No. Identifier can start only from a letter.";
        
    for($i = 1; $i < $length; $i++)
    {
        $cond = is_numeric($id[$i]) || ctype_alpha($id[$i]);
        if(!$cond) return "No. Identifier have to contain only numbers and letters - no other symbols";
    }
    return "Yes.";
}

// $id = $_GET["identifier"];
// echo CheckIdentifier($id);

require '../tester.php';
TestFunction('', 'CheckIdentifier');
TestFunction('abc', 'CheckIdentifier');
TestFunction('a44b', 'CheckIdentifier');
TestFunction('44a', 'CheckIdentifier');
TestFunction('a#s', 'CheckIdentifier');