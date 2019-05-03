<?php 
include("includes/Class.User.php");
$auth->logout();
$auth->redirect('login.php');
 ?>