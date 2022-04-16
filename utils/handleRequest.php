<?php

// include_once handleHttpError donde se va a manejar los errores en los callbacks
include_once('handleHttpError.php');

class Requests{
	$this->next = '';
	$this->nextIndex = 0;
	$this->callbacks = array();
	
	public function delete($route, ...$callbacks){
		if ($_SERVER['REQUEST_METHOD'] === 'DELETE' and $route === $_SERVER['PATH_INFO']){
			this->doAction();
		}
	}

	public function get($route, ...$callbacks){
		if ($_SERVER['REQUEST_METHOD'] === 'GET'){
			echo $route;
			echo $_SERVER['PATH_INFO'];
			this->doAction($callbacks);
		}
	}

	public function put($route, ...$callbacks){
		if ($_SERVER['REQUEST_METHOD'] === 'PUT' and $route === $_SERVER['PATH_INFO']){
			this->doAction();
		}
	}

	public function post($route, ...$callbacks){
		if ($_SERVER['REQUEST_METHOD'] === 'POST' and $route === $_SERVER['PATH_INFO']){
			this->doAction();
		}
	}

	function doAction($callbacks){
		try{
			$this->callbacks = $callbacks;
			$this->next = $this->callbacks[0];
			$this->next();
		}catch($error){
			handleHttpError($error);
		}
	}

	function next(){
		if ($this->next === '')
			return;
		$execute = $this->next;
		$this->nextIndex++;
		if ($this->nextIndex < sizeof($this->callbacks)){
			$this->next = $this->callbacks[$this->nextIndex];
		}else{
			$this->next = '';
		}
		call_user_func($execute, $this);
	}

}
?>
