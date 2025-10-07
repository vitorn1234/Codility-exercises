<?php

function solution($N) {
    // Implement your solution here
    $return = 1;
    while ( ($N % 2) == 0) {
        $N = $N /2;
        $return++;
    }
    return $return-1;
}

echo solution(24);
echo solution(1);