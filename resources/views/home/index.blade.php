<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>HKQOS</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="public/home/css/bootstrap.min.css" />

    <!-- Owl Carousel -->
    <link type="text/css" rel="stylesheet" href="public/home/css/owl.carousel.css" />
    <link type="text/css" rel="stylesheet" href="public/home/css/owl.theme.default.css" />

    <!-- Magnific Popup -->
    <link type="text/css" rel="stylesheet" href="public/home/css/magnific-popup.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="public/home/css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="public/home/css/style.css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<!-- Header -->
<header id="home">
    <!-- Background Image -->
    <div class="bg-img" style="background-image: url('./public/home/img/background1.jpg');">
        <div class="overlay"></div>
    </div>
    <!-- /Background Image -->

    <!-- Nav -->
    <nav id="nav" class="navbar nav-transparent">
        <div class="container">

            <div class="navbar-header">
                <!-- Logo -->
                <div class="navbar-brand">
                    <a href="{{url('/')}}">
                        <h2>QuickOrder</h2>
                    </a>
                </div>
                <!-- /Logo -->

                <!-- Collapse nav button -->
                <div class="nav-collapse">
                    <span></span>
                </div>
                <!-- /Collapse nav button -->
            </div>

            <!--  Main navigation  -->
            <ul class="main-nav nav navbar-nav navbar-right">
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#portfolio">Portfolio</a></li>
                <li><a href="#service">Services</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="{{url('/')}}">中文</a></li>
            </ul>
            <!-- /Main navigation -->

        </div>
    </nav>
    <!-- /Nav -->

    <!-- home wrapper -->
    <div class="home-wrapper">
        <div class="container">
            <div class="row">

                <!-- home content -->
                <div class="col-md-10 col-md-offset-1">
                    <div class="home-content">
                        <h1 class="white-text">We are Mobile Ordering Solution Provider</h1>
                        <p class="white-text">QuickOrder provides stable, secure and user friendly Mobile Ordering Solution with fully customizable features. We aims to streamline the operational efficiency and utilize resources of all kind of clients within catering and retail areas
                        </p>
                        <button class="white-btn">Get Started!</button>
                        <button class="main-btn"><a href="#about" style="color: white">Learn more</a></button>
                    </div>
                </div>
                <!-- /home content -->

            </div>
        </div>
    </div>
    <!-- /home wrapper -->

</header>
<!-- /Header -->

<!-- About -->
<div id="about" class="section md-padding">

    <!-- Container -->
    <div class="container">

        <!-- Row -->
        <div class="row">

            <!-- Section header -->
            <div class="section-header text-center">
                <h2 class="title">Welcome to QuickOrder Mobile Ordering Solution (QOMOS)</h2>
            </div>
            <!-- /Section header -->

            <!-- about -->
            <div class="col-md-4">
                <div class="about">
                    <i class="fa fa-cogs"></i>
                    <h3>Fully Customizible</h3>
                    <p>Customized features according to the request of clients. <br> No more limitation and boundaries</p>
                    <a href="#">Read more</a>
                </div>
            </div>
            <!-- /about -->

            <!-- about -->
            <div class="col-md-4">
                <div class="about">
                    <i class="fa fa-magic"></i>
                    <h3>Awesome Features</h3>
                    <p>Web/App versions <br> In-app mobile payment <br> Financial report <br> Members login</p>
                    <a href="#">Read more</a>
                </div>
            </div>
            <!-- /about -->

            <!-- about -->
            <div class="col-md-4">
                <div class="about">
                    <i class="fa fa-mobile"></i>
                    <h3>Technical Edge</h3>
                    <p>Cloud based <br> Full resilience <br> Professional technical teams
                    </p>
                    <a href="#">Read more</a>
                </div>
            </div>
            <!-- /about -->

        </div>
        <!-- /Row -->

    </div>
    <!-- /Container -->

</div>
<!-- /About -->


