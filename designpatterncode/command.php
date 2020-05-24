<?php
	/***
	    命令可以实现增加和回滚
	**/
	interface  Command{
	
		public  function doit();
		public  function undo();
	}
		
		
	class InsertCommand implements Command{
		public $content;
		public function __construct( $content ){
			$this->content = $content;
		}
		public  function doit(){
			 $this->content->str = $this->content->str.' insert';
			 return true;
		}
		public function undo(){
			 $this->content->str = str_replace('insert','',$this->content->str);
			 return true;
		}
	}
	class DeleteCommand implements Command{
		public $content;
		public function __construct( $content ){
			$this->content= $content;
		}
			public  function doit(){
			 $this->content->str = $this->content->str.' delete';
			 return true;
		}
		public function undo(){
			 $this->content->str = str_replace('delete','',$this->content->str);
			 return true;
		}
	}
	class Content{
		public $str = ' wo shi 1';
	}
	
	$content = new Content();
	
	$insertcommand = new InsertCommand($content);
	$insertcommand->doit();
	echo $content->str;
	$insertcommand->undo();
	echo $content->str;

	
}

?>