<?php

$array = explode("\n", file_get_contents('1.txt'));
foreach ($array as $k => $v) {
    $o = 2020-$v;
    if (in_array($o, $array)) die('-> '.($o * $v));
}

?>