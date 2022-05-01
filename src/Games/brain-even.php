<?php

namespace src\Games\brain\even;
  
  use function cli\line;
  use function cli\prompt;
  use function Brain\Games\Engine;

function task($task)
{
    line($task);
}

function brainEvenLogic()
{
    $counter = 1;

    for ($i = 1; $i < 4; $i++) {
    $randomInt = random_int(1, 100);
    line('Question №%d: %s', $i, $randomInt);
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
    if ($counter === 4) {
        line("Congratulations, %s!", $name);
    }
}