<?php

namespace src\Games\Brain\Gcd;

use function Brain\Games\Engine\game;

use const Brain\Games\Engine\MAX_ROUNDS;

function findGcd(int $num1, int $num2)
{
    if ($num2 === 0) {
            return abs($num1);
    }
        return findGcd($num2, $num1 % $num2);
}

function brainGcdGame()
{
    $result = [];
    $rounds = MAX_ROUNDS;
    for ($i = 0; $i < $rounds; $i++) {
        $num1 = random_int(1, 100);
        $num2 = random_int(1, 100);
        $string = ("{$num1} {$num2}");
        $resultFindGcd = findGcd($num1, $num2);
        $result[] = [$string, $resultFindGcd];
    }
    return $result;
}

function play()
{
    $question = brainGcdGame();
    $description = 'Find the greatest common divisor of given numbers.';
    game($question, $description);
}
