<!DOCTYPE HTML>
<?php 
    session_start();
    require "database.php";
?>
<html>
<meta name="HandheldFriendly" content="true" />
<meta name="MobileOptimized" content="320" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no" />
    <head>

        <title>PAGE TEMPLATE</title>

        <link rel="stylesheet" href="baseCSS.css">
        <link rel="icon" type="image/png" href="img/mountain.png">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="headerJQuery.js"></script>

    </head>

    <header id = "header"><?php include "header.php"; ?></header>
        
    <body>
        <div id = "footerPusher">

            <img id = "fixedBGImg" src = "img/mountain.png"> <!--Fixed image in background-->
            <form action="/CNIT280/barcodecheck.php" method="post">
                Barcode:<br>
                <input type="text" name="barcodeInput" value="Please enter barcode"><br>
                <input type="submit" value="Submit">
            </form>

        </div>
    </body>

    <footer id = "footer"><?php include "footer.php"; ?></footer>

</html>
