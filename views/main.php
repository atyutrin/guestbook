<html>
<head>
	<meta charset="utf-8">
	<title>Гостевая книга</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
   <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-default">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo ROOT_URL; ?>">Гостевая книга</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
			<?php if (isset($_SESSION['is_logged_in'])) :?>
				<li><a href="<?= ROOT_URL; ?>user/lk">Личный кабинет (<?= $_SESSION['user_data']['name']; ?>)</a></li>
				<li><a href="<?= ROOT_URL; ?>user/logout">Выйти</a></li>
			<?php else: ?>
				<li><a href="<?= ROOT_URL; ?>user/login">Войти</a></li>
				<li><a href="<?= ROOT_URL; ?>user/passwd">Востановить пароль</a></li>
				<li><a href="<?= ROOT_URL; ?>user/register">Зарегистрироваться</a></li>			
			<?php endif; ?>	
          </ul>		  		  
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">	  
		<div class="row">
			<?php Messages::display(); ?>
			<?php require($view); ?>
		</div>
    </div><!-- /.container -->
</body>
</html>

