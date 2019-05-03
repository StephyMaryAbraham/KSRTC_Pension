<?php 

include('includes/Class.User.php');
include('includes/class.messages.php');
$msg = new Messages();

if(isset($_REQUEST['id']))
{
$id=$_REQUEST['id'];
if($auth->delete($id,'station','station_id'))
{
$auth->delete($id,'pensioner','penr_station_id');	
$auth->delete($id,'station_master','sm_station_id');	
$auth->delete($id,'corporation','cor_station_id');	
$auth->delete($id,'station_amount','sa_station_id');	
$msg->add('s', 'Station deleted successfully');
$auth->redirect('viewstation.php');
}

else
{
$msg->add('e', 'Something went wrong');
$auth->redirect('viewstation.php');
}
}
 ?>