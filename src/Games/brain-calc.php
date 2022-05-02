<?php

namespace src\Games\brain\calc;

use function cli\line;
use function cli\prompt;

function brainCalc($num1, $num2, $operator)
{
    switch ($operator) {
        case '+':
            $result = $num1 + $num2;
            break;
        case '-':
            $result = $num1 - $num2;
            break;
        case '*':
            $result = $num1 * $num2;
            break;
        default:
            echo 'Wrong operator operator';
            break;
    }
    return $result;
}

function brainCalcExpression()
{
    $num1 = random_int(1, 100);
    $num2 = random_int(1, 100);
    $operators = ['+', '-', '*'];
    $countOperators = count($operators) - 1;
    $operator = $operators[rand(0, $countOperators)];

    $string = ("{$num1} {$operator} {$num2}");
    $result = [$string, $num1, $num2, $operator];

    return $result;
}

function brainCalcGame()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('What is the result of the expression?');

    $counter = 1;

    for ($i = 0; $i < 3; $i++) {
        [$string, $num1, $num2, $operator] = brainCalcExpression();
        line('Question №%d: %s', $counter, $string);
        $answer = prompt('Your answer');
        $brainCalcResult = brainCalc($num1, $num2, $operator);

        if (("{$brainCalcResult}") === $answer) {
            line("Correct!");
            $counter++;
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$brainCalcResult}'.");
            line("Let's try again, %s!", $name);
            break;
        }
    }

    if ($counter === 4) {
        line("Congratulations, %s!", $name);
    }
}
