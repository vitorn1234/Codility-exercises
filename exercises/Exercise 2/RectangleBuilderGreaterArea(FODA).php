<?php


function solution($A, $X) {

    $countMap = [];
    $usable = [];
    // Step 1: Count how many times each fence length appears
    foreach ($A as $len) {
        $countMap[$len] = ($countMap[$len] ?? 0) + 1;
        if ($countMap[$len] == 2) {
            $usable[] = $len;
        }
    }

    // Step 3: Sort the usable lengths
    sort($usable);
    $ways = 0;
    $n = count($usable);

    // Step 4: For each a, binary search to find minimum b >= a such that a * b >= X
    for ($i = 0; $i < $n; $i++) {
        $a = $usable[$i];

        // Binary search for first valid b such that a * b >= X and b >= a
        $low = $i; // since b >= a, start from current index
        $high = $n - 1;
        $firstValid = $n;

        while ($low <= $high) {
            $mid = intdiv($low + $high, 2);
            $b = $usable[$mid];

            if ($a * $b >= $X) {
                $firstValid = $mid;
                $high = $mid - 1;
            } else {
                $low = $mid + 1;
            }
        }

        // Count valid pairs (a, b) from firstValid to end
//        for ($j = $firstValid; $j < $n; $j++) {
//            $b = $usable[$j];
//            if ($a == $b) {
//                // For squares, need at least 4
//                if ($countMap[$a] >= 4) {
//                    $ways++;
//                }
//            } else {
//                $ways++;
//            }
//    }
        // Count valid (a, b) pairs
        $validCount = $n - $firstValid;

        if ($firstValid < $n && $usable[$firstValid] == $a) {
            if ($countMap[$a] >= 4) {
                $ways++; // square is valid
            }
            $validCount--; // always subtract square from remaining count (whether valid or not)
        }

        $ways += $validCount;

        if ($ways > 1000000000) return -1;
    }

    return $ways;
}

echo solution(array(1,2,5,1,1,2,3,5,1), 5);echo "----ACABOU----------------------------\n";// returns 2

echo solution([2, 3, 2, 3, 2, 3, 2, 3], 9);echo "----ACABOU----------------------------\n";// returns 1

echo solution([6, 6, 6, 6, 6, 6], 10);echo "----ACABOU----------------------------\n";// returns 1