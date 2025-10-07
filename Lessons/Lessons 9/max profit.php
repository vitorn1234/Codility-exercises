<?php

function solution($A) {
    // Implement your solution here
    $count = count($A);
    $minPrice = $A[0];
    $maxProfit = 0;
    for ($i = 0; $i < $count; $i++) {
        // Update minPrice if current element is smaller
        if ($A[$i] < $minPrice) {
            $minPrice = $A[$i];
        }
        // Calculate profit if selling today
        $profit = $A[$i] - $minPrice;
        // Update maxProfit if current profit is higher
        if ($profit > $maxProfit) {
            $maxProfit = $profit;
        }
    }
    return $maxProfit;
}


echo solution(array(23171,21011,21123,21366,21013,21367));// dominator 3
