<?php

namespace Games\Brain\Prime;

use function Brain\Games\Engine\runEngine;

use const Brain\Games\Engine\MAX_ROUNDS;

const TASK_DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no"';

function checkIsNumPrime(int $num)
{
    if ($num === 1) {
        return 'no';
    }

    for ($i = 2; $i < $num - 1; $i++) {
        if ($num % $i === 0) {
            return 'no';
        }
    }
    return 'yes';
}

function generateDataToEngine()
{
    $result = [];
    for ($i = 0; $i < MAX_ROUNDS; $i++) {
        $randomInt = rand(1, 100);
        $resultOfChecking = checkIsNumPrime($randomInt);
        $result[] = ["question" => $randomInt, "answer" => $resultOfChecking];
    }
    return $result;
}

function play()
{
    runEngine(generateDataToEngine(), TASK_DESCRIPTION);
}
