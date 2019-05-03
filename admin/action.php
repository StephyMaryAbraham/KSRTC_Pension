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

  case "Add Station":
  $controller->add_station();
  break;

  case "Reply":
  $controller->complaint_reply();
  break;

  case "Update Station":
  $controller->update_station();
  break;

  case "Add Amount":
  $controller->add_amount();
  break;

  case "Add":
  $controller->corporation_amount();
  break;

  case "Distribute":
  $controller->distribute_pension();
  break;

  case "Logout":
  $controller->add_amount();
  break;

  case "Approve Pensioner":
  $controller->pensioner_approve();
  break;

   case "Approve":
  $controller->sm_approve();
  break;

  case "Send":
  $controller->chat();
  break;

  case "Update":
  $controller->changepassword();
  break;
}
}?>