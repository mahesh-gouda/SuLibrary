<?php
include_once __DIR__.'/connect.php';
class dbhelper extends connect
{
    public function __createUser($fname,$lname,$course,$rollno,$email,$phone,$passwd,$role){
        $sql = "SELECT * FROM sulibrary.users where email='$email' or regno='$rollno'";
        $stmt = $this->__connect()->query($sql);
        if($stmt->rowCount())
        {
            return 0;
        }
        else{

            $sql="INSERT INTO sulibrary.users(`first_name`, `last_name`, `phone`, `email`, `course`, `regno`, `password`, `role`) VALUES (?,?,?,?,?,?,?,?);";
            $stmt=$this->__connect()->prepare($sql);
            $stmt->execute([$fname,$lname,$phone,$email,$course,$rollno,$passwd,$role]);

            $userId=dbhelper::__getUserID($email);
            $date=date('Y-m-d');
            $sql="INSERT INTO sulibrary.pending_aproval(`user_id`, `registration_date`) VALUES (?,?);";
            $stmt=$this->__connect()->prepare($sql);
            $stmt->execute([$userId,$date]);

            return 1;


        }
    }

    public function __getUserID($email){
        $sql = "SELECT * FROM sulibrary.users where email='$email'  ";
        $stmt = $this->__connect()->query($sql);
        $rows= $stmt->fetchAll();
        foreach ($rows as $row){
            return $row['user_id'];
        }
    }

    public function __fetchUser($username, $password)
    {
        $sql = "SELECT * FROM sulibrary.users where email='$username' and password ='$password' ";
        $stmt = $this->__connect()->query($sql);
        return $stmt;

    }

    public function __getUserRecords()
    {
        try {
            if(isset($_SESSION['user_id'])) {
                $userId = $_SESSION['user_id'];
                $sql = "SELECT * FROM sulibrary.users where user_id='$userId' ;";
                $stmt = $this->__connect()->query($sql);
                if ($stmt->rowCount()) {
                    $rows = $stmt->fetchAll();
                    return $rows;
                } else
                    return 0;
            } else return 0;
        }catch (PDOException $ex){
            return 0;
        }
    }

    public function __isUserAprovalPending()
    {
        try {
            if(isset($_SESSION['user_id'])) {
                $userId = $_SESSION['user_id'];
                $sql = "SELECT * FROM sulibrary.pending_aproval where user_id='$userId' ;";
                $stmt = $this->__connect()->query($sql);
                if ($stmt->rowCount()) {
                  return 1;
                } else
                    return 0;
            } else return -1;
        }catch (PDOException $ex){
            return -1;
        }

    }
}