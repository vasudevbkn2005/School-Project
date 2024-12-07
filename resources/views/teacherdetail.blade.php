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
    <link rel="stylesheet" type="text/css" href="/css2/bootstrap.css" />

    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/css2/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="/css2/responsive.css" rel="stylesheet" />
</head>

<body class="sub_page">
    <div class="hero_area">
        <!-- header section strats -->
        <header class="header_section">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg custom_nav-container">
                    <a class="navbar-brand" href="index.html">
                        <img src="/images2/logo.png" alt="" />
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
                            <li class="nav-item">
                                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="#"> About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/techerdesign">Teacher </a>
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
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
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
    </div>
<style>
    .teacher_detail_section {
        min-height: 80vh;
        background-color: #f9f9f9;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0 15px; /* Adjust padding to ensure full screen height */
    }

    .teacher_detail_container {
        width: 100%;
        max-width: 1200px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        justify-content: center;
        overflow: hidden;
    }

    /* For large screen */
    @media (min-width: 768px) {
        .teacher_detail_container {
            flex-direction: row;
        }
        .teacher_image {
            flex: 1;
            padding: 20px;
        }
        .teacher_info {
            flex: 1;
            padding: 40px;
        }
    }

    .teacher_image {
        background-color: #007bff;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 15px;
    }

    .teacher_image img {
        max-width: 100%;
        height: auto;
        border-radius: 10px;
    }

    .teacher_info {
        padding: 20px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .teacher_info h2 {
        font-size: 36px;
        color: #333;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .teacher_info h4 {
        font-size: 24px;
        color: #007bff;
        font-style: italic;
        margin-bottom: 20px;
    }

    .teacher_info p {
        font-size: 16px;
        color: #666;
        line-height: 1.8;
        margin-bottom: 20px;
    }

    .back_button {
        display: inline-block;
        margin-top: 20px;
        background: #007bff;
        color: #fff;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        font-size: 16px;
        transition: background 0.3s;
    }

    .back_button:hover {
        background: #0056b3;
    }

    /* For smaller screens */
    @media (max-width: 768px) {
        .teacher_info h2 {
            font-size: 28px;
        }

        .teacher_info h4 {
            font-size: 20px;
        }

        .teacher_info p {
            font-size: 14px;
        }

        .teacher_image {
            padding: 10px;
        }

        .teacher_info {
            padding: 20px;
        }
    }
</style>

<section class="teacher_detail_section">
    <div class="teacher_detail_container">
        <!-- Teacher Image -->
        <div class="teacher_image">
            <img src="{{ asset('storage/' . $teacher->image) }}" alt="{{ $teacher->name }}">
        </div>
        <!-- Teacher Info -->
        <div class="teacher_info">
            <h2>{{ $teacher->name }}</h2>
            <h4>{{ $teacher->subject->name }}</h4>
            <p><strong>Qualification:</strong> {{ $teacher->qualification }}</p>
            <p><strong>Moblie:</strong> {{ $teacher->phone }}</p>
            <p><strong>Email:</strong> {{ $teacher->email }}</p>
            <a href="/teacherdesign" class="back_button">Back to Teachers</a>
        </div>
    </div>
</section>


    <section class="info_section ">
        <div class="info_container layout_padding-top">
            <div class="container">
                <div class="info_top">
                    <div class="info_logo">
                        <img src="/images2/logo.png" alt="" />
                        <span>
                            Spering
                        </span>
                    </div>
                    <div class="social_box">
                        <a href="#">
                            <img src="/images2/fb.png" alt="">
                        </a>
                        <a href="#">
                            <img src="/images2/twitter.png" alt="">
                        </a>
                        <a href="#">
                            <img src="/images2/linkedin.png" alt="">
                        </a>
                        <a href="#">
                            <img src="/images2/instagram.png" alt="">
                        </a>
                        <a href="#">
                            <img src="/images2/youtube.png" alt="">
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
                                    <li class="">
                                        <a class="" href="work.html">Work </a>
                                    </li>
                                    <li class="">
                                        <a class="" href="category.html">Category </a>
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
                                            <img src="//images2/location.png" alt="">
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
                                            <img src="//images2/mail.png" alt="">
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
                                            <img src="//images2/call.png" alt="">
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


    <script src="/js2/jquery-3.4.1.min.js"></script>
    <script src="/js2/bootstrap.js"></script>
    <script src="/js2/custom.js"></script>
