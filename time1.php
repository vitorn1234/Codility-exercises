<?php

function solution($X, $Y, $D) : int {

    (int)$range = (int)$Y - (int)$X;
    if($range <= 0) return 0;

    $times = $range / $D;
    if($range % $D > 0) return $times+1;

    return $times;
}

echo solution(10, 85, 30);