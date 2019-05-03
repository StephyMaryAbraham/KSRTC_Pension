<?php
include('includes/Class.Auth.php');
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
public function chat($content,$chat_date,$chat_type,$chat_senderid,$chat_receiverid,$table)
    {
        try {

        $statement = $this->db->prepare("INSERT INTO $table(`chat_type`,`chat_content`,`chat_date`,`chat_senderid`,`chat_receiverid`) values(:chat_type,:content,:chat_date,:chat_senderid,:chat_receiverid)");
          // $statement->nextRowset();
            $statement->bindparam(":content", $content);
            $statement->bindparam(":chat_date", $chat_date);
            $statement->bindparam(":chat_type", $chat_type);
            $statement->bindparam(":chat_senderid", $chat_senderid);
            $statement->bindparam(":chat_receiverid", $chat_receiverid);
             $statement->execute();
            
           if($statement->rowCount()){
            
                return "1";
               
                }
             else{
               
                return "0";
               
                }
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }  

    }
    
    public function add_amount($amount,$amount_date,$table)
    {
        try {

            $statement = $this->db->prepare("INSERT INTO $table(`sa_amount`,`sa_station_id`,`sa_date`)  VALUES(:amount, :station, :amount_date)");
           
            $statement->bindparam(":amount", $amount);
            $statement->bindparam(":amount_date", $amount_date);
            $statement->bindparam(":station", $station);
            
            $station=$_SESSION['station_id'];
           
            $statement->execute();
            
           if( $statement ){
            // $msg->add('s', 'Amount added successfully');
                return "1";
               
                }
             else{
                // $msg->add('w', 'Something went wrong');
                return "0";
               
                }
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function add_pention_details($pen_amount,$pen_date,$pen_id,$table1,$table2)
    {
        try {
            // $data="SELECT * from $table1 order by pension_number DESC limit 1";
            // echo $data;
            $state =  $this->db->prepare("SELECT * from $table1 order by pension_number DESC limit 1");
            $state->execute();
            $count=$state->rowCount();
        
            if($count>0)
            {
                $pensioner_number=$state->fetch(PDO::FETCH_ASSOC);
            $number=$pensioner_number['pension_number'];
            $pen_num=++$number;
        }
        else
        {
           $pen_num="PN1001";
            
        }

            $statement = $this->db->prepare("INSERT INTO $table1(`pensioner_id`,`pension_amount`,`pension_startdate`,`pension_number`)  VALUES(:pen_id,:pen_amount,:pen_date,:pen_num);Update $table2 set penr_status=1 where penr_id=:pen_id");
            $statement->bindparam(":pen_amount", $pen_amount);
            $statement->bindparam(":pen_date", $pen_date);
            $statement->bindparam(":pen_id", $pen_id);
            $statement->bindparam(":pen_num", $pen_num);
            
           
            $statement->execute();
            
           if( $statement ){
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