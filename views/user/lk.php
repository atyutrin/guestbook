<?php if(isset($_SESSION['is_logged_in'])):  ?>
	<h3>Мои сообщения:</h3>
	<?php foreach($viewmodel as $item) : ?>
		<div class="well">
			<small><?= $item['create_date']?></small>		
			<br/>
			<big><?= $item['text']?></big>
		</div>
	<?php endforeach ?>
<?php endif ?>	