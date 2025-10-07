<?php


function solution(array $A): int
{
    $unique = array_unique($A);
    if ($unique != $A) return 0;
    $count = count($A);
    rsort($A);

//    $count = $A[0] ? 1 : 0;
    // both work
    $N = count($A);
    $seen = array_fill(1, $N, false); // Track presence of each number from 1..N

    foreach ($A as $value) {
        // Only consider values within 1..N
        if ($value >= 1 && $value <= $N) {
            $seen[$value] = true; // Mark as present
        }
    }

    // Check if all numbers from 1..N are present
    foreach ($seen as $present) {
        if (!$present) {
            return 0; // Missing at least one number
        }
    }

    return 1; // All numbers are present, ignoring duplicates

}

echo solution([1, 3, 4, 2]);
echo solution([9, 5, 7, 3, 2, 7, 3, 1, 10, 8]);
