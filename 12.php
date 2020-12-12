<pre>
<?php
require_once 'functions.inc.php';

echo time_taken();
$data = explode("\n", trim(file_get_contents('12.txt')));

$pos = [0,0];
$dir = 'E'; // [1, 0]
$cardinals = [
    'N'=>[1, 1], // [x/y, in/decrease]
    'E'=>[0, 1],
    'S'=>[1, -1],
    'W'=>[0, -1],
];
foreach ($data as $i => $course) {
    $action = substr($course, 0, 1);
    $amount = substr($course, 1);
    // N E W S & F change position, R L change direction
    if (in_array($action, ['N','E','W','S'])) {
        $A = $cardinals[$action];
        $pos[$A[0]] += $A[1] * $amount;
    }
    if (in_array($action, ['L', 'R'])) {
        $turns = $amount / ($action === 'L' ? '-90' : 90);
        $ci = array_search($dir, array_keys($cardinals)) + $turns;
        if ($ci < 0) $ci += 4;
        if ($ci > 3) $ci -= 4;
        $dir = array_keys($cardinals)[$ci]; // maybe dir should have just been a number..
    }
    if ($action === 'F') {
        $pos[$cardinals[$dir][0]] += $amount * $cardinals[$dir][1];
    }
}

echo abs($pos[0]) + abs($pos[1]);

echo time_taken();

?>
