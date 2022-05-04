<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

const MAX_ROUNDS = 3;

function game(array $question, string $description)
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($description);

    $counter = 0;

    for ($i = 0; $i < MAX_ROUNDS; $i++) {
        line('Question: %s', $question[$i][0]);
        $userAnswer = prompt('Your answer');

        if ($userAnswer === ("{$question[$i][1]}")) {
            line("Correct!");
            $counter++;
        } else {
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$question[$i][1]}'.");
            line("Let's try again, %s!", $name);
            break;
        }
    }

    if ($counter === 3) {
        line("Congratulations, %s!", $name);
    }
}
