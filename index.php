<?php include_once 'header.php'?>

<script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
<!-- Start: Slider Section -->
<div data-ride="carousel" class="carousel slide" id="home-v1-header-carousel">

    <!-- Carousel slides -->
    <div class="carousel-inner" >

        <div class="item active">
            <figure>
                <img alt="Home Slide" src="images/header-slider/home-v1/header-slide.jpg" />
            </figure>
            <div class="container">
                <div class="carousel-caption">
                    <h3>Online Learning Anytime, Anywhere!</h3>
                    <h2>Discover Your Roots</h2>
                    <p>The Full Packed Srinivas University Library. You can Browse through thousands of our library books, order form comfort of your place</p>
                </div>
            </div>
        </div>

    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#home-v1-header-carousel" data-slide="prev"></a>
    <a class="right carousel-control" href="#home-v1-header-carousel" data-slide="next"></a>


</div>
<!-- End: Slider Section -->

<!-- Start: Search Section -->
<section class="search-filters">
    <div class="container">
        <div class="filter-box">
            <h3>What are you looking for at the library?</h3>
            <form id="search-from" action="" method="post" name="search-form " enctype="multipart/form-data">
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <label class="sr-only" for="keywords">Search by Keyword</label>
                        <input class="form-control" placeholder="Search by Keyword" id="keywords" name="keywords" type="text">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="form-group">
                        <select name="catalog" id="catalog" class="form-control">
                            <option value="0">Search the Department</option>
                            <option value="1">Computer Science</option>
                            <option value="2">Business</option>
                            <option value="3">physiotherapy</option>
                            <option value="4">Animation</option>
                            <option value="5">Hotel Management</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-2 col-sm-2">
                    <div class="form-group" style="width: 100%; height: 100%">
                        <input  style="width: 100%; height: 100%" class="btn btn-primary" type="submit" name="submit" id="btn"  value="Search">
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- End: Search Section -->
<script>
    // function loadDoc() {
    //     var xhttp = new XMLHttpRequest();
    //     xhttp.onreadystatechange = function() {
    //         // if (this.readyState == 4 && this.status == 200) {
    //         //     document.getElementById("demo").innerHTML =
    //         //         this.responseText;
    //         // }
    //     };
    //     xhttp.open("GET", "https://reqres.in/api/products/3", true);
    //     xhttp.onload = function(){
    //         var Rdata = JSON.parse(xhttp.responseText);
    //         document.getElementById("demo").innerHTML =
    //             Rdata.data.id;
    //     }
    //     xhttp.send();
    // }



    // $(document).ready(function () {
    //     $("#btn").click(function () {
    //         $("#cart-item").html("40");
    //     });
    //
    // });
    //



    $("#search-from").on('submit',function (e) {
        e.preventDefault();
        var keywords = $('#keywords').val();
        var deparmentVal = $('#catalog').val();
        var department="";
        if(deparmentVal !== 0){
            department = $('#catalog').children(':selected').text();;
        }
        window.location.href = "books-list-view.php?keyword="+keywords+"&department="+department;
    });

    // document.addEventListener('keydown', function (e) {
    //     if (e.keyCode == 119) { // F8
    //         debugger;
    //     }
    // }, {
    //     capture: true
    // });

</script>
<!-- Start: Welcome Section -->
<section class="welcome-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="welcome-wrap">
                    <div class="welcome-text">
                        <h2 class="section-title">Welcome to the SuLibrary</h2>
                        <span class="underline left"></span>
                        <p class="lead">Welcome to the whole new way of ordering books</p>
                        <p>We Have covered almost all the areas to provide all the book our students need, we will continue to work to bring more features which will help students to make effective use of our resources. </p>
