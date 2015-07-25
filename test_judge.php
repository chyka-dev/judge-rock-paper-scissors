<?php
/*
 * This software is released under the MIT License, see LICENSE.txt.
 */


require_once "judge.php";

define("rock", 0b1001);
define("scissors", 0b0010);
define("paper", 0b0100);

/* Results
 * 0b111 means Draw
 * 0b000 means Lose
 * 0b001, 0b010, 0b100 mean Win
 */

assert(RSP\judge(/* everyones_choices = */ [rock, scissors, paper], /* your_choice = */rock) == 0b111);

assert(RSP\judge([rock], rock) == 0b111);
assert(RSP\judge([scissors], scissors) == 0b111);
assert(RSP\judge([paper], paper) == 0b111);

assert(RSP\judge([rock, rock, rock], rock) == 0b111);
assert(RSP\judge([paper, paper, paper], paper) == 0b111);
assert(RSP\judge([scissors, scissors, scissors], scissors) == 0b111);

assert(RSP\judge([scissors], rock) == 0b001); // Win
assert(RSP\judge([rock], scissors) == 0b000); // Lose

assert(RSP\judge([paper], scissors) == 0b010); // Win
assert(RSP\judge([scissors], paper) == 0b000); // Lose

assert(RSP\judge([rock], paper) == 0b100); // Win
assert(RSP\judge([paper], rock) == 0b000); // Lose

$everyones_choices = [];
for ($i = 0; $i < 10000; $i++) {
    $everyones_choices[] = scissors;
}
assert(count($everyones_choices) == 10000);
assert(RSP\judge($everyones_choices, rock) == 0b001); // Win

$everyones_choices[] = paper;
assert(RSP\judge($everyones_choices, rock) == 0b111); // Draw
