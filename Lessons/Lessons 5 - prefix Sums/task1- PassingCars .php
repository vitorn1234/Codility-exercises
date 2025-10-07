<?php


// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";

function solution($A) {
    // Implement your solution here

    $counter = 0;
    $add = 0;
    foreach ($A as $a) {
        if ($a == 0) {
            $add++;
        } else{
            $counter += $add;
            if ($counter > 1000000000) return -1;
        }

    }
    return $counter;
}


echo solution([0,1,0,1,1]);