<!--                        <a class="btn btn-primary" href="#">Read More</a>-->
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="facts-counter">
                    <ul>
                        <li class="bg-light-green">
                            <div class="fact-item">
                                <div class="fact-icon">
                                    <i class="ebook"></i>
                                </div>
                                <?php
                                $totalBooks=(new dbhelper)->__totalBooks();
                                ?>
                                <span>Books<strong class="fact-counter"><?php echo $totalBooks?></strong></span>
                            </div>
                        </li>
                        <li class="bg-green">
                            <div class="fact-item">
                                <div class="fact-icon">
                                    <i class="eaudio"></i>
                                </div>
                                <?php
                                $totalBooks=(new dbhelper)->__totalBooks();
                                ?>
                                <span>eBooks<strong class="fact-counter"><?php echo $totalBooks?></strong></span>
                            </div>
                        </li>
                        <li class="bg-red">
                            <div class="fact-item">
                                <div class="fact-icon">
                                    <i class="magazine"></i>
                                </div>
                                <span>Research Blogs<strong class="fact-counter">9</strong></span>
                            </div>
                        </li>
                        <li class="bg-blue">
                            <div class="fact-item">
                                <div class="fact-icon">
                                    <i class="magazine"></i>
                                </div>
                                <span>latest news</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="welcome-image"></div>
</section>
<!-- End: Welcome Section -->

<!-- Start: Category Filter -->
<section class="category-filter section-padding">
    <div class="container">
        <div class="center-content">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h2 class="section-title">Research Blogs</h2>
                    <span class="underline center"></span>
                    <p class="lead">Collection of Research blogs for our students all in one place.</p>
                </div>
            </div>
        </div>
