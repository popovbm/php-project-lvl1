<?php

namespace BrainGames\Games\Brain\Progression;

use function BrainGames\Engine\runEngine;

use const BrainGames\Engine\MAX_ROUNDS;

const GAME_DESCRIPTION = 'What number is missing in the progression?';

function generateProgression(): array
{
    $startSequence = rand(0, 100);
    $randomStep = rand(1, 10);
    $randomRange = rand(5, 10);
    $endSequence = $startSequence + ($randomStep * $randomRange);
    $result = range($startSequence, $endSequence, $randomStep);
    return $result;
}

function runGame()
{
    $dots = '..';
    $rounds = [];
    for ($i = 0; $i < MAX_ROUNDS; $i++) {
        $progression = generateProgression();
        $randomReplacementIndex = array_rand($progression);
        $answer = $progression[$randomReplacementIndex];
        $progression[$randomReplacementIndex] = $dots;
        $question = implode(' ', $progression);
        $rounds[] = ["question" => $question, "answer" => $answer];
    }
    runEngine($rounds, GAME_DESCRIPTION);
}
