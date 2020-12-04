<?php

$lines = explode("\n", trim(file_get_contents('3.txt')));

$width = strlen($lines[0]);

// 3a
// $pos = [1,1];
// $trees = 0;
// while($pos[1] <= count($lines)-1) {
//     $pos = [($pos[0]+3)%$width, $pos[1]+1];
//     $square = $lines[$pos[1]-1][$pos[0]-1];
//     $trees += $square === '#';
// }
// echo $trees;

// 3b
$slopes = [
    [1, 1],
    [3, 1],
    [5, 1],
    [7, 1],
    [1, 2],
];

foreach ($slopes as $slope) {
    $pos = [1,1];
    $trees = 0;
    while($pos[1] <= count($lines)-1) {
        $pos = [($pos[0]+$slope[0])%$width, $pos[1]+$slope[1]];
        $square = $lines[$pos[1]-1][$pos[0]-1];
        $trees += $square === '#';
    }
    echo $trees."\n";
    $treecount[] = $trees;
}
echo array_product($treecount);



?>