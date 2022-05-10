<?php

namespace Games\Brain\Prime;

use function Brain\Games\Engine\runLogic;

use const Brain\Games\Engine\MAX_ROUNDS;

function isPrime(int $num)
{
    $intIsPrime = 'yes';
    $intIsNotPrime = 'no';

    if ($num === 1) {
        return $intIsNotPrime;
    }

    for ($i = 2; $i < $num - 1; $i++) {
        if ($num % $i === 0) {
            return $intIsNotPrime;
        }
    }
    return $intIsPrime;
}

function brainPrimeResult()
{
    $result = [];
    $rounds = MAX_ROUNDS;
    for ($i = 0; $i < $rounds; $i++) {
        $randomInt = rand(1, 100);
        $isPrime = isPrime($randomInt);
        $result[] = ["question" => $randomInt, "answer" => $isPrime];
    }
    return $result;
}

function play()
{
    $data = brainPrimeResult();
    $taskDescription = 'Answer "yes" if given number is prime. Otherwise answer "no"';
    runLogic($data, $taskDescription);
}
