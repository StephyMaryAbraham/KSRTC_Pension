<?php
include('Dbconnect.php');
// include('class.messages.php');
// $msg = new Messages();
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
            $stmt = $this->db->prepare("SELECT * FROM $table WHERE username=:email AND password=:password LIMIT 1");
            $stmt->execute(array(
                ':email' => $email,
                ':password' => $pass
            ));
            $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($stmt->rowCount()) {
                
                    $_SESSION['admin_id'] = $userRow['id'];
                    $_SESSION['log_user'] = $table;
                    return "1";
               
            }
            else
            {
                 return "0";
            }
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

     public function sm_register($name,$regno,$email,$password,$station,$table)
    {
        try {

            $statement = $this->db->prepare("INSERT INTO $table(`sm_name`,`sm_email`,`sm_password`,`sm_reg`,`sm_station`)  VALUES(:uname, :umail, :upass,:regno,:station)");

            $statement->bindparam(":uname", $name);
            $statement->bindparam(":umail", $email);
            $statement->bindparam(":upass", $password);
            $statement->bindparam(":regno", $regno);
            $statement->bindparam(":station", $station);
            
            $statement->execute();
            
           if( $statement ){
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
    
    public function is_loggedin()
    {
        if (isset($_SESSION['log_id'])) {
            return true;
        }
    }
    
    public function redirect($url)
    {
        //header("Location: $url");
        echo '<script> location.replace("'.$url.'"); </script>';
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

 public function updatepassword($old,$new,$table)
    {
        try {

            $statement = $this->db->prepare("update `admin` set password=:new where password=:old");
           
            $statement->bindparam(":old", $old);
            $statement->bindparam(":new", $new);
            
           
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
}


$auth = new Auth($connection);

// echo $user->hello();

?>