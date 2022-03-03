<?php 

header('Content-type: text/plain'); 
error_reporting(0);

/**
 * Removes spaces around text as well as double spaces within
 * 
 * @var string $text
 * 
 * @return string
 */
function RemoveSpaces($text)
{
    $text = trim($text);
    while(str_contains($text, '  '))
        $text = str_replace('  ', ' ', $text);
    return $text;
}

$text = $_GET["text"];
echo RemoveSpaces($text);

// require '../tester.php';
// TestFunction('normal text', 'RemoveSpaces');
// TestFunction('    spaces at the start', 'RemoveSpaces');
// TestFunction('spaces at the end    ', 'RemoveSpaces');
// TestFunction(' spaces are around ', 'RemoveSpaces');
// TestFunction(' many  spaces', 'RemoveSpaces');
// TestFunction('    everything                   is     spaces     ', 'RemoveSpaces');