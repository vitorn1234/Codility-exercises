<?php

function solution($A) {
    // Implement your solution here
    rsort($A);
    $count=count($A);
    return  max($A[0]*$A[1]*$A[2] , $A[0]*$A[$count-1]*$A[$count-2]);
}

echo solution([-3,1,2,5,6]);
echo solution([-5, 5, -5, 4]);