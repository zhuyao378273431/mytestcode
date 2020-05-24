<?php
	/***
	    
	**/
	//这里用abstract 更好 因为1.模板方法一般很复杂 内部很多东西 2.里面订好了业务执行流程
	abstract  class TemplateMethod{
	
		public  function m(){
			$this->op2();
			$this->op1();
		}
		public  abstract function op1();
		public  abstract function op2();
	}
		
		
	class MyMethod extends TemplateMethod{
		public function op1(){
			echo 'op1'.PHP_EOL;
		}
		public function op2(){
			echo 'op2'.PHP_EOL;
		}
		
	}
	$template = new MyMethod();
	$template->m();
	
}

?>