<?php

/***
		封装家庭内部复杂的操作。比如；先开灯 在洗衣服 在机器人扫地
	**/
	

	
	class Facade {
		protected $floor;
		protected $clothes;
		protected $light;
		
		public function __construct($floor,$clothes,$light){
			$this->floor 	= $floor;
			$this->clothes  = $clothes;
			$this->light    = $light;
		}
		
		public function startHomeWork(){
			$this->floor->work();
			$this->clothes->work();
			$this->light->work();
		}
		
	}
	
	interface HomeWork{
		public function work();
	}
	
	class Floor implements HomeWork{
		public function work(){
			echo 'robot wash floor..';
		}
	}
	
	class Clothes implements HomeWork{
		public function work(){
			echo 'wash clothes...';
		}
	}
	class Light implements HomeWork{
		public function work(){
			echo 'open ligh... ';
		}
	}
	
	$facade = new Facade(new Floor(),new Clothes(),new Light());
	$facade->startHomeWork();

}
	
	

	$facade = new Facade(new Floor(),new Clothes(),new Light());
	$facade->startHomeWork();


?>