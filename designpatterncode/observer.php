<?php

		/***
	    
	**/
	
	
		
	interface  Observer {
		public function do();
	}
		
		
	class FatherObserver implements Observer{
	    	protected $flag;
		public function do(){
			echo 'i am father ,do not cry'.PHP_EOL;
		}
		public function setFlag( $flag ){
			$this->flag = $flag;
		}
	}
		
	class MomObserver implements Observer{
		protected $flag;
		public function do(){
			echo 'i am mom ,do not cry'.PHP_EOL;
		}
		public function setFlag( $flag ){
			$this->flag = $flag;
		}
	}
		
	class ObserverList{
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
		public function itretor(){
			if(count($this->list) > 0){
				foreach($this->list as $observer){
					$observer->do();
					$this->remove($observer);
				}
			}
		}
		
		
	}
		
	class Baby{
		public function cry(){
			echo 'baby cry'.PHP_EOL;
		}
	}
	
	$baby = new Baby();
	$observeList = new ObserverList();
	$mom1  = new MomObserver();
	$mom1->setFlag(1);
	$mom2  = new MomObserver();
	$mom2->setFlag(2);
	
	$father1  = new FatherObserver();
	$father1->setFlag(1);
	$father2  = new FatherObserver();
	$father2->setFlag(2);
	$observeList->add($mom1);
	$observeList->add($mom2);
	$observeList->add($father2);
	$observeList->add($father1);
	
	//孩子哭了
	$baby->cry();
	//大人们做事了
	$observeList->itretor();
	
	
	
	
	
	
}

?>