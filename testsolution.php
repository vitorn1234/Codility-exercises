<?php

// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";

function solution2($A) { //20%
    // Implement your solution here
    rsort($A);
    $len = count($A);

    for ($x = 0; $x < $len-1; $x++) {
        if ($A[$x] < 0) return 1;
        if ($A[$x]-1 != $A[$x+1]){
            return $A[$x]-1;
        }

    }
    return $A[0]+1;
}

function solution($A) { //55%
    $A = array_filter($A, function($x) { return $x > 0;});
    if (count($A) == 0) return 1;
    $A = array_unique($A);
    sort($A);
    $len = count($A);

    for ($x = 0; $x < $len-1; $x++) {
        if ($A[$x]+1!= $A[$x+1] && $A[$x]!= $A[$x+1]){
            //echo $A[$x]."\n";
            return $A[$x]+1;
        }
    }
    return $A[$len-1]+1;
}

function solution3($A) { //100%
    // Filter out non-positive numbers
    $A = array_filter($A, function($x) { return $x > 0; });

    // Remove duplicates for efficiency
    $A = array_unique($A);

    // Sort the array
    sort($A);

    // Start from 1, looking for the first missing positive integer
    $expected = 1;

    foreach ($A as $num) {
        if ($num == $expected) {
            // Move to next expected number
            $expected++;
        } elseif ($num > $expected) {
            // Found a gap
            break;
        }
        // If $num < $expected, ignore it
    }

    return $expected;
}

echo solution([1, 3, 6, 4, 1, 2]);

echo solution([1, 2, 3]);
//
echo solution([-1, -3]);