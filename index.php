<?php
session_start();

require('config.php');

require('classes/Messages.php');
require('classes/Router.php');
require('classes/Controller.php');
require('classes/Model.php');

require('controllers/guestbook.php');
require('controllers/user.php');

require('models/guestbook.php');
require('models/user.php');

$router = new Router($_GET);
$controller = $router->createController();
if($controller){
	$controller->executeAction();
}
?>