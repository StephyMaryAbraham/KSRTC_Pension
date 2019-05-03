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
 
   
            if( $this->user->login($email,$password,'pensioner')) 
            {
                $this->msg->add('s', 'Login Successfull');
               $this->auth->redirect('index.php');
             

            }
        else{
                $this->msg->add('e', 'Login failed');
                 $this->auth->redirect('login.php');
            }
         }

         public function register()
         {
           $name= trim($_POST['name']);
   $age= trim($_POST['age']);
   $year= trim($_POST['year']);
   $station= trim($_POST['station']);
   $salary= trim($_POST['salary']);
   $email= trim($_POST['email']);
   $password = trim($_POST['password']);

   $status=$this->user->p_register($name,$age,$year,$email,$password,$station,$salary,'pensioner');
  
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
    

    public function complaint()
    {
     $title= trim($_POST['title']);
   $content= trim($_POST['content']);
   $id=$_SESSION['pensioner_id'];
   
   


        

         
            if($this->user->complaint($title,$content,$id,'complaint')) 
            {
            
                  $this->msg->add('s', 'Complaint send successfully');
                $this->auth->redirect('view_complaint.php');
        

            }
        else{
                $this->msg->add('e', 'Something went wrong');
                $this->auth->redirect('addstation.php');
            }
         
             if(isset($error))
            {
               foreach($error as $error)
               {
                  ?>
                  <center>
                  <div class="alert alert-danger">
                      <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
                  </div>
                  </center>
                  <?php
               }
           

    }
  }
}

include('class.messages.php');
$msg = new Messages();
$controller= new Controller($msg,$auth,$user,$connection);





 ?>

