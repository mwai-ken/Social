<?php
session_start();
include("classes/connect.php");
include("classes/login.php");

      $Email = "";
      $Password = "";
      
if($_SERVER['REQUEST_METHOD'] == 'POST')
{

  $login = new Login();
  $result = $login->login_validate($_POST);

  if($result != "")
  {
// echo "<div style='text-align:center;font-size:12px;color:red;background-color:grey;'> ";
//     echo " The following errors occured<br>";
//     echo $result;
//     echo "</div>";
  }else{
    header("location:dashboard.php");
    die;
  }
  
      
      $Email = $_POST['Email'];
      $Password = $_POST['Password'];

  // echo "<pre>";
  // print_r($_POST) ; 
  // echo "</pre>"; 
}

      

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  
    <!-- <link rel="stylesheet" href="style.css"> -->
    <title>mybook| Login</title>
</head>
<body>

<nav class="navbar p-4 navbar-light bg-primary">
  <div class="container-fluid">
  <a class="navbar-brand" style="color:white;">Content_Work_Book</a>
    <form class="d-flex">
      <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->

     <button class="btn btn-outline-success bg-danger" type="submit"> <a href="signup.php">Signup</a></button>
    </form>
  </div>
</nav>