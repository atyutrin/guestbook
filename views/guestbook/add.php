<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Добавить запись</h3>
  </div>
  <div class="panel-body">
		<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
			<div class="form-group">
				<label>Сообщение</label>
				<textarea name="text" class="form-control"></textarea>
			</div>	
			<input class="btn btn-primary" name="submit" type="submit" value="Отправить"/>
			<a class="btn btn-danger" href="<?php echo ROOT_PATH; ?>guestbook">Отмена</a>
		</form>
  </div>
</div>