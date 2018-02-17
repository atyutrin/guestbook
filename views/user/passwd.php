<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Восстановить пароль</h3>
  </div>
  <div class="panel-body">
		<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
			<div class="form-group">
				<label>Ваш Email</label>
				<input type="text" name="email" class="form-control"/>
			</div>						
			<input class="btn btn-primary" name="submit" type="submit" value="Восстановить"/>
			<a class="btn btn-danger" href="<?php echo ROOT_PATH; ?>guestbook">Отмена</a>
		</form>
  </div>
</div>