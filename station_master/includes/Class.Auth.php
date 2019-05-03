<?php
include('Dbconnect.php');
class Auth
{
    /**
     * summary
     */
    
    public $connection;

    //public $jjjj="kjkjkjkjkjj";    
    public function __construct($connection)
    {
        
       $this->db = $connection;
        
        
    }
    
    
    public function get_details($email)
    {
        
        try {
            
            $statement = $this->db->prepare("SELECT * FROM users WHERE username=:mail");
            $statement->execute(array(
                ":mail" => $email
            ));
            $dataRows = $statement->fetch(PDO::FETCH_ASSOC);
            
            return $dataRows;
            
        }
        catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
    
    public function login($email,$pass,$table)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM $table WHERE sm_email=:email AND sm_password=:password");
            $stmt->execute(array(
                ':email' => $email,
                ':password' => $pass
            ));
           
            if ($stmt->rowCount()) {
                $userRow = $stmt->fetch(PDO::FETCH_ASSOC); 
                if($userRow['sm_status']==1)
                {
                    $_SESSION['sm_id'] = $userRow['sm_id'];
                    $_SESSION['station_id'] =$userRow['sm_station_id'];
                    $_SESSION['log_user'] = $table;
                    return "success";
                }
                else
                {
                    return "pending";
                }
               
            }
            else
            {
                return "failed";
            }
           
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

     public function sm_register($name,$email,$password,$station,$table)
    {
        try {

            $stmt = $this->db->prepare("SELECT * FROM $table WHERE sm_email=:email");
            $stmt->bindparam(":email", $email);
            $stmt->execute();

            if($stmt->rowCount())
            {
                return "exist";
            }
            else
            {


            $statement = $this->db->prepare("INSERT INTO $table(`sm_name`,`sm_email`,`sm_password`,`sm_station_id`)  VALUES(:uname, :umail, :upass,:station)");

            $statement->bindparam(":uname", $name);
            $statement->bindparam(":umail", $email);
            $statement->bindparam(":upass", $password);
            $statement->bindparam(":station", $station);
            
            $statement->execute();
            
           if($statement->rowCount()){
           
                return "success";
                }
             else{
                return "failed";
                }
        }
    }
        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    public function is_loggedin()
    {
        if (isset($_SESSION['log_id'])) {
            return true;
        }
    }
    
    public function redirect($url)
    {
        header("Location: $url");
        //echo '<script> location.replace("'.$url.'"); </script>';
    }
    
    public function logout()
    {
        session_destroy();
        unset($_SESSION['user_id']);
        return true;
    }
    
    
   public function delete($id, $table, $column) 
    { 
        $query = "DELETE FROM $table WHERE $column = $id";
        
        $result = $this->db->query($query);

                if($table=='bus'){
                   
                    $querybus = "DELETE FROM `bus_schedule` WHERE bus_no=$id";
        
        		$resultbus = $this->db->query($querybus);


                }
        if ($result == false) {
            echo 'Error: cannot delete id ' . $id . ' from table ' . $table;
            return false;
        } else {
            return true;
        }
    }

}


$auth = new Auth($connection);

// echo $user->hello();

?>