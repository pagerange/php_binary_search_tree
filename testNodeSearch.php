<?php

/**
 * Testing BST with integers
 * Input size: 100,000 random integers between 1 and 2,000,000
 * Run 10,000 searches against random numbers between 1 and 2,000,000
 */

require 'Node.php';

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

// Number of searches
// An array of 10,000 random numbers between 1 and 2,000,000
$targets = getRandomNums(1,2000000,10000);

$tree = new Node();
for($i=0;isset($nums[$i]);$i++) {
    $tree->add($nums[$i]);
}

// Test the tree find
$tree_found=[];
$start = round(microtime(true) * 1000);
for($i=0;$i<sizeof($targets);$i++) {
    $found = $tree->find($targets[$i]) ?? null;
    if(!is_null($found)) {
        $tree_found[] = [$targets[$i], $found];
    }
}
$end = round(microtime(true) * 1000);
$treetime = $end - $start;

printf("Binary Tree Search peformed %d searches on %s inputs and found %d results in %d milliseconds\n", $i, count($nums), count($tree_found), $treetime);

printf("Minimum value (left-most): %s\n", $tree->min());
printf("Maximum value (right-most): %s\n", $tree->max());
