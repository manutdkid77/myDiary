<?php
    session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("connection.php");
    

    $count=0;

    if(!$_POST["sname"]){
                    $error="<br/> Please enter email";
                    $count++;
                }

        else if (!filter_var($_POST["sname"],FILTER_VALIDATE_EMAIL))
        {
            $error="<br/>Please enter a valid email id";
            $count++;
        }




        if(!$_POST["pword"]){
                    $error.="<br/> Please enter password";
                    $count++;
                }
        else{
            if(strlen($_POST["pword"])<8)  {

                $error.="<br/>Please enter atleast 8 characters";
                $count++;
                                        }
                if(!(preg_match('`[A-Z]`',$_POST["pword"]))) {

                    $error.="<br/>Please enter atleast one capital letter";
                    $count++;
                                            }   
            }

            if($error){                                                        
                                         echo "There were ".$count." error(s) in your form:";
                                                            echo $error;
                                                        }
                                                        else{
                                                            $query="select * from users where email='".mysqli_real_escape_string($link,$_POST['sname'])."'";
                                                            $result=mysqli_query($link,$query);
                                                                $status=mysqli_num_rows($result);
                                                                if($status){
                                                                    echo "<br/> Username already exists";
                                                                }
                                                                else{
                                                                    $query="INSERT INTO `users` (`email`,`password`) VALUES ('".mysqli_real_escape_string($link,$_POST['sname'])."','".md5(md5($_POST['sname']).$_POST['pword'])."')";
                                                                    mysqli_query($link,$query);
                                                                    

                                                                    $_SESSION['id']=mysqli_insert_id($link);

                                                                    header("Location:app.php");
                                                                    }
                                                                }
                                                            }?>