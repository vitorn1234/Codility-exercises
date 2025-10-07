<?php



function solution($A) {
    // Implement your solution here
    $count = array();
    $counter=floor(count($A)/2)+1;
    foreach ($A as $index =>$val) {
        if (!isset($count[$val])) $count[$val]=0;
        $count[$val]++;
        if ($count[$val] >= $counter) {
            return $index;
        }
    }

    return -1;
}

echo solution(array(3,4,3,2,3,-1,3,3));// dominator 3
