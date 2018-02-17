<?php
abstract class Controller{
	protected $request;
	protected $action;
	protected $param;

	public function __construct($action, $request, $param){
		$this->action = $action;
		$this->request = $request;
		$this->param = $param;
	}

	public function executeAction(){
		return $this->{$this->action}();
	}

	protected function returnView($viewmodel, $fullview){
		$view = 'views/'. strtolower(get_class($this)). '/' . $this->action. '.php';		
		if($fullview){
			require('views/main.php');
		} else {
			require($view);
		}		
	}
	
}

?>