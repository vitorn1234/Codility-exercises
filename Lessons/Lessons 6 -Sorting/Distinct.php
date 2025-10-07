<?php

function solution($A) {
    // Implement your solution here
    return count(array_unique($A));
}

echo solution([2,1,1,2,3,1]);