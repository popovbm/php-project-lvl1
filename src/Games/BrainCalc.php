<?php

namespace src\Games\Brain\Calc;

use function Brain\Games\Engine\game;

use const Brain\Games\Engine\MAX_ROUNDS;

function brainCalc(int $num1, int $num2, string $operator): int
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

function calcResult()
{
    $result = [];
    $rounds = MAX_ROUNDS;
    for ($i = 0; $i < $rounds; $i++) {
        [$string, $num1, $num2, $operator] = brainCalcExpression();
        $brainCalcResult = brainCalc($num1, $num2, $operator);
        $result[] = [$string, $brainCalcResult];
    }
    return $result;
}

function play()
{
    $question = calcResult();
    $description = 'What is the result of the expression?';
    game($question, $description);
}
