<?php include_once 'header.php';
include_once 'dbHelper/dbhelper.php';

?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<style>
    body{
        background: -webkit-linear-gradient(left, #3931af, #00c6ff);
    }
    .heading-text{
        font-size: 20px;
        background: -webkit-linear-gradient(#1d1b1b, #d7975d);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 8px;
    }
    .emp-profile{
        padding: 3%;
       margin-left: 3%;
        margin-right: 3%;
         border-radius: 0.5rem;
        background: #fff;
    }
    .profilepic {
        position: relative;
        width: 150px;
        height: 150px;
        border-radius: 50%;
        overflow: hidden;
        background-color: #111;
        margin: 0 auto;
    }

    .profilepic:hover .profilepic__content {
        opacity: 1;
    }

    .profilepic:hover .profilepic__image {
        opacity: .5;
    }

    .profilepic__image {
        object-fit: cover;
        opacity: 1;
        transition: opacity .2s ease-in-out;
    }

    .profilepic__content {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        color: white;
        opacity: 0;
        transition: opacity .2s ease-in-out;
    }

    .profilepic__icon {
        color: white;
        padding-bottom: 8px;
    }

    .fas {
        font-size: 20px;
    }

    .profilepic__text {
        text-transform: uppercase;
        font-size: 12px;
        width: 50%;
        text-align: center;
    }
    .profile-img .file {
        position: relative;
        overflow: hidden;
        margin-top: -20%;
        width: 70%;
        border: none;
        border-radius: 0;
        font-size: 15px;
        background: #212529b8;
    }
    .profile-img .file input {
        position: absolute;
        opacity: 0;
        right: 0;
        top: 0;
    }
    .profile-head h5{
        color: #333;
    }
    .profile-head h6{
        color: #0062cc;
    }

    .proile-status{
        font-size: 16px;
        color: #2c2d2c;
        margin-top: 5%;
        margin-bottom: 2%;
    }

    .profile-head .nav-tabs{

    }
    .profile-head .nav-tabs .nav-link{
        font-weight:600;
        border: none;
    }
    .profile-head .nav-tabs .nav-link.active{
        border: none;
        border-bottom:2px solid #0062cc;
    }
    .profile-work{
        padding: 14%;
        margin-top: -15%;
    }
    .profile-work #work-head{
        font-size: 18px;
        font-weight: 600;
        margin-top: 10%;
    }
    .profile-work p{
        text-decoration: none;
        color: #495057;
        font-weight: 600;
        font-size: 14px;
    }
    .profile-work ul{
        list-style: none;
    }
    .profile-tab label{
        font-weight: 600;
    }
    .profile-tab p{
        font-weight: 600;
        color: #0062cc;
    }
    #info{
        color: #818182;
        margin-top: 0%;
        margin-bottom: 0%;
    }
    .card-title{
       background: -webkit-linear-gradient(#1f6db8, #435552);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;

    }
    .card-header{
        background: -webkit-linear-gradient(rgba(179, 211, 248, 0.25), rgba(219, 239, 192, 0.27));
    }
    .btnStyle{
        background: -webkit-linear-gradient(rgba(104, 147, 199, 0.59), rgba(176, 227, 107, 0.37));
    }


</style>
<!-- Start: Page Banner -->
<section class="page-banner services-banner">
    <div class="container">
        <div class="banner-header">
            <h2>Profile</h2>
            <span class="underline center"></span>
            <p class="lead">All You need is at one place.</p>
        </div>
        <div class="breadcrumb">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li>Checkout</li>
            </ul>
        </div>
    </div>
</section>
<!-- End: Page Banner -->
<div class="page">


    <div class=" emp-profile" style="margin-bottom: 3%; margin-top: 3%">
        <form method="post">
            <div class="row"  >
                <div class="col-md-4">
                    <div class="profilepic">
                        <img class="profilepic__image selectProfileImg " src="images/profileDefault.jpg" width="200" height="200" alt="Profibild" />
                        <div class="profilepic__content">
                            <span class="profilepic__icon selectProfileImg" ><i class="fas fa fa-camera"></i></span>
                            <span class="profilepic__text selectProfileImg">Edit Profile</span>
                            <input id="imageUpload" type="file"
                                   name="profile_photo" placeholder="Photo" required="" style="display: none">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">

                        <?php
                        $daysLeftToExpiry="";
                        $userId = $_SESSION['user_id'];
                        $userDetails=(new dbhelper)->__getUserRecords();
                        if($userDetails != 0){

                        foreach ($userDetails as $user){

                            function dateDiff($cin, $cout){
                                $date1_ts = strtotime($cin);
                                $date2_ts = strtotime($cout);
                                $diff = $date2_ts - $date1_ts;
                                return abs(round($diff / 86400));
                            }
                            $expdate=$user['exipry_date'];
                            $date=date('Y-m-d');
                            $daysLeftToExpiry = dateDiff($date,$expdate);

                        ?>
                        <h4>
                            <?php echo $user['first_name']; echo "&nbsp;"; echo $user['last_name']; ?>  &nbsp;&nbsp;&nbsp;&nbsp; <span style="font-size: 15px; color: blue ">(<?php echo $user['user_id'] ?>)</span>
                        </h4>
                        <h5 style="margin-top: 2%;">
                            <?php echo $user['course']; ?>
                        </h5>
                        <?php
                        }
                        }

                        $isPending = (new dbhelper)->__isUserAprovalPending();
                        $verificationStaus="";
                        $color="";
                        $icon="";
                        if($isPending==1){
                            $verificationStaus="Verification pending by librarian!!";
                            $color ="blue";
                            $icon="fa-warning";
                        }else{
                            $verificationStaus="Aproved By Librarian";
                            $color ="green";
                            $icon="fa-check-circle-o";
                        }
                        if($daysLeftToExpiry <= 0){
                            (new dbhelper)->__expireAccount($userId);
                            $verificationStaus="Account Expired";
                            $color ="red";
                            $icon="fa-warning";
                        }


                        ?>

                        <p class="proile-status"> Status:&nbsp;&nbsp;<i class="fa <?php echo $icon ?>" style="color: <?php echo $color ?> "><?php echo $verificationStaus ?> </i> </p>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" onclick="summeryClicked()" id="summery-tab" data-toggle="tab" href="#summery" role="tab" aria-controls="summery" aria-selected="true">Summery</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick="issuedBooksClicked()" id="issued-books-tab" data-toggle="tab" href="#issuedBooks" role="tab" aria-controls="issuedBooks" aria-selected="false">Issued books</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick="reservedBooksClicked()" id="reserved-books-tab" data-toggle="tab" href="#reservedBooks" role="tab" aria-controls="reservedBooks" aria-selected="false">Reserved books</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick="eMaterials()" id="eMaterials-tab" data-toggle="tab" href="#eMaterials" role="tab" aria-controls="eMaterials" aria-selected="false">E materials</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick="profileClicked()" id="profile-tab" data-toggle="tab" href="#profilePage" role="tab" aria-controls="profilePage" aria-selected="false">Profile</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="logut"  href="logout.php"  aria-selected="false">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <h5 style="color: red; visibility: hidden"><i class="fa fa-warning" > book due date 12/34/1203</i> </h5>
                </div>
            </div>
            <div class="row" style="margin-top: 0%;">
                <div class="col-md-4">
                    <div class="profile-work" >
                        <p id="work-head">Basic Ifo</p>
                        <?php
                        $userDetails=(new dbhelper)->__getUserRecords();
                        if($userDetails != 0){

                        foreach ($userDetails as $user){


                        ?>
                        <p id="info">Course: <?php echo $user['course'];  ?>&nbsp; &nbsp; &nbsp; &nbsp; <?php echo $user['regno'];  ?></p>
<!--                        <P id="info">Computer Science Department</P>-->
                        <P id="info">Phone: <?php echo $user['phone'];  ?></P>
                        <P id="info"><?php echo $user['email'];  ?></P>
                        <?php
                        }
                        }?>
<!--                        <p id="work-head">Library Info</p>-->
<!--                        <p id="info">Issued books&nbsp; &nbsp;  3</p>-->
<!--                        <P id="info">Reserved books&nbsp; &nbsp;  3</P>-->
<!--                        <P id="info">Nearest Due date: </P>-->
<!--                        <P id="info">Fines: 0rs</P>-->
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active tab tab1" style="margin-top: 2%;" id="summery" role="tabpanel" aria-labelledby="summery-tab" >
                           <h3 class="heading-text tab1">Your Activities</h3>
                            <div class="row clearfix row-deck tab1">
                                <div class="col-xl-4 col-lg-4 col-md-6 ">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Issued Books</h4>
                                        </div>
                                        <div class="card-body">
                                            <?php
                                            $issuedBookCount=(new dbhelper)->__issuedBooksCount($userId);
                                            ?>
                                            <h5 class="number mb-0 font-32 counter"><?php echo $issuedBookCount?></h5>
<!--                                            <span class="font-12">Measure How Fast... <a href="#">More</a></span>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Reserved Books</h3>
                                        </div>
                                        <div class="card-body">
                                            <?php
                                            $reservedbookCount=(new dbhelper)->__reservedBoksCount($userId);
                                            ?>
                                            <h5 class="number mb-0 font-32 counter"><?php echo $reservedbookCount?></h5>
<!--                                            <span class="font-12">Measure How Fast... <a href="#">More</a></span>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">E Materials</h3>
                                        </div>
                                        <div class="card-body">
                                            <?php
                                            $userEBooks=(new dbhelper)->__getUserEBooks($userId);
                                            $i=0;
                                            if($userEBooks != 0){

                                            foreach ($userEBooks as $row) {
                                                $i++;
                                            }
                                            }
                                            ?>
                                            <h5 class="number mb-0 font-32 counter"><?php echo $i?></h5>
<!--                                            <span class="font-12">Measure How Fast... <a href="#">More</a></span>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row clearfix row-deck tab1">
                                <div class="col-xl-4 col-lg-4 col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Fines</h3>
                                        </div>
                                        <div class="card-body">
                                            <?php
                                            $totalFine=(new dbhelper)->__getTotaFines($userId);
                                            ?>
                                            <h5 class="number mb-0 font-32 counter"><?php echo $totalFine?></h5>
<!--                                            <span class="font-12">Measure How Fast... <a href="#">More</a></span>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Total Cards</h3>
                                        </div>
                                        <div class="card-body">
                                            <?php
                                            $totalCards=(new dbhelper)->__getTotalCards($userId);
                                            ?>
                                            <h5 class="number mb-0 font-32 counter"><?php echo $totalCards?></h5>
<!--                                            <span class="font-12">Measure How Fast... <a href="#">More</a></span>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Available Cards</h3>
                                        </div>
                                        <div class="card-body">
                                            <?php
                                            $availableCards=(new dbhelper)->__availableCards($userId);
                                            ?>
                                            <h5 class="number mb-0 font-32 counter"><?php echo $availableCards?></h5>
<!--                                            <span class="font-12">Measure How Fast... <a href="#">More</a></span>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
<!--                            <h3 class="heading-text tab1" style="margin-top: 3%">Recently Serached</h3>-->
<!--                            <h3 class="heading-text tab1" style="margin-top: 3%">History</h3>-->

                        </div>
                        <div class="tab-pane fade tab tab2" id="issuedBooks" role="tabpanel" aria-labelledby="issued-books-tab">
                            <div  class="tab-pane fade in active tab2">
                                <form method="post" >
                                    <table class="table table-bordered shop_table cart">
                                        <thead>
                                        <tr>
                                            <th class="product-name">Sl</th>
                                            <th class="product-name">Book</th>
                                            <th class="product-name">Card no</th>
                                            <th class="product-quantity">issued Date</th>
                                            <th class="product-price">Return date </th>
                                            <th class="product-subtotal">Fines</th>
                                            <th class="product-subtotal">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $issuedBookDetails=(new dbhelper)->__issuedBookDeatails($userId);
                                        if($issuedBookDetails != 0){
                                            $i=0;
                                        foreach ($issuedBookDetails as $row){

                                        ?>

                                        <tr class="cart_item">
                                            <td >
                                                <lable><?php echo $i++;?></lable>
                                            </td>
                                            <td data-title="Product" class="product-name">
                                                <span class="product-thumbnail">
                                                    <a href="#"><img src="books/<?php echo $row['cover_photo'];?>" alt="cart-product-1" width="45" height="45"></a>
                                                </span>
                                                <br>
                                                <span >
                                                 <a href="#"><strong><?php echo $row['title'];?></strong></a>
                                                </span>
                                            </td>
                                            <td >
                                                <?php echo $row['card_number'];?>
                                            </td>
                                            <td >
                                                <?php echo $row['order_date'];?>
                                            </td>
                                            <td >
                                                <?php echo $row['return_date'];?>
                                            </td>
                                            <td>
                                                <?php echo $row['fine'];?>
                                            </td>
                                            <td>
                                                <input type="button" onclick="requestReturn( <?php echo $row['order_id'];?> , <?php echo $row['accession_number'];?>)" class="btn btn-primary" value="Return">
                                            </td>
                                        </tr>
                                    <?php   }
                                        } ?>


                                        </tbody>
                                    </table>
                                </form>
                            </div>

                        </div>
                        <div class="tab-pane fade tab tab3" id="reservedBooks" role="tabpanel" aria-labelledby="reserved-books-tab">
                            <div  class="tab-pane fade in active tab3">
                                <form method="post" >
                                    <table class="table table-bordered shop_table cart">
                                        <thead>
                                        <tr>
                                            <th class="product-name">Sl</th>
                                            <th class="product-name">Book</th>
                                            <th class="product-name">Author</th>
                                            <th class="product-name">Accession no</th>
                                            <th class="product-quantity">Reserved Date</th>
                                            <th class="product-price">Issue date </th>
                                            <th class="product-subtotal">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                        $rows =  (new dbhelper)->__getUsserReservations($userId);
                                        if ($rows != 0) {
                                            $i = 1;
                                            foreach ($rows as $row) {
                                                $bookId = $row['book_id'];
                                                $edition = $row['edition'];
                                                $author = $row['author'];
                                                $title = $row['title'];
                                                $department = $row['book_department'];
                                                $description = $row['description'];
                                                $accession=$row['accession_number'];
                                                $bookType = $row['book_type'];
                                                $coverImg = $row['cover_photo'];
                                                $reservationId=$row['reservation_id'];
                                                $reservationDate = $row['reservation_date'];
                                                $issueDate =$row['issue_date'];


                                                ?>

                                                ?>

                                                <tr class="cart_item">
                                                    <td >
                                                        <lable><?php echo $i++;?></lable>
                                                    </td>
                                                    <td data-title="Product" class="product-name">
                                                <span class="product-thumbnail">
                                                    <a href="#"><img src="books/<?php echo $coverImg;?>" alt="cart-product-1" width="45" height="45"></a>
                                                </span>
                                                        <br>
                                                        <span >
                                                 <a href="#"><strong><?php echo $title;?></strong></a>
                                                </span>
                                                    </td>
                                                    <td>
                                                        <?php echo $author;?>
                                                    </td>
                                                    <td >
                                                        <?php echo $accession;?>
                                                    </td>
                                                    <td >
                                                        <?php echo $reservationDate?>
                                                    </td>
                                                    <td >
                                                        <?php echo $issueDate?>
                                                    </td>

                                                    <td>
                                                        <input type="button" onclick="cancelReservation( <?php echo $reservationId?> )" class="btn btn-primary" value="cancel">
                                                    </td>
                                                </tr>
                                            <?php   }
                                        } ?>


                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade tab tab5" id="eMaterials" role="tabpanel" aria-labelledby="eMaterials-books-tab">
                            <div  class="tab-pane fade in active tab5">
                                <form method="post" >
                                    <table class="table table-bordered shop_table cart">
                                        <thead>
                                        <tr>
                                            <th class="product-name">Sl</th>
                                            <th class="product-name">Book</th>
                                            <th class="product-name">Author</th>
                                            <th class="product-quantity">Edition</th>
                                            <th class="product-price">department </th>
                                            <th class="product-subtotal">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $userEBooks=(new dbhelper)->__getUserEBooks($userId);
                                        if($userEBooks != 0){
                                            $i=0;
                                            foreach ($userEBooks as $row){

                                                ?>

                                                <tr class="cart_item">
                                                    <td >
                                                        <lable><?php echo $i++;?></lable>
                                                    </td>
                                                    <td data-title="Product" class="product-name">
                                                <span class="product-thumbnail">
                                                    <a href="#"><img src="books/<?php echo $row['cover_photo'];?>" alt="cart-product-1" width="45" height="45"></a>
                                                </span>
                                                        <br>
                                                        <span >
                                                 <a href="#"><strong><?php echo $row['title'];?></strong></a>
                                                </span>
                                                    </td>
                                                    <td >
                                                        <?php echo $row['author'];?>
                                                    </td>
                                                    <td >
                                                        <?php echo $row['edition'];?>
                                                    </td>
                                                    <td >
                                                        <?php echo $row['book_department'];?>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-primary" href="e-read.php?path=<?php echo $row['pdf'] ?>" >View </a>
                                                        <input type="button" onclick="removeEbook( <?php echo $row['book_id'];?> , <?php echo $userId?>)" class="btn btn-primary" value="Remove">
                                                    </td>
                                                </tr>
                                            <?php   }
                                        } ?>


                                        </tbody>
                                    </table>
                                </form>
                            </div>

                        </div>
                        <div class="tab-pane fade tab tab4" style="margin-top: 0%;" id="profilePage" role="tabpanel" aria-labelledby="profile-tab">
<!--                            <div class="col d-flex justify-content-start">-->
<!--                                <button class="btn btnStyle "  type="button"><i class="fa fa-edit"></i>Edit Info</button>-->
<!--                            </div>-->
                            <div class="row flex-lg-nowrap">

                                <div class="col">
                                    <div class="row">
                                        <div class="col mb-3">
                                            <div class="card">
                                                <div class="card-body">
                                                  <div class="tab-content pt-3">
                                                            <div class="tab-pane active">
                                                                <form class="form" novalidate="">
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <div class="row">
                                                                                <div class="col">
                                                                                    <?php

                                                                                    $userDetails=(new dbhelper)->__getUserRecords();
                                                                                    if($userDetails != 0){

                                                                                    foreach ($userDetails as $user){
                                                                                    ?>
                                                                                    <div class="form-group">
                                                                                        <label>first Name</label>
                                                                                        <input class="form-control" type="text" name="name" placeholder="John Smith" value="<?php echo $user['first_name']?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <div class="form-group">
                                                                                        <label>last name</label>
                                                                                        <input class="form-control" type="text" name="username" placeholder="johnny.s" value="<?php echo $user['last_name']?>">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col">
                                                                                    <div class="form-group">
                                                                                        <label>Email</label>
                                                                                        <input class="form-control" type="text" placeholder="<?php echo $user['email']?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <div class="form-group">
                                                                                        <label>Phone</label>
                                                                                        <input class="form-control" type="number" placeholder="+91-" value="<?php echo $user['phone']?>">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col mb-3">
                                                                                    <div class="form-group">
                                                                                        <label>About</label>
                                                                                        <textarea class="form-control" rows="5" placeholder="My Bio"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <?php }  }?>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <div class="mb-2"><b>Change Password</b></div>
                                                                            <div class="row">
                                                                                <div class="col">
                                                                                    <div class="form-group">
                                                                                        <label>Current Password</label>
                                                                                        <input class="form-control" type="password" placeholder="••••••">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col">
                                                                                    <div class="form-group">
                                                                                        <label>New Password</label>
                                                                                        <input class="form-control" type="password" placeholder="••••••">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col">
                                                                                    <div class="form-group">
                                                                                        <label>Confirm <span class="d-none d-xl-inline">Password</span></label>
                                                                                        <input class="form-control" type="password" placeholder="••••••"> </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col d-flex justify-content-end">
                                                                            <button class="btn btn-primary" type="submit">Save Changes</button>
                                                                        </div>
                                                                    </div>
                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>




<script>

    function requestReturn(orderId,accession){
        // alert(orderId +' ,'+ accession)
        swal({
            title: "confirmation",
            text: "Do you want to Request Return for this ?",
            type: "info",
            showCancelButton: true

        }, function() {
            $.ajax({
                url: 'dbHelper/processReturn.php',
                type: 'post',
                data:{'accession':accession,'orderId':orderId} ,
                success:function (response) {
                    var result = $.trim(response);

                    if(result === "0"){
                        swal({
                            title: "Failed",
                            text: "Return Request Faled",
                            type: "warning",

                        });
                    } else if(result === "1"){
                        swal({
                            title: "Return Requested",
                            text: "Return Request Successfully placed",
                            type: "success",

                        }, function() {
                            location.reload();
                        });
                    }
                }
            });

        });


    }
    function removeEbook(bookId,userId){
        swal({
            title: "confirmation",
            text: "Do you want to Remove this book ?",
            type: "info",
            showCancelButton: true

        }, function() {
            $.ajax({
                url: 'dbHelper/removeEBook.php',
                type: 'post',
                data:{'bookId':bookId,'userId':userId} ,
                success:function (response) {
                    var result = $.trim(response);

                    if(result === "0"){
                        swal({
                            title: "Failed",
                            text: "Remove Failed",
                            type: "warning",

                        });
                    } else if(result === "1"){
                        swal({
                            title: "Removed",
                            text: "E Book Removed From Profile",
                            type: "success",

                        }, function() {
                            location.reload();
                        });
                    }
                }
            });

        });
    }
</script>

    <script>

        window.onload = () => {
                  $('#summery-tab').click();
        }

        $(document).ready(function () {


            $(".selectProfileImg").click(function(){
                $("#imageUpload").click()
            });

            function fasterPreview( uploader ) {
                if ( uploader.files && uploader.files[0] ){
                    $('#profilepic__image').attr('src',
                        window.URL.createObjectURL(uploader.files[0]) );
                }
            }

            $("#imageUpload").change(function(){
                fasterPreview( this );
            });

        });


        function cancelReservation(reservationId){
            swal({
                title: "confirmation",
                text: "Do you want to Cancel this Reservation ?",
                type: "info",
                showCancelButton: true

            }, function() {
                $.ajax({
                    url: 'dbHelper/cancelReservation.php',
                    type: 'post',
                    data:{'reservationId':reservationId} ,
                    success:function (response) {
                        var result = $.trim(response);
                        if(result === "1"){
                            swal({
                                title: "Reservation canceled",
                                text: "Reservation canceled Successfully",
                                type: "success",

                            }, function() {
                            window.location.reload();
                            });
                        }else{
                            swal({
                                title: "Failed",
                                text: "Cancel Request Faled",
                                type: "warning",

                            });
                        }
                    }
                });

            });


        }


        function summeryClicked() {
            $('.tab2').css({'display':'none'});
            $('.tab3').css({'display':'none'});
            $('.tab4').css({'display':'none'});
            $('.tab5').css({'display':'none'});
            $('.tab1').css({'display':'block'});

        }

         function issuedBooksClicked() {
             $('.tab1').css({'display':'none'});
             $('.tab3').css({'display':'none'});
             $('.tab4').css({'display':'none'});
             $('.tab5').css({'display':'none'});
             $('.tab2').css({'display':'block'});
        }

        function reservedBooksClicked() {
            $('.tab1').css({'display':'none'});
            $('.tab2').css({'display':'none'});
            $('.tab4').css({'display':'none'});
            $('.tab5').css({'display':'none'});
            $('.tab3').css({'display':'block'});
        }

        function profileClicked() {
            $('.tab1').css({'display':'none'});
            $('.tab2').css({'display':'none'});
            $('.tab3').css({'display':'none'});
            $('.tab5').css({'display':'none'});
            $('.tab4').css({'display':'block'});
        }
        function eMaterials(){
            $('.tab1').css({'display':'none'});
            $('.tab2').css({'display':'none'});
            $('.tab3').css({'display':'none'});
            $('.tab4').css({'display':'none'});
            $('.tab5').css({'display':'block'});
        }
    </script>

<?php include_once 'footer.php' ?>
