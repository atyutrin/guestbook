<?php
class UserModel extends Model{
	public function register(){
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			
		$password = md5($post['password']);
		
		if($post['submit']){		
			if ($post['name']=='' || $post['email']=='' || $post['password']==''){
				Messages::setMsg('Пожалуйста заполните все поля', 'error');
				return;
			}		
		
			$this->query('INSERT INTO user (name, email, password) VALUES(:name, :email, :password)');
			$this->bind(':name',$post['name']);
			$this->bind(':email',$post['email']);
			$this->bind(':password',$password);			

			$this->execute();
			
			if($this->lastInsertId()){
				header('Location: '.ROOT_URL.'user/login');
			}
		}
		return;		
	}
	
	public function login(){
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);			
		$password = md5($post['password']);
		
		if($post['submit']){		
			$this->query('SELECT * FROM user Where email = :email AND password = :password');
			$this->bind(':email',$post['email']);
			$this->bind(':password',$password);		

			$row = $this->single();
			
			if($row){
				$_SESSION['is_logged_in'] = true;
				$_SESSION['user_data'] = ["id"=>$row['id'], "name"=>$row['name'], "email"=>$row['email']];
				header('Location: '.ROOT_URL.'guestbook');
			} else {
				Messages::setMsg('Неправльный email или пароль', 'error');
			}

			$this->execute();
			
			if($this->lastInsertId()){
				header('Location: '. ROOT_URL.'user/login');
			}
		}
		return;	
	}
	
	public function lk(){
		if(!isset($_SESSION['is_logged_in'])){
			header('Location: '.ROOT_URL);
		}		
		$this->query("SELECT text, create_date FROM guestbook WHERE user_id = :user_id ORDER BY create_date DESC");
		$this->bind(':user_id',$_SESSION['user_data']['id']);
		$rows = $this->resultSet();	
		return $rows;			
	}	
	
	public function passwd(){
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		
		if($post['submit']){		
			$this->query('SELECT email FROM user WHERE email = :email');
			$this->bind(':email',$post['email']);
			$row = $this->single();
			
			if($row){
				$chars="abcdefghijklmnopqrstuvwxvz1234567890ABCDEFGHIJKLMNOPQRSTUVWXVZ"; 
				$max=8; 
				$size=StrLen($chars)-1; 
				$password=null;
				while($max--){
					$password.=$chars[rand(0,$size)]; 		
				}		
				$hash = md5($password);
				$this->query('UPDATE `user`   
							  SET `password` = :password
							  WHERE `email` = :email');
				$this->bind(':password',$hash);
				$this->bind(':email',$row['email']);
				$this->execute();
								
				$text = "Ваш новый пароль: ".$password;
				Messages::setMsg('На ваш email отправлен новый пароль', 'success');
				Messages::email($row['email'], $text);				
			} else {
				Messages::setMsg('Неправльный email', 'error');
			}
		}
		return;			
				
	}

}

?>