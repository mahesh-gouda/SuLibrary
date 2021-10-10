<?php include_once 'header.php';


if(isset($_GET['path'])){


$path =$_GET['path'];


?>
    <!-- Start: Page Banner -->
    <section class="page-banner services-banner">
        <div class="container">
            <div class="banner-header">
                <h2>Books & Media Listing</h2>
                <span class="underline center"></span>
                <p class="lead">Search for the book you need.</p>
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

    <div id="pdf" style="margin-top: 1%; margin-bottom: 1%">
        <object width="100%" height="800" type="application/pdf" data="books/pdf/<?php echo $path?>#zoom=85&scrollbar=0&toolbar=0&navpanes=0" id="pdf_content" style="pointer-events: none;">
            <p>Insert your error message here, if the PDF cannot be displayed.</p>
        </object>
    </div>
<?php


}

include_once 'footer.php' ?>