<?php

	/***
			这里的装饰着和被装饰没有特使联系。不建议使用成员属性
	**/
	
	interface Flower{
		public function getFlower();
	}
	
	 abstract class  BoxDecrator implements Flower{
		protected $flower;
		public   function getFlower(){
		    
		}
		public   function SetFlower( $flower ){
				$this->flower = $flower;
		}
		
	}

		
	class RedBoxDecrator extends BoxDecrator{
		//这里可以传一些其他参数
		public function getFlower(){
			echo 'redBox'.PHP_EOL;
			$this->flower->getFlower();
			return true;
		}
		
	}
	class BuleBoxDecrator extends BoxDecrator{
		public function getFlower(){
			//before process.....
			echo 'buleBox'.PHP_EOL;
			$this->flower->getFlower();
			return true;
		}
		
	}
	
	

	class RoseFlower implements Flower{
		public function getFlower(){
			echo 'i am rose flower'.PHP_EOL;
		}
	}


	

	$flower = new RoseFlower();
	$decrator = new BuleBoxDecrator();
	$decrator->setFlower($flower);
	//$decrator->getFlower();
	
	//在之前基础上在装一个盒子
	$decratorRed = new RedBoxDecrator();
	$decratorRed->setFlower($decrator);
	$decratorRed->getFlower();
}

?>