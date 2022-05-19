<?php

namespace BrainGames\Games\Brain\Prime;

use function BrainGames\Engine\runEngine;

use const BrainGames\Engine\MAX_ROUNDS;

const GAME_DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no"';

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
    $rounds = [];
    for ($i = 0; $i < MAX_ROUNDS; $i++) {
        $question = rand(1, 100);
        $answer = isNumPrime($question) ? 'yes' : 'no';
        $rounds[] = ["question" => $question, "answer" => $answer];
    }
    runEngine($rounds, GAME_DESCRIPTION);
}
