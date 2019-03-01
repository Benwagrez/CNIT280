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

        <title>FastFit</title>

        <link rel="stylesheet" href="baseCSS.css">
        <link rel="icon" type="image/png" href="img/mountain.png">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="headerJQuery.js"></script>
        <script>
        $(document).ready(function() {
                $("#sales").click(function(){
                    window.location.href = "sales.php";
                });
                $("#invent").click(function(){
                    window.location.href = "manage.php";
                });
        });
        </script>

    </head>

    <header id = "header"><?php include "header.php"; ?></header>
        
    <body>

            <div id = "presidentialOptions" class = "dashboard">
                <div id = "invent" class = "dashboardButton">
                    <p>Inventory</p>
                </div>
                <div id = "sales" class = "dashboardButton">
                    <p>Sales</p>
                </div>
                <div id = "something" class = "dashboardButton">
                    <p>something</p>
                </div>
            </div>


        <div id = "footerPusher">

            <img id = "fixedBGImg" src = "img/mountain.png"> <!--Fixed image in background-->

        </div>
    </body>

    <footer id = "footer"><?php include "footer.php"; ?></footer>

</html>