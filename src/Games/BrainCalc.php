<?php

namespace Games\Brain\Calc;

use function Brain\Games\Engine\runEngine;

use const Brain\Games\Engine\MAX_ROUNDS;

const TASK_DESCRIPTION = 'What is the result of the expression?';

function calculateExpression(int $num1, int $num2, string $operator): int
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

function runGame()
{
    $result = [];
    $operators = ['+', '-', '*'];
    for ($i = 0; $i < MAX_ROUNDS; $i++) {
        $randomNum1 = rand(1, 100);
        $randomNum2 = rand(1, 100);
        $maxOperatorsIndexCount = count($operators) - 1;
        $randomOperator = $operators[rand(0, $maxOperatorsIndexCount)];
        $expression = ("{$randomNum1} {$randomOperator} {$randomNum2}");
        $calculateResult = calculateExpression($randomNum1, $randomNum2, $randomOperator);
        $result[] = ["question" => $expression, "answer" => $calculateResult];
    }
    runEngine($result, TASK_DESCRIPTION);
}
