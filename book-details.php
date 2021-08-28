<?php include_once 'header.php';
if(!isset($_SESSION['user_id'])){
    header("Location:signin.php");
}

?>

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
            <h2>Books & Media Listing</h2>
            <span class="underline center"></span>
            <p class="lead">Proin ac eros pellentesque dolor pharetra tempo.</p>
        </div>
        <div class="breadcrumb">
            <ul>
                <li><a href="index-2.html">Home</a></li>
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
                                <h1 class="heading-text2"> Place Your Order <i class="fa fa-shopping-cart"></i>...</h1>
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
                                $stock = (new dbhelper)->__getStocks($bookId);
                                $messege="No Stock left";
                                if($stock>0){
                                    $messege ="Book Available";
                                }
                                $accession =  (new dbhelper)->__getAccession($bookId);
                                $bookType = $row['book_type'];
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
                                    <h3 class="heading-text3"><?php echo $messege?></h3><br>
                                    <p><strong style="f"> Total Copies available:</strong> <?php echo $stock?></p><br>
                                    <p><strong>Accession:</strong> <?php echo $accession?></p>
                                   
                                     <label style="display: none" id="accession" name="accession"><?php echo $accession?></label>
                                    <label style="display: none" id="bookid" name="bookid"><?php echo $bookId?></label>

                                </div>
                                <div style="margin-top: 20%">
                               <?php if(isset($_SESSION['user_id'])){
                                    $userId= $_SESSION['user_id'];
                                    $hasOdered = (new dbhelper)->__checkBookOder($bookId,$userId);
                                    if($hasOdered == 1){

                                        echo '<h3 style="color: red"> Your Have already made an order for this book<h3>';
                                    } else{
                                        ?>

                                  <a href="" id="btnPlaceHold" class="btn btn-dark-gray" style="width: 200px">Place a Hold</a> <br>
                                  
                                  <a href="" id="btnAddToCart" class="btn btn-dark-gray" style="margin-top: 2%">Add to Book Bag</a>
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
                                                <p>'.$description.'</p>
                                                <div class="actions">
                                                    <ul>
                                                        <li>
                                                            <a href="book-details.php?id='.$bookId.'" target="_blank" data-toggle="blog-tags"
                                                               data-placement="top" title="view book" class="btn btn-sm btn-primary " >
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


<script>

    $("#btnPlaceHold").click(function (event) {
        event.preventDefault();
        const acn = $("#accession").html();
        const bookid = $("#bookid").html();
        $.ajax({
            url: 'dbHelper/processOrder.php',
            type: 'post',
            data:{'acn':acn,'bookid':bookid},
            success:function (response) {
               var result = $.trim(response);
                if(result === "0"){
                    $("#divErr").css("display", "block");
                    $("#errMsg").html("Please Login to make an order");
                } else if(result === "1"){
                    $("#divErr").css("display", "block");
                    $("#errMsg").html("Your Verification is pending");
                 } else if(result === "2"){
                    $("#divErr").css("display", "block");
                    $("#errMsg").html("opps!! You Have no cards Left to Order");
                }else if(result === "4"){
                    window.location.href="order-success.php";
                }else {
                    $("#divErr").css("display", "block");
                    $("#errMsg").html("opps!! some error occured");
                }
            }
        });

    });
</script>
<?php include_once 'footer.php' ?>
