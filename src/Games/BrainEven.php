<?php

namespace BrainGames\Games\Brain\Even;

use function BrainGames\Engine\runEngine;

use const BrainGames\Engine\MAX_ROUNDS;

const TASK_DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function isNumEven(int $num): bool
{
    return $num % 2 === 0;
}

function runGame()
{
    $result = [];
    for ($i = 0; $i < MAX_ROUNDS; $i++) {
        $randomNum = rand(1, 100);
        $resultOfChecking = isNumEven($randomNum) === true ? 'yes' : 'no';
        $result[] = ["question" => $randomNum, "answer" => $resultOfChecking];
    }
    runEngine($result, TASK_DESCRIPTION);
}
