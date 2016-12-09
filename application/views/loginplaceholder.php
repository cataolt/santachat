<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <link href="<?php echo site_url();?>/../public/plugins/bootstrap-3.3.6-dist/bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo site_url();?>/../public/styles/style.css" rel="stylesheet" />
    <script src="<?php echo site_url();?>/../public/scripts/jquery-2.2.4.min.js"></script>
    <script src="<?php echo site_url();?>/../public/plugins/carhartl-jquery-cookie-92b7715/jquery.cookie.js"></script>

</head>
<body>
<script type="text/javascript">
    if(navigator.userAgent.indexOf("Safari") > -1){
        if($.cookie("ci_session") != ''){
            var sessionData = "<?php echo $cookie?>";
            var redirect = "<?php echo site_url() . 'main/loginexternal/' ?>" + sessionData;
            window.top.location.href = redirect;
        }
    }
</script>
</body>
</html>