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
            $stmt = $this->db->prepare("SELECT * FROM $table WHERE penr_email=:email AND penr_password=:password LIMIT 1");
            $stmt->execute(array(
                ':email' => $email,
                ':password' => $pass
            ));
            $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($stmt->rowCount()) {
                
                    $_SESSION['pensioner_id'] = $userRow['penr_id'];
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

     public function p_register($name,$age,$year,$email,$password,$station,$salary,$table)
    {
        try {

            $stmt = $this->db->prepare("SELECT * FROM $table WHERE penr_email=:email");
            $stmt->bindparam(":email", $email);
            $stmt->execute();

            if ($stmt->rowCount()) {

              return "exist";
            }

            else
            {

            $statement = $this->db->prepare("INSERT INTO $table(`penr_name`,`penr_email`,`penr_age`,`penr_year`,`penr_password`,`penr_station_id`,`penr_salary`)  VALUES(:uname, :umail,:age,:year,:upass,:station,:salary)");

            $statement->bindparam(":uname", $name);
            $statement->bindparam(":umail", $email);
            $statement->bindparam(":upass", $password);
            $statement->bindparam(":age", $age);
            $statement->bindparam(":year", $year);
            $statement->bindparam(":station", $station);
            $statement->bindparam(":salary", $salary);
            
            $statement->execute();
            
           if($statement->rowCount()){

            $id = $this->db->lastInsertId();
            $_SESSION['pensioner_id'] = $id;
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

}


$auth = new Auth($connection);

// echo $user->hello();

?>