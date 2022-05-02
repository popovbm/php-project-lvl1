<?php

namespace src\Games\brain\progression;

use function cli\line;
use function cli\prompt;

function brainProgressionLogic()
{
    $dots = '..';
    $startSequence = random_int(1, 100);
    $randomStep = random_int(1, 10);
    $randomRange = random_int(5, 10);
    $endSequence = $startSequence + ($randomStep * $randomRange);
    $array = range($startSequence, $endSequence, $randomStep);
    $randomReplaceIndex = random_int(0, count($array) - 1);
    $randomValueFromArray = $array[$randomReplaceIndex];
    $array[$randomReplaceIndex] = $dots;
    $arrayToString = implode(' ', $array);
}

function brainProgressionGame()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('What number is missing in the progression?');

    $counter = 0;
    $dots = '..';

    for ($i = 0; $i < 3; $i++) {
        $startSequence = random_int(0, 100);
        $randomStep = random_int(1, 10);
        $randomRange = random_int(5, 10);

        $endSequence = $startSequence + ($randomStep * $randomRange);
        $array = range($startSequence, $endSequence, $randomStep);
        $randomReplaceIndex = random_int(0, count($array) - 1);
        $randomValueFromArray = $array[$randomReplaceIndex];
        $array[$randomReplaceIndex] = $dots;
        $arrayToString = implode(' ', $array);

        line('Question: %s', $arrayToString);
        $answer = prompt('Your answer');

        if ($answer === ("{$randomValueFromArray}")) {
            line("Correct!");
            $counter++;
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$randomValueFromArray}'.");
            line("Let's try again, %s!", $name);
            break;
        }
    }

    if ($counter === 3) {
        line("Congratulations, %s!", $name);
    }
}
