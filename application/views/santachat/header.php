<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" class="add-color">

<head>
    <meta charset="utf-8" />
    <title>Index</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!--Style-->
    <link href="https://fonts.googleapis.com/css?family=Gravitas+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ramaraja" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Sacramento" rel="stylesheet">
    <link href="<?php echo site_url();?>/../public/plugins/bootstrap-3.3.6-dist/bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo site_url();?>/../public/styles/style.css" rel="stylesheet" />
    <script src="<?php echo site_url();?>/../public/scripts/jquery-2.2.4.min.js"></script>
    <script src="<?php echo site_url();?>/../public/plugins/jScrollPane-master/style/jquery.jscrollpane.css"></script>
    <script src="<?php echo site_url();?>/../public/plugins/jScrollPane-master/script/jquery.mousewheel.js"></script>
    <script src="<?php echo site_url();?>/../public/plugins/jScrollPane-master/script/jquery.jscrollpane.min.js"></script>

    <script type="text/javascript" id="sourcecode">
        $(function()
        {
            $('.scroll-pane').jScrollPane();
        });
    </script>
</head>

<body>
<div class="icon-background">
    <div class="container">
        <div class="add-header">
            <div class="row">
                <div class="col-xs-12">
                    <div class="col-xs-6 col-sm-5">
                        <?php if (!isset($noletter)): ?>
                        <h1>
                            <a href="<?php echo site_url();?>main/letter">
                                Scrisoare noua
                            </a>
                        </h1>
                        <?php endif; ?>
                    </div>
                    <div class="col-xs-6 col-sm-7">
                        <img src="<?php echo site_url();?>/../public/images/red-logo.png" />
                    </div>
                </div>
            </div>
        </div>