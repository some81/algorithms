<?php

//get prices
$listings = array(
              array('Price' => 10),
              array('Price' => 10),
              array('Price' => 11)
            ); // so on and so forth, this data is pulled from the database. 

// flattening the array so I remove the "Price" key
// the array takes the form of array(10,10,11,...)
foreach($listings as $listing) {
    $flattenedListings[] = $listing['Price'];
}
//construct range-keys array
$widths = range(0, 100, 10);
$bins = array();
foreach($widths as $key => $val)
{
    if (!isset($widths[$key + 1])) break;
    $bins[] = $val.'-'. ($widths[$key + 1]);
}
//construct flotHistogram count array
$flotHistogram = array_fill_keys($bins, 0);

//construct array of prices for each key
$histogram = array();
foreach($flattenedListings as $price)
{
    $key = $bins[floor(($price -1)/10)];
    if (!isset($histogram[$key])) $histogram[$key] = array();
    $histogram[$key][] = $price;
}
print_r($histogram);
die;
$listings = array(
              array('Price' => 10),
              array('Price' => 10),
              array('Price' => 11)
            ); // so on and so forth, this data is pulled from the database. 

// flattening the array so I remove the "Price" key
// the array takes the form of array(10,10,11,...)
foreach($listings as $listing) {
    $flattenedListings[] = $listing['Price'];
}

$widths = range(0, 100, 10); // creates array of the form: array(0, 10, 20, 30, 40, ...)
$bins = array();
$isLast = count($widths);
foreach($widths as $key => $value) {
    if($key < $isLast - 1) {
        $bins[] = array('min' => $value, 'max' => $widths[$key+1]);
    }
}

// creates array of the form:
// $bins = array(
//      array('min'=>0, 'max' => 10),
//      array('min'=>10,'max' => 20),
//      array('min'=>30, 'max'=>40)
//     );

$histogram = array();
        foreach($bins as $bin) {
            $histogram[$bin['min']."-".$bin['max']] = array_filter($flattenedListings, function($element) use ($bin) {
                if( ($element > $bin['min']) && ($element <= $bin['max']) ) {
                    return true;
                } 
                return false;
            });
        }

// Last one is a bit complicated, but basically what it does is that it creates an array of ranges as keys, so it generates this:

// array('0-10' => array(1, 2, 3, 4, 5, 6), 
//         '10-20' => array(11, 19, 12),
//         '20-30' => array(),
//   );
// Or in other words: foreach range in the histogram, php creates an array containing      values within the allowed limits.

    foreach($histogram as $key => $val) {
        $flotHistogram[$key] = (is_array($val)) ? ( (count($val)) ? count($val) : 0 ) : 0; 
    }
print_r($flotHistogram);die;
// And finally it just counts them, and returns a new array.


/**
 * by Adrian Statescu <adrian@thinkphp.ro>
 * Twitter: @thinkphp
 * G+     : http://gplus.to/thinkphp
 * MIT Style License
 */
    class Node {
          public $info;
          public $left;
          public $right;
          public $level;
          public function __construct($info) {
                 $this->info = $info;
                 $this->left = NULL;
                 $this->right = NULL;
                 $this->level = NULL;
          }
          public function __toString() {
                 return "$this->info";
          }
    }  
    class SearchBinaryTree {
          public $root;
          public function  __construct() {
                 $this->root = NULL;
          }
  
          public function create($info) {
              
                 if($this->root == NULL) {
                    $this->root = new Node($info);
                 } else {
  
                    $current = $this->root;
                    while(true) {
                          if($info < $current->info) {
                         
                                if($current->left) {
                                   $current = $current->left;
                                } else {
                                   $current->left = new Node($info);
                                   break; 
                                }
                          } else if($info > $current->info){
                                if($current->right) {
                                   $current = $current->right;
                                } else {
                                   $current->right = new Node($info);
                                   break; 
                                }
                          } else {
                            break;
                          }
                    } 
                 }
          }
          public function traverse($method) {
                 switch($method) {
                     case 'inorder':
                     $this->_inorder($this->root);
                     break;
                     case 'postorder':
                     $this->_postorder($this->root);
                     break;
    
                     case 'preorder':
                     $this->_preorder($this->root);
                     break;
   
                     default:
                     break;
                 } 
          } 
          private function _inorder($node) { 
                          if($node->left) {
                            $this->_inorder($node->left); 
                          } 
                          echo $node. " ";
                          if($node->right) {
                             $this->_inorder($node->right); 
                          } 
          }
          private function _preorder($node) {
                          echo $node. " ";
                          if($node->left) {
                             $this->_preorder($node->left); 
                          } 
                          if($node->right) {
                             $this->_preorder($node->right); 
                          } 
          }
          private function _postorder($node) {
                          if($node->left) {
                             $this->_postorder($node->left); 
                          } 
                          if($node->right) {
                             $this->_postorder($node->right); 
                          } 
                          echo $node. " ";
          }
          public function BFT() {
                 $node = $this->root;
                 
                 $node->level = 1; 
                 $queue = array($node);
                 $out = array("<br/>");
                 $current_level = $node->level;
  
                 while(count($queue) > 0) {
                       $current_node = array_shift($queue);
                       if($current_node->level > $current_level) {
                            $current_level++;
                            array_push($out,"<br/>");  
                       } 
                       array_push($out,$current_node->info. " ");
                       if($current_node->left) {
                          $current_node->left->level = $current_level + 1;
                          array_push($queue,$current_node->left); 
                       }    
                       if($current_node->right) {
                          $current_node->right->level = $current_level + 1;
                          array_push($queue,$current_node->right); 
                       }    
                 }
    
                
                return join($out,""); 
          }
    } 
               $arr = array(8,3,1,6,4,7,10,14,13);
               $tree = new SearchBinaryTree();
               for($i=0,$n=count($arr);$i<$n;$i++) {
                   $tree->create($arr[$i]);
               }
               
