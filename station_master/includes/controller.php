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

    public function sm_register()
    {
      $name= trim($_POST['name']);
   $station= trim($_POST['station']);
   $email= trim($_POST['email']);
   $password = trim($_POST['password']);

   $status=$this->user->sm_register($name,$email,$password,$station,'station_master');
  
            if($status=="exist")
            {
               $this->msg->add('e', 'Email already exist');
                 $this->auth->redirect('login.php');
            } 
            else if($status=="success")
            {
                $this->msg->add('s', 'Registration successfull');
                $this->auth->redirect('index.php');

        

            }
        else{
               $this->msg->add('e', 'Something went wrong');
                 $this->auth->redirect('login.php');
               
            }
    }

    public function sm_login()
    {
       $email = trim($_POST['email']);
   $password = trim($_POST['password']); 

        $status=$this->auth->login($email,$password,'station_master');
            if($status=='pending') 
            {
              $this->msg->add('e', 'You registration is pending to be approved by admin');
                 $this->auth->redirect('login.php');
              
              }
              else if($status=='success')
              {
                 $this->msg->add('s', 'Login successfull');
                 $this->auth->redirect('index.php');
              }
         else if($status=="failed"){
          $this->msg->add('e', 'Login Failed');
                 $this->auth->redirect('login.php');

            }
            
    }


    public function manage_application(){
    	 	$pen_amount= trim($_POST['pen_amount']);
   			$pen_date= trim($_POST['pen_date']);
  			$pen_id=trim($_POST['pen_id']);
    if($this->user->add_pention_details($pen_amount,$pen_date,$pen_id,'pension_details','pensioner')) 
            {          
             $this->msg->add('s', 'Data send successfully');
              $this->auth->redirect('pending.php');       
          }
        else{
               $this->msg->add('e', 'Something went wrong');
               $this->auth->redirect('manage_application.php');
            }         
            
    }

    public function chat()
    {
      
      $chat_date=date("Y-m-d");
      $content=trim($_POST['chat']);
      $chat_type='master';
      $chat_senderid=$_SESSION['sm_id'];
      $chat_receiverid=1;
      if($this->user->chat($content,$chat_date,$chat_type,$chat_senderid,$chat_receiverid,'chat'))
      {

          $this->auth->redirect('chat_area.php');  
      }
      else
      {
          $this->auth->redirect('chat.php');
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
  $this->msg->add('e', 'Amount for this month is already entered');
  $this->auth->redirect('view_amount.php');
  

}


 }


else{
   
   $amount= trim($_POST['amount']);
$amount_date= date("Y-m-d");
 
         
            if($this->user->add_amount($amount,$amount_date,'station_amount')) 
            {
            
                
                 $this->msg->add('s', 'Amount added successfully');

              $this->auth->redirect('view_amount.php');
        

            }
        else{
               
               $this->msg->add('s', 'not addedddd');

             $this->auth->redirect('add_amount.php');
            }
            
          }
         

    }
}
include('class.messages.php');
$msg = new Messages();
$controller= new Controller($msg,$auth,$user,$connection);





 ?>

