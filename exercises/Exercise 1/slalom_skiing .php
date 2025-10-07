<?php

function solution($A) {
    $N = count($A);
    if ($N <= 2) {
        return $N;
    }

    // Arrays to store the length of the longest increasing/decreasing sequences
    $leftInc = array_fill(0, $N, 0);   // Longest increasing sequence ending at each position
    $rightDec = array_fill(0, $N, 0);  // Longest decreasing sequence starting at each position

    $checkForward = 0;
    $leftmax = 0;
    for ($i = 1; $i < $N; $i++) {
        if ($A[$i] > $A[$i - 1]) {
            if ($checkForward == 0){
                $leftmax = $leftInc[$i] = $leftInc[$i - 1] + 1;
                $checkForward = 2;
            } else{
                $leftInc[$i] = $leftmax +1;
                $checkForward--;
            }

        } else {
            $leftInc[$i] = -1;
            if ($checkForward == 0)
            {
                $checkForward = 2;
            } else{
                $checkForward--;
            }
        }
    }

    // Compute the increasing sequence lengths from the start
    for ($i = 1; $i < $N; $i++) {
        if ($A[$i] > $A[$i - 1]) {
            $leftInc[$i] = $leftInc[$i - 1] + 1;
        }
    }
    // Compute the decreasing sequence lengths from the end
    for ($i = $N - 2; $i >= 0; $i--) {
        if ($A[$i] > $A[$i + 1]) {
            $rightDec[$i] = $rightDec[$i + 1] + 1;
        }
    }

    // To handle the case of no change, we also compute max sequence lengths purely increasing or decreasing
    $maxSeq = 1;
    for ($i = 0; $i < $N; $i++) {
        $maxSeq = max($maxSeq, $leftInc[$i], $rightDec[$i]);
    }

    // Now, combine sequences to allow for at most two direction changes:
    // We try all possible split points:
    $maxGates = 1;
    for ($i = 0; $i < $N; $i++) {
        // Combine increasing sequence ending at i and decreasing sequence starting at i
        $maxGates = max($maxGates, $leftInc[$i] + $rightDec[$i] - 1);
    }
    return $maxGates;
}

echo solution([15,13,5,7,4,10,12]);

//echo solution([15,13,5,7,4,10,12,8,2,11,6,9,3]);
//echo solution('zxcasdqwe123');
