<?php

/* 
 * Judge Rock Scissors Paper with one line code.
 *
 * Run `php test_judge.php` to see it really works!
 */

namespace RSP;

function judge ($everyones_choices, $your_choice) {
    return (($result_base = ($hand_set = array_reduce($everyones_choices, function($x, $y){return $x | $y;}, $your_choice)) & ($hand_set>>1)) == 0 || $result_base == 7) ? 7 : ($result_base & $your_choice);
}
