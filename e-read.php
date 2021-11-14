<?php include_once 'header.php';


if(isset($_GET['path'])){


$path =$_GET['path'];


?>
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
    <div oncontextmenu="this.preventDefault()" onclick="return false" id="pdf" style="margin-top: 1%; margin-bottom: 1%">
    <div id="obj_container">
        <object id="obj" oncontextmenu="this.preventDefault()" width="100%" height="800" type="application/pdf" data="books/pdf/<?php echo $path?>#zoom=85&scrollbar=0&toolbar=0&navpanes=0"  style=" cursor: none">
            <p>Unable to open the doccument :(.</p>
        </object>
        <div id="obj_overlay"></div>
    </div>


    </div>

    <script>

        document.addEventListener('contextmenu', event => event.preventDefault());
    </script>
<?php


}

include_once 'footer.php' ?>