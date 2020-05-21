<?php

interface Root{
     public  function add( $root );
}
class Leaf implements  Root{
	public $value;
	public $next;
    public function add( $root){
        $this->next[] = &$root;
    }
	public function setValue( $value){
		echo $value.PHP_EOL;
        $this->value = $value;
    }
}
class Node implements  Root{
    public $value;
	public $next;
    public function add( $root){
        $this->next[] = &$root;
    }
	public function setValue( $value){
		echo $value.PHP_EOL;
        $this->value = $value;
    }
}
//1层
$leaf = new Leaf();
$node = new Node();
$leaf->setValue('leaf');
$node->setValue('node');
$leaf->add($node);
//2层
$leaf_2 = new Leaf();
$leaf_3 = new Leaf();
$leaf_2->setValue('leaf');
$leaf_3->setValue('leaf');
$node->add($leaf_2);
$node->add($leaf_3);
//3层
$node2 = new Node();
$node3 = new Node();
$node2->setValue('node');
$node3->setValue('node');
$leaf_2->add($node2);
$leaf_3->add($node3);

//4层
$leaf_4 = new Leaf();
$leaf_5 = new Leaf();
$leaf_4->setValue('leaf');
$leaf_5->setValue('leaf');
$node2->add($leaf_4);
$node3->add($leaf_5);



//遍历这个树结构
class Iterator1{
	static $level=0;
	public function iterator( $leaf ){
		static::$level++;
		if(empty($leaf)){
			return true;
		}
		$str = '';
		$i=0;
		for($i<0;$i<static::$level;$i++){
		    $str .='-'; 
		}
		echo $str.$leaf->value.PHP_EOL;
		if($leaf instanceof Root){
    		foreach( $leaf->next as $v){
    			$this->iterator($v);
    		}
		}
		static::$level--;
	}
	
}
$iterator = new Iterator1();
$iterator->iterator($leaf);


?>