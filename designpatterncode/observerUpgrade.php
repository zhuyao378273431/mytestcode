<?php

		/***
	    
	**/
	
	
		
	interface  Observer {
		public function do();
	}
		
	//监听者对象
	class FatherObserver implements Observer{
	    	protected $flag;
		public function do( $event ){
			echo 'from source '.$event->getSource()->getFlag().PHP_EOL;
			echo 'i am father ,do not cry'.PHP_EOL;
		}
		public function setFlag( $flag ){
			$this->flag = $flag;
		}
	}
		
	class MomObserver implements Observer{
		protected $flag;
		public function do( $event ){
			echo 'from source '.$event->getSource()->getFlag().PHP_EOL;
			echo 'i am mom ,do not cry'.PHP_EOL;
		}
		public function setFlag( $flag ){
			$this->flag = $flag;
		}
	}
	//事件源对象	
	class Baby{
		protected $list = array();
		
		public function add( $observer ){
			$this->list[] = $observer;
		}
		public function remove( $observer ){
			if(count($this->list) == 0){
				return true;
			}
			foreach($this->list as $k=>$v){
					if(serialize($v) == serialize($observer)){
						unset($this->list[$k]);
					}
			}
				
		}
		public function Cry(){
			$event = new Event(time(),$this);
			
			if(count($this->list) > 0){
				foreach($this->list as $observer){
					//传递事件 ！！
					$observer->do($event);
					$this->remove($observer);
				}
			}
		}
		public function getFlag(){
			echo '1111'.PHP_EOL;
		}
		
		
	}
	class Event{
		private $time;
		private $source;
		public function __construct($time , $source){
			$this->time = $time;
			$this->time = $source;
		}
		public function getSource(){
			return $this->source;
		}
		
	}
	
	$baby = new Baby();

	$mom1  = new MomObserver();
	$mom1->setFlag(1);
	$mom2  = new MomObserver();
	$mom2->setFlag(2);
	
	$father1  = new FatherObserver();
	$father1->setFlag(1);
	$father2  = new FatherObserver();
	$father2->setFlag(2);
	$baby ->add($mom1);
	$baby ->add($mom2);
	$baby ->add($father2);
	$baby ->add($father1);
	
	//孩子哭了
	$baby->cry();
	

	
	
	
	
	
	
}

?>