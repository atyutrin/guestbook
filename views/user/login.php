<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Войти</h3>
  </div>
  <div class="panel-body">
		<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
			<div class="form-group">
				<label>Email</label>
				<input type="text" name="email" class="form-control"/>
			</div>				
			<div class="form-group">
				<label>Пароль</label>
				<input type="password" name="password" class="form-control"/>
			</div>							

			<input class="btn btn-primary" name="submit" type="submit" value="Войти"/>
			<a class="btn btn-danger" href="<?php echo ROOT_PATH; ?>guestbook">Отмена</a>
		</form>
  </div>
</div>