<!-- Portfolio -->
<div id="portfolio" class="section md-padding bg-grey">

    <!-- Container -->
    <div class="container">

        <!-- Row -->
        <div class="row">

            <!-- Section header -->
            <div class="section-header text-center">
                <h2 class="title">Used Cases</h2>
            </div>
            <!-- /Section header -->

            <!-- Work -->
            <div class="col-md-4 col-xs-6 work">
                <img class="img-responsive" src="./public/home/img/dojo.png" alt="">
                <div class="overlay"></div>
                <div class="work-content">
                    <span>Restaurant</span>
                    <h3>Dojo Izakaya Gald Way Japanese Restaurant</h3>
                    <div class="work-link">
                        {{--<a href="#"><i class="fa fa-external-link"></i></a>--}}
                        <a class="lightbox" href="./public/home/img/dojo.png"><i class="fa fa-search"></i></a>
                    </div>
                </div>
            </div>
            <!-- /Work -->
        </div>
        <!-- /Row -->

    </div>
    <!-- /Container -->

</div>
<!-- /Portfolio -->

<!-- Service -->
<div id="service" class="section md-padding">

    <!-- Container -->
    <div class="container">

        <!-- Row -->
        <div class="row">

            <!-- Section header -->
            <div class="section-header text-center">
                <h2 class="title">QuickOrder Mobile Ordering Solution (QOMOS)</h2>
            </div>
            <!-- /Section header -->

            <!-- service -->
            <div class="col-md-4 col-sm-6">
                <div class="service">
                    <i class="fa fa-diamond"></i>
                    <h3>Fully Customization</h3>
                    <p>Fulfill the requirement from clients</p>
                </div>
            </div>
            <!-- /service -->

            <!-- service -->
            <div class="col-md-4 col-sm-6">
                <div class="service">
                    <i class="fa fa-rocket"></i>
                    <h3>Managed Service</h3>
                    <p>We take care of all updates (price & menu) from clients</p>
                </div>
            </div>
            <!-- /service -->

            <!-- service -->
            <div class="col-md-4 col-sm-6">
                <div class="service">
                    <i class="fa fa-cogs"></i>
                    <h3>Web/App versions</h3>
                    <p>User-friendly interface
                        <br>No physical hardware</p>
                </div>
            </div>
            <!-- /service -->

            <!-- service -->
            <div class="col-md-4 col-sm-6">
                <div class="service">
                    <i class="fa fa-diamond"></i>
                    <h3>In-app mobile payment</h3>
                    <p>Fast and efficient
                        <br>Reduce manpower
                    </p>
                </div>
            </div>
            <!-- /service -->

            <!-- service -->
            <div class="col-md-4 col-sm-6">
                <div class="service">
                    <i class="fa fa-pencil"></i>
                    <h3>Financial report</h3>
                    <p>Manage financial figures/sales volume anytime, anywhere</p>
                </div>
            </div>
            <!-- /service -->

            <!-- service -->
            <div class="col-md-4 col-sm-6">
                <div class="service">
                    <i class="fa fa-flask"></i>
                    <h3>Members’ login</h3>
                    <p>Gather members’ behaviors for better service
                        <br>Promotion activities
                    </p>
                </div>
            </div>
            <!-- /service -->

        </div>
        <!-- /Row -->

    </div>
    <!-- /Container -->

</div>
<!-- /Service -->


