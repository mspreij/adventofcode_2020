<?php

$array = explode("\n\n", trim(file_get_contents('6.txt')));

// 6a
// $out = 0;
// foreach ($array as $group) {
//     $out += count(array_flip(str_split(str_replace("\n", '', $group))));
// }
// echo $out;

// 6b
$out = 0;
foreach ($array as $group) {
    $group = array_map('str_split', explode("\n", $group));
    $out += count($group)===1 ? count($group[0]) : count(array_intersect(...$group));
}
echo $out;

?>
