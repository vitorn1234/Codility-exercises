<?php

function solution($P, $C) {
    // Implement your solution here
    //$totalGamesPerPlayer = $P-1;
    $parallel = (int)($P/2);
    return ($C > $parallel ? $parallel: $C);
}

echo solution(5,3);
echo "\n";
echo solution(10,3);
echo "\n";