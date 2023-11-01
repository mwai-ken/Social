<?php

session_start();
// print_r($_SESSION);
include("classes/connect.php");
include("classes/login.php");
include("classes/user.php");
include("classes/post.php");
include("classes/change_pass.php");

//check if user is loged in
if(isset($_SESSION['social_UserID']) && is_numeric($_SESSION['social_UserID']))
{
    $id = $_SESSION['social_UserID'];
    $login = new Login();
    $result = $login->check_login($id);
    // var_dump($result);
    if($result)
    {
        //if it is true
       $user = new User();
       $user_data = $user->get_data($id);
       if(!$user_data)
       {
        header("location: login.php");
        die;
       }

    }else{
        //if it is false then it will redirect to the login page
        header("location: login.php");
        die;
    }
}else {
    # code...
    header("location: login.php");
        die;
}

// print_r($user_data);


//for posting
if($_SERVER['REQUEST_METHOD'] == "POST"){
    // print_r($_POST);
    $id = $_SESSION['social_UserID'];
    $post = new Post();
    $result = $post->create_post($id, $_POST);

    if ($result == "") 
    {
        header("Location: dashboard.php");
        die;
    }else {
      echo "<div style='text-align:center;font-size:12px;color:red;background-color:grey;'> ";
    echo " The following errors occured<br>";
    echo $result;
    echo "</div>";
    }

}

//collect posts
$id = $_SESSION['social_UserID'];
$post = new Post();
$posts = $post->get_post($id);




// if($_SERVER['REQUEST_METHOD'] == 'POST')
// {
//   $oldpass = $_POST['oldpass'];
//   $newpass = $_POST['newpass'];
//   $conpass = $_POST['conpass'];

//   $change_pass = new Change_pass();
//     $get = $change_pass->evaluatepass($_POST);

//   if($get != "")
//   {
// echo "<div style='text-align:center;font-size:12px;color:red;background-color:grey;'> ";
//     echo " The following errors occured her<br>";
//     echo $get;
//     echo "</div>";
//   }else{
//     // header("location:login.php");
//     // die;
//     // echo "good";
//   }
  
 
//   // echo "<pre>";
//   // print_r($_POST) ; 
//   // echo "</pre>"; 
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mybook|dashboard</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color:gray;">


<nav class="navbar sticky-top navbar-expand-lg p-3 navbar-light bg-primary">
  <div class="container-fluid ">
  <a class="navbar-brand" style="color:white;">Content_Work_Book</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="dashboard.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="posts.php">Posts</a>
        </li>
        
         <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Link</a>
        </li>
      </ul>
      <!-- <div class="d-flex me-auto mb-5  my-lg-0"> -->
      <form class="d-flex me-auto mb-5  my-lg-0" >
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <a href=""><button class="btn btn-outline-success bg-danger" type="submit">Submit</button></a>
</form>  
 <div class="d-flex">
        <ul class="navbar-nav">  <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <?php
          $image = "";
          
          if(file_exists($user_data['Profile_image'] )) {
           $image = $user_data['Profile_image'] ;
          }
          ?>
          <img src="<?php echo $image ?>" alt="" width="47" height="39" style="border-radius:40%;"> My Details
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <!-- <li><a class="dropdown-item" href="#">Admin</a></li> -->
            <li><a class="dropdown-item" href="#"><?php echo $user_data['Firstname'] ." ".$user_data['Lastname']?></a></li>
            <li><a class="dropdown-item" href="#"><?php echo $user_data['Email']?></a></li>
            <li><a class="dropdown-item" href="changepassword.php" style="color:red;">Change Password</a></li>
            <li><a class="dropdown-item" href="change_profile_image.php" style="color:red;">Change profile image</a></li>
            <!-- <li><a class="dropdown-item" href="changepassword.php" style="color:red;">Change Password</a></li> -->


            <!-- <li><a class="dropdown-item outline-danger" href="logout.php" style="color:red;">Logout</a></li> -->
          </ul>
        </ul>
</div>
<a href="logout.php"><button class="btn btn-outline-success bg-danger" type="submit">Logut</button></a>

    </div>
  </div>


  
</nav>

