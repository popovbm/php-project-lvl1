<?php

namespace Games\Brain\Gcd;

use function Brain\Games\Engine\runLogic;

use const Brain\Games\Engine\MAX_ROUNDS;

function findGcdTwoNums(int $num1, int $num2)
{
    if ($num2 === 0) {
        return abs($num1);
    }
    return findGcdTwoNums($num2, $num1 % $num2);
}

function brainGcdResult()
{
    $result = [];
    $rounds = MAX_ROUNDS;
    for ($i = 0; $i < $rounds; $i++) {
        $num1 = random_int(1, 100);
        $num2 = random_int(1, 100);
        $string = ("{$num1} {$num2}");
        $resultFindGcd = findGcdTwoNums($num1, $num2);
        $result[] = ["question" => $string, "answer" => $resultFindGcd];
    }
    return $result;
}

function play()
{
    $data = brainGcdResult();
    $taskDescription = 'Find the greatest common divisor of given numbers.';
    runLogic($data, $taskDescription);
}
