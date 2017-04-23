<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');
require_once __DIR__ . '/vendor/autoload.php';
//
//define("APP_ID", '518331991657086');
//
//define("APP_SECRET", 'd90e4fe6a3c0859824d3a010d267f995');
//
define("PAGE_ID", 'PicenoWines');

echo getFbPosts();

function getFbPosts() {
    $appId = '518331991657086';
    $appSecret = 'd90e4fe6a3c0859824d3a010d267f995';
    $appToken = "518331991657086|ThLhoOH3wzOkUGc-gJGVRDMCiPY";
    $clientToken = "ad06364b1fca61af6b29ca7aa6bd39f3";
    $accessToken = "EAAHXa5I9Cn4BAMNcVIiGjoTgNmZAzEUCN7A9hGX1782ku9qjqyzAg1IWOWKqBE3JZCqWOYSN4pxHSjI4U1YpOve90gq0adG9tm6dHnPqZBorI9aY0tgp6WLfcGxI5mRxNuQsNLRwvcPMU6C7bn9t1RCybRKjPIZBwrBG4T27ihLKfa38XnBAcR5X0jrwjsoZD";

    $fb = new Facebook\Facebook([
        'app_id' => $appId,
        'app_secret' => $appSecret,
        'default_graph_version' => 'v2.9',
        'default_access_token'  => $accessToken
    ]);
 
    $response  = $fb->get("/" . PAGE_ID . "/feed");

   // var_dump();
    
    return getPage($response->getGraphEdge());
    
}

function getPage($edge) {


    ob_start();
    ?>

    <html lang="en">

        <head>

            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="">
            <meta name="author" content="">

            <title>News - from Ascoli Piceno Wines</title>

            <!-- Bootstrap Core CSS -->
            <link href="css/bootstrap.css" rel="stylesheet">

            <!-- Custom CSS -->
            <link href="css/business-casual.css" rel="stylesheet">

            <!-- Fonts -->
            <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
            <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
            <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
            <![endif]-->

        </head>

        <body>
            <!--<script>
                window.fbAsyncInit = function () {
                    FB.init({
                        appId: '803185256469448',
                        xfbml: true,
                        version: 'v2.4'
                    });
                };
        
                (function (d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) { return; }
                    js = d.createElement(s); js.id = id;
                    js.src = "//connect.facebook.net/en_US/sdk.js";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));
            </script>-->
            <div class="brand"><a href="index.html">Piceno Wines</a></div>
            <!-- Navigation -->
            <nav class="navbar navbar-default" role="navigation">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                        <a class="navbar-brand" href="index.html">Piceno Wines</a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li>

                            </li>
                            <li>
                                <a href="about.html">About</a>
                            </li>
                            <li>
                                <a href="varietals.html">Varietals</a>
                            </li>
                            <li>
                                <a href="vineyards.html">Vineyards</a>
                            </li>
                            <li>
                                <a href="awards.html">Awards &amp; Reviews</a>
                            </li>
                            <li>
                                <a href="findwines.html">Find Our Wines</a>
                            </li>
                            <li class="active">
                                <a href="news.php">News</a>
                            </li>
                            <li>
                                <a href="contact.html">Contact</a>
                            </li>
                            <li>
                                <a href="https://www.facebook.com/PicenoWines" target="_blank" title="Ascoli Piceno Wine Facebook Page"><i class="fa fa-facebook-official fa-2"></i></a>
                            </li>
                            <li>
                                <a href="https://twitter.com/PicenoWines" target="_blank" title="@PicenoWines "><i class="fa fa-twitter fa-2"></i></a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container -->
            </nav>

            <div id="Main" class="container">
                <div class="row">
                    <div class="box">
                        <div class="col-lg-12">
                            <hr>
                            <h2 class="intro-text title text-center">
                                News
                                <strong>from Ascoli Piceno Wines</strong>
                            </h2>
                            <hr>
                            <hr class="visible-xs">
                            <div class="col-lg-3"></div>

                            <div class="col-lg-6">
                                <?php
                                   // var_dump($posts);
                                foreach ($edge as $graphNode) {
                                    var_dump($graphNode);
                                    die;
                                    $postUrl = "https://www.facebook.com/PicenoWines/posts/$graphNode[id]";
                                    ?>
                                    <div class="fb-embed">
                                        <div id="fb-root">
                                            <?php echo $graphNode['message']; ?>
                                        </div>

                                        <div class="fb-post" data-href="<?php echo $postUrl; ?>" data-width="500">
                                            <div class="fb-xfbml-parse-ignore">
                                                <blockquote cite="<?php echo $postUrl; ?>">
                                                    Posted by <a href="https://www.facebook.com/PicenoWines">Piceno Wines</a> on&nbsp;
                                                    <a href="<?php echo $postUrl; ?>"><?php echo $graphNode['created_time']->format('Y-m-d H:i:s');; ?></a>
                                                </blockquote>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?> 
                            </div>
                            <div class="col-lg-3"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="row">
                    <footer>
                        <div class="container">
                            <p class="text-center">Copyright &copy; Piceno, LLC 2017</p>
                        </div>
                    </footer>
                </div>
            </div>
            <!-- jQuery -->
            <script src="js/jquery.js"></script>

            <!-- Bootstrap Core JavaScript -->
            <script src="js/bootstrap.min.js"></script>

            <script>
                (function (i, s, o, g, r, a, m) {
                    i['GoogleAnalyticsObject'] = r;
                    i[r] = i[r] || function () {
                        (i[r].q = i[r].q || []).push(arguments)
                    }, i[r].l = 1 * new Date();
                    a = s.createElement(o),
                            m = s.getElementsByTagName(o)[0];
                    a.async = 1;
                    a.src = g;
                    m.parentNode.insertBefore(a, m)
                })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
                ga('create', 'UA-67256255-1', 'auto');
                ga('send', 'pageview');

            </script>
        </body>

    </html>

    <?php
    $str = ob_get_contents();
    ob_end_clean();
    return $str;
}

function formatDate($date, $opt = null) {

    $opt = explode(':', $opt);
    $y = 'Y';
    if (!empty($opt[1]) && $opt[1] == 'y') {
        $y = 'y';
    }

    if (empty($date)) {
        return null;
    }

    $date = new DateTime($date);
    if (empty($opt[0])) {
        $newdate = date_format($date, 'm/d/' . $y);
    }

    if ($opt[0] == 1) {
        $ampm = 'A';
        if (date_format($date, 'H') > 11) {
            $ampm = 'P';
        }
        $newdate = date_format($date, 'm/d/' . $y . ' h:i') . $ampm;
    }

    if ($opt[0] == '2') {
        $newdate = date_format($date, 'm/d/' . $y . ' h:i:s');
    }
    return $newdate;
}