<!--        <div class="filter-buttons">-->
<!--            <div class="filter btn" data-filter="all">All Releases</div>-->
<!--            <div class="filter btn" data-filter=".adults">Adults</div>-->
<!--            <div class="filter btn" data-filter=".kids-teens">Kids &amp; Teens</div>-->
<!--            <div class="filter btn" data-filter=".video">Video</div>-->
<!--            <div class="filter btn" data-filter=".audio">Audio</div>-->
<!--            <div class="filter btn" data-filter=".books">Books</div>-->
<!--            <div class="filter btn" data-filter=".magazines">Magazines</div>-->
<!--        </div>-->
    </div>
    <div id="category-filter">
        <ul class="category-list">
            <li class="category-item ">
                <figure>
                    <img src="images/Research/researchgate.png" style="width:500px;height:260px;" />
                    <figcaption class="bg-orange">
                        <div class="info-block">
                            <h4>Research Gate</h4>
                            <div class="rating">
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                            </div>
                            <p>ResearchGate is a European commercial social networking site for scientists and researchers to share papers, ask and answer questions, and find collaborators </p>
                            <a href="https://www.researchgate.net/" target="_blank">Visit for more <i class="fa fa-long-arrow-right"></i></a>

                        </div>
                    </figcaption>
                </figure>
            </li>
            <li class="category-item ">
                <figure>
                    <img src="images/Research/google%20scholor.png"  style="width:500px;height:260px;"/>
                    <figcaption class="bg-orange">
                        <div class="info-block">
                            <h4>Google Scholar</h4>
                            <div class="rating">
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                            </div>
                            <p>Google Scholar is a freely accessible web search engine that indexes the full text or metadata of scholarly literature across an array of publishing formats and disciplines. </p>
                            <a href="https://scholar.google.com/" target="_blank">Visit for more <i class="fa fa-long-arrow-right"></i></a>

                        </div>
                    </figcaption>
                </figure>
            </li>
            <li class="category-item ">
                <figure>
                    <img src="images/Research/academia-edu-750.jpg" style="width:500px;height:260px;" />
                    <figcaption class="bg-orange">
                        <div class="info-block">
                            <h4>Academia.edu</h4>
                            <div class="rating">
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                            </div>
                            <p>Academia.edu is an American for-profit social networking website for academics. It began as a free and open repository of academic journal articles and registered a .edu domain name when this was not limited to educational institutions. </p>
                            <a href="https://www.academia.edu/" target="_blank">Visit for more <i class="fa fa-long-arrow-right"></i></a>

                        </div>
                    </figcaption>
                </figure>
            </li>
            <li class="category-item ">
                <figure>
                    <img src="images/Research/zenodo.png" style="width:500px;height:260px;" />
                    <figcaption class="bg-orange">
                        <div class="info-block">
                            <h4>Zenodo</h4>
                            <div class="rating">
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                            </div>
                            <p>Zenodo is a general-purpose open-access repository developed under the European OpenAIRE program and operated by CERN. It allows researchers to deposit research papers, data sets, research software, reports, and any other research related digital artifacts </p>
                            <a href="https://zenodo.org/" target="_blank">Visit for more <i class="fa fa-long-arrow-right"></i></a>

                        </div>
                    </figcaption>
                </figure>
            </li>
            <br>
            <li class="category-item ">
                <figure>
                    <img src="images/Research/ssrn.jpg" style="width:500px;height:260px;" />
                    <figcaption class="bg-orange">
                        <div class="info-block">
                            <h4>SSRN</h4>
                            <div class="rating">
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                            </div>
                            <p> The SSRN, formerly known as Social Science Research Network, is a repository for preprints devoted to the rapid dissemination of scholarly research in the social sciences and humanities and more.</p>
                                <a href="https://www.ssrn.com/index.cfm/en/" target="_blank">Visit for more <i class="fa fa-long-arrow-right"></i></a>

                        </div>
                    </figcaption>
                </figure>
            </li>
            <li class="category-item ">
                <figure>
                    <img src="images/Research/DRj.jpg" style="width:500px;height:260px;" />
                    <figcaption class="bg-orange">
                        <div class="info-block">
                            <h4>DRJI</h4>
                            <div class="rating">
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                            </div>
                            <p>DRJI provides ready access to education literature to support the use of educational research and information to improve practice in learning, teaching, educational decision-making, and research. Directory of Research Journals Indexing is a free online service that helps you to find web resources for your articles and research </p>
                            <a href="https://www.researchgate.net/" target="_blank">Visit for more <i class="fa fa-long-arrow-right"></i></a>

                        </div>
                    </figcaption>
                </figure>
            </li>
            <li class="category-item ">
                <figure>
                    <img src="images/Research/sfdora.png" style="width:500px;height:260px;" />
                    <figcaption class="bg-orange">
                        <div class="info-block">
                            <h4>Signature of dora</h4>
                            <div class="rating">
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                            </div>
                            <p>The San Francisco Declaration on Research Assessment intends to halt the practice of correlating the journal impact factor to the merits of a specific scientist's contributions. </p>
                            <a href="https://sfdora.org/" target="_blank">Visit for more <i class="fa fa-long-arrow-right"></i></a>

                        </div>
                    </figcaption>
                </figure>
            </li>
            <li class="category-item ">
                <figure>
                    <img src="images/Research/crossref.jpeg" style="width:500px;height:260px;" />
                    <figcaption class="bg-orange">
                        <div class="info-block">
                            <h4>Crossref</h4>
                            <div class="rating">
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                            </div>
                            <p>Crossref is an official Digital Object Identifier Registration Agency of the International DOI Foundation. </p>
                            <a href="https://www.crossref.org/" target="_blank">Visit for more <i class="fa fa-long-arrow-right"></i></a>

                        </div>
                    </figcaption>
                </figure>
            </li>
            <li class="category-item ">
                <figure>
                    <img src="images/Research/sherparomeo.png" style="width:500px;height:260px;" />
                    <figcaption class="bg-orange">
                        <div class="info-block">
                            <h4>SHERPA/RoMEO</h4>
                            <div class="rating">
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                            </div>
                            <p>SHERPA/RoMEO is a service run by SHERPA to show the copyright and open access self-archiving policies of academic journals. The database used a colour-coding scheme to classify publishers according to their self-archiving policy </p>
                            <a href="https://v2.sherpa.ac.uk/romeo/" target="_blank">Visit for more <i class="fa fa-long-arrow-right"></i></a>

                        </div>
                    </figcaption>
                </figure>
            </li>
            <li class="category-item ">
                <figure>
                    <img src="images/Research/road.png" style="width:500px;height:260px;" />
                    <figcaption class="bg-orange">
                        <div class="info-block">
                            <h4>ROAD</h4>
                            <div class="rating">
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                            </div>
                            <p> </p>
                            <a href="https://road.issn.org/" target="_blank">Visit for more <i class="fa fa-long-arrow-right"></i></a>

                        </div>
                    </figcaption>
                </figure>
            </li>



        </ul>
        <div class="center-content">
            <a href="#" class="btn btn-primary">View More</a>
        </div>
        <div class="clearfix"></div>
    </div>
