

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  
    <!-- <link rel="stylesheet" href="style.css"> -->
    <title>mybook| Forgot</title>
</head>
<body>
<nav class="navbar navbar-expand-lg p-4 navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" style="font-size:40px;" href="#">MyBook </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        
        <!-- <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Link</a>
        </li> -->
      </ul>
      <div class="d-flex">
        <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->
        <button class="btn btn-outline-success bg-danger" type="submit"><a href="signup.php">Signup</a></button>
</div>
    </div>
  </div>


  
</nav>


<!-- login card -->
<div class="card mx-4 mx-md-5 shadow-5-strong" style="
        /* margin-top: 70px; */
        background: hsla(0, 0%, 100%, 0.8);
        backdrop-filter: blur(30px);
        ">
<div class="card-body py-5 px-md-5">

<div class="row d-flex justify-content-center">
  <div class="col-lg-8">
    <h2 class="fw-bold mb-3">   Reset My Password </h2>
    <form class="row g-3 needs-validation" novalidate   method="POST" action="classes/send_password.php">
      <!-- 2 column grid layout with text inputs for the first and last names -->
      

    
          
               <!-- Email input -->
               <div class="form-outline mb-4">
        <input type="email" id="form3Example3" name="email" class="form-control" placeholder="Enter email" required>
        <div class="invalid-feedback">
        Please choose a email.
      </div>
        <label class="form-label" for="form3Example3">Email address</label>
      </div>
     
     
     

     
     

      <!-- Submit button -->
      <div class="col-12">
      <button type="submit"  name="send_reset_pass_link"  class="btn btn-primary btn-block mb-4">
        Reset
      </button>
      <a href="login.php">Back to Login?</a>
</div>
      <!-- Register buttons -->
     
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