<?php
	/**
	 静态代理绑定死被代理对象 当不知道被代理是谁？代理写不出来？参考JDK实现
	*/
   interface Runable{
     public  function run();
}
class Man implements  Runable{

	public function run(){
        echo 'runing'.PHP_EOL;
    }
}
class TimeProxy implements  Runable{
	protected $man;
	public function __construct( $runable ){
		$this->man = $runable;
	}
	public function run(){
		
        echo 'time start'.time().PHP_EOL;
		$this->man->run();
        echo 'time end'.time().PHP_EOL;
    }
}


$proxy = new TimeProxy(new Man());
$proxy->run();
?>