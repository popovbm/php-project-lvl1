<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function greeting()
{
    line('Welcome to the Brain Games!');
}

function isName()
{
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
}

function task($task)
{
    line($task);
}

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
    $num1 = random_int(1, 10);
    $num2 = random_int(1, 10);
    $operators = ['+', '-', '*'];
    $countOperators = count($operators) - 1;
    $operator = $operators[rand(0, $countOperators)];

    $string = ("{$num1} {$operator} {$num2}");
    $result = [$string, $num1, $num2, $operator];

    return $result;
}

function brainCalcQuestion()
{
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

function findGcd($num1, $num2)
{
    if ($num2 === 0) {
            return abs($num1);
    }
        return findGcd($num2, $num1 % $num2);
}

function brainGcdLogic()
{
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Find the greatest common divisor of given numbers.');

    $counter = 1;

    for ($i = 0; $i < 3; $i++) {
        $num1 = random_int(1, 100);
        $num2 = random_int(1, 100);
        line('Question №%d: %s %s', $counter, $num1, $num2);
        $answer = prompt('Your answer');
        $resultFindGcd = findGcd($num1, $num2);

        if ($answer === ("{$resultFindGcd}")) {
            line("Correct!");
            $counter++;
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$resultFindGcd}'.");
            break;
        }
    }

    if ($counter === 4) {
        line("Congratulations, %s!", $name);
    }
}
