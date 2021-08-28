<?php
include_once 'dbhelper.php';

if(isset($_POST['id'])){
    $rows= (new dbhelper)->__getPendingOrderInfo($_POST['id']);
    echo $rows;


}

if(isset($_POST['orderid'])){
    $rows= (new dbhelper)->__saveOrderConfirmation($_POST['orderid'],$_POST['comment']);
    echo $rows;


}

if(isset($_POST['rejectId'])){
    $rows= (new dbhelper)->__rejectOrder($_POST['rejectId'],$_POST['remarks']);
    echo $rows;


}