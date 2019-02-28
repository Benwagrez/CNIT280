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
            $(document).ready(function(){
                $("#myProfileLink").addClass("active");

                $("#adminDashboardButton").click(function(){
                    window.location.href = "admin-dashboard.php";
                });
            });
        </script>
        <style>
            #ProfileDataDiv p{
                text-align: left;
                display: inline-block;
            }
            #ProfileDataDiv input{text-align: center;}
            #ProfileDataDiv button{margin: 10px;}
            div.dashboardButtonProfile{
                text-align: center;
                margin: 30px 10%;
                border: 3px solid white;
                border-radius: 10px;
                cursor: pointer;
                /* Adjust Text */
                font-size: 28px;
                align-items: center;
                justify-content: center;
                
                /* Color */
                background-color: white;
                color: #005da3;
            }
            div.dashboardButtonProfile:hover {
                background-color: transparent;
                border-color: white;
                color: white;
            }
            div.dashboardButtonProfile p{margin: 5px;}
            #eventsPanel{padding: 0;overflow-y: auto;}
            table tr:nth-child(even){background-color: #e8cfa4;}
            #eventsPanel div{
                border-top-left-radius: 15px;
                border-top-right-radius: 15px;
            }
            #tabs{background-color: #e8cfa4; /*darkened moccasin*/}
            #tabs div{
                display: inline-block;
                margin: 0;
                width: calc(50% - 2px);
                background-color: #ffebcd; /*blanched almond*/
            }
            #tabs div.inactive{background-color: #e8cfa4; /*darkened moccasin*/}
            #informationContainer{padding: 10px;}
            table{width: 100%;}
            @media only screen and (min-width: 629px){
                    th, td{
                    font-family: Bookman, sans-serif;
                    font-size: 18px;
                    text-align: center;
                }
                #myProfilePanels{overflow-y: auto;}
            }
            @media only screen and (max-width: 630px) {
                th, td{
                    font-family: Bookman, sans-serif;
                    font-size: 4vmin;
                    text-align: center;
                }
                #myProfilePanels{margin:4.5vmin;overflow-y: auto;}
                #eventsPanel{padding: 0;margin:4.5vmin;overflow-y: auto;}
            }
            #informationContainer div table th, td{width: 33.33%;}
        </style>
    </head>

    <header id = "header"><?php include "header.php"; ?></header>
        
    <body>

            <!--Include Admin Dashboard link-->
            <?php 

                // Pulling data from "students" for current user

                    // $sql = "SELECT * FROM students WHERE StudentID=:studentID";
                    // $stmt = $pdo->prepare($sql);
                    // $stmt->execute(["studentID" => $_SESSION["StudentID"]]);
                    // $data = $stmt->fetch(PDO::FETCH_OBJ);


                // If users "Position" : admin -> admin dashboard
                
                    //if($data->Position!=="Student"):
                        echo '<div id = "adminDashboardButton" class = "dashboardButtonProfile">
                            <p>Admin Dashboard</p>
                            </div>';
                    //endif;
            ?>

        <div id = "footerPusher">

            <img id = "fixedBGImg" src = "img/mountain.png"> <!--Fixed image in background-->

        </div>
    </body>

    <footer id = "footer"><?php include "footer.php"; ?></footer>

</html>