</section>
<!-- Start: Category Filter -->
<!---->
<!--Start: Features -->
<!--<section class="features">-->
<!--    <div class="container">-->
<!--        <ul>-->
<!--            <li class="bg-yellow">-->
<!--                <div class="feature-box">-->
<!--                    <i class="yellow"></i>-->
<!--                    <h3>Books</h3>-->
<!--                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dolor turpis, pulvinar varius dui id, convallis iaculis eros.</p>-->
<!--                    <a class="yellow" href="#">-->
<!--                        View Selection <i class="fa fa-long-arrow-right"></i>-->
<!--                    </a>-->
<!--                </div>-->
<!--            </li>-->
<!--            <li class="bg-light-green">-->
<!--                <div class="feature-box">-->
<!--                    <i class="light-green"></i>-->
<!--                    <h3>eBooks</h3>-->
<!--                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dolor turpis, pulvinar varius dui id, convallis iaculis eros.</p>-->
<!--                    <a class="light-green" href="#">-->
<!--                        View Selection <i class="fa fa-long-arrow-right"></i>-->
<!--                    </a>-->
<!--                </div>-->
<!--            </li>-->
<!--            <li class="bg-blue">-->
<!--                <div class="feature-box">-->
<!--                    <i class="blue"></i>-->
<!--                    <h3>DVDs</h3>-->
<!--                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dolor turpis, pulvinar varius dui id, convallis iaculis eros.</p>-->
<!--                    <a class="blue" href="#">-->
<!--                        View Selection <i class="fa fa-long-arrow-right"></i>-->
<!--                    </a>-->
<!--                </div>-->
<!--            </li>-->
<!--            <li class="bg-red">-->
<!--                <div class="feature-box">-->
<!--                    <i class="red"></i>-->
<!--                    <h3>Magazines</h3>-->
<!--                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dolor turpis, pulvinar varius dui id, convallis iaculis eros.</p>-->
<!--                    <a class="red" href="#">-->
<!--                        View Selection <i class="fa fa-long-arrow-right"></i>-->
<!--                    </a>-->
<!--                </div>-->
<!--            </li>-->
<!--            <li class="bg-violet">-->
<!--                <div class="feature-box">-->
<!--                    <i class="violet"></i>-->
<!--                    <h3>Audio</h3>-->
<!--                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dolor turpis, pulvinar varius dui id, convallis iaculis eros.</p>-->
<!--                    <a class="violet" href="#">-->
<!--                        View Selection <i class="fa fa-long-arrow-right"></i>-->
<!--                    </a>-->
<!--                </div>-->
<!--            </li>-->
<!--            <li class="bg-green">-->
<!--                <div class="feature-box">-->
<!--                    <i class="green"></i>-->
<!--                    <h3>eAudio</h3>-->
<!--                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dolor turpis, pulvinar varius dui id, convallis iaculis eros.</p>-->
<!--                    <a class="green" href="#">-->
<!--                        View Selection <i class="fa fa-long-arrow-right"></i>-->
<!--                    </a>-->
<!--                </div>-->
<!--            </li>-->
<!--        </ul>-->
<!--    </div>-->
<!--</section>-->
<!-- End: Features -->

<!-- Start: Newsletter -->
<section class="newsletter section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="center-content">
                    <h2 class="section-title">Subscribe to our Journal</h2>
                    <span class="underline center"></span>
                    <p class="lead">subscribe to the Srinivas publications using email</p>
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Enter your Email!" id="newsletter" name="newsletter" type="email">
                    <input class="form-control" value="Subscribe" type="submit">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End: Newsletter -->

