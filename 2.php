<?php

$array = explode("\n", trim(file_get_contents('2.txt')));

$valid = 0;

// 2.a
// foreach ($array as $k => $item) {
//     $pattern = '/(\d+)-(\d+) (\w): (\w+)/';
//     preg_match($pattern, $item, $matches);
//     list($all, $min, $max, $character, $password) = $matches;
//     $count = substr_count($password, $character);
//     if ($count >= $min && $count <= $max) $valid++;
// }
// echo $valid;

// 2.b
foreach ($array as $k => $item) {
    $pattern = '/(\d+)-(\d+) (\w): (\w+)/';
    preg_match($pattern, $item, $matches);
    list($all, $pos1, $pos2, $character, $password) = $matches;
    $password = ' '.$password; // simpler indexing
    if (($password[$pos1]==$character) + ($password[$pos2]==$character) == 1) $valid++;
}
echo $valid;

?>