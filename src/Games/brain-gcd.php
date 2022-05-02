<?php

namespace src\Games\brain\gcd;

use function cli\line;
use function cli\prompt;

function findGcd($num1, $num2)
{
    if ($num2 === 0) {
            return abs($num1);
    }
        return findGcd($num2, $num1 % $num2);
}

function brainGcdGame()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Find the greatest common divisor of given numbers.');

    $counter = 0;

    for ($i = 0; $i < 3; $i++) {
        $num1 = random_int(1, 100);
        $num2 = random_int(1, 100);
        line('Question: %s %s', $num1, $num2);
        $answer = prompt('Your answer');
        $resultFindGcd = findGcd($num1, $num2);

        if ($answer === ("{$resultFindGcd}")) {
            line("Correct!");
            $counter++;
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$resultFindGcd}'.");
            line("Let's try again, %s!", $name);
            break;
        }
    }

    if ($counter === 3) {
        line("Congratulations, %s!", $name);
    }
}
