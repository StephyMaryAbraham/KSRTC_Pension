<?php 
include("includes/Class.User.php");

/**
 * Stephys controller
 */

class Controller
{
   public $msg;
   public $auth;
   public $user;
   public $connection;
   public function __construct($msg,$auth,$user,$connection)
    {
        $this->auth=$auth;
        $this->msg=$msg;
        $this->user=$user;
        $this->db=$connection;
    }

     public function login()
    {
       $email = trim($_POST['email']);
   $password = trim($_POST['password']); 

       
            if($this->auth->login($email,$password,'admin')) 
            {
              $this->msg->add('s', 'Login Successfull');
                 $this->auth->redirect('index.php');
              
              }
              else {
                $this->msg->add('e', 'Login Failed');
                 $this->auth->redirect('login.php');

            }
            
    }

    public function add_station()
    {
       
   $location= trim($_POST['location']);
   $address = trim($_POST['address']);
   $district = trim($_POST['district']); 
   


        

         

             $status=$this->user->add_station($location,$address,$district,'station');
            if($status=='location') 
            {
            
                 $this->msg->add('e', 'Location already exist');
                $this->auth->redirect('addstation.php');
    
            }
            else if($status=='success')
            {
              $this->msg->add('s', 'Station added successfully');
                $this->auth->redirect('viewstation.php');

            }
        else{
              $this->msg->add('e', 'Something went wrong');
                $this->auth->redirect('addstation.php');
            }
         
        
      }
 
public function update_station()
{
$regno= trim($_POST['regno']);
   $location= trim($_POST['location']);
   $address = trim($_POST['address']);
   $district = trim($_POST['district']); 
   $station_id = trim($_POST['station_id']); 
   


        

         
            if($this->user->update_station($regno,$location,$address,$district,$station_id,'station')) 
            {
            
                 $this->msg->add('s', 'Station updated successfully');
                $this->auth->redirect('viewstation.php');
        

            }
        else{
               $this->msg->add('e', 'Something went wrong');
                $this->auth->redirect('edit_station.php');
            }
}
  
public function complaint_reply()
{
   $reply= trim($_POST['reply']);
   $com_id= trim($_POST['com_id']);
   
   


        

         
            if($this->user->complaint_reply($reply,$com_id,'complaint_reply','complaint')) 
            {
            
                 $this->msg->add('s', 'Reply send successfully');
                $this->auth->redirect('complaint.php');
        

            }
        else{
              $this->msg->add('e', 'Something went wrong');
                $this->auth->redirect('manage_complaint.php');
            }
         
             
}
       public function corporation_amount()
       {
$id= trim($_POST['id']);
$station_id= trim($_POST['station_id']);
     
$amount_date= date("Y-m-d");

        

         
            if($this->user->corporation_amount($id,$amount_date,$station_id,'station_amount','corporation')) 
            {
            
                 $this->msg->add('s','Amount added successfully');
                $this->auth->redirect('view_addamount.php');
        

            }
        else{
               $this->msg->add('e', 'Something went wrong');
              $this->auth->redirect('station_amount.php');
            }

       }       
public function distribute_pension()
{
$pensioner_id=trim($_POST['id']);
$pensioner_amount=trim($_POST['pen_amount']);

 if($this->user->distribute_pension($pensioner_id,$pensioner_amount,'monthly_pension')) 
            {
            
                  $this->msg->add('s','Pension distributed successfully');
                $this->auth->redirect('monthly_pension.php');
        

            }
        else{
               $this->msg->add('e', 'Something went wrong');
               $this->auth->redirect('monthly_pension.php');
            }

}
    public function pensioner_approve(){
    	 	$id=trim($_POST['id']);
        if($this->user->pensioner_approve($id,'pension_details'))
        {
    

             $this->msg->add('s', 'Application send successfully');
              $this->auth->redirect('pending_app.php');       
          }
        else{
               $this->msg->add('s', 'Something went wrong');
               $this->auth->redirect('pending_app.php');
            }         
            
    }

     public function sm_approve(){
        $id=trim($_POST['id']);
        if($this->user->sm_approve($id,'station_master'))
        {
    

             $this->msg->add('s', 'Approved Successfully');
              $this->auth->redirect('stationmaster_approved.php');       
          }
        else{
               $this->msg->add('s', 'Something went wrong');
               $this->auth->redirect('stationmaster_pending.php');
            }         
            
    }

    public function chat()
    {
      
      $chat_date=date("Y-m-d");
      $content=trim($_POST['chat']);
      $chat_type='admin';
      $chat_senderid=$_SESSION['admin_id'];
      $chat_receiverid=trim($_POST['masterid']);
      if($this->user->chat($content,$chat_date,$chat_type,$chat_senderid,$chat_receiverid,'chat'))
      {

          $this->auth->redirect('chat_area.php');  
      }
      else
      {
          $this->auth->redirect('chat.php');
      }
    }

    public function login_controller()
    {
    	 $email = trim($_POST['email']);
   $password = trim($_POST['password']); 

   
            if( $this->auth->login($email,$password,'station_master')) 
            {
               return true;
            }
        else{
               return false;
            }
         
            
    }

    public function add_amount()
    {
    	$station_id=$_SESSION['station_id'];
    	$sql=$this->db->prepare("select * from station_amount where sa_station_id=$station_id");

 $sql->execute();
 $count=$sql->rowCount();
 if($count>0)
 {
  
  $row=$sql->fetch((PDO::FETCH_ASSOC));
  $date=$row['sa_date'];
  $station_id=$row['sa_station_id'];


  $year=date('Y', strtotime($date));
  $month=date('m', strtotime($date));

   $amount= trim($_POST['amount']);
$amount_date= date("Y-m-d");


$amount_year=date('Y', strtotime($amount_date));
  $amount_month=date('m', strtotime($amount_date));
  $am_month=date('F', strtotime($amount_date));
 
if($month==$amount_month && $year==$amount_year)
{

  $_SESSION['month']="added";
  $this->auth->redirect('view_amount.php');
  

}


 }


else{
   
   $amount= trim($_POST['amount']);
$amount_date= date("Y-m-d");
 
         
            if($this->user->add_amount($amount,$amount_date,'station_amount')) 
            {
            
                 $_SESSION['session_status']="added";
              //$auth->redirect('add_amount.php');
        

            }
        else{
               $_SESSION['session_status']="notadded";
            //  $auth->redirect('add_amount.php');
            }
            
          }
         
            
    }

   public function changepassword()
{
   $old= trim($_POST['old']);
   $new= trim($_POST['new']);
   
   


        

         
            if($this->user->updatepassword($old,$new,'admin')) 
            {
            
                 $this->msg->add('s', 'Password updated successfully');
                $this->auth->redirect('changepassword.php');
        

            }
        else{
               $this->msg->add('e', 'Old password is incorrect');
                $this->auth->redirect('changepassword.php');
            }
} 
}
include('class.messages.php');
$msg = new Messages();
$controller= new Controller($msg,$auth,$user,$connection);





 ?>

