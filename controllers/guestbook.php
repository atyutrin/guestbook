<?php
class Guestbook extends Controller{
	protected function Index(){
		$viewmodel = new GuestbookModel();
		$this->ReturnView($viewmodel->Index($this->param), true);
	}
	protected function add(){
		if(!isset($_SESSION['is_logged_in'])){
			header('Location: '.ROOT_URL.'guestbook');
		}
		$viewmodel = new GuestbookModel();
		$this->ReturnView($viewmodel->add(), true);
	}	
	
}


?>