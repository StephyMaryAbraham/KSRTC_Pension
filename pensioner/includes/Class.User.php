<?php
include('Class.Auth.php');

class User extends Auth
{
    
    public function __construct($connection)
    {
         $this->db = $connection;
        // parent::__construct( $connection );
    }

     public function check_user($email,$table)
    {

        try {

            $statement = $this->db->prepare("SELECT * FROM $table WHERE sm_email=:mail");
            $statement->execute(array(
                ":mail" => $email
            ));
            $dataRows = $statement->fetch(PDO::FETCH_ASSOC);
               $countt=$statement->rowCount();
               if($countt>0){
            return $dataRows;

            }
            else
            {
                return 'error';
            }

        }
        catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    
    public function complaint($title,$content,$id,$table)
    {
        try {

            $statement = $this->db->prepare("INSERT INTO $table(`com_title`,`com_content`,`pensioner_id`)  VALUES(:title, :content, :pensioner_id)");
           
            $statement->bindparam(":title", $title);
            $statement->bindparam(":content", $content);
            $statement->bindparam(":pensioner_id", $id);
            
            $statement->execute();
            
           if($statement->rowCount()){
            // $msg->add('s', 'Station added successfully');
                return "1";
               
                }
             else{
                // $msg->add('s', 'Something went wrong');
                return "0";
               
                }
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function complaint_reply($reply,$com_id,$table1,$table2)
    {
        try {

            $statement = $this->db->prepare("INSERT INTO $table1(`com_id`,`cr_content`)  VALUES(:com_id, :reply);Update $table2 set com_status=1 where com_id=:com_id;");
            // $statement = $this->db->prepare("Update $table2 set com_status=1 where com_id=:com_id");
            $statement->bindparam(":reply", $reply);
            $statement->bindparam(":com_id", $com_id);
            
           
            $statement->execute();
            
           if($statement->rowCount()){
            // $msg->add('s', 'Station added successfully');
                return "1";
               
                }
             else{
                // $msg->add('s', 'Something went wrong');
                return "0";
               
                }
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    



}



$user=new User($connection);


 ?>