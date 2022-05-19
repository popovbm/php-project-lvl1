<?php

namespace BrainGames\Games\Brain\Calc;

use function BrainGames\Engine\runEngine;

use const BrainGames\Engine\MAX_ROUNDS;

const GAME_DESCRIPTION = 'What is the result of the question?';

function calculateExpression(int $num1, int $num2, string $operator): int
{
    switch ($operator) {
        case '+':
            return $num1 + $num2;
        case '-':
            return $num1 - $num2;
        case '*':
            return $num1 * $num2;
        default:
            return 'Wrong operator';
    }
}

function runGame()
{
    $rounds = [];
    $operators = ['+', '-', '*'];
    for ($i = 0; $i < MAX_ROUNDS; $i++) {
        $randomNum1 = rand(1, 100);
        $randomNum2 = rand(1, 100);
        $randomOperator = $operators[array_rand($operators)];
        $question = ("{$randomNum1} {$randomOperator} {$randomNum2}");
        $answer = calculateExpression($randomNum1, $randomNum2, $randomOperator);
        $rounds[] = ["question" => $question, "answer" => $answer];
    }
    runEngine($rounds, GAME_DESCRIPTION);
}
