<?php

function solution(int $N, array $A) : array {

//    $count= array_fill(0, $N, 0);
//    $max = 0;
//    foreach ($A as $k => $v){
//        if ($v <= $N && $v >= 1){
//            $count[$v-1]++;
//            $max = max($count[$v-1],$max);
//        } else{
//            for ($i = 0; $i < $N; $i++) {
//                $count= array_fill(0, $N, $max);
//            }
//        }
//        //print_r($count);
//    }
//
//    return $count;

    $count = array_fill(0, $N, 0);
    $max = 0;    // track current maximum value
    $base = 0;   // minimum value the counters should have due to max counter operations

    foreach ($A as $v) {
        if ($v >= 1 && $v <= $N) {
            // Ensure counter is at least $base before incrementing
            if ($count[$v - 1] < $base) {
                $count[$v - 1] = $base;
            }
            $count[$v - 1]++;
            if ($count[$v - 1] > $max) {
                $max = $count[$v - 1];
            }
        } elseif ($v > $N) {
            // Update base to max, lazy update
            $base = $max;
        }
    }

    // Final step: ensure all counters are at least $base
    for ($i = 0; $i < $N; $i++) {
        if ($count[$i] < $base) {
            $count[$i] = $base;
        }
    }

    return $count;
}

print_r(solution(5,[3,4,4,6,1,4,4]));