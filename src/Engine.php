<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

const MAX_ROUNDS = 3;

function runLogic(array $data, string $taskDescription)
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($taskDescription);

    for ($roundCounter = 0; $roundCounter < MAX_ROUNDS; $roundCounter++) {
        line('Question: %s', $data[$roundCounter]["question"]);
        $userAnswer = prompt('Your answer');

        if ($userAnswer === ("{$data[$roundCounter]["answer"]}")) {
            line("Correct!");
        } else {
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$data[$roundCounter]["answer"]}'.");
            line("Let's try again, %s!", $name);
            return;
        }
    }
    line("Congratulations, %s!", $name);
}
