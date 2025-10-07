<?php
// https://app.codility.com/programmers/lessons/3-time_complexity/perm_missing_elem/start/
function solution($A) {
    // Implement your solution here
//    sort($A);
//
//    $count = count($A);
//    if ($count == 1) { return $A[0]; }
//    if ($count == 0) { return 0; }
//
//    for ($i = 0; $i < count($A); $i++) {
//        if (empty($A[$i+1])){
//            return $A[$i]+1;
//        }
//        if ( $A[$i+1] != $A[$i]+1) {
//            return $A[$i]+1;
//        }
//    }
    $count = count($A);
    // Sum of numbers from 1 to N+1
    $total_sum = ($count + 1) * ($count + 2) / 2;

    // Sum of elements in array A
    $sum_A = array_sum($A);

    // Missing element
    return $total_sum - $sum_A;
}

echo solution([2,3,1,5]);