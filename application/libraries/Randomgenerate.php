<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Randomgenerate {
// function random_string($length) {
//     $key = '';
//     // $keys = array_merge(range(0, 9), range('a', 'z'));
//     $keys = array_merge(range(0, 9), range(0, 9));
//     for ($i = 0; $i < $length; $i++) {
//         $key .= $keys[array_rand($keys)];
//     }

//     return $key;
// }
function random_string($length,$customkey) {
    $key = $customkey;
    // $keys = array_merge(range(0, 9), range('a', 'z'));
    $keys = array_merge(range(0, 9), range(3, 12));
    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }

    return $key;
}
}
?>