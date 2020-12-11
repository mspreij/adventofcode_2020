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
            }elseif ($spot === '#' and $nb >= 4) {
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
    for ($j=-1; $j < 2; $j++) {
        for ($i=-1; $i < 2; $i++) {
            $str .= $grid[$y+$j][$x+$i] ?? '.';
        }
    }
    return substr_count(substr($str, 0, 4).substr($str, 5), '#'); // skip current seat
}

?>
