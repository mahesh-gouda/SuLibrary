<?php include_once 'header.php';
if(!isset($_SESSION['user_id'])){
    header("Location:signin.php");
}
?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<style>
    .heading-text{
        font-size: 30px;
        background: -webkit-linear-gradient(#1d1b1b, #d7975d);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 8px;
    }
    .heading-text2{
        font-size: 40px;
        background: -webkit-linear-gradient(#0f57ec, #86603e);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 8px;
    }
    .heading-text3{
        font-size: 20px;
        background: -webkit-linear-gradient(#ffaa36, #fac418);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 8px;
    }
</style>
<script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>
<!-- Start: Page Banner -->
<section class="page-banner services-banner">
    <div class="container">
        <div class="banner-header">
            <h2>Books Listing</h2>
            <span class="underline center"></span>
            <p class="lead">get all the books at one place.</p>
        </div>
        <div class="breadcrumb">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li>Books & Media</li>
            </ul>
        </div>
    </div>
</section>
<!-- End: Page Banner -->

<!-- Start: Products Section -->
<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div class="booksmedia-detail-main">
                <div class="container">
                    <div class="row" style="margin-top: 4%; margin-bottom: 3%">

                        <div class="container">
                            <h1 class="heading-text2"> Reserve your book <i class="fa fa-shopping-cart"></i>...</h1>
                        </div>

                        <!-- End: Search Section -->
                    </div>

                    <hr>
                    <div class="booksmedia-detail-box">
                        <?php
                        $bid=0;
                        if(isset($_GET['id'])){
                            $bid= $_GET['id'];
                        }
                        $dept ="";
                        $rows = (new dbhelper)->__getBookDetails($bid);
                        if ($rows != 0) {
                            $i = 1;
                            foreach ($rows

                                     as $row) {
                                $bookId = $row['book_id'];
                                $edition = $row['edition'];
                                $author = $row['author'];
                                $title = $row['title'];
                                $department = $row['book_department'];
                                $dept=$department;
                                $description = $row['description'];
                                $rowsavd = (new dbhelper)->__getDateToReserve($bookId);
                                $accession="";
                                $availableDate="";
                                if($rowsavd != 0) {
                                    foreach ($rowsavd as $rowavd) {
                                        $accession = $rowavd['accession_number'];
                                        $availableDate = $rowavd['return_date'];
                                    }
                                }
                                $coverImg = $row['cover_photo'];

                                ?>

                                <div class="detailed-box" style="box-shadow: 4px 4px 5px 1px rgba(59,58,58,0.37);">
                                    <div class="col-xs-12 col-sm-5 col-md-3">
                                        <div class="post-thumbnail">
                                            <img style="width: 350px; height: 400px;" src="books/<?php echo $coverImg?>" alt="Book Image">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-7 col-md-6"  >
                                        <div class="post-center-content" style="width: 500px; height: 400px; margin-left: 1%">
                                            <h2 class="heading-text" ><?php echo $title?></h2>
                                            <hr>
                                            <p><strong>Author :</strong><?php echo $author?></p><br>
                                            <p><strong>Edition :</strong> <?php echo $edition?> edition</p><br>
                                            <p><strong>Department :</strong><?php echo $department?></p><br>
                                            <p><strong>Description :</strong><?php echo $description?></p>

                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-3 ">
                                        <div class="post-right-content" >
                                            <h3 class="heading-text3">Reserve Now </h3><br>
                                            <p><strong style="f"> Get the book on:</strong> <?php echo $availableDate?></p><br>
                                            <p><strong>Accession:</strong> <?php echo $accession?></p>

                                            <label style="display: none" id="accession" name="accession"><?php echo $accession?></label>
                                            <label style="display: none" id="bookid" name="bookid"><?php echo $bookId?></label>

                                        </div>
                                        <div style="margin-top: 20%">
                                            <?php if(isset($_SESSION['user_id'])){
                                                $userId= $_SESSION['user_id'];
                                                $hasOdered = (new dbhelper)->__checkReservation($bookId,$userId);
                                                if($hasOdered >= 1){

                                                    echo '<h3 style="color: red"> Your Have already made an Reservation for this book<h3>';
                                                } else{
                                                    ?>

                                                    <a href="" id="btnReserveBook" class="btn btn-dark-gray" style="width: 200px">Reserve Book</a> <br>

                                                    <a  id="btnAddToCart" onclick="addToCart(<?php echo $bookId?>)" class="btn btn-dark-gray" style="margin-top: 2%">Add to Book Bag</a>
                                                <?php   }


                                            }?>
                                            <div  id="divErr" class="alert alert-danger alert-dismissible" role="alert" style="display: none">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <strong>Failed!</strong> <label id="errMsg"></label>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <?php
                            }
                        }
                        ?>

                        <div class="clearfix"></div>

                        <!-- End: Products Section -->

                        <div class="booksmedia-fullwidth">
                            <div class="container">
                                <h2 class="section-title text-center">You May also Like</h2>
                                <span class="underline center"></span>
                                <p class="lead text-center">These are some of the popular books form our site.</p>
                                <ul class="popular-items-detail-v2">

                                    <?php
                                    $rows = (new dbhelper)->__getDepartmentBooks($dept,$bid);
                                    if ($rows != 0) {
                                        $i = 1;
                                        foreach ($rows as $row) {
                                            $bookId = $row['book_id'];
                                            $edition = $row['edition'];
                                            $author = $row['author'];
                                            $title = $row['title'];
                                            $department = $row['book_department'];
                                            $description = $row['description'];
                                            $stock = (new dbhelper)->__getStocks($bookId);
                                            $bookType = $row['book_type'];
                                            $coverImg = $row['cover_photo'];
                                            echo '
                                    <li>
                                        <figure>
                                            <img src="books/'.$coverImg.'"
                                                 alt="Book">
                                            <figcaption>
                                                <header>
                                                    <h4><a href="#.">'.$title.'</a></h4>
                                                    <p><strong>Author:</strong>'.$author.'</p>
                                                    <p><strong>stock:</strong> '.$stock.'</p>
                                                </header>
                                                          <div class="actions">
                                                    <ul>
                                                        <li>
                                                            <a href="book-details.php?id='.$bookId.'"
                                                               data-placement="top" title="view book" style="color: #0d6aad" >
                                                               View Book
                                                            </a>
                                                            
                                                        </li>

                                                    </ul>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </li>';
                                        }
                                    } ?>


                                </ul>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </main>

    </div>
</div>

<style>
    #overlay{background-image: url('images/Circle-Loading.svg');background-color: rgba(255,255,255,0.5);background-position: center center;background-repeat: no-repeat; filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#50FFFFFF,endColorstr=#50FFFFFF);width: 100%; height: 100%; position: fixed; top: 0; left: 0; z-index: 9999;}
</style>
<div id="overlay"  ></div>
<script>
    window.onload = () => {
        $('#overlay').hide();
    }
    $("#btnReserveBook").click(function (event) {
        event.preventDefault();
        const acn = $("#accession").html();
        const bookid = $("#bookid").html();
        $('#overlay').show();
        setTimeout(function () {
            $.ajax({
                url: 'dbHelper/processReserve.php',
                type: 'post',
                data: {'acn': acn, 'bookid': bookid},
                success: function (response) {
                    $('#overlay').hide();
                    var result = $.trim(response);
                    if (result === "0") {
                        $("#divErr").css("display", "block");
                        $("#errMsg").html("Please Login to make an order");
                    } else if (result === "1") {
                        $("#divErr").css("display", "block");
                        $("#errMsg").html("Your Verification is pending");
                    } else if (result === "2") {
                        $("#divErr").css("display", "block");
                        $("#errMsg").html("opps!! You Have no cards Left to Order");
                    } else if (result === "4") {
                        swal({
                            title: "Reservation Successful",
                            text: "Reserve Request Successfully placed",
                            type: "success",

                        }, function() {
                            window.location.href = "reserved-books.php";
                        });

                    } else {
                        $("#divErr").css("display", "block");
                        $("#errMsg").html("opps!! some error occured");
                    }
                }
            });
        },3000);

    });

    function addToCart(id){
        $.ajax({
            url: 'dbHelper/addToCart.php',
            type: 'POST',
            data: {"bid": id},
            success: function (response) {
                if (response === "1") {
                    setTimeout(function() {
                        swal({
                            title: "Success",
                            text: "Book Added to Cart",
                            type: "success"
                        }, function() {
                            location.reload();
                        });
                    }, 100);
                } else  if (response === "2")  {
                    setTimeout(function() {
                        swal({
                            title: "Already Exists!",
                            text: "book Already exists in you Cart",
                            type: "warning"
                        }, function() {

                        });
                    }, 100);
                }else {
                    setTimeout(function() {
                        swal({
                            title: "Failed!",
                            text: "Book Not Added to Cart",
                            type: "warning"
                        }, function() {

                        });
                    }, 100);
                }

            }
        });

    }
</script>
<?php include_once 'footer.php' ?>
