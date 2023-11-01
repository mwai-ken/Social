<?php

session_start();
if(isset($_SESSION['social_UserID']) ){
    $_SESSION['social_UserID'] = NULL;
    unset($_SESSION['social_UserID']);
}

header("location: login.php");
die;
