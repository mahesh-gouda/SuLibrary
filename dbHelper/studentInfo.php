<?php
include_once 'dbhelper.php';

if(isset($_POST['id'])){
    $rows= (new dbhelper)->__getPendingAprovalUserInfo($_POST['id']);
    echo $rows;
}