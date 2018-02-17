<?php
class GuestbookModel extends Model{
	public function Index($page){
		if ($page==""){$page=1;}
		$from = $page * RECORD_PER_PAGE	- RECORD_PER_PAGE;		
		$this->query("SELECT guestbook.text, guestbook.create_date, user.name FROM guestbook JOIN user ON guestbook.user_id = user.id ORDER BY guestbook.create_date DESC LIMIT ".$from.", ".RECORD_PER_PAGE);
		$rows = $this->resultSet();
		
		$this->query("SELECT count(id) FROM guestbook");
		$count = $this->single();
		
		$rows['count']=$count["count(id)"];
		$rows['page']=$page;
		
		return $rows;
	}

	public function add(){
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		
		if($post['submit']){
			if ($post['text']==''){
				Messages::setMsg('Пожалуйста заполните поле', 'error');
				return;
			}				
			
			$this->query('INSERT INTO guestbook (text, user_id, create_date) VALUES(:text, :user_id, :create_date)');
			$this->bind(':text',$post['text']);
			$this->bind(':user_id',$_SESSION['user_data']['id']);
			$this->bind(':create_date', date("Y-m-d H:i:s", strtotime("+5 hour")));
			$this->execute();
			
			if($this->lastInsertId()){
				header('Location: '. ROOT_URL.'guestbook');
			}
		}
		return;
	}		
}

?>