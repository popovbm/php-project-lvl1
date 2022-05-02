<?php

namespace src\Games\brain\even;

use function cli\line;
use function cli\prompt;

function brainEvenGame()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');

    $counter = 0;

    for ($i = 0; $i < 3; $i++) {
        $randomInt = random_int(1, 100);
        line('Question: %s', $randomInt);
        $answer = prompt('Your answer');

        if (($randomInt % 2 !== 0) && ($answer === 'yes')) {
            line("'yes' is wrong answer ;(. Correct answer was 'no'.");
            line("Let's try again, %s!", $name);
            break;
        } elseif (($randomInt % 2 === 0) && ($answer === 'no')) {
            line("'no' is wrong answer ;(. Correct answer was 'yes'.");
            line("Let's try again, %s!", $name);
            break;
        } elseif ((($randomInt % 2 !== 0) && ($answer === 'no')) || (($randomInt % 2 === 0) && ($answer === 'yes'))) {
            line("Correct!");
            $counter++;
        }
    }
    if ($counter === 3) {
        line("Congratulations, %s!", $name);
    }
}
