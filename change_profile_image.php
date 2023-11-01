


<?php

session_start();
// print_r($_SESSION);
include("classes/connect.php");
include("classes/login.php");
include("classes/user.php");
include("classes/post.php");



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

  // echo "<pre>";
  //   print_r($_POST);
  //   print_r($_FILES);
  //   echo "</pre>";
    // $id = $_SESSION['social_UserID'];
    // $post = new Post();
    // $result = $post->create_post($id, $_POST);

    // if ($result == "") 
    // {
    //     header("Location: dashboard.php");
    //     die;
    // }else {
    //   echo "<div style='text-align:center;font-size:12px;color:red;background-color:grey;'> ";
    // echo " The following errors occured<br>";
    // echo $result;
    // echo "</div>";
    // }


    if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != "")
     {


     
      if ($_FILES['file']['type']== "image/jpeg")
       {
        $allowed_size = (1024*1024)*7;
       if ($_FILES['file']['size'] < $allowed_size) {
       //Images will only be uploaded once the
       $filename = "uploads/" . $_FILES['file']['name'];
       move_uploaded_file($_FILES['file']['tmp_name'], $filename);
 
       if (file_exists($filename)) {
         //filename is the path to the file
         $UserID = $user_data['UserID'];
         // set profile image to be equal to the filename and limit one to be spesific
         $query = "update users set Profile_image = '$filename' where UserID = '$UserID' limit 1";
 
         $DB = new Database();
         $DB->save($query);
 
         header("Location: dashboard.php");
         die;
 
       }
       }
      else {
          echo "<div style='text-align:center;font-size:12px;color:red;background-color:grey;'> ";
    echo " Add a Valid image<br>";
    echo "</div>";
      }
   
  
    }else {
      echo "<div style='text-align:center;font-size:12px;color:red;background-color:grey;'> ";
      echo " The following errors occured<br>";
      echo "please add a valid image";
      echo "</div>";
    }
  
}
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>change profile</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color:gray;">
<div class="header">

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
          <img src="assets/img/hero.jpg" alt="" width="49" height="40"> My Details
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="#">Admin</a></li>
            <li><a class="dropdown-item" href="#"><?php echo $user_data['Firstname'] ." ".$user_data['Lastname']?></a></li>
            <li><a class="dropdown-item" href="#"><?php echo $user_data['Email']?></a></li>
            <li><a class="dropdown-item" href="changepassword.php" style="color:red;">Change Password</a></li>
            <!-- <li><a class="dropdown-item outline-danger" href="logout.php" style="color:red;">Logout</a></li> -->
          </ul>
        </ul>
</div>
<a href="logout.php"><button class="btn btn-outline-success bg-danger" type="submit">Logut</button></a>

    </div>
  </div>


  
</nav>
</div>

<!-- nav container -->

<div class="container">
<div class="p-5 bg-image" ></div>
  <!-- Background image -->

 
  <div class="card mx-4 mx-md-2 shadow-5-strong" style="
        margin-top: -100px;
        background: hsla(0, 0%, 100%, 0.8);
        /* backdrop-filter: blur(30px); */
        ">
       
    <div class="card-body py-5 px-md-5">


<form  method="post" enctype="multipart/form-data">
  <div class="">
  <input type="file" name="file"  class="form-control" id="">
  <!-- <input type="file" name="file2" class="form-control" id=""> -->
   <input type="submit" class="btn btn-primary"  value="Change">
</div>
  
</form></div>
</div>






</body>
<script src="js/bootstrap.bundle.min.js"></script>
</html>

