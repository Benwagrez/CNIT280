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
        <style>
			table{
				width: 100%;
				font-family: Bookman, sans-serif;
				text-align: center;
			}
			table td{
				padding: 5px 0;
				margin: 0;
			}
			table tr:nth-child(even){background-color: #e8cfa4;}
			input {
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                resize: none;
                -moz-transition: none 0s ease 0s;
                line-height: 2em;
            }
			@media only screen and (min-width: 629px){
                #informationContainer form table  th, td{
                    padding: 5px;
                    font-family: Bookman, sans-serif;
                    font-size: 18px;
                    text-align: center;
                }
				#leaderPanel{padding: 0;overflow-y: auto;}
				#studentPanel{padding: 0;overflow-y: auto;}
				input {max-width: 130px;}
            }
            @media only screen and (max-width: 630px) {
                #informationContainer form table  th, td{
                    font-family: Bookman, sans-serif;
                    font-size: 3.5vmin;
                    text-align: center;
                }
				#leaderPanel{padding: 0;margin: 4.5vmin;overflow-y: auto;}
				#studentPanel{padding: 0;margin: 4.5vmin;overflow-y: auto;}
				select{
                    font-size:3vmin;
				}
				input {max-width: 120px;}
            }
		</style>

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
      <div class = "classic panel" id = "inventory">
          <form id = "manageLeadersForm" method = "post" action = "updatewarehouseemp.php">
              <table id = "returnsTable" class = "listing">
                  <?php include "warehouseempget.php"; ?>
              </table>
          </form>
      </div>
      <div id = "footerPusher">

          <img id = "fixedBGImg" src = "img/mountain.png"> <!--Fixed image in background-->

      </div>
    </body>






    <div id = "footerPusher">

        <img id = "fixedBGImg" src = "img/mountain.png"> <!--Fixed image in background-->

    </div>
        <footer id = "footer"><?php include "footer.php"; ?></footer>

</html>
