<?php

/***
		抽象工厂产生一个产品族
	**/
	
	abstract class Factory{
			public abstract function createTransport();
			public abstract function createEgine();
	}
	
	 
	class BoatFactory extends Factory{
		
		public function createTransport(  ){
			//before processing 可以加一些前置处理 同理还可以加其他业务代码
			$transport = new BoatMovable();
			return $transport;
		}
		public function createEgine(  ){
			//before processing 可以加一些前置处理 同理还可以加其他业务代码
			$egine = new BoatEgine();
			return $egine;
		}
		
	}
	
	class CarFactory extends Factory{
		
		public function createTransport(  ){
			//before processing 可以加一些前置处理 同理还可以加其他业务代码
			$transport = new CarMovable();
			return $transport;
		}
		public function createEgine(  ){
			//before processing 可以加一些前置处理 同理还可以加其他业务代码
			$egine = new BoatEgine();
			return $egine;
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
	
	interface Egine{
		public function type();
	}
	
	class CarEgine implements Egine{
		public function type(){
			echo 'made in qi rui';
		}
	}
	class BoatEgine implements Egine{
		public function type(){
			echo 'ade in qi bba ';
		}
	}
	
	

	$factory = new CarFactory();
	$factory->createTransport()->move();
	$factory->createEgine()->type();
	
	$factory = new BoatFactory();
	$factory->createTransport()->move();
	$factory->createEgine()->type();


?>