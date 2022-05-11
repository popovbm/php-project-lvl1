<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

const MAX_ROUNDS = 3;

function runEngine(array $dataForEngine, string $taskDescription)
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($taskDescription);

    for ($roundCounter = 0; $roundCounter < MAX_ROUNDS; $roundCounter++) {
        $question = $dataForEngine[$roundCounter]["question"];
        $correctAnswer = ("{$dataForEngine[$roundCounter]["answer"]}");
        line('Question: %s', $question);
        $userAnswer = prompt('Your answer');

        if ($userAnswer === $correctAnswer) {
            line("Correct!");
        } else {
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, %s!", $name);
            return;
        }
    }
    line("Congratulations, %s!", $name);
}