$str = <<<INTRO
     In computer science, a binary search tree (BST) is a node-based binary tree structure which has the following
properties:
<ul>
<li>the left subtree of a node contains only nodes with keys less than the node's key</li>
<li>the right subtree of a node contains only nodes with keys greater than the node's key</li>
<li>both the left and right subtrees must also be binary search trees</li>
</ul> 
INTRO;
   
    echo"<h1>Binary Search Tree</h1>"; 
    echo"<p>$str</p>"; 
    echo "<h2>Input vector: ", join($arr," "), "</h2>";
    echo"<h1>Breadh-First Traversal Tree</h1>"; 
    echo $tree->BFT();;
    echo"<h1>Inorder</h1>"; 
    $tree->traverse('inorder');
    echo"<h1>Postorder</h1>"; 
    $tree->traverse('postorder');
    echo"<h1>Preorder</h1>"; 
    $tree->traverse('preorder');
  
die;


$source_file = "test_image.jpg";

// histogram options

$maxheight = 300;
$barwidth = 2;

$im = ImageCreateFromJpeg($source_file); 

$imgw = imagesx($im);
$imgh = imagesy($im);

// n = total number or pixels

$n = $imgw*$imgh;

$histo = array();

for ($i=0; $i<$imgw; $i++)
{
        for ($j=0; $j<$imgh; $j++)
        {
        
                // get the rgb value for current pixel
                
                $rgb = ImageColorAt($im, $i, $j); 
                
                // extract each value for r, g, b
                
                $r = ($rgb >> 16) & 0xFF;
                $g = ($rgb >> 8) & 0xFF;
                $b = $rgb & 0xFF;
                
                // get the Value from the RGB value
                
                $V = round(($r + $g + $b) / 3);
                
                // add the point to the histogram
                
                $histo[$V] += $V / $n;
        
        }
}

// find the maximum in the histogram in order to display a normated graph

$max = 0;
for ($i=0; $i<255; $i++)
{
        if ($histo[$i] > $max)
        {
                $max = $histo[$i];
        }
}

echo "<div style='width: ".(256*$barwidth)."px; border: 1px solid'>";
for ($i=0; $i<255; $i++)
{
        $val += $histo[$i];
        
        $h = ( $histo[$i]/$max )*$maxheight;

        echo "<img src=\"img.gif\" width=\"".$barwidth."\"
height=\"".$h."\" border=\"0\">";
}
echo "</div>";






function generate_fibonacci_sequence($length)
{
   for( $l = array(0,1), $i = 2, $x = 0; $i < $length; $i++ )
        $l[] = $l[$x++] + $l[$x];
   return $l;
 }
 
 print_r(generate_fibonacci_sequence(5));
 
 function fib($n)
{
   if ($n < 2) {
      return $n;
   }
   return fib($n-1) + fib($n-2);
}
 
var_dump(fib(5));
 
 function fibonacci($n,$first = 0,$second = 1)
{
    $fib = [$first,$second];
    for($i=1;$i<$n;$i++)
    {
        $fib[] = $fib[$i]+$fib[$i-1];
    }
    return $fib;
}
echo "<pre>";
print_r(fibonacci(5));
die;



die;




class BinaryNode
{
    public $value;    // contains the node item
    public $left;     // the left child BinaryNode
    public $right;     // the right child BinaryNode

