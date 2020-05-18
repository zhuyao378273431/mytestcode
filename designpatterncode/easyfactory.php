<?php

	/***
		简单工厂的扩展性不好
	**/
	class EasyFactory{
		
		
		public function makeTransport( $type ){
			
			//before processing 可以加一些前置处理 同理还可以加其他业务代码
			if($type == 'FlyMovable'){
				$transport = new FlyMovable();
			}else if($type == 'CarMovable'){
				$transport = new CarMovable();
			}else if($type == 'BoatMovable'){
				$transport = new BoatMovable();
			}
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
	

	$factory = new EasyFactory();
    $movable = $factory->makeTransport('FlyMovable');
	$movable->move();
	$movable = $factory->makeTransport('CarMovable');
	$movable->move();


?>