<!-- Why Choose Us -->
<div id="features" class="section md-padding bg-grey">

    <!-- Container -->
    <div class="container">

        <!-- Row -->
        <div class="row">

            <!-- why choose us content -->
            <div class="col-md-6">
                <div class="section-header">
                    <h2 class="title">Why Choose Us</h2>
                </div>
                <p>QuickOrder consists of technical experts, with hands-on experiences on latest technologies, who provide stable and reliable environment on QOMOS platform, together with the following edges:</p>
                <div class="feature">
                    <i class="fa fa-check"></i>
                    <p>cloud-based</p>
                </div>
                <div class="feature">
                    <i class="fa fa-check"></i>
                    <p>high cyber security</p>
                </div>
                <div class="feature">
                    <i class="fa fa-check"></i>
                    <p>high availability</p>
                </div>
                <div class="feature">
                    <i class="fa fa-check"></i>
                    <p>full resilience</p>
                </div>
                <div class="feature">
                    <i class="fa fa-check"></i>
                    <p>monitoring system</p>
                </div>
                <div class="feature">
                    <i class="fa fa-check"></i>
                    <p>alarm alert</p>
                </div>
            </div>
            <!-- /why choose us content -->

            <!-- About slider -->
            <div class="col-md-6">
                <div id="about-slider" class="owl-carousel owl-theme">
                    <img class="img-responsive" src="./public/home/img/about1.jpg" alt="">
                    <img class="img-responsive" src="./public/home/img/about2.jpg" alt="">
                    <img class="img-responsive" src="./public/home/img/about1.jpg" alt="">
                    <img class="img-responsive" src="./public/home/img/about2.jpg" alt="">
                </div>
            </div>
            <!-- /About slider -->

        </div>
        <!-- /Row -->

    </div>
    <!-- /Container -->

</div>
<!-- /Why Choose Us -->

<!-- Contact -->
<div id="contact" class="section md-padding">

    <!-- Container -->
    <div class="container">

        <!-- Row -->
        <div class="row">

            <!-- Section-header -->
            <div class="section-header text-center">
                <h2 class="title">Get in touch</h2>
            </div>
            <!-- /Section-header -->

            <!-- contact -->
            <div class="col-sm-4">
                <div class="contact">
                    <i class="fa fa-phone"></i>
                    <h3>Phone</h3>
                    <p>5682 7588</p>
                </div>
            </div>
            <!-- /contact -->

            <!-- contact -->
            <div class="col-sm-4">
                <div class="contact">
                    <i class="fa fa-envelope"></i>
                    <h3>Email</h3>
                    <p>hkqos@outlook.com</p>
                </div>
            </div>
            <!-- /contact -->

            <!-- contact -->
            <div class="col-sm-4">
                <div class="contact">
                    <i class="fa fa-map-marker"></i>
                    <h3>Address</h3>
                    <p>152-160 Tai Lin Pai Rd, Kwai Chung</p>
                </div>
            </div>
            <!-- /contact -->

            <!-- contact form -->
            <div class="col-md-8 col-md-offset-2">
                <form class="contact-form">
                    <input type="text" class="input" placeholder="Name">
                    <input type="email" class="input" placeholder="Email">
                    <input type="text" class="input" placeholder="Subject">
                    <textarea class="input" placeholder="Message"></textarea>
                    <button class="main-btn">Send message</button>
                </form>
            </div>
            <!-- /contact form -->

        </div>
        <!-- /Row -->

    </div>
    <!-- /Container -->

</div>
<!-- /Contact -->


<!-- Footer -->
<footer id="footer" class="sm-padding bg-dark">

    <!-- Container -->
    <div class="container">

        <!-- Row -->
        <div class="row">

            <div class="col-md-12">

                <!-- footer logo -->
                <div class="footer-logo">
                    <h2 style="color:white">QuickOrder</h2>
                </div>
                <!-- /footer logo -->

                <!-- footer follow
                <ul class="footer-follow">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                </ul>
                <!-- /footer follow -->

                <!-- footer copyright -->
                <div class="footer-copyright">
                    <p>Copyright © 2018. All Rights Reserved. Designed by <a href="https://katimaz.com" target="_blank">Katimaz</a></p>
                </div>
                <!-- /footer copyright -->

            </div>

        </div>
        <!-- /Row -->

    </div>
    <!-- /Container -->

</footer>
<!-- /Footer -->

<!-- Back to top -->
<div id="back-to-top"></div>
<!-- /Back to top -->

<!-- Preloader -->
<div id="preloader">
    <div class="preloader">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>
<!-- /Preloader -->

<!-- jQuery Plugins -->
<script type="text/javascript" src="public/home/js/jquery.min.js"></script>
<script type="text/javascript" src="public/home/js/bootstrap.min.js"></script>
<script type="text/javascript" src="public/home/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="public/home/js/jquery.magnific-popup.js"></script>
<script type="text/javascript" src="public/home/js/main.js"></script>

</body>

</html>
