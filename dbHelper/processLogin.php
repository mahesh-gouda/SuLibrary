<?php
include_once 'dbhelper.php';
session_start();
if(isset($_POST['username'])){
    $username=$_POST['username'];
    $password=$_POST['password'];

    $dbh = new dbhelper();
    $result= $dbh->__fetchUser($username,$password);
    $total_row = $result->rowCount();
    if ($total_row > 0) {
        $rows = $result->fetchAll();
        foreach ($rows as $row) {
            $_SESSION["user_id"] = $row['user_id'];
            echo 1;
        }
    } else {
        echo "invalid Credential Provided";
    }

}