<?php
class User extends Controller{
	protected function register(){
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->register(),true);
	}

	protected function login(){
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->login(), true);
	}
	
	protected function lk(){
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->lk(), true);		
	}
	
	protected function passwd(){
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->passwd(), true);
	}

	protected function logout(){
		unset($_SESSION['is_logged_in']);
		unset($_SESSION['user_data']);
		session_destroy();
		header('Location: '.ROOT_URL);
	}
	
}


?>