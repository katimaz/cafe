<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicons -->
    <link rel="shortcut icon" href="/public/assets/img/favicon.png">
    <link rel="apple-touch-icon" href="/public/assets/img/favicon_60x60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/public/assets/img/favicon_76x76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/public/assets/img/favicon_120x120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/public/assets/img/favicon_152x152.png">
    <!-- CSS Plugins -->
    <link rel="stylesheet" href="/public/assets/plugins/bootstrap/dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/public/assets/plugins/slick-carousel/slick/slick.css"/>
    <link rel="stylesheet" href="/public/assets/plugins/animate.css/animate.min.css"/>
    <link rel="stylesheet" href="/public/assets/plugins/animsition/dist/css/animsition.min.css"/>

    <!-- CSS Icons -->
    <link rel="stylesheet" href="/public/assets/css/themify-icons.css"/>
    <link rel="stylesheet" href="/public/assets/plugins/font-awesome/css/font-awesome.min.css"/>

    <!-- CSS Theme -->
    <link id="theme" rel="stylesheet" href="/public/assets/css/themes/theme-beige.min.css"/>

</head>
<body>
<div id="body-wrapper" class="animsition">
    <div id="content">
        <section class="section">


            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3">
                            <h3><strong>Name</strong></h3>
                        </div>
                        <div class="col-md-3">
                            <h3><strong>Table</strong></h3>
                        </div>
                        <div class="col-md-3">
                            <h3><strong>Quantity</strong></h3>
                        </div>
                        <div class="col-md-3">

                        </div>
                    </div>
                    <hr style="margin-top: 0px;">
                    @foreach($orderFoods as $orderFood)
                        <div class="row">
                            <div class="col-md-3">
                                <h3><strong>{{$orderFood->name}}</strong></h3>
                            </div>
                            <div class="col-md-3">
                                <h3><strong>{{$orderFood->table_id}}</strong></h3>
                            </div>
                            <div class="col-md-3">
                                <h3><strong>{{$orderFood->quantity}}</strong></h3>
                            </div>
                            <div class="col-md-3">
                                <a style="font-size: 35px;top: -20px;" href="{{route('printOrder',['count' => $orderFood->id])}}" class="btn btn-outline-primary btn-lg"><span>Print</span></a>
                            </div>
                        </div>
                        <hr style="margin-top: 0px;">
                    @endforeach
                </div>
            </div>
        </section>
        <div id="body-overlay"></div>
    </div>
    <!-- JS Plugins -->
    <script src="/public/assets/plugins/jquery/dist/jquery.min.js"></script>
    <script src="/public/assets/plugins/tether/dist/js/tether.min.js"></script>
    <script src="/public/assets/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/public/assets/plugins/slick-carousel/slick/slick.min.js"></script>
    <script src="/public/assets/plugins/jquery.appear/jquery.appear.js"></script>
    <script src="/public/assets/plugins/jquery.scrollto/jquery.scrollTo.min.js"></script>
    <script src="/public/assets/plugins/jquery.localscroll/jquery.localScroll.min.js"></script>
    <script src="/public/assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="/public/assets/plugins/jquery.mb.ytplayer/dist/jquery.mb.YTPlayer.min.js"></script>
    <script src="/public/assets/plugins/twitter-fetcher/js/twitterFetcher_min.js"></script>
    <script src="/public/assets/plugins/skrollr/dist/skrollr.min.js"></script>
    <script src="/public/assets/plugins/animsition/dist/js/animsition.min.js"></script>

    <!-- JS Core -->
    <script src="/public/assets/js/core.js"></script>
</div>
</body>
</html>

