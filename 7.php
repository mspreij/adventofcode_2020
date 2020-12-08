<pre>
<?php
$array = explode("\n", trim(file_get_contents('7.txt')));

// first make a list of bags and what they contain. also a list of parent bags because hey.
foreach ($array as $line) {
    list($color, $contents) = explode(' bags contain ', $line);
    $baglet_list = [];
    if ($contents !== 'no other bags.') {
        foreach(explode(', ', $contents) as $baglets) {
            list($count, $c1, $c2, $dasf) = explode(' ', $baglets);
            $baglet_list["$c1 $c2"] = $count;
            $parents["$c1 $c2"][] = $color;
        }
    }
    $bags[$color] = $baglet_list;
}

// var_export($bags);

// 7a
// $content = ['shiny gold'];
//
// while (count($content)) {
//     foreach($content as $key => $bag) {
//         foreach($parents[$bag] as $parent) {
//             $content[] = $parent;
//             $out[] = $parent;
//         }
//         unset($content[$key]);
//     }
// }
// echo count(array_flip($out)); // in between the 143 KB of notices and warnings, you can pick out the answer \o/

// 7b
echo get_bag_count('shiny gold'); // look ma, no notices OR warnings!

function get_bag_count($bag)
{
    global $bags;
    $out = 0;
    foreach ($bags[$bag] as $color => $count) {
        $out += $count + $count * get_bag_count($color);
    }
    return $out;
}


?>
