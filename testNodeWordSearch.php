<?php

/**
 * Testing BST with strings
 * Input size: 100,000 random strings between 3 an 12 characters
 * Run 10,000 searches
 */

require 'Node.php';


/**
 * Generate and array  random strings between
 * $minlength and $maxlength (each a single word)
 * @param  Int $num number of strings to generate
 * @return Array
 */
function getWords($num, $minlength = 3, $maxlength = 12){
     $words = [];
        for($i=0;$i<$num;$i++){
            $length = rand($minlength,$maxlength);
            $words[] = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz"),0,$length);
        }
        return $words;
    }


$words = getWords(100000);
$search = getWords(10000);


// Build the tree
$tree = new Node();
for($i=0;isset($words[$i]);$i++) {
    $tree->add($words[$i]);
}
// Test the tree find
$tree_found=[];
$start = round(microtime(true) * 1000);
for($i=0;$i<sizeof($search);$i++) {
    $found = $tree->find($search[$i]) ?? null;
    if(!is_null($found)) {
        $tree_found[] = [$search[$i], $found];
    }
}
$end = round(microtime(true) * 1000);
$treetime = $end - $start;

// Sample: Binary Tree Search found 998 results in 175 milliseconds (0.175 seconds)
printf("Binary Tree Search peformed %d searches on %s inputs and found %d results in %d milliseconds\n", $i, count($words), count($tree_found), $treetime);

printf("Minimum value (left-most): %s\n", $tree->min());
printf("Maximum value (right-most): %s\n", $tree->max());

