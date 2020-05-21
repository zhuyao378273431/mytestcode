<?php

	/***
	    建造者模式
	**/
	
	class House{
		public $wall;
		public $floor;
		public $light;
	}
	//
	class Wall{
		public $size;
	}
	class Floor{
		public $size;
	}
	class Light{
		public $size;
	}
	
	abstract class  HouseBuilder {
		public $house = 0;
		public abstract function builderWall(  );
		public abstract function builderFloor(  );
		public abstract function builderLight(  );
	}
		
		
	class SimpleBuilder extends HouseBuilder{
		public $house ;
		public function __construct( $house ){
			$this->house = $house;
		}
		public  function builderWall(  ){
			 $this->house->wall = 10;
			 return $this;
		}
		public  function builderFloor( ){
			 $this->house->floor = 20;
			 return $this;
		}
		public  function builderLight( ){
		    
		}
		public function getHouse(){
			return $this;
		}
	}
	$house =  new House();
	$SimpleBuilder = new SimpleBuilder($house);
	$SimpleBuilder->builderWall()->builderFloor();
	var_dump($house)
	
}

?>