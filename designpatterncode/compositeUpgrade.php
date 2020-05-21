<?php
	
  interface Node{
     public  function p();
}
class LeafNode implements  Node{
	public $name;
	public function p(){
        echo $this->name.PHP_EOL;
    }
	public function __construct( $name ){
		$this->name = $name;
	}
}
class BranchNode implements  Node{
	public $next;
	public $name;
    public function add( $node){
        $this->next[] = &$node;
    }
	public function p(){
        echo $this->name.PHP_EOL;
    }
	public function __construct( $name ){
		$this->name = $name;
	}
}

$leaf1 = new LeafNode('file1');
$leaf2 = new LeafNode('file2');
$branch1 = new BranchNode('chapter1');
$branch2 = new BranchNode('chapter2');
$branch3 = new BranchNode('section1');
$branch1->add($branch3);
$branch1->add($branch2);
$branch3->add($leaf1);
$branch2->add($leaf2);

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
		echo $str.$leaf->name.PHP_EOL;
		if($leaf instanceof Node){
		    if(count($leaf->next)>0){
        		foreach( $leaf->next as $v){
        			$this->iterator($v);
        		}
		    }
		}
		static::$level--;
	}
	
}
$iterator = new Iterator1();
$iterator->iterator($branch1);

?>