<!-- Start: Meet Staff -->
<section class="team section-padding">
    <div class="container">
        <div class="center-content">
            <h2 class="section-title">Meet Our FACULTY</h2>
            <span class="underline center"></span>
            <p class="lead">Learn From Best.</p>
        </div>
        <div class="team-list">
            <div class="team-member">
                <figure>
                    <img src="images/faculty/Dr. P. S. Aithal VC.jpg" style="width:500px;height:290px;" alt="team" />
                </figure>
                <div class="content-block">
                    <div class="member-info">
                        <h4>Dr. P. S. Aithal</h4>
                        <span class="designation">vice chancellor</span>
                        <ul class="social">
                            <li>
                                <a href="#" target="_blank">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" target="_blank">
                                    <i class="fa fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" target="_blank">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" target="_blank">
                                    <i class="fa fa-skype"></i>
                                </a>
                            </li>
                        </ul>
                        <p>The comment will be added here.. </p>
                        <a class="btn btn-primary" href="https://scholar.google.co.in/citations?user=D_OJe4sAAAAJ&hl=en">Google Scholor</a>
                    </div>
                </div>
            </div>
            <div class="team-member">
                <figure>
                    <img src="images/faculty/Subramanya-Bhat.jpg" style="width:500px;height:290px;" alt="team" />
                </figure>
                <div class="content-block">
                    <div class="member-info">
                        <h4>Subramanya Bhat</h4>
                        <span class="designation">Principal CCIS</span>
                        <ul class="social">
                            <li>
                                <a href="#" target="_blank">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" target="_blank">
                                    <i class="fa fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" target="_blank">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" target="_blank">
                                    <i class="fa fa-skype"></i>
                                </a>
                            </li>
                        </ul>
                        <p>The comment will be added here</p>
                        <a class="btn btn-primary" href="https://scholar.google.com/citations?user=9RRFgkEAAAAJ&hl=en">Google Scholar</a>
                    </div>
                </div>
            </div>
            <div class="team-member">
                <figure>
                    <img src="images/faculty/Vaikunt-Pai.jpg"  style="width:500px;height:290px;"alt="team" />
                </figure>
                <div class="content-block">
                    <div class="member-info">
                        <h4>Vaikunt Pai</h4>
                        <span class="designation">Head Of Department MCA</span>
                        <ul class="social">
                            <li>
                                <a href="#" target="_blank">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" target="_blank">
                                    <i class="fa fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" target="_blank">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" target="_blank">
                                    <i class="fa fa-skype"></i>
                                </a>
                            </li>
                        </ul>
                        <p>The comment will be added here...</p>
                        <a class="btn btn-primary" href="https://scholar.google.co.in/citations?user=ffm78Y4AAAAJ&hl=en">Google Scholar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End: Meet Staff -->

