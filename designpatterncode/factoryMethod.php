<?php

/***
		工厂方法扩展单一产品很简单 但是扩展产品族很麻烦
	**/
	
	abstract class Factory{
			public abstract function createTransport();
	}
	
	 
	class BoatFactory extends Factory{
		
		public function createTransport(  ){
			//before processing 可以加一些前置处理 同理还可以加其他业务代码
			$transport = new BoatMovable();
			return $transport;
		}
		
	}
	
	class CarFactory extends Factory{
		
		public function createTransport(  ){
			//before processing 可以加一些前置处理 同理还可以加其他业务代码
			$transport = new CarMovable();
			return $transport;
		}
		
	}
	
	interface Movable{
		public function move();
	}
	
	class FlyMovable implements Movable{
		public function move(){
			echo 'so so ';
		}
	}
	
	class CarMovable implements Movable{
		public function move(){
			echo 'di di';
		}
	}
	class BoatMovable implements Movable{
		public function move(){
			echo 'wu wu ';
		}
	}
	

	$factory = new CarFactory();
	$factory->createTransport()->move();
	
	$factory = new BoatFactory();
	$factory->createTransport()->move();


?>