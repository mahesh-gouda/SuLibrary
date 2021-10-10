<?php
ob_start();
session_start(); ?>
<?php  include_once 'dbHelper\dbhelper.php';


$rows =  (new dbhelper)->__oderReservedBooks();


?>
<!DOCTYPE html>
<html lang="zxx">


<head>

    <!-- Meta -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1">

    <!-- Title -->
    <title>..:: SU-LIBRARY ::..</title>

    <!-- Favicon -->
    <link href="images/favicon.ico" rel="icon" type="image/x-icon" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i%7CLato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Mobile Menu -->
    <link href="css/mmenu.css" rel="stylesheet" type="text/css" />
    <link href="css/mmenu.positioning.css" rel="stylesheet" type="text/css" />
    <link href="css/animate.css" rel="stylesheet" type="text/css" />
    <!-- Stylesheet -->
    <link href="style.css" rel="stylesheet" type="text/css" />


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <![endif]-->
</head>

<body onload="">

<!-- Start: Header Section -->
<header id="header-v1" class="navbar-wrapper">
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-default">
                <div class="row">
                    <div class="col-md-3">
                        <div class="navbar-header">
                            <div class="navbar-brand">
                                <h1>
                                    <a href="index.php">
                                        <img src="images/LogoMakr-3OLQbF.png" alt="LIBRARIA" />
                                    </a>
                                </h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <!-- Header Topbar -->
                        <div class="header-topbar hidden-sm hidden-xs">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="topbar-info">
                                        <a href="tel:+61-3-8376-6284"><i class="fa fa-phone"></i>+91 8242421566</a>
                                        <span>/</span>
                                        <a href="mailto:srinivasuniversity@gmail.com"><i class="fa fa-envelope"></i>srinivasUniversity@gmail.com</a>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="topbar-links">
                                        <?php if(isset($_SESSION["user_id"])){
                                            echo '<a href="profile.php"><i class="fa fa-user"></i>Profile</a>';
                                        }else {
                                            echo '<a href="signin.php"><i class="fa fa-lock"></i>Login / Register </a>';
                                        }
                                        ?>

                                        <span>|</span>
                                        <div class="header-cart dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                                <i class="fa fa-shopping-cart"></i>
                                                <small id="cart-item"></small>
                                            </a>
                                            <div class="dropdown-menu cart-dropdown">
                                                <ul>
                                                    <?php
                                                    if(isset($_SESSION["user_id"])){
                                                    $userId = $_SESSION['user_id'];
                                                    $booksinCart=(new dbhelper)->__getBooksInCart($userId);
                                                        $i=0;
                                                    if($booksinCart != 0){

                                                    foreach ($booksinCart as $row){
                                                        $i++;

                                                    $bookId = $row['book_id'];
                                                    $stock = (new dbhelper)->__getStocks($bookId);
                                                    ?>
                                                    <li class="clearfix">
                                                        <img src="books/<?php echo $row['cover_photo']?>" alt="cart item" />
                                                        <div class="item-info">
                                                            <div class="name">
                                                                <a href="#"><?php echo $row['title']?></a>
                                                            </div>
                                                            <div class="author"><strong>Author:</strong> <?php echo $row['author']?></div>
                                                            <div class="price">Stock: <?php echo $stock?></div>
                                                        </div>
                                                        <a class="remove"  onclick="removeFromCart( <?php echo $userId;?> , <?php echo $row['book_id'];?>)" href="#"><i class="fa fa-trash-o"></i></a>
                                                    </li>
                                                   <?php }
                                                    } ?>

                                                </ul>
                                                <div class="cart-total">
                                                    <div class="title">SubTotal</div>
                                                    <div class="price"> <?php echo $i ?></div>
                                                </div>
                                                <div class="cart-buttons">
                                                    <a href="cart.php" class="btn btn-dark-gray">View Cart</a>
                                                </div>
                                                <?php     } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="navbar-collapse hidden-sm hidden-xs">
                            <ul class="nav navbar-nav"  >
                                <li class="dropdown active">
                                    <a  href="index.php">Home</a>

                                </li>
                                <li class="dropdown">
                                    <a  href="books.php">Books &amp; Media</a>
                                </li>
                                <li class="dropdown">
                                    <a  href="publications.php">publications</a>

                                </li>
                                <li class="dropdown">
                                    <a  href="news.php">News</a>

                                </li>
                                <li class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle disabled" href="#">Pages</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="cart.php">Cart</a></li>
                                        <li><a href="reserved-books.php">Reserved</a></li>
                                        <li><a href="orders.php">Oders</a></li>
                                    </ul>
                                </li>


                                <li><a href="https://srinivasuniversity.edu.in/SrinivasUniversity/Contact">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="mobile-menu hidden-lg hidden-md">
                    <a href="#mobile-menu"><i class="fa fa-navicon"></i></a>
                    <div id="mobile-menu">
                        <ul>
                            <li class="mobile-title">
                                <h4>Navigation</h4>
                                <a href="#" class="close"></a>
                            </li>
                            <li>
                                <a href="index.php">Home</a>
                            </li>
                            <li>
                                <a href="books.php">Books &amp; Media</a>

                            </li>
                            <li class="dropdown">
                                <a  href="publications.php">publications</a>

                            </li>
                            <li>
                                <a href="news.php">News &amp; Events</a>

                            </li>
                            <li>
                                <a href="#">Pages</a>
                                <ul>
                                    <li><a href="cart.php">Cart</a></li>
                                    <li><a href="reserved-books.php">reserved</a></li>
                                    <li><a href="signin.php">Orders</a></li>

                                </ul>
                            </li>

                            <li><a href="contact.php">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>
<script>
    function removeFromCart(userid,bookid){
        $.ajax({
            url: 'dbHelper/addToCart.php',
            type: 'POST',
            data: {"book_id": bookid,"user_id":userid},
            success: function (response) {
                if (response === "1") {
                    setTimeout(function() {
                        swal({
                            title: "Success",
                            text: "Removed from Cart",
                            type: "success"
                        }, function() {
                            location.reload();
                        });
                    }, 100);
                } else {
                    setTimeout(function() {
                        swal({
                            title: "Failed!",
                            text: "Remove Failed",
                            type: "warning"
                        }, function() {

                        });
                    }, 100);
                }

            }
        });
    }
</script>
<!-- End: Header Section -->

