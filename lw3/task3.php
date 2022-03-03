<?php

header('Content-type: text/plain');
error_reporting(0);

/**
 * Returns security level of the string
 * symbols are ['a'..'z'] + ['A'..'Z']
 * numbers are ['0'..'9']
 * 
 * @var string $str
 * 
 * @return int 
 */
function GetSecurityLevel($str)
{
    $length = strlen($str);
    $result = $length * 4;

    $lowerCount = 0;
    $upperCount = 0;
    $numbers = 0;
    for($i = 0; $i < $length; $i++)
    {
        if(ctype_lower($str[$i])) $lowerCount++;
        else if(ctype_upper($str[$i])) $upperCount++;
        else if(is_numeric($str[$i])) $numbers++;
    }
    $letters = $upperCount + $lowerCount;

    $result += $numbers * 4;

    //Password can contain only numbers and letters
    if($numbers + $letters !== $length)
    {
        echo "This's not a password";
        return;
    }

    if($lowerCount > 0)
        $result += 4 * ($length - $lowerCount);
        
    if($upperCount > 0)
        $result += 4 * ($length - $upperCount);
    
    if($numbers == 0) 
        $result -= $letters;
    else if($letters == 0)
        $result -= $numbers;
    
    for($i = 0; $i < $length; $i++)
    {
        for($j = $i; $j < $length; $j++)
            if($str[$i] == $str[$j]) $result--;
        $str = str_replace($str[$i], '', $str);
    }

    return $result;
}

$id = $_GET["password"];
echo GetSecurityLevel($id);

// require '../tester.php';
// TestFunction('q', 'GetSecurityLevel');
// TestFunction('qwerty', 'GetSecurityLevel');
// TestFunction('qwert1', 'GetSecurityLevel');
// TestFunction('qWerty', 'GetSecurityLevel');
// TestFunction('123456', 'GetSecurityLevel');
// TestFunction('qqqqqq', 'GetSecurityLevel');