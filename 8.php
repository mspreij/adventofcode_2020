<pre>
<?php

$lines = explode("\n", trim(file_get_contents('8.txt')));

foreach ($lines as $line) {
    $ops[] = [substr($line, 0, 3), (int) substr($line, 4)];
}

// 8a
// $i = 0;
// $hist = [];
// $acc = 0;
// while (1) {
//     list($op, $val) = $ops[$i];
//     switch ($op) {
//         case 'nop':
//             $i++;
//             break;
//         case 'acc':
//             $acc+=$val;
//             $i++;
//             break;
//         case 'jmp':
//             $i += $val;
//             break;
//     }
//     if (isset($hist[$i])) {
//         break;
//     }
//     $hist[$i] = 1;
// }
// echo $acc;

// 8b
for ($i=0; $i < count($ops); $i++) {
    $chops = $ops;
    if ($chops[$i][0] === 'jmp') {
        $chops[$i][0] = 'nop';
    }elseif ($chops[$i][0] === 'nop') {
        $chops[$i][0] = 'jmp';
    }else{
        continue;
    }
    if (get_run_val($chops)) {
        echo "Done?!\n";
        break;
    }
}

function get_run_val($ops)
{
    $i = 0;
    $hist = [];
    $acc = 0;
    while (1) {
        list($op, $val) = $ops[$i];
        switch ($op) {
            case 'nop':
                $i++;
                break;
            case 'acc':
                $acc+=$val;
                $i++;
                break;
            case 'jmp':
                $i += $val;
                break;
        }
        if ($i === count($ops)) {
            echo "past last instruction, accu $acc !\n";
            return true;
        }
        if (isset($hist[$i])) {
            return false;
        }
        $hist[$i] = 1;
    }
}

?>
