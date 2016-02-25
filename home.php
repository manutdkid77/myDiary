<?php
session_start();
include("loginScrapper.php");
include("logOut.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Diary</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style type="text/css">
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
        #loginForm{
            position: relative;
            right: 152px;
        }
        #welcomeContainer{
            background:      
        linear-gradient(
          rgba(23, 22, 22, 0.79), 
          rgba(12, 12, 12, 0.08)
                    ),url("img/diary.jpg");
            background-size: cover;
            z-index: 1;
        }
        #loginEmail,#loginPword{
            background-color: transparent;
        }
        #loginEmail{
            position: relative;
            right: 15px;
        }
        #loginSubmit{
            position: relative;
            left: 10px;
        }
        #loginEmail,#loginPword{
            background-color: transparent;
        }
        #loginForm > div> input::-webkit-input-placeholder {
            color: #EC971F !important;
            opacity: 0.8;
        }
        #loginForm > div > input{
            color:#EC9715;
        }
        #loginForm > div> input:focus {
            border-color: #EC971F;
            outline: 0;
        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(240, 173, 78, 1);
          box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(240, 173, 78, 1);
        }
        #loginForm > div > input.btn-warning{
            color:whitesmoke !important;
        }
        #regForm{
            position: relative;
            top: 68px;
        }
        #regForm h1,p{
            color:#EC971F; 
            text-align: center;
        }
        #signUpToggle{
            position: absolute;
            background-color: transparent;
            height: 100px;
            width: 100px;
            border: 2px solid #EC971F;
            border-radius: 48px;
            left: 296px;
            top: 216px;
        }
        #signUpToggle > img{
            position: absolute;
            right: 16px;
            top: 16px;
        }
        .modal-header{
            background-color: #EC971F;
            opacity: 0.8;
            color: whitesmoke;
        }
        .regLabel{
            color:#EC9715;
        }
        #regInput > div> input{
            color:#EC9715;
        }
        #regInput > div> input::-webkit-input-placeholder {
            color: #EC971F !important;
            opacity: 0.8;
        }
        #regInput > div> input:focus {
            border-color: #EC971F;
            outline: 0;
        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(240, 173, 78, 1);
          box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(240, 173, 78, 1);
        }
        #regInput > div > input.btn-warning{
            color: whitesmoke;
        }
        .alert{
            display: none;
        }
        .popover{
            background-color: transparent;
            color: #EC971F;
            border:1px solid #EC971F;
        }
        .popover-title{
            color: #EC971F;
            border-bottom: 1px solid #EC971F;
            background-color: transparent;
        }
        body{
            font-family: 'PT Sans', sans-serif;
        }

    </style>
    <body>  
     <div class="bodyContainer container-fluid" id="welcomeContainer">
            <div class="row">
                <div class="navbar navbar-default navbar-fixed">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a href="" class="navbar-brand"><strong>My Diary</strong></a>
                        </div>
                            <form method="post" class="navbar-form navbar-right" id="loginForm"> 
                                <div class="form-group">
                                    <input placeholder="Enter your email" type="email" class="form-control" name="loginEmail" id="loginEmail" value="<?php echo addslashes($_POST['loginEmail']);?>">
                                    <input placeholder="Enter your password" type="password" class="form-control" name="loginPword" id="loginPword">
                                    <input type="submit" class="btn btn-warning" data-toggle="popover" data-placement="bottom" value="Login" name="submit" id="loginSubmit">
                                </div>
                            </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3" id="regForm">
                        <h1>Your Private Diary</h1>
                        <p class="lead">All your stories, with you wherever you go.</p>
                        <p class="lead">Interested? Sign up Below</p>
                        <div id="signUpToggle" type="button" class="btn" data-toggle="modal" data-target="#modal1">
                            <img src="img/diary.png">
                        </div>

                        <div class="modal" id="modal1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header modal-header-warning">
                                        <button type="button" class="close" data-dismiss="modal">&times</button>
                                        <h4 class="modal-title">Register</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" id="regInput">
                                           <div class="form-group">
                                            <label for="sname" class="regLabel">Email</label>
                                            <input placeholder="Enter your email" type="email" class="form-control" name="sname" id="sname" value="<?php echo addslashes($_POST['sname']);?>">
                                           </div>
                                           <div class="form-group">
                                            <label for="pword" class="regLabel">Password</label>
                                            <input placeholder="Enter your password" type="password" class="form-control" name="pword" id="pword">
                                           </div>
                                           <div class="form-group">
                                            <input type="submit" id="regInputSubmit" value="Sign-Up" name="submit" class="btn btn-warning center-block"> 
                                           </div>
                                           <div class="alert alert-dismissible">
                                           </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            $(".bodyContainer").css('min-height',$(window).height());

            $("#regInput").submit(function(event){
               
                event.preventDefault();
                submitRegForm();
            });

            function submitRegForm(){
                var name = $("#sname").val();
                var password = $("#pword").val();
             
                $.ajax({
                    type: "POST",
                    url: "regScrapper.php",
                    data: "sname=" + name + "&pword=" + password,
                    success : function(result){
                            if(result==="Your were successfully registered!"){
                                $(".alert").removeClass("alert-danger");
                                $(".alert").addClass("alert-success");
                                $("alert").toggle();
                                $(".alert").html(result);
                            }
                            else{
                                $(".alert").removeClass("alert-success");
                                $(".alert").addClass("alert-danger");
                                $(".alert").toggle();
                                $(".alert").html(result);
                            }
                         }
                });
            }
            
           $("#loginForm").submit(function(e){
                e.preventDefault();
                submitLoginForm();
           });

           function submitLoginForm(){

            var name=$("#loginEmail").val();
            var password=$("#loginPword").val();

            $.ajax({
                type:"POST",
                url:"loginScrapper.php",
                data: "loginEmail="+name+"&loginPword="+password,
                success:function(result){
                if(result==="success"){
                                            window.location.replace("/*App URL*/");
                                       }
                    else
                    {
                        $("#loginSubmit").popover({title:'Error',content:result});
                    }
                }
            });
           }
        </script>
    </body>
</html>