


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

     $oldpass = $_POST['oldpass'];
      $newpass = $_POST['newpass'];
      $conpass = $_POST['conpass'];
   
      $error = "";
      

      // validating the form
    //   foreach ($_POST as $key => $value) {
    //     # code...
    //     if(empty($value))
    //     {
    //         $this->error = $this->error . $key ." is empty!<br>";
    //     }
    //    if($key == "oldpass")
    //     {
    //         $this->error .= "Old password";

    //         header("location:changepassword.php");
    //         exit();
            
    //     }
    //     elseif (empty($newpass)) {
    //         $this->error .= "New password ";

    //         header("location:changepassword.php");
    //         exit();
    //     }
    //     elseif (empty($newpass !== $conpass)) {
    //         $this->error .= "New password and confirmpassword do not match";
    //         header("location:changepassword.php");
    //         exit();
    //     }
    // }
//end of validation

//if there is no error
if($error == ""){
echo "correct";
$UserID = $user_data['UserID'];
// set profile image to be equal to the filename and limit one to be spesific

  // $newpass = md5(addslashes($data['newpass']));
  $newpass = md5($_POST['newpass']);

  // 'password_set'=>1

  
$query = "update users set Password = '$newpass' where UserID = '$UserID' limit 1";

$DB = new Database();
$DB->save($query);

  $error .= "Successfully changed";
echo ($error);
header("Location: login.php");
        die;
}else {
  echo "false";
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

<div class="card mx-4 mx-md-5 shadow-5-strong" style="
        margin-top: 40px;
        background: hsla(0, 0%, 100%, 0.8);
        /* backdrop-filter: blur(30px); */
        ">
<div class="card-body py-5 px-md-5">

<div class="row d-flex justify-content-center">
  <div class="col-lg-8">
  <?php if(!empty($get)){?>
				<div class="error-msg " style="text-align:center;font-size:14px;color:red;"> <?php echo $get;?></div>
				<?php }?>
    <h2 class="fw-bold mb-3">   Change My Password </h2>
<form method="POST" action="" class="row g-3 needs-validation" novalidate >

 
 <!-- <div class="col-md-6">
   <label for="validationCustom03" class="form-label">Old Password</label>
   <input type="password" 
   name="oldpass" class="form-control" 
   id="validationCustom03" 
   placeholder="Old password" value="" required>
   <div class="invalid-feedback">
     Please Enter your old Password.
   </div>
 </div> -->
 <div class="col-md-6">
   <label for="validationCustom03" class="form-label">New Password</label>
   <input type="password" name="newpass" class="form-control" id="validationCustom03" placeholder="New password" value="" required>
   <div class="invalid-feedback">
     Please provide a New Password.
   </div>
 </div>
 <div class="col-md-6">
   <label for="validationCustom03" class="form-label">Confirm Password</label>
   <input type="password" name="conpass" class="form-control" id="validationCustom03" placeholder="password" value="" required>
   <div class="invalid-feedback">
     Please Confirm Password.
   </div>
 </div>

 

 <div class="col-12">
   <button class="btn btn-primary" type="submit">Change</button>
 </div>
</form>
</div>
</div>
</div>


</body>
<script src="js/bootstrap.bundle.min.js"></script>

<!-- form valid -->
<script>// Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()</script>
</html>

