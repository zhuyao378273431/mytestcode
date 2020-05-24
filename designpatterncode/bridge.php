<?php

	/***
	    名词抽象化 形容词抽象 如果继承M*N 的关系
	**/
	//名词
	abstract class  GiftImp{
		public $name;
		public abstract function getName();
	}
		
		
	class Car extends GiftImp{
		public  $name = 'i can move';
		public  function getName(){
			return $this->name;
		}
	}
	class Flower extends GiftImp{
		public $name = 'i can send to GF';
		public  function getName(){
			return $this->name;
		}
	}
	//形容词
	abstract class Gift{
		protected  $giftImp;
		public function __construct( $giftImp ){
			$this->giftImp = $giftImp;
		}
		public abstract function getGift();
	}
	class Cold extends Gift{
		
		public  function getGift(){
				
			return 'Cold::'.$this->giftImp->getName();
		}
	}
	class Warm extends Gift{
		public $name = 'i can send to GF';
		public  function getGift(){
			
			return 'Warm::'.$this->giftImp->getName();
		}
	}
	
	$car = new Car();

	$cold = New Cold($car);
	echo $cold->getGift();
	$warm = new Warm($car );
	echo $warm->getGift();
}

?>