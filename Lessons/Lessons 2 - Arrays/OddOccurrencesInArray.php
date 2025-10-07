<?php

function solution( array $A) : int {
    // Implement your solution here
//    if (empty($A)) return -1;

    sort($A);
    $count = count($A);
    for ($i = 0; $i < $count; $i++) {
        if ( empty($A[$i+1]) || $A[$i] != $A[$i+1]) {
            return $A[$i];
        } else{
            $i++;
        }
    }

    return -1;
}

print_r (solution([1,1,2,2,3,4,3,4,6])); // [9, 7, 6, 3, 8]

//print_r (solution([3],5)); // [9, 7, 6, 3, 8]