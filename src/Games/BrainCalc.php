<?php

namespace Games\Brain\Calc;

use function Brain\Games\Engine\runEngine;

use const Brain\Games\Engine\MAX_ROUNDS;

const TASK_DESCRIPTION = 'What is the result of the expression?';

function calculator(int $num1, int $num2, string $operator): int
{
    $result = 0;
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
            echo 'Wrong operator';
            break;
    }
    return $result;
}

function generateRandomExpression()
{
    $num1 = random_int(1, 100);
    $num2 = random_int(1, 100);
    $operators = ['+', '-', '*'];
    $maxOperatorsIndexCount = count($operators) - 1;
    $randomOperator = $operators[rand(0, $maxOperatorsIndexCount)];
    $expression = ("{$num1} {$randomOperator} {$num2}");
    $result = [$expression, $num1, $num2, $randomOperator];

    return $result;
}

function generateDataToEngine()
{
    $result = [];
    for ($i = 0; $i < MAX_ROUNDS; $i++) {
        [$question, $num1, $num2, $operator] = generateRandomExpression();
        $calculateResult = calculator($num1, $num2, $operator);
        $result[] = ["question" => $question, "answer" => $calculateResult];
    }
    return $result;
}

function play()
{
    runEngine(generateDataToEngine(), TASK_DESCRIPTION);
}
