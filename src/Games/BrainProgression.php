<?php

namespace BrainGames\Games\Brain\Progression;

use function BrainGames\Engine\runEngine;

use const BrainGames\Engine\MAX_ROUNDS;

const TASK_DESCRIPTION = 'What number is missing in the progression?';

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
    $result = [];
    for ($i = 0; $i < MAX_ROUNDS; $i++) {
        $progression = generateProgression();
        $randomReplacementIndex = rand(0, count($progression) - 1);
        $randomProgressionRangeValue = $progression[$randomReplacementIndex];
        $progression[$randomReplacementIndex] = $dots;
        $progressionRangeToStr = implode(' ', $progression);
        $result[] = ["question" => $progressionRangeToStr, "answer" => $randomProgressionRangeValue];
    }
    runEngine($result, TASK_DESCRIPTION);
}