    public function __construct($item) {
        $this->value = $item;
        // new nodes are leaf nodes
        $this->left = null;
        $this->right = null;
    }
    // perform an in-order traversal of the current node
    public function dump() {
        if ($this->left !== null) {
            $this->left->dump();
        }
        var_dump($this->value);
        if ($this->right !== null) {
            $this->right->dump();
        }
    }
}

class BinaryTree
{
    protected $root; // the root node of our tree

    public function __construct() {
        $this->root = null;
    }

    public function isEmpty() {
        return $this->root === null;
    }
public function insert($item) {
        $node = new BinaryNode($item);
        if ($this->isEmpty()) {
            // special case if tree is empty
            $this->root = $node;
        }
        else {
            // insert the node somewhere in the tree starting at the root
            $this->insertNode($node, $this->root);
        }
    }
  
    protected function insertNode($node, &$subtree) {
        if ($subtree === null) {
            // insert node here if subtree is empty
            $subtree = $node;
        }
        else {
            if ($node->value > $subtree->value) {
                // keep trying to insert right
                $this->insertNode($node, $subtree->right);
            }
            else if ($node->value < $subtree->value) {
                // keep trying to insert left
                $this->insertNode($node, $subtree->left);
            }
            else {
                // reject duplicates
            }
        }
    }
    
    public function traverse() {
        // dump the tree rooted at "root"
        $this->root->dump();
    }
}

$a = new BinaryTree();
$a->insert(6);
$a->insert(4);
$a->insert(5);
$a->insert(10);
$a->insert(1);
$a->insert(0);
$a->insert(3);
$a->traverse();




class Node
{
    public $parent, $value, $left, $right;

    public function __construct($value, Node $parent = null)
    {
        $this->value = $value;
        $this->parent = $parent;
    }
    
    public function min()
    {
        $node = $this;
        while ($node->left) {
            if (!$node->left) {
                break;
            }
            $node = $node->left;
        }
        return $node;
    }
    
    public function max()
    {
        $node = $this;
        while ($node->right) {
            if (!$node->right) {
                break;
            }
            $node = $node->right;
        }
        return $node;
    }
}

class BST
{
    public $root;

    public function __construct($value = null)
    {
        if ($value !== null) {
            $this->root = new Node($value);
        }
    }

    public function search($value)
    {
        $node = $this->root;

        while($node) {
            if ($value > $node->value) {
                $node = $node->right;
            } elseif ($value < $node->value) {
                $node = $node->left;
            } else {
                break;
            }
        }

        return $node;
    }

public function insert($value)
{
    $node = $this->root;
    if (!$node) {
        return $this->root = new Node($value);
    }

    while($node) {
        if ($value > $node->value) {
            if ($node->right) {
                $node = $node->right;
            } else {
                $node = $node->right = new Node($value, $node);
                break;
            }
        } elseif ($value < $node->value) {
            if ($node->left) {
                $node = $node->left;
            } else {
                $node = $node->left = new Node($value, $node);
                break;
            }
        } else {
            break;
        }
    }
    return $node;
}

public function delete()
{
    if ($this->left && $this->right) {
        $min = $this->right->min();
        $this->value = $min->value;
        $min->delete();
    } elseif ($this->right) {
        if ($this->parent->left === $this) {
            $this->parent->left = $this->right;
            $this->right->parent = $this->parent->left;
        } elseif ($this->parent->right === $this) {
            $this->parent->right = $this->right;
            $this->right->parent = $this->parent->right;
        }
        $this->parent = null;
        $this->right   = null;
    } elseif ($this->left) {
        if ($this->parent->left === $this) {
            $this->parent->left = $this->left;
            $this->left->parent = $this->parent->left;
        } elseif ($this->parent->right === $this) {
            $this->parent->right = $this->left;
            $this->left->parent = $this->parent->right;
        }
        $this->parent = null;
        $this->left   = null;
    } else {
        if ($this->parent->right === $this) {
            $this->parent->right = null;
        } elseif ($this->parent->left === $this) {
            $this->parent->left = null;
        }
        $this->parent = null;
    }
}
    
}

// Instantiate a new tree with root node of 5
$bst = new BST(5);

// Insert left branch nodes
$bst->insert(2);
$bst->insert(1);
$bst->insert(4);

// Insert right branch nodes
$bst->insert(11);
$bst->insert(7);
$bst->insert(23);
$bst->insert(16);
$bst->insert(34);
print_r($bst->search(34));die;
//// Walk the tree
//$tree = $bst->walk();
//foreach($tree as $node) {
//    echo "{$node->value}\n";
//}
die;
