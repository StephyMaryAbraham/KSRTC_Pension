<?php 
include('includes/controller.php');

if($_SERVER['REQUEST_METHOD']=='POST')
{
$action=$_POST['send'];

switch($action)
{
	case "Register Now":
	$controller->sm_register();
	break;

	case "Log In":
	$controller->sm_login();
	break;

	case "Add Data":
	$controller->manage_application();
	break;

	case "Add Amount":
	$controller->add_amount();
	break;

	case "Send":
  $controller->chat();
  break;
}
}

 ?>