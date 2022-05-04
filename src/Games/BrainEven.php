<?php

namespace src\Games\Brain\Even;

use function Brain\Games\Engine\game;

use const Brain\Games\Engine\MAX_ROUNDS;

function isNumEven()
{
    $result = [];
    $rounds = MAX_ROUNDS;
    for ($i = 0; $i < $rounds; $i++) {
        $num = rand(1, 100);
        $result[] = [$num, $num % 2 === 0 ? 'yes' : 'no'];
    }
    return $result;
}

function play()
{
    $question = isNumEven();
    $description = 'Answer "yes" if the number is even, otherwise answer "no".';
    game($question, $description);
}
