<?php
include_once 'dbhelper.php';
if (session_status() !== PHP_SESSION_ACTIVE || session_id() === ""){
    session_start();
}
if(isset($_POST['username'])){
    $username=$_POST['username'];
    $password=$_POST['password'];

    $dbh = new dbhelper();
    $result= $dbh->__fetchUser($username,$password);
    $total_row = $result->rowCount();
    if ($total_row > 0) {
        $rows = $result->fetchAll();
        foreach ($rows as $row) {
            if($row['role']==="professor"){
                $_SESSION['p_id']= $row['user_id'];
                $_SESSION["user_id"] = $row['user_id'];
                echo 1;
            }
            else {
                $_SESSION["user_id"] = $row['user_id'];
                echo 1;
            }
        }
    } else {
        echo "invalid Credential Provided";
    }

}