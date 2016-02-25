<?php
    session_start();
     if ($_SERVER["REQUEST_METHOD"]=="POST") {
            
            include("connection.php");
            if(!$_POST["loginEmail"]){
                $loginError.="Please enter your email";
            }
            if(!$_POST["loginPword"]){
                $loginError.="Please enter your password";
            }
            if(!$loginError){
                $query="SELECT * from users where email='".mysqli_real_escape_string($link,$_POST['loginEmail'])."' AND password='".md5(md5($_POST['loginEmail']).$_POST['loginPword'])."' LIMIT 1";
                $result=mysqli_query($link,$query);
                $loginStatus=mysqli_fetch_array($result);
                if($loginStatus){
                    $_SESSION['id']=$loginStatus['id'];
                    echo "success";
                }
                else
                    echo "Incorrect email or password";
            }
            else{
                echo $loginError;
            }
        }?>