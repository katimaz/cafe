<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>QuickOrder</title>

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
                <li><a href="#home">首頁</a></li>
                <li><a href="#about">關於</a></li>
                <li><a href="#portfolio">作品</a></li>
                <li><a href="#service">服務</a></li>
                <li><a href="#contact">連絡</a></li>
                <li><a href="{{url('en')}}">English</a></li>
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
                        <h1 class="white-text">手機落單企業方案專家</h1>
                        <p class="white-text">QuickOrder提供一套穩定，安全和簡潔易用的手機落單系統，亦會根據個別客戶的要求而定制系統，從而提高客戶的運營效率和善用他們資源。QuickOrder的手機落單系統適用於餐飲和零售領域內的各類客戶。
                        </p>
                        <button class="white-btn">Get Started!</button>
                        <button class="main-btn"><a href="#about" style="color: white">更多</a></button>
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
                <h2 class="title">歡迎來到QuickOrder Mobile Ordering Solution (QOMOS)</h2>
            </div>
            <!-- /Section header -->

            <!-- about -->
            <div class="col-md-4">
                <div class="about">
                    <i class="fa fa-cogs"></i>
                    <h3>客人唯本</h3>
                    <p>根據個別客戶的要求而定制, 不再受制於傳統系統的規範</p>
                    <a href="#">Read more</a>
                </div>
            </div>
            <!-- /about -->

            <!-- about -->
            <div class="col-md-4">
                <div class="about">
                    <i class="fa fa-magic"></i>
                    <h3>特點</h3>
                    <p>網頁或程式版 <br> 手機支付 <br> 營運數據和報告 <br> 會員制度</p>
                    <a href="#">Read more</a>
                </div>
            </div>
            <!-- /about -->

            <!-- about -->
            <div class="col-md-4">
                <div class="about">
                    <i class="fa fa-mobile"></i>
                    <h3>科技</h3>
                    <p>雲端方案 <br> 穩定平台 <br> 專業團隊
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
                <h2 class="title">合作商戶</h2>
            </div>
            <!-- /Section header -->

            <!-- Work -->
            <div class="col-md-4 col-xs-6 work">
                <img class="img-responsive" src="./public/home/img/dojo.png" alt="">
                <div class="overlay"></div>
                <div class="work-content">
                    <span>餐廳</span>
                    <h3>Dojo Izakaya Gald Way Japanese Restaurant</h3>
                    <div class="work-link">
                        {{--<a href="#"><i class="fa fa-external-link"></i></a>--}}
                        <a class="lightbox" href="./public/home/img/dojo.png"><i class="fa fa-search"></i></a>
                    </div>
                </div>
            </div>

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
                <h2 class="title">QuickOrder手機落單系統(QOMOS)</h2>
            </div>
            <!-- /Section header -->

            <!-- service -->
            <div class="col-md-4 col-sm-6">
                <div class="service">
                    <i class="fa fa-diamond"></i>
                    <h3>客人唯本</h3>
                    <p>根據個別客戶的要求而定制, 不再受制於傳統系統的規範</p>
                </div>
            </div>
            <!-- /service -->

            <!-- service -->
            <div class="col-md-4 col-sm-6">
                <div class="service">
                    <i class="fa fa-rocket"></i>
                    <h3>托管服務</h3>
                    <p>餐牌和價錢更新服務</p>
                </div>
            </div>
            <!-- /service -->

            <!-- service -->
            <div class="col-md-4 col-sm-6">
                <div class="service">
                    <i class="fa fa-cogs"></i>
                    <h3>網頁或程式版</h3>
                    <p>簡潔易用的版面
                        <br>不需要獨立的落單硬件設備</p>
                </div>
            </div>
            <!-- /service -->

            <!-- service -->
            <div class="col-md-4 col-sm-6">
                <div class="service">
                    <i class="fa fa-diamond"></i>
                    <h3>手機支付</h3>
                    <p>提高客戶的運營效率
                        <br>減少人為出錯
                    </p>
                </div>
            </div>
            <!-- /service -->

            <!-- service -->
            <div class="col-md-4 col-sm-6">
                <div class="service">
                    <i class="fa fa-pencil"></i>
                    <h3>營運數據和報告</h3>
                    <p>隨時隨地掌握營運和財政情況</p>
                </div>
            </div>
            <!-- /service -->

            <!-- service -->
            <div class="col-md-4 col-sm-6">
                <div class="service">
                    <i class="fa fa-flask"></i>
                    <h3>會員制度</h3>
                    <p>會員溝通的渠道
                        <br>提供優惠
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
                    <h2 class="title">為何選擇我們</h2>
                </div>
                <p>QuickOrder團隊隊員擁有豐富的IT，管理, 網管經驗和知識, 可提供穩定, 安全, 可靠的平台和落單系統。QOMOS系統運用最新的科技和網管經驗以達到其優勢並具備以下優勢：</p>

                <div class="feature">
                    <i class="fa fa-check"></i>
                    <p>雲端托管服務</p>
                </div>
                <div class="feature">
                    <i class="fa fa-check"></i>
                    <p>高網絡安全</p>
                </div>
                <div class="feature">
                    <i class="fa fa-check"></i>
                    <p>高穩定性</p>
                </div>
                <div class="feature">
                    <i class="fa fa-check"></i>
                    <p>監視系統</p>
                </div>
                <div class="feature">
                    <i class="fa fa-check"></i>
                    <p>警報信息</p>
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
                    <p>+852 5682 7588</p>
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

                <!-- footer follow -->
                {{--<ul class="footer-follow">--}}
                    {{--<li><a href="#"><i class="fa fa-facebook"></i></a></li>--}}
                    {{--<li><a href="#"><i class="fa fa-twitter"></i></a></li>--}}
                    {{--<li><a href="#"><i class="fa fa-google-plus"></i></a></li>--}}
                    {{--<li><a href="#"><i class="fa fa-instagram"></i></a></li>--}}
                    {{--<li><a href="#"><i class="fa fa-linkedin"></i></a></li>--}}
                    {{--<li><a href="#"><i class="fa fa-youtube"></i></a></li>--}}
                {{--</ul>--}}
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
