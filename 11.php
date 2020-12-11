<pre>
<?php
require_once 'functions.inc.php';

echo time_taken();
$data = trim(file_get_contents('11.txt'));

foreach (explode("\n", $data) as $y => $line) {
    foreach (str_split($line) as $x => $char) {
        $grid[$y][$x] = $char;
    }
}

$counter = 0; // It's dangerous to go alone! Take this.
while (1) {
    foreach ($grid as $y => $line) {
        foreach ($line as $x => $spot) {
            if ($spot === '.') {
                $new_grid[$y][$x] = '.';
                continue;
            }
            $nb = get_neighbours($y, $x);
            if ($spot === 'L' and ! $nb) {
                $new_grid[$y][$x] = '#';
            }elseif ($spot === '#' and $nb >= 5) {
                $new_grid[$y][$x] = 'L';
            }
        }
    }
    if ($new_grid === $grid) {
        break;
    }
    $grid = $new_grid;
    $counter++;
}
echo "Iterations: $counter\n";

$out = 0;
foreach ($grid as $line) foreach($line as $spot) $out += $spot === '#';
echo "$out\n";

echo time_taken();

function get_neighbours($y, $x)
{
    global $grid;
    $str = '';
    $loops = [ [-1, -1], [-1, 0], [-1, 1], [0, -1], [0, 1], [1, -1], [1, 0], [1, 1] ];
    foreach ($loops as $ji) {
        list($j, $i) = $ji;
        $cy = $y+$j;
        $cx = $x+$i;
        while(isset($grid[$cy][$cx])) {
            if ($grid[$cy][$cx]!=='.') break;
            $cy += $j;
            $cx += $i;
        }
        $c = $grid[$cy][$cx] ?? '.';
        $str .= $grid[$cy][$cx] ?? '.';
    }
    return substr_count($str, '#');
}

?>
