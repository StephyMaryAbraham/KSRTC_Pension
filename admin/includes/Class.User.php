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

    
    public function add_station($location,$address,$district,$table)
    {
        try {

            
             $statement1 = $this->db->prepare("SELECT * from $table where `station_place`=:location");
           
            $statement1->bindparam(":location", $location);
            $statement1->execute();
            if($statement1->rowCount())
            {
                 return "location";
            }
            
            

            $statement2 = $this->db->prepare("INSERT INTO $table(`station_place`,`station_address`,`station_district`)  VALUES(:location, :address,:district)");
           
            
            $statement2->bindparam(":location", $location);
            $statement2->bindparam(":address", $address);
            $statement2->bindparam(":district", $district);
           
            $statement2->execute();
            
           if( $statement2->rowCount() ){
            // $msg->add('s', 'Station added successfully');
                return "success";
               
                }
             else{
                // $msg->add('s', 'Something went wrong');
                return "failed";
               
                }
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function update_station($regno,$location,$address,$district,$station_id,$table)
    {
        try {

            $statement = $this->db->prepare("update `station` set station_reg=:regno, station_place=:location, station_address=:address, station_district=:district where station_id=:station_id");
           
            $statement->bindparam(":regno", $regno);
            $statement->bindparam(":location", $location);
            $statement->bindparam(":address", $address);
            $statement->bindparam(":district", $district);
            $statement->bindparam(":station_id", $station_id);
           
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

    public function complaint_reply($reply,$com_id,$table1,$table2)
    {
        try {

            $statement = $this->db->prepare("INSERT INTO $table1(`com_id`,`cr_content`)  VALUES(:com_id, :reply);Update $table2 set com_status=1 where com_id=:com_id;");
            // $statement = $this->db->prepare("Update $table2 set com_status=1 where com_id=:com_id");
            $statement->bindparam(":reply", $reply);
            $statement->bindparam(":com_id", $com_id);
            
           
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

    public function pensioner_approve($id,$table)
    {
        try {
$statement = $this->db->prepare("Update $table set pension_status=1 where pension_id='$id'");
        $statement->bindparam(":id", $id);
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

     public function sm_approve($id,$table)
    {
        try {
$statement = $this->db->prepare("Update $table set sm_status=1 where sm_id='$id'");
        $statement->bindparam(":id", $id);
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

    public function corporation_amount($id,$amount_date,$station_id,$table1,$table2)
    {
       try {

            $statement = $this->db->prepare("INSERT INTO $table2(`cor_amount`,`cor_date`,`cor_station_id`) values((select $table1.sa_amount from $table1 where $table1.sa_id=:id),:amount_date,:station_id); Update $table1 set $table1.sa_status=1 where $table1.sa_id=:id");
         
            $statement->bindparam(":id", $id);
            $statement->bindparam(":station_id", $station_id);
            $statement->bindparam(":amount_date", $amount_date);
           
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

    public function distribute_pension($pensioner_id,$pensioner_amount,$table)
    {
      try {

            $statement = $this->db->prepare("INSERT INTO $table(`mp_penr_id`,`mp_pension_amount`,`mp_send_date`) values(:pensioner_id,:pensioner_amount,:mp_send_date)");
          // $statement->nextRowset();
            $statement->bindparam(":pensioner_id", $pensioner_id);
            $statement->bindparam(":pensioner_amount", $pensioner_amount);
            $statement->bindparam(":mp_send_date", $mp_send_date);
           $mp_send_date=date('Y-m-d');
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

    public function demo()
    {
       try {

            $statement = $this->db->prepare("select sum(pension_amount) from pension_details as pension_sum;");
           
            $statement->bindparam(":regno", $regno);
            $statement->bindparam(":location", $location);
            $statement->bindparam(":address", $address);
            $statement->bindparam(":district", $district);
           
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