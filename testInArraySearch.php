<?php

/**
 * Testing in_array() with integers
 * Input size: 100,000 random integers between 1 and 2,000,000
 * Run 10,000 searches against random numbers between 1 and 2,000,000
 */

/**
 * Generate random numbers
 * @param  Int $min      [description]
 * @param  Int $max      [description]
 * @param  Int $quantity [description]
 * @return Array          [description]
 */
function getRandomNums($min, $max, $quantity, $shuffled = true) {
    $numbers = range($min, $max);
    if(true === $shuffled) {
        shuffle($numbers);
    }
    return array_slice($numbers, 0, $quantity);
}

// Number of inputs
// An array of 100,000 random numbers between 1 and 2,000,000
$nums = getRandomNums(1,2000000,100000);

// An array of 100,000 ordered numbers between 1 and 2,000,000
// $nums = getRandomNums(1,2000000,10000,false);

// An array of 10,000 random numbers between 1 and 2,000,000
$targets = getRandomNums(1,2000000,10000);

$in_array_found=[];
$start = round(microtime(true) * 1000);
for($i=0;$i<sizeof($targets);$i++) {
    if(in_array($targets[$i], $nums)) {
        $in_array_found[] = [$targets[$i], $targets[$i]];
    }
}
$end = round(microtime(true) * 1000);
$inarraytime = $end - $start;

// Sample: PHP's in_array() found 960 results in 1159 milliseconds (11.5 seconds)
printf("PHP's in_array() performed %d searches on %d inputs and found %d results in %d milliseconds\n", $i, count($nums), count($in_array_found), $inarraytime);


