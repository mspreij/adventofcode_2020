<pre>
<?php

$numbers = explode("\n", trim(file_get_contents('10.txt')));

// 10a
sort($numbers);
array_unshift($numbers, 0); // outlet
$diff = [1=>0, 0, 0];
for ($i=0; $i < count($numbers)-1; $i++) {
    $diff[$numbers[$i+1] - $numbers[$i]]++;
}
$diff[3]++; // device
echo $diff[1] * $diff[3];



?>
