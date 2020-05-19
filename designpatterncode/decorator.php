<?php

	/***
			这里的装饰着和被装饰没有特使联系。不建议使用成员属性
	**/
	
	
		
	abstract class  Decrator {

		public abstract function decrate($flower);
		
	}
		
	class RedBoxDecrator extends Decrator{
		public function decrate($flower){
			echo 'redBox'.PHP_EOL;
			$flower->getFlower();
			return $flower;
		}
		
	}
	class BuleBoxDecrator extends Decrator{
		public function decrate($flower){
			echo 'buleBox'.PHP_EOL;
			$flower->getFlower();
			return $flower;
		}
		
	}
	
	

	class Flower{
		protected $size = 10;
		public function getFlower(){
			echo 'i am flower'.PHP_EOL;
		}
	}

	$flower = new Flower();
	$decrator = new RedBoxDecrator();
	$decrator->decrate($flower);
	
	
	$flower = new Flower();
	$decrator = new BuleBoxDecrator();
	$decrator->decrate($flower);
	
	//在之前基础上在装一个盒子
	$flower = new Flower();
	$decratorblue = new BuleBoxDecrator();
	$decratorblue->decrate($decrator->decrate($flower));
}

?>