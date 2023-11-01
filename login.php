<?php require_once('include/lheader.php') ?>
<!-- <nav class="navbar navbar-expand-lg p-4 navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand"  href="#">MyWorkBook </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
  
      <div class="d-flex flex-right">
</div>
    </div>
  </div>


  
</nav> -->


<!-- login card -->
<div class="card mx-4 mx-md-5 shadow-5-strong" style="
        margin-top: 10px;
        background: hsla(0, 0%, 100%, 0.8);
        /* backdrop-filter: blur(30px); */
        ">
<div class="card-body py-5 px-md-5">

<div class="row d-flex justify-content-center">
  <div class="col-lg-8">
  <?php if(!empty($result)){?>
				<div class="error-msg " style="text-align:center;font-size:14px;color:red;"> <?php echo $result;?></div>
				<?php }?>
    <h2 class="fw-bold mb-5">   Login to mybook </h2>
 
    <form   method="post">
      

      <div class="form-outline mb-4">
        <input type="email" value="<?php echo $Email ?>" name="Email" id="Email" class="form-control" placeholder="email" required/>
        <label class="form-label" for="form3Example3">Email address</label>

      </div>

     
      <div class="form-outline mb-4">
        <input type="password" value="<?php echo $Password ?>" name="Password" id="Password" class="form-control" placeholder="password" required/>
        <label class="form-label" for="form3Example4">Password</label>
      </div>

     

    
      <button type="submit" class="btn btn-primary btn-block mb-4">
        Login
      </button>
      <a href="forgot.php">Forgot password?</a>

     
     
    </form>
  </div>
</div>
</div>
</body>
<script src="js/bootstrap.bundle.min.js"></script>
</html>