# PHP Binary Search Tree 

(DO NOT USE!... JUST AN EXPERIMENT)

Rudimentary Binary Search Tree (BST) implementation in PHP with some
simple tests to show its efficacy.  Clearly, Binary Search Tree is 
a good option when using an unordered list that breaks into two trees.
An ordered list, with only a single (all right or all left) tree, is the 
worst case scenario for a BST ... O(n).

I've never used a BST in a real PHP project.  The performance of `in_array()` or
`array_key_exists()` on the typical data sets you find in a Web project is more 
than adequate. I'm not sure the effort and complexity of adding a BST, not to 
mention the overhead of populating it with data, is worth the effort.  On the other
hand, if it were implemented behind the scenes in PHP's C source, that would be another
thing.  

Test 1 was an array of 100,000 unique shuffled numbers
between 1 and 2,000,000.  10,000 searches were performed on
the array to find random numbers. 

Tests using a shuffled array (100,000 inputs):
```
+-----------------+----------+
| algorithm       | shuffled |
+-----------------+----------+
| BST             | 44 ms    |
| in_array()      | 1527 ms  |
| array iteration | 36614 ms |
+-----------------+----------+
```


Test 2 was an array of 10,000 unique ordered numbers
between 1 and 2,000,000... 100,000 inputs took too long
for the BST and for simple array iteration.  10,000 searches 
were performed on the array to find random numbers. 

Test using an ordered array (10,000 inputs)
```
+-----------------+----------+
| algorithm       | ordered  |
+-----------------+----------+
| BST             | 11422 ms |
| in_array()      | 116 ms   |
| array iteration | 3708 ms  |
+-----------------+----------+
```
