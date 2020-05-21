<?php
 	/**
	 php 不能内部类
	*/
interface Iterator_{
     public  function hasNext();
     public  function next();
 }
interface Collection{
     public  function add( $num );
     public  function size();
}

class ArrayList implements Collection{
	 public $list;
	 protected $size = 0;
	 
     public  function add( $num ){
		 $this->list[] = $num;
		 $this->size++;
	 }
     public  function size(){
		 return $this->size;
	 }
	public function getIterator(){
		return new ArrayListIterator_($this);
	}
  
}
class ArrayListIterator_  implements  Iterator_{
		protected $index=0;
		protected $data=0;
		public function __construct( $obj ){
		    $this->data = $obj;
		}
		public function hasNext(){
			if(!isset($this->data->list[$this->index])){
				return false;
			}
			return true;
		}
		public function next(){
			$this->index++;
			return $this->data->list[$this->index-1];
		}

	}
$list = new ArrayList();
$list->add(3);
$list->add(2);
$list->add(1);

$iterarator=$list->getIterator();
while($iterarator->hasNext()){
	echo $iterarator->next();
}

?>