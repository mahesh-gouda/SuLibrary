<?php include_once 'header.php'?>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <!-- Start: Page Banner -->
        <section class="page-banner services-banner">
            <div class="container">
                <div class="banner-header">
                    <h2>Cart Page</h2>
                    <span class="underline center"></span>
                    <p class="lead">Proin ac eros pellentesque dolor pharetra tempo.</p>
                </div>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="index-2.html">Home</a></li>
                        <li>Dashboard</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End: Page Banner -->
        <!-- Start: Cart Section -->
    <div class="container">
    <div class="row" style="margin-top: 4%; margin-bottom: 3%">
        <div class="container">
            <h1 class="heading-text2"> Books in Your Book Bag <i class="fa fa-shopping-cart"></i>...</h1>
        </div>
    </div>
    </div>

    <div class="container">
        <div  class="tab-pane fade in active tab5">
            <form method="post" >
                <table id="cartTable" class="table table-bordered shop_table cart">
                    <thead>
                    <tr>
                        <th class="product-name">#</th>
                        <th class="product-name">Book</th>
                        <th class="product-name">Title</th>
                        <th class="product-quantity">Department</th>
                        <th class="product-subtotal">Stocks left</th>
                        <th class="product-subtotal">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $userId = $_SESSION['user_id'];
                    $booksinCart=(new dbhelper)->__getBooksInCart($userId);
                    if($booksinCart != 0){
                        $i=0;
                        foreach ($booksinCart as $row){
                            $bookId = $row['book_id'];
                            $stock = (new dbhelper)->__getStocks($bookId);
                            ?>

                            <tr class="cart_item">
                                <?php if($stock >0) {?>
                                <td >
                                    <input type="checkbox"  />
                                </td>
                                <?php } else {?>
                                    <td >

                                    </td>
                                    <?php }?>
                                <td style="display: none">
                                 <?php echo $bookId;?>
                                </td>
                                <td data-title="Product" class="product-name">
                                                <span class="product-thumbnail">
                                                    <a href="#"><img src="books/<?php echo $row['cover_photo'];?>" alt="cart-product-1" width="45" height="45"></a>
                                                </span>

                                </td>
                                <td >
                                    <?php echo $row['title'];?>
                                </td>
                                <td >
                                    <?php echo $row['book_department'];?>
                                </td>

                                <td >
                                    <?php echo $stock;?>
                                </td>
                                <td>
                                    <input type="button" onclick="removeFromCart( <?php echo $userId;?> , <?php echo $row['book_id'];?>)" class="btn btn-primary" value="remove">
                                </td>

                            </tr>
                        <?php   }
                    } ?>


                    </tbody>
                </table>
            </form>
        </div>
        <div class="float-right" style="margin-bottom: 4%">
            <input type="button" style="border-radius: 10px" onclick="proceede(<?php echo $userId;?>)" id="checkOut" class="btn btn-info " name="checkOut" value="Proceed to Checkout">
        </div>

    </div>
        <!-- Start: Social Network -->

        <!-- End: Social Network -->
<style>
    #overlay{background-image: url('images/Circle-Loading.svg');background-color: rgba(255,255,255,0.5);background-position: center center;background-repeat: no-repeat; filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#50FFFFFF,endColorstr=#50FFFFFF);width: 100%; height: 100%; position: fixed; top: 0; left: 0; z-index: 9999;}
</style>
    <div id="overlay"  ></div>
  <script>
    window.onload = () => {
        $('#overlay').hide();
    }
   function proceede(userid){

       var  books = [];
         $("#cartTable input[type=checkbox]:checked").each(function () {
            var row = $(this).closest("tr")[0];

             books.push($.trim(row.cells[1].innerText));

        });



       if(books.length > 0) {
           $('#overlay').show();
           setTimeout(function () {
               $.ajax({
                   url: 'dbHelper/processcheckout.php',
                   type: 'POST',
                   timeout:3000,
                   data: {"books": books, "user_id": userid},
                   success: function (response) {
                       $('#overlay').hide();
                       if (response === "1") {
                           setTimeout(function() {
                               swal({
                                   title: "Not Enough Cards",
                                   text: "Removed from Cart",
                                   type: "warning"
                               }, function() {
                                   location.reload();
                               });
                           }, 100);
                       } else if (response === "4") {
                           window.location.href="order-success.php";
                       }

                   }
               });
           },3000);

       }else {
           setTimeout(function() {
                       swal({
                           title: "Select books!",
                           text: "Please select books to check out",
                           type: "info"
                       }, function() {

                       });
                   }, 100);
       }

    }





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
        <?php include_once 'footer.php'?>