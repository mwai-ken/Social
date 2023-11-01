<?php
include("classes/connect.php");
include("classes/signup.php");

      $Firstname = "";
      $Lastname = "";
      $Email = "";
      $Gender = "";

if($_SERVER['REQUEST_METHOD'] == 'POST')
{

  $signup = new Signup();
  $result = $signup->evaluate($_POST);

  if($result != "")
  {
// echo "<div style='text-align:center;font-size:12px;color:red;background-color:grey;'> ";
//     echo " The following errors occured<br>";
//     echo $result;
//     echo "</div>";
  }else{
    header("location:login.php");
    die;
  }
  
      // $Firstname = $_POST['Firstname'];
      // $Lastname = $_POST['Lastname'];
      // $Email = $_POST['Email'];
      // $Gender = $_POST['Gender'];

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
    <title>mybook| signup</title>
</head>
<body>
<nav class="navbar sticky-top p-4 navbar-light bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" style="color:white;">Content_Work_Book</a>
    <form class="d-flex">
      <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->

     <button class="btn btn-outline-success bg-danger" type="submit"> <a href="login.php">Login</a></button>
    </form>
  </div>
</nav>


<!-- login card -->
<div class="card mx-4 mx-md-5 shadow-5-strong" style="
        /* margin-top: 100px; */
        background: hsla(0, 0%, 100%, 0.8);
        /* backdrop-filter: blur(50px); */
        ">
<div class="card-body py-3 px-md-5">

<div class="row d-flex justify-content-center">
  <div class="col-lg-8">
    <h2 class="fw-bold mb-3">   Signup to mybook </h2>
    <?php if(!empty($result)){?>
      
				<div class="error-msg " style="text-align:center;font-size:14px;color:red;">
       
         <?php echo $result;?></div>
				<?php }?>
    <form  action="" method="POST" >
      <!-- 2 column grid layout with text inputs for the first and last names -->
 

      <div class="row">
              <div class="col-md-6 mb-4 ">
                <div class="form-outline">
                  <input  type="text" id="Firstname" name="Firstname" value="<?php echo $Firstname ?>" class="form-control" placeholder="firstname" required/>
                  <span></span>
             
                  <label class="form-label" for="Firstname">First name</label>

                </div>
              </div>
              <div class="col-md-6 mb-4">
                <div class="form-outline">
                  <input type="text" name="Lastname" id="Lastname" value="<?php echo $Lastname ?>" class="form-control" placeholder="lastname" required/>
                  <label class="form-label" for="Lastname">Last name</label>
                </div>
              </div>
            </div>
            <div class="row">
               <!-- Email input -->
               <div class="col-md-6 mb-4">
      <div class="form-outline ">
        <input type="email" id="form3Example3" name="Email" class="form-control" value="<?php echo $Email ?>" placeholder="Enter email" required/>
        <label class="form-label" for="form3Example3">Email address</label>
      </div>
      </div>
      <div class="col-md-6 mb-4">
      <select class="form-select " name="Gender" required aria-label="select  " value="<?php echo $Gender ?>" id=""  >
      <option selected disabled value="">Choose a gender...</option>
      <option value="Male">Male</option>
      <option value="Female">Female</option>
     
    </select>
   
    <label class="form-label" for="form3Example3">Gender</label>
      </div>
            </div>
     

      <!-- Password input -->
      <div class="form-outline mb-4">
        <input type="password" name="Password" id="form3Example4" class="form-control" placeholder="password" required/>
        <label class="form-label" for="form3Example4">Password</label>
      </div>
      <!-- confirm Password input -->
      <div class="form-outline mb-4">
        <input type="password" name="Password2" id="form3Example4" class="form-control" placeholder="Confirm password" required/>
        <label class="form-label" for="form3Example4">Password</label>
      </div>

      <!-- Checkbox -->
      <!-- <div class="form-check d-flex justify-content-center mb-4">
        <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />
        <label class="form-check-label" for="form2Example33">
          Subscribe to our newsletter
        </label>
      </div> -->

      <!-- Submit button -->
      <button type="submit" class="btn btn-primary btn-block mb-4">
        Submit
      </button>

      <!-- Register buttons -->
     
    </form>
  </div>
</div>
</div>
</body>
<script src="js/bootstrap.bundle.min.js"></script>

</html>