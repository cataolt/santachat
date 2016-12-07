<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Gravitas+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ramaraja" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Sacramento" rel="stylesheet">
    <title>Welcome to Santachat!</title>
    <style>
        body {
            background: #C7EBFC;
            color: #2B3990; }

        .container {
            max-width: 800px;
            margin: 0;
            padding: 30px 0;
        }

        .text {
            height: 250px;
            width: 450px;
            font-weight: bold;
            text-align: left;
            margin: 100px 200px 50px 150px;
            font-size: 20.63px;
            font-family: "Ramaraja",regular;

        }
        .url {
            margin: 30px 0 30px 0;
        }

        .image {
            margin: 75px 0 30px 0;
        }
    </style>
</head>

<body>
<div style="background: #C7EBFC; color: #2B3990; width: 100%; height: 100%; }">
    <div class="container" style="max-width: 800px; margin: 0; padding: 30px 0;">
        <div class="text" style="height: 250px; width: 450px; font-weight: bold; text-align: left; margin: 100px 200px 50px 150px; font-size: 20.63px; font-family: "Ramaraja",regular;">
            <div>
                Mosule, copilul tau i-a scris lui Mos Craciun! <br/>
                Pentru pastra magia Craciunului intacta si a-i proteja copilaria de necopilarii, citeste-i scrisoare si raspunde-i cu informatii pe care numai tu, mosule, le-ai putea sti despre el.
            </div>
            <div class="url" style="margin: 30px 0 30px 0;"><a href="{unwrap}<?php echo $link; ?>{/unwrap}">Link</a></div>
            <div>Iar daca link-ul nu merge copiaza aceasta adresa in browser:</div>
            <div class="url" style="margin: 30px 0 30px 0;"><a href="{unwrap}<?php echo $link; ?>{/unwrap}">{unwrap}<?php echo $link; ?>{/unwrap}</a></div>
            <div>Iar daca vrei sa ne cunosti mai bine si sa afli cum iti putem proteja copilul de problemele mai pamantesti ale acestui sezon, cum ar fi raceala, gripa, tusea, raguseala sau febra, te asteptam pe minunino.ro sau pe facebook.com/minunino.</div>
            <div class="image" style=" margin: 75px 0 30px 0;">
                <img src="http://santachat.ro/public/images/email.png" alt="Minunino" height="49" width="409">
            </div>
        </div>
    </div>
</div>
</body>
</html>