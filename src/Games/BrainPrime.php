<?php

namespace src\Games\Brain\Prime;

use function Brain\Games\Engine\game;

use const Brain\Games\Engine\MAX_ROUNDS;

function isPrimeLogic(int $num)
{
    $intIsPrime = 'yes';
    $intIsNotPrime = 'no';

    for ($i = 2; $i < $num - 1; $i++) {
        if ($num === 1) {
            return $intIsPrime;
        }
        if ($num % $i === 0) {
            return $intIsNotPrime;
        }
    }
    return $intIsPrime;
}

function brainPrimeGame()
{
    $result = [];
    $rounds = MAX_ROUNDS;
    for ($i = 0; $i < $rounds; $i++) {
        $randomInt = rand(1, 100);
        $isPrime = isPrimeLogic($randomInt);
        $result[] = [$randomInt, $isPrime];
    }
    return $result;
}

function play()
{
    $question = brainPrimeGame();
    $description = 'Answer "yes" if given number is prime. Otherwise answer "no"';
    game($question, $description);
}
