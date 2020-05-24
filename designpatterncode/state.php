<?php
	/***
	    
	**/
	//这里用abstract 更好 因为1.模板方法一般很复杂 内部很多东西 2.里面订好了业务执行流程
	interface   State{
		public   function run( $action ,$thread);
		public   function stop( $action ,$thread);
	}
		
		
	class StartState implements State{
	
		public function run( $action ,$thread){
			echo 'op1'.PHP_EOL;
			if($action == 'stop'){
				$thread->state = new terminateState();
			}
		}
		public function stop( $action,$thread ){
			echo 'op2'.PHP_EOL;
		}
		
	}
	class terminateState implements State{
		public function run( $action,$thread){
			echo 'state  terminate'.PHP_EOL;
		}
		public function stop( $action ,$thread){
			echo 'op2'.PHP_EOL;
		}
		
	}
	class Thread{
		public $state;
		public function __construct( $state ){
			$this->state = $state;
		}
		public function run(){
			$this->state->run('stop',$this);
		}
		
	}
	$start = new StartState();
	$thread = new Thread( $start );
	$thread ->run('stop',$thread);
	$thread ->run('stop',$thread);
}

?>