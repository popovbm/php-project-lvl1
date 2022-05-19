<?php

namespace BrainGames\Games\Brain\Even;

use function BrainGames\Engine\runEngine;

use const BrainGames\Engine\MAX_ROUNDS;

const GAME_DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function isNumEven(int $num): bool
{
    return $num % 2 === 0;
}

function runGame()
{
    $rounds = [];
    for ($i = 0; $i < MAX_ROUNDS; $i++) {
        $question = rand(1, 100);
        $answer = isNumEven($question) ? 'yes' : 'no';
        $rounds[] = ["question" => $question, "answer" => $answer];
    }
    runEngine($rounds, GAME_DESCRIPTION);
}
