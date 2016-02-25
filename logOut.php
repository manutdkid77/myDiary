<?php
	if($_GET["logout"]==1){
        session_destroy();
        echo "<script> alert('You have been logged out');</script>";
    }
?>