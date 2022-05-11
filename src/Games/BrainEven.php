<?php

namespace Games\Brain\Even;

use function Brain\Games\Engine\runEngine;

use const Brain\Games\Engine\MAX_ROUNDS;

const TASK_DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function findIsNumEven(int $num)
{
    return $num % 2 === 0 ? 'yes' : 'no';
}

function generateDataToEngine()
{
    $result = [];
    for ($i = 0; $i < MAX_ROUNDS; $i++) {
        $randomNum = rand(1, 100);
        $result[] = ["question" => $randomNum, "answer" => findIsNumEven($randomNum)];
    }
    return $result;
}

function play()
{
    runEngine(generateDataToEngine(), TASK_DESCRIPTION);
}
