<?php

// Binary Search Tree (BST) implementation
// Steve George <steve@pagerange.com>

class Node {

    public $value = null; // value of current node
    public $left = null; // child node on left
    public $right = null; // child node on right
    public $parent = null; // The parent node
    public $swing = null; // on which side (left/right) is current node

    /**
     * Insert a new value into the tree
     * @param Mixed $value Value that can be compared with < and >
     */
    public function add($value)
    {
        if(is_null($this->value)) {
            $this->value = $value;
        } elseif($value < $this->value ) {
            $this->addLeft($value, $this);
        } else {
            $this->addRight($value, $this);
        }
    }

    /**
     * Add value to the left node
     * @param Mixed $value Value that can be compared with < and >
     */
    public function addLeft($value, $parent)
    {
        if(is_null($this->left)) {
            $this->left = new Node();
        } 
        $this->left->add($value);
        $this->left->parent = $parent;
        $this->swing = 'left';
    }

    /**
     * Add value to the right node
     * @param Mixed $value Value that can be compared with < and >
     */
    public function addRight($value, $parent)
    {
        if(is_null($this->right)) {
             $this->right = new Node();
        } 
        $this->right->add($value); 
        $this->right->parent = $parent;
        $this->swing = 'right';
    }

    /**
     * Traverse the Tree and print out how it was created
     * @param  Node $node
     * @param  String $direction left or right
     * @return Void
     */
    public function print($node = null, $direction = 'root')
    {
        if(is_object($node)) {
            printf("%s => Value: %s\n", $direction, $node->value);
            $this->print($node->left, 'left');
            $this->print($node->right, 'right');
            return;   
        }
    }

    /**
     * Find the first value of its kind in the tree
     * @param  Mixed $value Value that can be compared with < and >
     * @return Mixed The found value or null
     */
    public function get($value) {
        if($value == $this->value) {
            return $this;
        }
        if($value < $this->value) {
            if(!is_null($this->left)) {
                return $this->left->get($value);
            }  
        } else {
            if(!is_null($this->right)) {
                return $this->right->get($value);
            } 
        }
    }

    public function find($value)
    {   
        $node = $this->get($value);
        if(is_object($node)) {
            return $node->value;
        }
    }

    /**
     * Get the value from the node to the left
     * @return Mixed $value Value that can be compared with < and >
     */
    function getLeft()
    {
         if(is_null($this->left)) {
            return $this;
        } 
        return $this->left->getLeft();
    }

    /**
     * Get the value from the node on the right
     * @return Mixed $value Value that can be compared with < and >
     */
    function getRight()
    {
         if(is_null($this->right)) {
            return $this;
        } 
        return $this->right->getRight();
    }

    /**
     * Find the minimum value in the tree (the leftmost)
     * @return Mixed $value Value that can be compared with < and >
     */
    public function getMin()
    {
        if(is_null($this->value)) {
            return false;
        } else {
            return $this->left->getLeft();
        }
    }

    public function min()
    {
        return $this->getMin()->value;
    }

    public function max()
    {
        return $this->getMax()->value;
    }
    /**
     * Find the maximum value in the tree
     * @return [type] [description]
     */
    public function getMax()
    {
        if(is_null($this->value)) {
            return false;
        } else {
            return $this->getRight();
        }
    }

    public function delete($value)
    {
        // TO-DO
    }

    public function getLeftChild($node)
    {
        return $node->left;
    }

    public function getRightChild($node)
    {
        return $node->right;
    }
}
