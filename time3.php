<?php
// https://app.codility.com/c/run/trainingSAB22M-FF9/
function solution(array $A)
{
//    $splits = count($A) - 1;
//    $min_diff = 0;
//
//    if ($splits < 1) return 0;

//    for ($i = 1; $i <= $splits; $i++) {
//        $arr = array_sum(array_slice($A, 0, $i));
////        print_r(array_slice($A, -($splits+1)+$i));
//        $arr2 = array_sum(array_slice($A, -($splits + 1) + $i));
//        echo $arr, "!", $arr2, "!", $min_diff, "\n";
//        if ($i == 1) {
//            $min_diff = abs($arr - $arr2);
//            continue;
//        } else {
//            $min_diff = min($min, abs($arr - $arr2));
//        }
//
//    }
    $total_sum = array_sum($A);
    $left_sum = 0;
    $min_diff = PHP_INT_MAX;
    $N = count($A);

    // Loop through the array, except the last element
    for ($i = 0; $i < $N - 1; $i++) {
        $left_sum += $A[$i]; // sum of elements on the left
        $right_sum = $total_sum - $left_sum; // sum of elements on the right
        $diff = abs($left_sum - $right_sum);
        if ($diff < $min_diff) {
            $min_diff = $diff;
        }
    }

    return $min_diff;
}

echo solution([3,1,2,4,3]);