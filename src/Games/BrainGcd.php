<?php

namespace BrainGames\Games\Brain\Gcd;

use function BrainGames\Engine\runEngine;

use const BrainGames\Engine\MAX_ROUNDS;

const TASK_DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function findGcdTwoNums(int $num1, int $num2): int
{
    if ($num2 === 0) {
        return abs($num1);
    }
    return findGcdTwoNums($num2, $num1 % $num2);
}

function runGame()
{
    $result = [];
    for ($i = 0; $i < MAX_ROUNDS; $i++) {
        $randomNum1 = rand(1, 100);
        $randomNum2 = rand(1, 100);
        $question = ("{$randomNum1} {$randomNum2}");
        $gcdOfTwoNums = findGcdTwoNums($randomNum1, $randomNum2);
        $result[] = ["question" => $question, "answer" => $gcdOfTwoNums];
    }
    runEngine($result, TASK_DESCRIPTION);
}
