<pre>
<?php

$seats = explode("\n", trim(file_get_contents('5.txt')));

// 5a
// echo max(array_map('seat_to_number', $seats));

// 5b
$numbers = array_map('seat_to_number', $seats);
$max = max($numbers);
$min = min($numbers);
echo current(array_diff(range($min, $max), $numbers));


function seat_to_number($code)
{
    $row = bindec(str_replace(['F','B'], [0,1], substr($code, 0, 7)));
    $column = bindec(str_replace(['R','L'], [1,0], substr($code, 7)));
    return $row * 8 + $column;
}

?>