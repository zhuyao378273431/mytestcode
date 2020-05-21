<?php

	/***
	    观察者模式
	**/
	
	abstract class  Vistor {
		public $totalPrice = 0;
		public abstract function getCpuPrice( $component );
		public abstract function getMemoryPrice( $component );
	}
		
		
	class StudentVistor extends Vistor{
		public function getCpuPrice( $component){
			 $this->totalPrice += $component->getOrignalPrice()*0.6;
		}
		public function getMemoryPrice( $component){
			$this->totalPrice += $component->getOrignalPrice()*0.6;
		}

	}
		
	class EnterpriseVistor extends Vistor{
		
		public function getCpuPrice( $component ){
			$this->totalPrice += $component->getOrignalPrice()*0.8;
		}
		public function getMemoryPrice( $component){
			$this->totalPrice += $component->getOrignalPrice()*0.8;
		}

	}
	interface  Component{
		public  function accpet( $vistor );
		public  function getOrignalPrice();
	}
	class Cpu implements Component{
		
		public  function accpet( $vistor ){
			 $vistor->getCpuPrice($this);
		}
		public  function getOrignalPrice(){
			return 100;
		}
		
	}
	class Memory implements Component{
		public  function accpet( $vistor ){
			 $vistor->getMemoryPrice($this);
		}
		public  function getOrignalPrice(){
			return 1000;
		}
	}
	//在这里如果在加主板 一直加的话 不适合用观察者模式。观察者要求类结构几乎不变动
	//这里不能电脑返回总价 语义不对、电脑类是封闭的
	class Computer {
		protected $cpu;
		protected $memory;
		public function __construct(){
		    $this->cpu = new Cpu();
		    $this->memory = new Memory();
		}
		public function accpet( $vistor ){
			$this->cpu->accpet($vistor);
			$this->memory->accpet($vistor);
		}
	}
	
	$studentVistor = new StudentVistor();
	$computer  = new Computer();
	$computer->accpet($studentVistor);
	/*echo $studentVistor->totalPrice;*/
	$studentVistor = new EnterpriseVistor();
	$computer->accpet($studentVistor);
	echo $studentVistor->totalPrice;
	
	
}

?>