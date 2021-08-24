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


    public function __getPendingAprovalUsers(){
        try{
            $sql = "SELECT * FROM sulibrary.pending_aproval inner join sulibrary.users on users.user_id= pending_aproval.user_id";
            $stmt = $this->__connect()->query($sql);
            if($stmt->rowCount() > 0){
                return $stmt->fetchAll();
            }else
                return 0;
        }catch (ErrorException $e){
           die($e);
        }
    }

    public function __getPendingAprovalUserInfo($id)
    {
        try{
            $sql = "SELECT * FROM sulibrary.users  inner join sulibrary.pending_aproval on users.user_id=  pending_aproval.user_id where users.user_id='$id'";
            $stmt = $this->__connect()->query($sql);
            if($stmt->rowCount() > 0){
                $rows= $stmt->fetchAll();

                $userId = array_map(function($a) { return $a["user_id"]; }, $rows);
                $firstname = array_map(function($a) { return $a["first_name"]; }, $rows);
                $lastname = array_map(function($a) { return $a["last_name"]; }, $rows);
                $course = array_map(function($a) { return $a["course"]; }, $rows);
                $regno = array_map(function($a) { return $a["regno"]; }, $rows);
                echo json_encode(array(
                    array('userid' => $userId,'firstname' => $firstname, 'lastname'=> $lastname,'course'=>$course,'regno'=>$regno)

                ));




            }else
                return 0;
        }catch (ErrorException $e){
            die($e);
        }
    }

    public function __storeCards($userid, $card)
    {
        try{
            $sql="INSERT INTO sulibrary.cards(`user_id`, `card_number`) VALUES(?,?);";
            $stmt=$this->__connect()->prepare($sql);
            $stmt->execute([$userid,$card]);

//            $userId=dbhelper::__getUserID($email);
//            $date=date('Y-m-d');
//            $sql="INSERT INTO sulibrary.pending_aproval(`user_id`, `registration_date`) VALUES (?,?);";
//            $stmt=$this->__connect()->prepare($sql);
//            $stmt->execute([$userId,$date]);

        }catch (ErrorException $e){
            die($e);
        }

    }

    public function __deleteFromPending($userid)
    {
    try {
        $sql = "DELETE FROM sulibrary.pending_aproval WHERE user_id='$userid'";
        $this->__connect()->query($sql);
    }catch (ErrorException $e){
        die($e);
    }
    }


}