<!---->
<!-- Start: Our Community Section -->
<!--<section class="community-testimonial">-->
<!--    <div class="container">-->
<!--        <div class="text-center">-->
<!--            <h2 class="section-title">Words From our Community</h2>-->
<!--            <span class="underline center"></span>-->
<!--            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>-->
<!--        </div>-->
<!--        <div class="owl-carousel">-->
<!--            <div class="single-testimonial-box">-->
<!--                <div class="top-portion">-->
<!--                    <img src="images/testimonial-image-01.jpg" alt="Testimonial Image" />-->
<!--                    <div class="user-comment">-->
<!--                        <div class="arrow-left"></div>-->
<!--                        <blockquote cite="#">-->
<!--                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent urna magna, rhoncus eget commodo et, dignissim non nulla. Sed sit amet vestibulum ex. Donec dolor velit-->
<!--                        </blockquote>-->
<!--                    </div>-->
<!--                    <div class="clear"></div>-->
<!--                </div>-->
<!--                <div class="bottom-portion">-->
<!--                    <a href="#" class="author">-->
<!--                        Adrey Pachai <small>(Student )</small>-->
<!--                    </a>-->
<!--                    <div class="social-share-links">-->
<!--                        <ul>-->
<!--                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>-->
<!--                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>-->
<!--                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>-->
<!--                            <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>-->
<!--                            <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                    <div class="clearfix"></div>-->
<!--                </div>-->
<!--                <div class="clearfix"></div>-->
<!--            </div>-->
<!--            <div class="single-testimonial-box">-->
<!--                <div class="top-portion">-->
<!--                    <img src="images/testimonial-image-02.jpg" alt="Testimonial Image" />-->
<!--                    <div class="user-comment">-->
<!--                        <div class="arrow-left"></div>-->
<!--                        <blockquote cite="#">-->
<!--                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent urna magna, rhoncus eget commodo et, dignissim non nulla. Sed sit amet vestibulum ex. Donec dolor velit-->
<!--                        </blockquote>-->
<!--                    </div>-->
<!--                    <div class="clear"></div>-->
<!--                </div>-->
<!--                <div class="bottom-portion">-->
<!--                    <a href="#" class="author">-->
<!--                        Maria B <small>(Student )</small>-->
<!--                    </a>-->
<!--                    <div class="social-share-links">-->
<!--                        <ul>-->
<!--                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>-->
<!--                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>-->
<!--                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>-->
<!--                            <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>-->
<!--                            <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                    <div class="clearfix"></div>-->
<!--                </div>-->
<!--                <div class="clearfix"></div>-->
<!--            </div>-->
<!--            <div class="single-testimonial-box">-->
<!--                <div class="top-portion">-->
<!--                    <img src="images/testimonial-image-01.jpg" alt="Testimonial Image" />-->
<!--                    <div class="user-comment">-->
<!--                        <div class="arrow-left"></div>-->
<!--                        <blockquote cite="#">-->
<!--                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent urna magna, rhoncus eget commodo et, dignissim non nulla. Sed sit amet vestibulum ex. Donec dolor velit-->
<!--                        </blockquote>-->
<!--                    </div>-->
<!--                    <div class="clear"></div>-->
<!--                </div>-->
<!--                <div class="bottom-portion">-->
<!--                    <a href="#" class="author">-->
<!--                        Adrey Pachai <small>(Student )</small>-->
<!--                    </a>-->
<!--                    <div class="social-share-links">-->
<!--                        <ul>-->
<!--                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>-->
<!--                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>-->
<!--                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>-->
<!--                            <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>-->
<!--                            <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                    <div class="clearfix"></div>-->
<!--                </div>-->
<!--                <div class="clearfix"></div>-->
<!--            </div>-->
<!--            <div class="single-testimonial-box">-->
<!--                <div class="top-portion">-->
<!--                    <img src="images/testimonial-image-02.jpg" alt="Testimonial Image" />-->
<!--                    <div class="user-comment">-->
<!--                        <div class="arrow-left"></div>-->
<!--                        <blockquote cite="#">-->
<!--                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent urna magna, rhoncus eget commodo et, dignissim non nulla. Sed sit amet vestibulum ex. Donec dolor velit-->
<!--                        </blockquote>-->
<!--                    </div>-->
<!--                    <div class="clear"></div>-->
<!--                </div>-->
<!--                <div class="bottom-portion">-->
<!--                    <a href="#" class="author">-->
<!--                        Maria B <small>(Student )</small>-->
<!--                    </a>-->
<!--                    <div class="social-share-links">-->
<!--                        <ul>-->
<!--                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>-->
<!--                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>-->
<!--                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>-->
<!--                            <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>-->
<!--                            <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                    <div class="clearfix"></div>-->
<!--                </div>-->
<!--                <div class="clearfix"></div>-->
<!--            </div>-->
<!--            <div class="single-testimonial-box">-->
<!--                <div class="top-portion">-->
<!--                    <img src="images/testimonial-image-01.jpg" alt="Testimonial Image" />-->
<!--                    <div class="user-comment">-->
<!--                        <div class="arrow-left"></div>-->
<!--                        <blockquote cite="#">-->
<!--                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent urna magna, rhoncus eget commodo et, dignissim non nulla. Sed sit amet vestibulum ex. Donec dolor velit-->
<!--                        </blockquote>-->
<!--                    </div>-->
<!--                    <div class="clear"></div>-->
<!--                </div>-->
<!--                <div class="bottom-portion">-->
<!--                    <a href="#" class="author">-->
<!--                        Adrey Pachai <small>(Student )</small>-->
<!--                    </a>-->
<!--                    <div class="social-share-links">-->
<!--                        <ul>-->
<!--                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>-->
<!--                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>-->
<!--                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>-->
<!--                            <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>-->
<!--                            <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                    <div class="clearfix"></div>-->
<!--                </div>-->
<!--                <div class="clearfix"></div>-->
<!--            </div>-->
<!--            <div class="single-testimonial-box">-->
<!--                <div class="top-portion">-->
<!--                    <img src="images/testimonial-image-02.jpg" alt="Testimonial Image" />-->
<!--                    <div class="user-comment">-->
<!--                        <div class="arrow-left"></div>-->
<!--                        <blockquote cite="#">-->
<!--                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent urna magna, rhoncus eget commodo et, dignissim non nulla. Sed sit amet vestibulum ex. Donec dolor velit-->
<!--                        </blockquote>-->
<!--                    </div>-->
<!--                    <div class="clear"></div>-->
<!--                </div>-->
<!--                <div class="bottom-portion">-->
<!--                    <a href="#" class="author">-->
<!--                        Maria B <small>(Student )</small>-->
<!--                    </a>-->
<!--                    <div class="social-share-links">-->
<!--                        <ul>-->
<!--                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>-->
<!--                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>-->
<!--                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>-->
<!--                            <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>-->
<!--                            <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                    <div class="clearfix"></div>-->
<!--                </div>-->
<!--                <div class="clearfix"></div>-->
<!--            </div>-->
<!--            <div class="single-testimonial-box">-->
<!--                <div class="top-portion">-->
<!--                    <img src="images/testimonial-image-01.jpg" alt="Testimonial Image" />-->
<!--                    <div class="user-comment">-->
<!--                        <div class="arrow-left"></div>-->
<!--                        <blockquote cite="#">-->
<!--                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent urna magna, rhoncus eget commodo et, dignissim non nulla. Sed sit amet vestibulum ex. Donec dolor velit-->
<!--                        </blockquote>-->
<!--                    </div>-->
<!--                    <div class="clear"></div>-->
<!--                </div>-->
<!--                <div class="bottom-portion">-->
<!--                    <a href="#" class="author">-->
<!--                        Adrey Pachai <small>(Student )</small>-->
<!--                    </a>-->
<!--                    <div class="social-share-links">-->
<!--                        <ul>-->
<!--                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>-->
<!--                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>-->
<!--                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>-->
<!--                            <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>-->
<!--                            <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                    <div class="clearfix"></div>-->
<!--                </div>-->
<!--                <div class="clearfix"></div>-->
<!--            </div>-->
<!--            <div class="single-testimonial-box">-->
<!--                <div class="top-portion">-->
<!--                    <img src="images/testimonial-image-02.jpg" alt="Testimonial Image" />-->
<!--                    <div class="user-comment">-->
<!--                        <div class="arrow-left"></div>-->
<!--                        <blockquote cite="#">-->
<!--                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent urna magna, rhoncus eget commodo et, dignissim non nulla. Sed sit amet vestibulum ex. Donec dolor velit-->
<!--                        </blockquote>-->
<!--                    </div>-->
<!--                    <div class="clear"></div>-->
<!--                </div>-->
<!--                <div class="bottom-portion">-->
<!--                    <a href="#" class="author">-->
<!--                        Maria B <small>(Student )</small>-->
<!--                    </a>-->
<!--                    <div class="social-share-links">-->
<!--                        <ul>-->
<!--                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>-->
<!--                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>-->
<!--                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>-->
<!--                            <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>-->
<!--                            <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                    <div class="clearfix"></div>-->
<!--                </div>-->
<!--                <div class="clearfix"></div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!-- End: Our Community Section -->


