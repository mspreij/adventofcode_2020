<pre>
<?php

$data = file_get_contents('4.txt');
$passports = explode("\n\n", trim($data));

// 4a
// $valid = 0;
// foreach ($passports as $item) {
//     $passport = [];
//     foreach(preg_split('/\s+/', $item) as $pair) {
//         list($k, $v) = explode(':', $pair);
//         $passport[$k] = $v;
//     };
//     if (count($passport) == 8 or count($passport) == 7 && ! isset($passport['cid'])) {
//         $valid++;
//     }
// }
// echo $valid;

// 4b
$valid = 0;
foreach ($passports as $item) {
    $passport = [];
    foreach(preg_split('/\s+/', $item) as $pair) {
        list($k, $v) = explode(':', $pair);
        $passport[$k] = $v;
    };
    if (count($passport) == 8 or count($passport) == 7 && ! isset($passport['cid'])) {
        if (validate($passport)) {
            $valid++;
        }
    }
}
echo $valid;

function validate($p) {
    if ($p['byr'] < 1920 or $p['byr'] > 2002) return false;
    if ($p['iyr'] < 2010 or $p['iyr'] > 2020) return false;
    if ($p['eyr'] < 2020 or $p['eyr'] > 2030) return false;
    $h = substr($p['hgt'], 0, -2);
    $measure = substr($p['hgt'], -2);
    if ($measure == 'cm') {
        if ($h < 150 or $h > 193) return false;
    }elseif ($measure == 'in'){
        if ($h < 59 or $h > 76) return false;
    }else{
        return false;
    }
    if (! preg_match('/^#[0-9a-f]{6}$/', $p['hcl'])) return false;
    if (! in_array($p['ecl'], explode(' ', 'amb blu brn gry grn hzl oth'))) return false;
    if (! preg_match('/^\d{9}$/', $p['pid'])) return false;
    return true;
}

?>