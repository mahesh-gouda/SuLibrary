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
                            <h1 class="heading-text2"> Your Orders <i class="fa fa-shopping-cart"></i>...</h1>
                        </div>

                        <!-- End: Search Section -->
                    </div>

                    <hr>
                    <div class="booksmedia-detail-box">
                        <?php
                        $bid=0;
                        $userId="";
                        function dateDiff($cin, $cout){
                            $date1_ts = strtotime($cin);
                            $date2_ts = strtotime($cout);
                            $diff = $date2_ts - $date1_ts;
                            return abs(round($diff / 86400));
                        }

                       if(isset($_SESSION['user_id'])){
                                                $userId= $_SESSION['user_id'];
                       }
                        $rows =  (new dbhelper)->__getUserOrderDetails($userId);
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
                                $orderId=$row['order_id'];
                                $oderDate = $row['order_date'];
                                $returnDate =$row['return_date'];
                                $comment=$row['comment'];
                                $date=date('Y-m-d');
                                $hasOdered = (new dbhelper)->__checkOrderStatus($accession, $userId);

                                $daysLeft = dateDiff($date,$returnDate);

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
                                            <p><strong>Description :</strong><?php echo strip_tags(substr($description,0,30)),'...';?></p><br>
                                            <p><strong>Remarks by lecturer  :</strong><?php echo $comment?></p>
                                            <div class="float-right">
                                             <?php
                                             if($hasOdered==20 || $hasOdered==4){
                                                 ?>

                                                 <a  onclick="requestReturn(<?php echo $orderId?>,<?php echo $accession?>)" id="retunBtn" class="btn btn-dark-gray" style="width: 200px; border-radius: 9px">Request Return</a>

                                                     <?php
                                             }

                                             ?>

                                            </div>

                                        </div>

                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-3 ">
                                        <div class="post-right-content" >
                                            <h3 class="heading-text3">Oder details</h3><br>
                                            <?php if (isset($_SESSION['user_id'])) {
                                                $userId = $_SESSION['user_id'];

                                                $status="";
                                                if ($hasOdered == 1) {
                                                    $status="Approved";
                                                } elseif ($hasOdered == 0) {
                                                    $status="Pending";

                                                } elseif($hasOdered== -1) {
                                                    $status="Rejected";

                                                } elseif($hasOdered== 2) {
                                                    $status="Return Requested";
                                                }elseif($hasOdered== 3) {
                                                    $status="Returned";
                                                }elseif($hasOdered== 4) {
                                                    $status="Return Rejected";
                                                }elseif($hasOdered== 20) {
                                                    $status="Book Assigned";
                                                }
                                            } ?>
                                            <h3 style="color: #e30b23"><strong style="color: #0f57ec"> Status :</strong> <?php echo $status?></h3><br>
                                            <p><strong style="f"> Order Id:</strong> <?php echo $orderId?></p><br>
                                            <p><strong>Accession:</strong> <?php echo $accession?></p><br>
                                            <p><strong>Book Id:</strong> <?php echo $bookId?></p><br>
                                            <p><strong>Oder Date:</strong> <?php echo $oderDate?></p><br>
                                            <p><strong>Return Date:</strong> <?php echo $returnDate?></p><br>
                                            <p><strong>Days Left:</strong> <?php echo $daysLeft?></p>
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


                    </div>



                </div>
            </div>
        </main>

    </div>
</div>


<script>

    function requestReturn(orderId,accession){
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
                        } else {
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
</script>
<?php include_once 'footer.php' ?>
