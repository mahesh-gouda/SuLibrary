<?php include_once 'header.php';
include_once 'dbHelper/dbhelper.php';
session_start();
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
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
            <p class="lead">Proin ac eros pellentesque dolor pharetra tempo.</p>
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


    <div class=" emp-profile">
        <form method="post">
            <div class="row" style="margin-bottom: 0%;" >
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
                        $userDetails=(new dbhelper)->__getUserRecords();
                        if($userDetails != 0){

                        foreach ($userDetails as $user){


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
                                <a class="nav-link" onclick="profileClicked()" id="profile-tab" data-toggle="tab" href="#profilePage" role="tab" aria-controls="profilePage" aria-selected="false">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="logut"  href="logout.php"  aria-selected="false">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <h5 style="color: red"><i class="fa fa-warning" > book due date 12/34/1203</i> </h5>
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
                        <p id="work-head">Library Info</p>
                        <p id="info">Issued books&nbsp; &nbsp;  3</p>
                        <P id="info">Reserved books&nbsp; &nbsp;  3</P>
                        <P id="info">Nearest Due date: </P>
                        <P id="info">Fines: 0rs</P>
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
                                            <h5 class="number mb-0 font-32 counter">0</h5>
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
                                            <h5 class="number mb-0 font-32 counter">0</h5>
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
                                            <h5 class="number mb-0 font-32 counter">0</h5>
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
                                            <h5 class="number mb-0 font-32 counter">0</h5>
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
                                            <h5 class="number mb-0 font-32 counter">0</h5>
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
                                            <h5 class="number mb-0 font-32 counter">0</h5>
<!--                                            <span class="font-12">Measure How Fast... <a href="#">More</a></span>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h3 class="heading-text tab1" style="margin-top: 3%">Recently Serached</h3>
                            <h3 class="heading-text tab1" style="margin-top: 3%">History</h3>

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
                                        <tr class="cart_item">
                                            <td >
                                                <lable>1</lable>
                                            </td>
                                            <td data-title="Product" class="product-name">
                                                <span class="product-thumbnail">
                                                    <a href="#"><img src="images/cart/cart-product-1.jpg" alt="cart-product-1"></a>
                                                </span>
                                                <br>
                                                <span >
                                                 <a href="#"><strong>The Great Gatsby</strong></a>
                                                </span>
                                            </td>
                                            <td >

                                            </td>
                                            <td >

                                            </td>
                                            <td >

                                            </td>
                                            <td>

                                            </td>
                                            <td>
                                                <input type="button" value="Return">
                                            </td>
                                        </tr>

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
                                            <th class="product-name">Card no</th>
                                            <th class="product-quantity">Available Date</th>
                                            <th class="product-price">Return date </th>
                                            <th class="product-subtotal">Fines</th>
                                            <th class="product-subtotal">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="cart_item">
                                            <td >
                                                <lable>1s</lable>
                                            </td>
                                            <td data-title="Product" class="product-name">
                                                <span class="product-thumbnail">
                                                    <a href="#"><img src="images/cart/cart-product-1.jpg" alt="cart-product-1"></a>
                                                </span>
                                                <br>
                                                <span >
                                                 <a href="#"><strong>The Great Gatsby</strong></a>
                                                </span>
                                            </td>
                                            <td >

                                            </td>
                                            <td >

                                            </td>
                                            <td >

                                            </td>
                                            <td>

                                            </td>
                                            <td>
                                                <input type="button" value="Cancel">

                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </form>
                            </div>

                        </div>
                        <div class="tab-pane fade tab tab4" style="margin-top: 0%;" id="profilePage" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="col d-flex justify-content-start">
                                <button class="btn btnStyle "  type="button"><i class="fa fa-edit"></i>Edit Info</button>
                            </div>
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
                                                                                    <div class="form-group">
                                                                                        <label>Full Name</label>
                                                                                        <input class="form-control" type="text" name="name" placeholder="John Smith" value="John Smith">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <div class="form-group">
                                                                                        <label>Username</label>
                                                                                        <input class="form-control" type="text" name="username" placeholder="johnny.s" value="johnny.s">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col">
                                                                                    <div class="form-group">
                                                                                        <label>Email</label>
                                                                                        <input class="form-control" type="text" placeholder="user@example.com">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <div class="form-group">
                                                                                        <label>Phone</label>
                                                                                        <input class="form-control" type="number" placeholder="+91-">
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
                                                                                        <input class="form-control" type="password" placeholder="••••••"></div>
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




        function summeryClicked() {
            $('.tab2').css({'display':'none'});
            $('.tab3').css({'display':'none'});
            $('.tab4').css({'display':'none'});
            $('.tab1').css({'display':'block'});

        }

         function issuedBooksClicked() {
             $('.tab1').css({'display':'none'});
             $('.tab3').css({'display':'none'});
             $('.tab4').css({'display':'none'});
             $('.tab2').css({'display':'block'});
        }

        function reservedBooksClicked() {
            $('.tab1').css({'display':'none'});
            $('.tab2').css({'display':'none'});
            $('.tab4').css({'display':'none'});
            $('.tab3').css({'display':'block'});
        }
        function profileClicked() {
            $('.tab1').css({'display':'none'});
            $('.tab2').css({'display':'none'});
            $('.tab3').css({'display':'none'});
            $('.tab4').css({'display':'block'});
        }
    </script>
<?php include_once 'footer.php' ?>
