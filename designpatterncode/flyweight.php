<?php
interface Thread{
     public  function wait();
}
class threadA implements  Thread{
    public $randId;
    public function __construct(){
	    $this->randId = rand(1,100);
	}
	
	public function wait(){
        echo 'waut thread done work'.PHP_EOL;
    }
}
class threadB implements  Thread{
	public function wait(){
        echo 'waut thread done work'.PHP_EOL;
    }
}
class ThreadPool{
	private $pool;
	public function getThread(){
		 return $this->pool[array_rand($this->pool)];
	}
	public function initThread(){
		for($i=0;$i<5;$i++){
			$this->pool[] = new threadA();
		}
		return true;
	}
}

$pool = new ThreadPool();
$pool->initThread();
$thread = $pool->getThread();
echo $thread->randId;
?>