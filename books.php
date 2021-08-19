<?php include_once 'header.php'?>
<style >
    @import url(https://fonts.googleapis.com/css?family=Open+Sans+Condensed:700);

    *, *::before, *::after {
        box-sizing: inherit;
    }

    .fc {
        position: relative;
        top: 50%;
        left: 50%;
        width: 270px;
        height: 410px;
        transform: translate(-50%, -50%);
        perspective: 1000px;
    }
    .fc__wrapper {
        position: relative;
        transform-style: preserve-3d;
        will-change: transform;
    }
    .fc__wrapper::after {
        display: block;
        position: absolute;
        z-index: -1;
        top: 100%;
        left: 0;
        right: 0;
        height: 23px;
        content: '';
        background: no-repeat;
    }
    .fc__thumb {
        display: block;
        width: 100%;
    }
    .fc__content {
        position: absolute;
        left: 42px;
        right: 42px;
        bottom: 48px;
        transform: translateZ(100px) scale(0.9);
    }
    .fc__content h1 {
        color: white;
        font-size: 2.4rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }
    .fc__content .caption {
        color: #b0976d;
        font-size: 1.2rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.2em;
    }
    .fc__light {
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        background-image: linear-gradient(45deg, black, transparent 40%);
        backface-visibility: hidden;
    }
    .fc__border {
        position: absolute;
        top: 16px;
        left: 16px;
        width: 238px;
        height: 378px;
        transform: translateZ(100px) scale(0.9);
    }
    .fc__border rect {
        fill: transparent;
        stroke: #777;
        stroke-width: 2px;
        stroke-dasharray: 0 1232px;
        stroke-dashoffset: -616px;
        transition: stroke-dasharray 0.25s ease-out, stroke-dashoffset 0.25s ease-out;
    }
    .fc:hover .fc__border rect {
        stroke-dasharray: 1232px;
        stroke-dashoffset: 0;
    }
    .heading-text{
        font-size: 26px;
        background: -webkit-linear-gradient(#1d1b1b, #d7975d);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 8px;
    }
    li{
        font-size: 17px;
    }
    .v-effect-link {
        list-style-type: none;
        margin: 0;
        padding: 0;
        text-align: center;
    }
    .v-effect-link li {
        display: inline-block;
        min-width: 5em;
        margin: 0 0.5em;
    }
    .v-effect-link a {
        text-decoration: none;
        display: block;
        font-family:Arial;
        position: relative;
        color: black;
        padding:.5em 0
    }
    .v-effect-link a:hover {
        color: #c69f73;
    }

    .v-effect-link a:hover:before {
        left: 0;
        width: 100%;
    }
    .v-effect-link a:before {
        content: "";
        position: absolute;
        width: 0;
        height: .5px;
        background-color: #c69f73;
        bottom: calc(-1px);
        right: 0;
        transition: all 0.3s cubic-bezier(0.785, 0.135, 0.15, 0.86);
    }
    .v-effect-link i{
        font-size: 30px;
    }


</style>
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

    <!-- Start: Book & Media Section -->
        <div style="margin-top: 7%; width: 100%; ">
                        <div class="row">
                            <!-- Start: Search Section -->
                            <section class="search-filters" style="width: 100%">
                                <div class="container">
                                    <div class="filter-box">
                                        <h3>What are you looking for at the library?</h3>
                                        <form action="http://libraria.demo.presstigers.com/index.html" method="get">
                                            <div class="col-md-4 col-sm-6">
                                                <div class="form-group">
                                                    <label class="sr-only" for="keywords">Search by Keyword</label>
                                                    <input class="form-control" placeholder="Search by Keyword" id="keywords" name="keywords" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-6">
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
                                            <div class="col-md-3 col-sm-6">
                                                <div class="form-group">
                                                    <select name="category" id="category" class="form-control">
                                                        <option>All Categories</option>
                                                        <option>Category 01</option>
                                                        <option>Category 02</option>
                                                        <option>Category 03</option>
                                                        <option>Category 04</option>
                                                        <option>Category 05</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-6">
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


                        <div class="row" style="margin-top: 4%; margin-left: 2%; margin-bottom: 2%">
                            <div class="col-md-6 col-lg-6 col-sm-6">
                                <div class="card" >
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-5 col-md-5 col-sm-5">
                                                <article class="fc" id="fc">
                                                    <div class="fc__wrapper">
                                                        <img src="data:image/jpeg;base64,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"
                                                             class="fc__thumb">
                                                        <div class="fc__content">
                                                            <h1>Floating Card</h1>
                                                            <span class="caption">by Dogstudio</span>
                                                        </div>
                                                        <span class="fc__light"></span>
                                                        <svg class="fc__border" xmlns="http://www.w3.org/2000/svg">
                                                            <rect height="100%" width="100%"/>
                                                        </svg>
                                                    </div>
                                                </article>
                                            </div>
                                            <div class="col-lg-7 col-md-7 col-sm-7">
                                                <h1 style="color: #0f1932; font-style: italic" class="heading-text">"This is the Title"</h1>
                                                <div class="row">
                                                    <div class="col ">

                                                        <ul>
                                                            <li><strong>Edition:</strong> First editio</li>
                                                            <li><strong>Author:</strong> F. Scott Fitzgerald</li>

                                                            <li><strong>Local Availability:</strong> 0 (of 1)</li>
                                                            <li> <strong>Rating: </strong>

                                                            </li>
                                                        </ul>
                                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                                                            alteration in some form, by injected humour, or randomised words which don't look even slightly
                                                            believable.</p>
                                                        <ul style="display:  inline-block; flex-direction: column;"  class="v-effect-link">
                                                            <li>
                                                                <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top"
                                                                   title="Add TO CART">
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Like">
                                                                    <i class="fa fa-heart"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Mail"><i
                                                                            class="fa fa-envelope"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Search">
                                                                    <i class="fa fa-search"></i>
                                                                </a>
                                                            </li>

                                                        </ul>
                                                        <h4 style="color: red">Currently  not  AVailable</h4>
                                                        <h5 style="color: #48ee0e">Availble on  2/02/2021</h5>
                                                        <hr>
                                                        <div class="row">

                                                            <div class="col" style="text-align: center; width: 100%">
                                                                <input type="button" style="text-align: center; width: 100%" class="btn btn-primary" value="Order Book">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="card-footer bg-whitesmoke">
                                        Footer Card
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-6" >

                                    <div class="card" >
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-5 col-md-5 col-sm-5">
                                                    <article class="fc" id="fc">
                                                        <div class="fc__wrapper">
                                                            <img src="data:image/jpeg;base64,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"
                                                                 class="fc__thumb">
                                                            <div class="fc__content">
                                                                <h1>Floating Card</h1>
                                                                <span class="caption">by Dogstudio</span>
                                                            </div>
                                                            <span class="fc__light"></span>
                                                            <svg class="fc__border" xmlns="http://www.w3.org/2000/svg">
                                                                <rect height="100%" width="100%"/>
                                                            </svg>
                                                        </div>
                                                    </article>
                                                </div>
                                                <div class="col-lg-7 col-md-7 col-sm-7">

                                                </div>

                                            </div>
                                        </div>
                                        <div class="card-footer bg-whitesmoke">
                                            Footer Card
                                        </div>
                                    </div>

                            </div>
                                <script>
                                    // window.addEventListener("load", function() {
                                    //     showList();
                                    // });
                                    // function showGrid() {
                                    //     var xhttp = new XMLHttpRequest();
                                    //     xhttp.onreadystatechange = function() {
                                    //         if (this.readyState == 4 && this.status == 200) {
                                    //             document.getElementById("bookView").innerHTML =
                                    //                 this.responseText;
                                    //             $("#grid").addClass("active");
                                    //             $("#list").removeClass("active");
                                    //         }
                                    //     };
                                    //     xhttp.open("GET", "books-grid-view.php", true);
                                    //     xhttp.send();
                                    // }
                                    // function showList() {
                                    //     var xhttp = new XMLHttpRequest();
                                    //     xhttp.onreadystatechange = function() {
                                    //         if (this.readyState == 4 && this.status == 200) {
                                    //             document.getElementById("bookView").innerHTML =
                                    //                 this.responseText;
                                    //
                                    //         }
                                    //     };
                                    //     xhttp.open("GET", "books-list-view.php", true);
                                    //     xhttp.send();
                                    // }


                                    var fc = document.getElementById("fc");
                                    var wrapper = fc.getElementsByClassName("fc__wrapper")[0];
                                    var light = fc.getElementsByClassName("fc__light")[0];

                                    var fcHalfHeight = 205;
                                    var fcHalfWidth = 135;

                                    var defaultLightWidth = 40;
                                    var defaultLightAngle = 45;

                                    var maxRotateX = 6;
                                    var maxRotateY = 6;
                                    var maxLightWidth = 25;
                                    var maxLightAngle = 20;

                                    var lightValue = {
                                        width: defaultLightWidth,
                                        angle: defaultLightAngle
                                    };

                                    wrapper.addEventListener("mousemove", function(event) {

                                        // Get mouse position
                                        var fcRect = fc.getBoundingClientRect();
                                        var fcOffset = {
                                            top: fcRect.top + document.body.scrollTop,
                                            left: fcRect.left + document.body.scrollLeft
                                        };
                                        var mouseX = (event.pageX - fcOffset.left) | 0;
                                        var mouseY = (event.pageY - fcOffset.top) | 0;

                                        // Move the floating card
                                        var diffX = -1 * (fcHalfWidth - mouseX);
                                        var diffY = fcHalfHeight - mouseY;
                                        var rotateX = diffY / fcHalfHeight * maxRotateX;
                                        var rotateY = diffX / fcHalfWidth * maxRotateY;

                                        dynamics.stop(wrapper);
                                        wrapper.style.transform = "rotateX(" + rotateX + "deg) rotateY(" + rotateY + "deg)";

                                        // Move the light
                                        lightValue.width = defaultLightWidth - (diffY / fcHalfHeight * maxLightWidth);
                                        lightValue.angle = defaultLightAngle + (diffX / fcHalfWidth * maxLightAngle);

                                        dynamics.stop(lightValue);
                                        light.style.backgroundImage = "linear-gradient(" + lightValue.angle + "deg, black, transparent " + lightValue.width + "%)";
                                    });

                                    wrapper.addEventListener("mouseleave", function() {
                                        // Move the floating card to its initial position
                                        dynamics.animate(wrapper, {
                                            rotateX: 0,
                                            rotateY: 0
                                        }, {
                                            type: dynamics.spring,
                                            duration: 1500
                                        });

                                        // Move the light to its initial position
                                        dynamics.animate(lightValue, {
                                            width: defaultLightWidth,
                                            angle: defaultLightAngle
                                        }, {
                                            type: dynamics.spring,
                                            duration: 1500,
                                            change: function(obj) {
                                                light.style.backgroundImage = "linear-gradient(" + obj.angle + "deg, black, transparent " + obj.width + "%)";
                                            }
                                        });
                                    });
                                    </script>


                        </div>
        </div>



    <!-- End: Books & Media Section -->

<?php include_once 'footer.php'?>