<!-- Start: Social Network -->
<section class="social-network section-padding">
    <div class="container">
        <div class="center-content">
            <h2 class="section-title">Follow Us</h2>
            <span class="underline center"></span>
            <p class="lead">Srinivas university</p>
        </div>
        <ul>
            <li>
                <a class="facebook" href="#" target="_blank">
                            <span>
                                <i class="fa fa-facebook-f"></i>
                            </span>
                </a>
            </li>
            <li>
                <a class="twitter" href="#" target="_blank">
                            <span>
                                <i class="fa fa-twitter"></i>
                            </span>
                </a>
            </li>
            <li>
                <a class="google" href="#" target="_blank">
                            <span>
                                <i class="fa fa-google-plus"></i>
                            </span>
                </a>
            </li>
            <li>
                <a class="rss" href="#" target="_blank">
                            <span>
                                <i class="fa fa-rss"></i>
                            </span>
                </a>
            </li>
            <li>
                <a class="linkedin" href="#" target="_blank">
                            <span>
                                <i class="fa fa-linkedin"></i>
                            </span>
                </a>
            </li>
            <li>
                <a class="youtube" href="#" target="_blank">
                            <span>
                                <i class="fa fa-youtube"></i>
                            </span>
                </a>
            </li>
        </ul>
    </div>
</section>
<!-- End: Social Network -->
<?php include_once 'footer.php' ?>
