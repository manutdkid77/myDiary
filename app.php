<?php
session_start();
    include("connection.php");
    $query="SELECT diary from users where id='".$_SESSION['id']."' LIMIT 1";

    $result=mysqli_query($link,$query);
    $row=mysqli_fetch_array($result);
    $diary=$row['diary'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Diary App</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style type="text/css">
        body{
            font-family: 'PT Sans', sans-serif;
            }
        .navbar-default{
            background-color: transparent !important;
            background: transparent;
            border-color: transparent;
        }
        .navbar{
            margin: 0;
            z-index:100;
        }
        .navbar-header{
            position: relative;
            left: 28px;
        }
        .navbar-header > a>strong{
            font-size: 1.5em;
            color: #EC971F;
        }
        #welcomeContainer{
            background:      
        linear-gradient(
          rgba(23, 22, 22, 0.79), 
          rgba(12, 12, 12, 0.08)
                    ),url("img/pen.jpg");
            background-size: cover;
            z-index: 1;
        }
        div.pull-right > ul.nav > li > a{
            color: #EC971F;
            font-size: 1.2em;
        }
        div.pull-right > ul.nav > li > a:hover{
            color: whitesmoke;
            font-size: 1.3em;
        }

    </style>
    <body>  
        <div class="bodyContainer container-fluid" id="welcomeContainer">
            <div class="row">
                <div class="navbar navbar-default navbar-fixed">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <aclass="navbar-brand"><strong>My Diary</strong></a>
                        </div>

                        <div class="pull-right">
                            <ul class="navbar-nav nav">
                                <li><a href="home.php?logout=1">Log Out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3" id="regForm">
                            <textarea class="form-control"><?php echo $diary;?></textarea>
                        </div>
                    </div>
                
            </div>
        </div>
         <script type="text/javascript">
           
            $(".bodyContainer").css('min-height',$(window).height());
            $("textarea").css({
                'min-height':$(window).height()-120,
                'position':'relative',
                'bottom':'3px'
            });

            $("textarea").keyup(function(){
               $.post("updateDiary.php",{diary:$("textarea").val()});
            });
        </script>
    </body>
</html>