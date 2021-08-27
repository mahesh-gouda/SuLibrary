<?php include_once 'header.php'?>

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
                <li><a href="index.php">Home</a></li>
                <li>Books & Media</li>
            </ul>
        </div>
    </div>
</section>
<!-- End: Page Banner -->

<div class="container">
    <div class="row" style="margin-top: 10%;  width: 100%;">
        <!-- Start: Search Section -->
        <section class="search-filters" style="width: 100%">
            <div class="container">
                <div class="filter-box">
                    <h3>What are you looking for at the library?</h3>
                    <form action="http://libraria.demo.presstigers.com/index.html" method="get">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label class="sr-only" for="keywords">Search by Keyword</label>
                                <input class="form-control" placeholder="Search by Keyword" id="keywords" name="keywords" type="text">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                <select name="catalog" id="catalog" class="form-control">
                                    <option>Search the Catalog</option>
                                    <option>Catalog 01</option>
                                    <option>Catalog 02</option>
                                    <option>Catalog 03</option>
                                    <option>Catalog 04</option>
                                    <option>Catalog 05</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-2 col-sm-2">
                            <div class="form-group">
                                <input class="form-control" type="submit" value="Search">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </section>
        <!-- End: Search Section -->
    </div>

    <div class="row" >
<?php
$rows = (new dbhelper)->__getBooks();
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

        <div class="col-md-4" data-aos="slide-up" style="margin-top: 2%; margin-bottom: 2%; ">
            <figure class="card card-product" style="border: solid 1px grey">
                <div class="img-wrap " ><img style="width: 350px; height: 400px; animation-name: hvr-icon-pulse-grow; " src="books/'.$coverImg.'"></div>
                <figcaption class="info-wrap" style="margin-left: 4px; margin-top: 4px">
                    <h4 class="title">'.$title.'</h4>
                    <p class="desc">'.$description.'</p>
                    <div class="rating-wrap">
                        <div class="label-rating">'.$edition.' Edition</div>
                        <div class="label-rating">Author: '.$author.'  </div>
                    </div> <!-- rating-wrap.// -->
                </figcaption>
                <div class="bottom-wrap" style="margin-left: 4px; ">
                    <a href="book-details.php?id='.$bookId.'" class="btn btn-sm btn-primary float-right"  style="margin-bottom: 10px; margin-right: 6px; color: whitesmoke ">Order Now</a>
                    <div class="price-wrap h5">
                        <span class="price-new">Stock left '.$stock.'</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="" data-original-title="Like">
                            <i class="fa fa-heart"  style="font-size: 1.5em;"></i>
                        </a>

                    </div> <!-- price-wrap.// -->

                </div> <!-- bottom-wrap.// -->
            </figure>
        </div> ';
    }
    }
?>


</div>
</div>





<?php include_once 'footer.php'?>