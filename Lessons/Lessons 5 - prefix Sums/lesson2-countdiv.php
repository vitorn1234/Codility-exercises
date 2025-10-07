<?php

function solution($A, $B, $K) : int {
    // Implement your solution here

    if ($A > $B || $K> 2000000000) {
        return -1;
    }
    if ($A == $B && $A==0) return 1;
    $countUpToB = (int)($B / $K);
    $countBeforeA = (int)(($A !=0 ? ($A-1) : $A) / $K);
// Count how many numbers divisible by K are <= B
//    $countUpToB = intdiv($B, $K);
    // The intdiv() function in PHP is used to perform integer division, which divides
    // two numbers and returns the quotient as an integer, discarding any fractional part.
    // Count how many numbers divisible by K are < A
//    $countBeforeA = intdiv($A - 1, $K);

    $count = $countUpToB - $countBeforeA;
    if ($A ==0) $count++;
    return $count;
}

echo solution(6,11,2),"\n";
echo solution(0,0,11),"\n";
echo solution(0, 2000000000, 1),"\n";
echo solution(0,14,2),"\n";