<?php

namespace Games\Brain\Progression;

use function Brain\Games\Engine\runEngine;

use const Brain\Games\Engine\MAX_ROUNDS;

const TASK_DESCRIPTION = 'What number is missing in the progression?';

function generateProgression()
{
    $startSequence = rand(0, 100);
    $randomStep = rand(1, 10);
    $randomRange = rand(5, 10);
    $endSequence = $startSequence + ($randomStep * $randomRange);
    $progressionRange = range($startSequence, $endSequence, $randomStep);
    return $progressionRange;
}

function generateDataToEngine()
{
    $dots = '..';
    $result = [];
    for ($i = 0; $i < MAX_ROUNDS; $i++) {
        $progressionRange = generateProgression();
        $randomReplacementIndex = rand(0, count($progressionRange) - 1);
        $randomProgressionRangeValue = $progressionRange[$randomReplacementIndex];
        $progressionRange[$randomReplacementIndex] = $dots;
        $progressionRangeToStr = implode(' ', $progressionRange);
        $result[] = ["question" => $progressionRangeToStr, "answer" => $randomProgressionRangeValue];
    }
    return $result;
}

function play()
{
    runEngine(generateDataToEngine(), TASK_DESCRIPTION);
}
