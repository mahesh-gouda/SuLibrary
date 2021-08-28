<?php
session_start();
include_once 'dbhelper.php';
if(isset($_POST['acn'])){
if(isset($_SESSION['user_id'])){
   $userid = $_SESSION['user_id'];
    $isPending = (new dbhelper)->__isUserAprovalPending();
    if($isPending==1) {
     echo 1;
    }else{
        $cardnumber = (new dbhelper)->__getUserCardCount();
        if($cardnumber==0){
            echo 2;
        }else{
            $accession = $_POST['acn'];
            $bookid=$_POST['bookid'];
            $date=date('Y-m-d');
            $prevOrderId=(new dbhelper)->__getOrderId();
            $orderId=$prevOrderId+1;

            $returnDate= date('Y-m-d', strtotime($date. ' + 20 days'));
            $result = (new dbhelper)->__storeOrder($orderId,$userid,$date,$returnDate,$accession,$cardnumber,$bookid);
            if($result == 1){
                (new dbhelper)->__updateUserCard($userid,$cardnumber,1);
                $book_id= (new dbhelper)->__getBookId($accession);
                (new dbhelper)->__updateAccession($book_id,$accession,1);
                $_SESSION['orderId']=$orderId;
                $_SESSION['orderDate']=$date;
                $_SESSION['returnDate']=$returnDate;
               echo 4;
            }

        }


    }
}else echo '0';
}else echo '-1';


