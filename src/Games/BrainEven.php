<?php

namespace Games\Brain\Even;

use function Brain\Games\Engine\runLogic;

use const Brain\Games\Engine\MAX_ROUNDS;

function isNumEven()
{
    $result = [];
    $rounds = MAX_ROUNDS;
    for ($i = 0; $i < $rounds; $i++) {
        $num = rand(1, 100);
        $result[] = ["question" => $num, "answer" => $num % 2 === 0 ? 'yes' : 'no'];
    }
    return $result;
}

function play()
{
    $data = isNumEven();
    $taskDescription = 'Answer "yes" if the number is even, otherwise answer "no".';
    runLogic($data, $taskDescription);
}
