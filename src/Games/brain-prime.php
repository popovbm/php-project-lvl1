<?php

namespace src\Games\brain\prime;

use function cli\line;
use function cli\prompt;

function isPrimeLogic($num)
{
    $intIsPrime = 'yes';
    $intIsNotPrime = 'no';

    for ($i = 2; $i < $num - 1; $i++) {
        if ($num % $i === 0) {
            return $intIsNotPrime;
        }
    }
    return $intIsPrime;
}

function brainPrimeGame()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if given number is prime. Otherwise answer "no"');

    $counter = 0;

    for ($i = 0; $i < 3; $i++) {
        $randomInt = random_int(1, 100);
        $result = isPrimeLogic($randomInt);
        line('Question: %d', $randomInt);
        $answer = prompt('Your answer');

        if ($answer === $result) {
            line("Correct!");
            $counter++;
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$result}'.");
            line("Let's try again, %s!", $name);
            break;
        }
    }
    if ($counter === 3) {
        line("Congratulations, %s!", $name);
    }
}
