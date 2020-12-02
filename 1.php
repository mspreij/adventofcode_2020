<?php

$array = explode("\n", trim(file_get_contents('1.txt')));
// 1.a
// foreach ($array as $k => $v) {
//     $o = 2020-$v;
//     if (in_array($o, $array)) die('-> '.($o * $v));
// }

// 1.b
foreach ($array as $v1) {
    foreach ($array as $v2) {
        $o = 2020-($v1+$v2);
        if (in_array($o, $array)) die('-> '.($o * $v1 * $v2));
    }
}

?>