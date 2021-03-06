<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title>Login</title>

    <link rel="shortcut icon" href="<?php echo site_url();?>/../public/images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo site_url();?>/../public/images/favicon1.ico" type="image/x-icon">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Gravitas+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ramaraja" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Sacramento" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Tangerine" rel="stylesheet">
    <!--Style-->
    <link href="<?php echo site_url();?>/../public/plugins/bootstrap-3.3.6-dist/bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo site_url();?>/../public/styles/style.css" rel="stylesheet" />
    <script src="<?php echo site_url();?>/../public/scripts/jquery-2.2.4.min.js"></script>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-53GS9RK');</script>
    <!-- End Google Tag Manager -->
</head>
<body>
<script type="text/javascript">
  if(window.top === window.self){
//    window.top.location.href = "http://santachat.ro";
  }
</script>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<body class="blue-background">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-53GS9RK"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="http://santachat.ro" target="_top">
                <img src="<?php echo site_url();?>/../public/images/logo.png" />
            </a>
            <img src="<?php echo site_url();?>/../public/images/layer_7.png" class="visible-xs hidden-sm pull-right" />
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a>
                        <img src="<?php echo site_url();?>/../public/images/layer_12.png" />
                    </a>
                </li>
                <li>
                    <a>
                        <img src="<?php echo site_url();?>/../public/images/layer_8.png" />
                    </a>
                </li>
                <li>
                    <a>
                        <img src="<?php echo site_url();?>/../public/images/layer_9.png" />
                    </a>
                </li>
                <li class="middle-logo">
                    <a href="http://minunino.ro" target="_blank">
                        <img src="<?php echo site_url();?>/../public/images/layer_7.png" />
                    </a>
                </li>
                <li>
                    <a>
                        <img src="<?php echo site_url();?>/../public/images/layer_10.png" />
                    </a>
                </li>
                <li>
                    <a>
                        <img class="horizontal-image" src="<?php echo site_url();?>/../public/images/layer_11.png" />
                    </a>
                </li>
                <li>
                    <a>
                        <img src="<?php echo site_url();?>/../public/images/layer_13.png" />
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if (isset($logged)): ?>
                    <li>
                        <a href="<?php echo site_url();?>main/editaccount">
                            <img src="<?php echo site_url();?>/../public/images/account.png" />
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url();?>main/logout">
                            <img src="<?php echo site_url();?>/../public/images/power.png" />
                        </a>
                    </li>
                <?php endif; ?>
                <li>
                    <a href="http://minunino.ro/contact" target="_blank">
                        <img src="<?php echo site_url();?>/../public/images/layer_6.png" />
                    </a>
                </li>
                <li>
                    <a href="https://www.facebook.com/Minunino" target="_blank">
                        <img src="<?php echo site_url();?>/../public/images/layer_5.png" />
                    </a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
