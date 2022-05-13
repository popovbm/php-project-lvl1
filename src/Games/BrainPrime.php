<?php

namespace Games\Brain\Prime;

use function Brain\Games\Engine\runEngine;

use const Brain\Games\Engine\MAX_ROUNDS;

const TASK_DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no"';

function isNumPrime(int $num): bool
{
    if ($num === 1) {
        return false;
    }

    for ($i = 2; $i < $num - 1; $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }
    return true;
}

function runGame()
{
    $result = [];
    for ($i = 0; $i < MAX_ROUNDS; $i++) {
        $randomNum = rand(1, 100);
        $resultOfChecking = isNumPrime($randomNum) === true ? 'yes' : 'no';
        $result[] = ["question" => $randomNum, "answer" => $resultOfChecking];
    }
    runEngine($result, TASK_DESCRIPTION);
}
