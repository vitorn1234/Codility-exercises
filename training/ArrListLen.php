<?php


function solution($A) {
    // Implement your solution here
    $w=0;
    $counter=0;
    while ($w != -1){
        $counter++;
        if (!isset($A[$w])) break;
        $w= $A[$w];
    }
    return $counter;
}

echo solution(array(1,4,-1,3,2));