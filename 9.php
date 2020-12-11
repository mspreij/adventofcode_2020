<pre>
<?php

$numbers = explode("\n", trim(file_get_contents('9.txt')));

// 9a
// $preamble = $i = 25;
// while ($i < count($numbers)) {
//     $number = $numbers[$i];
//     $set = array_slice($numbers, $i - $preamble, $preamble);
//     $found = false;
//     foreach($set as $k => $v) {
//         if (in_array($number - $v, $set)) {
//             $found = true;
//             break;
//         }
//     }
//     if (! $found) {
//         echo "Bad number: {$numbers[$i]}\n";
//         break;
//     }
//     $i++;
// }

// 9b: find numbers adding up to 127 (or 18272118)

$target = 18272118;
$num_count = count($numbers);
for ($i=0; $i < $num_count; $i++) {
    $sum = $numbers[$i];
    $j = 1;
    while($sum < $target) {
        $sum += $numbers[$i+$j];
        $j++;
    }
    if ($sum === $target) break;
}
$set = array_slice($numbers, $i, $j);
echo min($set) + max($set);

?>
