<?php
include_once 'dbhelper.php';
if(isset($_POST['accession'])){
    $accession=$_POST['accession'];
    $orderId=$_POST['orderId'];
    $dbh = new dbhelper();
    $result= $dbh->__generateReturnRequest($accession,$orderId);
  echo $result;
}

if(isset($_POST['id'])){
    $oid=$_POST['id'];
    $dbh = new dbhelper();
    $result= $dbh->__confirmReturn($oid);
    echo $result;
}

if(isset($_POST['rid'])){
    $oid=$_POST['rid'];
    $dbh = new dbhelper();
    $result= $dbh->__rejectRetun($oid);
    echo $result;
}