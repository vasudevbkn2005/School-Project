<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>School</title>

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css2/bootstrap.css" />

    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css2/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css2/responsive.css" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Bundle with Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        <header class="header_section">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg custom_nav-container">
                    <a class="navbar-brand" href="index.html">
                        <img src="images2/logo.png" alt="" />
                        <span>
                            School
                        </span>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav  ">
                            <li class="nav-item active">
                                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/about"> About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/teacherdesign">Teacher </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/studentdesign"> Student </a>
                            </li>
                        </ul>
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item">
                                    <a id="navbarDropdown" class="nav-link" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div aria-labelledby="navbarDropdown" class="nav-item">
                                        <a class="dropdown-item" style="color: white; text-align: center"
                                            href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                    <div>
                        <div class="custom_menu-btn ">
                            <button>
                                <span class=" s-1">

                                </span>
                                <span class="s-2">

                                </span>
                                <span class="s-3">

                                </span>
                            </button>
                        </div>
                    </div>

                </nav>
            </div>
        </header>
        <!-- end header section -->
        <!-- slider section -->
        <section class="slider_section ">
            <div class="carousel_btn-container">
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">01</li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1">02</li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2">03</li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-5 offset-md-1">
                                    <div class="detail-box">
                                        <h1>
                                            You Can <br>
                                            See Our <br>
                                            School
                                        </h1>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, velit
                                            cum porro voluptate eligendi vitae delectus consectetur eaque ea mollitia
                                            ipsam maxime eos quasi dolores deserunt placeat assumenda corrupti quaerat.
                                        </p>
                                        <div class="btn-box">
                                            <a href="" class="btn-1">
                                                About Us
                                            </a>
                                            <a href="" class="btn-2">
                                                Get A Quote
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="offset-md-1 col-md-4 img-container">
                                    <div class="img-box">
                                        <img src="images2/slider-img.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item ">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-5 offset-md-1">
                                    <div class="detail-box">
                                        <h1>
                                            You Can <br>
                                            Hire Freelancer <br>
                                            Here
                                        </h1>
                                        <p>
                                            It is a long established fact that a reader will be distracted by
                                            the readable content of a page
                                        </p>
                                        <div class="btn-box">
                                            <a href="" class="btn-1">
                                                About Us
                                            </a>
                                            <a href="" class="btn-2">
                                                Get A Quote
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="offset-md-1 col-md-4 img-container">
                                    <div class="img-box">
                                        <img src="images2/slider-img.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item ">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-5 offset-md-1">
                                    <div class="detail-box">
                                        <h1>
                                            You Can <br>
                                            Hire Freelancer <br>
                                            Here
                                        </h1>
                                        <p>
                                            It is a long established fact that a reader will be distracted by
                                            the readable content of a page
                                        </p>
                                        <div class="btn-box">
                                            <a href="" class="btn-1">
                                                About Us
                                            </a>
                                            <a href="" class="btn-2">
                                                Get A Quote
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="offset-md-1 col-md-4 img-container">
                                    <div class="img-box">
                                        <img src="images2/slider-img.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section>
        <!-- end slider section -->
    </div>


    <!-- experience section -->

    <section class="experience_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="img-box">
                        <img src="images2/experience-img.jpg" alt="">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="detail-box">
                        <div class="heading_container">
                            <h2>
                                Best Experinced Freelancer Here
                            </h2>
                        </div>
                        <p>
                            It is a long established fact that a reader will be distracted by the readable content of a
                            page when looking at its layout. The point of using Lorem Ipsum is that it has a
                            more-or-less normal distribution of letters, as
                        </p>
                        <div class="btn-box">
                            <a href="" class="btn-1">
                                Read More
                            </a>
                            <a href="" class="btn-2">
                                Hire
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- end experience section -->

    <!-- category section -->

    <section class="category_section layout_padding">
        <div class="container">
            <div class="heading_container">
                <h2>
                    Category
                </h2>
            </div>
            <div class="category_container">
                <div class="box">
                    <div class="img-box">
                        <img src="images2/c1.png" alt="">
                    </div>
                    <div class="detail-box">
                        <h5>
                            Design & Arts
                        </h5>
                    </div>
                </div>
                <div class="box">
                    <div class="img-box">
                        <img src="images2/c2.png" alt="">
                    </div>
                    <div class="detail-box">
                        <h5>
                            Web Development
                        </h5>
                    </div>
                </div>
                <div class="box">
                    <div class="img-box">
                        <img src="images2/c3.png" alt="">
                    </div>
                    <div class="detail-box">
                        <h5>
                            SEO Markting
                        </h5>
                    </div>
                </div>
                <div class="box">
                    <div class="img-box">
                        <img src="images2/c4.png" alt="">
                    </div>
                    <div class="detail-box">
                        <h5>
                            Video Edting
                        </h5>
                    </div>
                </div>
                <div class="box">
                    <div class="img-box">
                        <img src="images2/c5.png" alt="">
                    </div>
                    <div class="detail-box">
                        <h5>
                            Logo Design
                        </h5>
                    </div>
                </div>
                <div class="box">
                    <div class="img-box">
                        <img src="images2/c6.png" alt="">
                    </div>
                    <div class="detail-box">
                        <h5>
                            Game Design
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- end category section -->

    <!-- about section -->

    <section class="about_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-9 mx-auto">
                    <div class="img-box">
                        <img src="images2/about-img.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="detail-box">
                <h2>
                    About Spering Company
                </h2>
                <p>
                    There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                    alteration in some form, by injected humour, or randomised words which don't look even slightly
                    believable. If youThere are many variations of passages of Lorem Ipsum available, but the majority
                    have suffered alteration in some form, by injected humour, or randomised words which don't look even
                    slightly believable. If you
                </p>
                <a href="">
                    Read More
                </a>
            </div>
        </div>
    </section>

    <!-- end about section -->

    <!-- freelance section -->

    <section class="freelance_section ">
        <div id="accordion">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-5 offset-md-1">
                        <div class="detail-box">
                            <div class="heading_container">
                                <h2>
                                    Work Freelaner Has Done
                                </h2>
                            </div>
                            <div class="tab_container">
                                <div class="t-link-box" data-toggle="collapse" data-target="#collapseOne"
                                    aria-expanded="true" aria-controls="collapseOne">
                                    <div class="img-box">
                                        <img src="images2/f1.png" alt="">
                                    </div>
                                    <div class="detail-box">
                                        <h5>
                                            $250 Million
                                        </h5>
                                        <h3>
                                            Paid to Freelancers
                                        </h3>
                                    </div>
                                </div>
                                <div class="t-link-box collapsed" data-toggle="collapse" data-target="#collapseTwo"
                                    aria-expanded="false" aria-controls="collapseTwo">
                                    <div class="img-box">
                                        <img src="images2/f2.png" alt="">
                                    </div>
                                    <div class="detail-box">
                                        <h5>
                                            2 Million
                                        </h5>
                                        <h3>
                                            Paid Invoices
                                        </h3>
                                    </div>
                                </div>
                                <div class="t-link-box collapsed" data-toggle="collapse" data-target="#collapseThree"
                                    aria-expanded="false" aria-controls="collapseThree">
                                    <div class="img-box">
                                        <img src="images2/f3.png" alt="">
                                    </div>
                                    <div class="detail-box">
                                        <h5>
                                            700,000
                                        </h5>
                                        <h3>
                                            Worldwide Freelancer
                                        </h3>
                                    </div>
                                </div>
                                <div class="t-link-box collapsed" data-toggle="collapse" data-target="#collapseFour"
                                    aria-expanded="false" aria-controls="collapseFour">
                                    <div class="img-box">
                                        <img src="images2/f4.png" alt="">
                                    </div>
                                    <div class="detail-box">
                                        <h5>
                                            98%
                                        </h5>
                                        <h3>
                                            Customer <br>
                                            Satisfaction Rate
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="collapse show" id="collapseOne" aria-labelledby="headingOne"
                            data-parent="#accordion">
                            <div class="img-box">
                                <img src="images2/freelance-img.jpg" alt="">
                            </div>
                        </div>
                        <div class="collapse" id="collapseTwo" aria-labelledby="headingTwo"
                            data-parent="#accordion">
                            <div class="img-box">
                                <img src="images2/freelance-img.jpg" alt="">
                            </div>
                        </div>
                        <div class="collapse" id="collapseThree" aria-labelledby="headingThree"
                            data-parent="#accordion">
                            <div class="img-box">
                                <img src="images2/freelance-img.jpg" alt="">
                            </div>
                        </div>
                        <div class="collapse" id="collapseFour" aria-labelledby="headingfour"
                            data-parent="#accordion">
                            <div class="img-box">
                                <img src="images2/freelance-img.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end freelance section -->

    <!-- client section -->

    <section class="client_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-10 mx-auto">
                    <div class="heading_container">
                        <h2>
                            What Student Say about School
                        </h2>
                    </div>
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="detail-box">
                                    <h4>
                                        John Hissona
                                    </h4>
                                    <p>
                                        passages of Lorem Ipsum available, but the majority have suffered alteration in
                                        some form, by injected humour, or randomised words which don't look even
                                        slightly believable. If youThere are many variations of passages of Lorem Ipsum
                                        available, but the majority have suffered alteration in s
                                    </p>
                                    <img src="images2/quote.png" alt="">
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="detail-box">
                                    <h4>
                                        John Hissona
                                    </h4>
                                    <p>
                                        passages of Lorem Ipsum available, but the majority have suffered alteration in
                                        some form, by injected humour, or randomised words which don't look even
                                        slightly believable. If youThere are many variations of passages of Lorem Ipsum
                                        available, but the majority have suffered alteration in s
                                    </p>
                                    <img src="images2/quote.png" alt="">
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="detail-box">
                                    <h4>
                                        John Hissona
                                    </h4>
                                    <p>
                                        passages of Lorem Ipsum available, but the majority have suffered alteration in
                                        some form, by injected humour, or randomised words which don't look even
                                        slightly believable. If youThere are many variations of passages of Lorem Ipsum
                                        available, but the majority have suffered alteration in s
                                    </p>
                                    <img src="images2/quote.png" alt="">
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                            data-slide="prev">
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                            data-slide="next">
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end client section -->



    <!-- info section -->

    <section class="info_section ">
        <div class="info_container layout_padding-top">
            <div class="container">
                <div class="info_top">
                    <div class="info_logo">
                        <img src="images2/logo.png" alt="" />
                        <span>
                            Spering
                        </span>
                    </div>
                    <div class="social_box">
                        <a href="#">
                            <img src="images2/fb.png" alt="">
                        </a>
                        <a href="#">
                            <img src="images2/twitter.png" alt="">
                        </a>
                        <a href="#">
                            <img src="images2/linkedin.png" alt="">
                        </a>
                        <a href="#">
                            <img src="images2/instagram.png" alt="">
                        </a>
                        <a href="#">
                            <img src="images2/youtube.png" alt="">
                        </a>
                    </div>
                </div>

                <div class="info_main">
                    <div class="row">
                        <div class="col-md-3 col-lg-2">
                            <div class="info_link-box">
                                <h5>
                                    Useful Link
                                </h5>
                                <ul>
                                    <li class=" active">
                                        <a class="" href="index.html">Home <span
                                                class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="">
                                        <a class="" href="about.html">About </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Teacher </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"> Student </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 ">
                            <h5>
                                Offices
                            </h5>
                            <p>
                                Readable content of a page when looking at its layoutreadable content of a page when
                                looking at its layout
                            </p>
                        </div>

                        <div class="col-md-3 col-lg-2 offset-lg-1">
                            <h5>
                                Information
                            </h5>
                            <p>
                                Readable content of a page when looking at its layoutreadable content of a page when
                                looking at its layout
                            </p>
                        </div>

                        <div class="col-md-3  offset-lg-1">
                            <div class="info_form ">
                                <h5>
                                    Newsletter
                                </h5>
                                <form action="">
                                    <input type="email" placeholder="Email">
                                    <button>
                                        Subscribe
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-9 col-md-10 mx-auto">
                        <div class="info_contact layout_padding2">
                            <div class="row">
                                <div class="col-md-3">
                                    <a href="#" class="link-box">
                                        <div class="img-box">
                                            <img src="images2/location.png" alt="">
                                        </div>
                                        <div class="detail-box">
                                            <h6>
                                                Location
                                            </h6>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    <a href="#" class="link-box">
                                        <div class="img-box">
                                            <img src="images2/mail.png" alt="">
                                        </div>
                                        <div class="detail-box">
                                            <h6>
                                                demo@gmail.com
                                            </h6>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-5">
                                    <a href="#" class="link-box">
                                        <div class="img-box">
                                            <img src="images2/call.png" alt="">
                                        </div>
                                        <div class="detail-box">
                                            <h6>
                                                Call +01 1234567890
                                            </h6>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- end info section -->

    <!-- footer section -->
    <footer class="container-fluid footer_section ">
        <div class="container">
            <p>
                &copy; <span id="displayDate"></span> All Rights Reserved By
                <a href="https://html.design/">Free Html Templates</a>
            </p>
        </div>
    </footer>
    <!-- end  footer section -->


    <script src="js2/jquery-3.4.1.min.js"></script>
    <script src="js2/bootstrap.js"></script>
    <script src="js2/custom.js"></script>


</body>
</body>

</html>
