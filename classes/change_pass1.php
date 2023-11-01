<?php
session_start();


if(isset($_SESSION['social_UserID']) && is_numeric($_SESSION['social_UserID']))
{

    include "connect.php";

   if (isset($_POST['oldpass'])&& isset($_POST['newpass'])
   && isset($_POST['conpass'])) {
    # code...
   
 function evaluatepass($data){
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;     
}
$oldpass = evaluatepass($_POST['oldpass']);
$newpass = evaluatepass($_POST['newpass']);
$conpass = evaluatepass($_POST['conpass']);
    // echo mysqli_error($connection); 
   }else {
    header("location:social/changepassword.php");
    exit();
   }
if (empty($oldpass)) {
    header("location:social/changepassword.php");
    
    exit();
}elseif (empty($newpass)) {
    header("location:social/changepassword.php");
    exit();
}
elseif (empty($newpass !== $conpass)) {
    header("location:social/changepassword.php");
    exit();
}
   }
   else {
    # code...
    header("location:social/changepassword.php");
    exit();
   }
   
     


   <?php

$email = $_POST['email'];

$token = bin2hex(random_bytes(16));

$token_hash = hash("sha256", $token);

$expiry = date("Y-m-d H:i:s", time() + 60 * 30);

$mysqli = require __DIR__ . "/connect.php";
$sql = "UPDATE user
        SET reset_token_hash=?,
            reset_token_expires_at = ?
            WHERE email =?";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("sss", $token_hash, $expiry, $email);

$stmt->execute();


