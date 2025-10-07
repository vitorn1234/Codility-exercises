<?php


function solution($X, array $A): int {

    $filledleafs = array();
    $position = -1;
    foreach($A as $key => $leaf) {
        if ($leaf <= $X){
            $filledleafs[$leaf]= $key; 
        }
        if (count($filledleafs) == $X) {
            $position = $key;
            break;
       }
    }

    return $position;
}

echo solution(5, [1,3,1,4,2,3,5,4]);

echo solution(5, [1,5,3,1,4,2,3,4]);