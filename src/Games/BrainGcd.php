<?php

namespace Games\Brain\Gcd;

use function Brain\Games\Engine\runEngine;

use const Brain\Games\Engine\MAX_ROUNDS;

const TASK_DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function findGcdTwoNums(int $num1, int $num2)
{
    if ($num2 === 0) {
        return abs($num1);
    }
    return findGcdTwoNums($num2, $num1 % $num2);
}

function generateDataToEngine()
{
    $result = [];
    for ($i = 0; $i < MAX_ROUNDS; $i++) {
        $num1 = random_int(1, 100);
        $num2 = random_int(1, 100);
        $question = ("{$num1} {$num2}");
        $gcdOfTwoNums = findGcdTwoNums($num1, $num2);
        $result[] = ["question" => $question, "answer" => $gcdOfTwoNums];
    }
    return $result;
}

function play()
{
    runEngine(generateDataToEngine(), TASK_DESCRIPTION);
}
