<?php 
include('includes/controller.php');
if($_SERVER['REQUEST_METHOD']=='POST')
{
$action=$_POST['send'];

switch($action)
{
	case "Log In":
  $controller->login();
  break;

  case "Register Now":
    $controller->register();
    break;


	case "Send":
	$controller->complaint();
	break;

	
 
}
}

 ?>