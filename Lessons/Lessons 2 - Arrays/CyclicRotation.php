<?php

function solution( array $A, int $K) : array {
    // Implement your solution here
    $count = count($A);
    $finalArray = array();

    if ( $K ==  0 || $count == 0 || ($K % $count) === 0 ||  $count == 1) return $A;

    while ($K > $count){ //$K % $count does the same :D
        $K = $K - $count;
    }

    for ($i = 0; $i < $count; $i++) {
        if (($i + $K) >= $count){
            $finalArray[($i + $K - $count)] = $A[$i];

        } else{
            $finalArray[($i + $K)] = $A[$i];
        }
    }
    //print_r($finalArray);
    ksort($finalArray);
    return $finalArray;
}

print_r (solution([3, 8, 9, 7, 6],3)); // [9, 7, 6, 3, 8]

//print_r (solution([3],5)); // [9, 7, 6, 3, 8]