<pre>
<?php

$numbers = explode("\n", trim(file_get_contents('10.txt')));

// 10a
// sort($numbers);
// array_unshift($numbers, 0); // outlet
// $diff = [1=>0, 0, 0];
// for ($i=0; $i < count($numbers)-1; $i++) {
//     $diff[$numbers[$i+1] - $numbers[$i]]++;
// }
// $diff[3]++; // device
// echo $diff[1] * $diff[3];

// 10b
sort($numbers);
array_unshift($numbers, 0); // outlet
$configs_at[0] = 1;
for ($i=1; $i < count($numbers); $i++) {
    $num = $numbers[$i];
    $configs_at[$num] = 0;
    for ($j=1; $j <= 3; $j++) $configs_at[$num] += $configs_at[$num-$j] ?? 0;
}
echo end($configs_at);

?>
