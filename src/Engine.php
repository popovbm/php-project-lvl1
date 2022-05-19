<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const MAX_ROUNDS = 3;

function runEngine(array $dataForEngine, string $gameDescription)
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($gameDescription);

    for ($roundCounter = 0; $roundCounter < MAX_ROUNDS; $roundCounter++) {
        ["question" => $question, "answer" => $correctAnswer] = $dataForEngine[$roundCounter];
        line('Question: %s', (string) $question);
        $userAnswer = prompt('Your answer');

        if ($userAnswer === (string) $correctAnswer) {
            line("Correct!");
        } else {
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, %s!", $name);
            return;
        }
    }
    line("Congratulations, %s!", $name);
}
