<?php

namespace Games\Brain\Progression;

use function Brain\Games\Engine\runLogic;

use const Brain\Games\Engine\MAX_ROUNDS;

function brainProgressionResult()
{
    $dots = '..';
    $result = [];
    $rounds = MAX_ROUNDS;
    for ($i = 0; $i < $rounds; $i++) {
        $startSequence = rand(0, 100);
        $randomStep = rand(1, 10);
        $randomRange = rand(5, 10);
        $endSequence = $startSequence + ($randomStep * $randomRange);
        $array = range($startSequence, $endSequence, $randomStep);
        $randomReplaceIndex = rand(0, count($array) - 1);
        $randomValueFromArray = $array[$randomReplaceIndex];
        $array[$randomReplaceIndex] = $dots;
        $arrayToString = implode(' ', $array);
        $result[] = ["question" => $arrayToString, "answer" => $randomValueFromArray];
    }
    return $result;
}

function play()
{
    $data = brainProgressionResult();
    $taskDescription = 'What number is missing in the progression?';
    runLogic($data, $taskDescription);
}
