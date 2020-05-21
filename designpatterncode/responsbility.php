<?php

	/***
	    责任链模式用于拦截器 123 321的顺序
	**/
	
	class Resquest{
		public $str;
	}
	class Response{
		public $str;
	}
	interface Filter {
		public  function doFilter( $request, $response ,$chian );
	}
		
		
	class ScriptFilter implements Filter{
		public function doFilter( $request, $response ,$chian ){
			echo 'in....ScriptFilter....'.PHP_EOL;
			$request->str = str_replace('<',' ',$request->str);
			$chian->doFilter($request, $response ,$chian);
			echo 'in....ScriptFilter....'.PHP_EOL;
			$response->str = str_replace('<',' ',$response->str);
			return true;
			
		}
	}
	
	class HtmlFilter implements Filter{
		public function doFilter( $request, $response ,$chian ){
			echo 'in....HtmlFilter....'.PHP_EOL;
			$request->str = str_replace('html',' ',$request->str);
			$chian->doFilter($request, $response ,$chian);
			echo 'in....HtmlFilter....'.PHP_EOL;
			$response->str = str_replace('html',' ',$response->str);
			return true;
		}
	}	
	
	class FilterChian implements Filter{
		protected $chainList = array();
		protected $index;
		public function doFilter( $request, $response ,$chian ){
			if($chian->index>=count($chian->chainList)){
				return true;
			}
			$chian->index++;
			$chian->chainList[$chian->index-1]->doFilter($request, $response ,$chian);
		}
		public function add( $filter ){
			$this->chainList[] = $filter;
		}
	}
	
	$filterChian = new FilterChian();
	$scriptFilter = new ScriptFilter();
	$htmlFilter = new HtmlFilter();
	$filterChian->add($scriptFilter);
	$filterChian->add($htmlFilter);
	$resquest = new Resquest();
	$response = new Response();
	$resquest->str = ' < request student html';
	$response->str = ' < response student html';
	$filterChian->doFilter($resquest,$response,$filterChian);
	echo $resquest->str;	
	echo $response->str;

}

?>