<?php require_once('include/header.php') ?>

<div class="container">
<!-- 
<div class="card mx-4 mx-md-5 shadow-5-strong" style="
        margin-top: 30px;
        background: hsla(0, 0%, 100%, 0.8);
        /* backdrop-filter: blur(30px); */
        ">
<div class="card-body py-5 px-md-3">

<div class="row d-flex justify-content-center">
  <div class="col-lg-8">
  <h2 class="fw-bold mb-3">   Welcome <?php echo $user_data['Firstname'] ?> to your dashboard </h2>
    <img src="assets/img/hero.jpg" alt="" class="card-img-top">
    
 



  
  </div>
</div>
</div> -->





<!-- Section: Design Block -->
<section class="text-center">
  <!-- Background image -->
  <div class="p-5 bg-image" style="
        background-image: url('assets/img/hero.jpg');
        background-position: center;
        background-size: cover;
        height: 300px;
        "></div>
  <!-- Background image -->

  <div class="card mx-4 mx-md-2 shadow-5-strong" style="
        margin-top: -100px;
        background: hsla(0, 0%, 100%, 0.8);
        /* backdrop-filter: blur(30px); */
        ">
       
    <div class="card-body py-5 px-md-5">

      <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
        <h2 class="fw-bold mb-3">   Welcome <?php echo $user_data['Firstname'] ?> to your dashboard </h2>
        
        
        <!-- start of card -->
        <div class="card">

          <?php
          $image = "";
          
          if(file_exists($user_data['Profile_image'] )) {
           $image = $user_data['Profile_image'] ;
          }
          ?>

          <center>
          <img src="<?php echo $image ?>" class="profile " width="110" height="100" alt="...">

          </center>

  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
<!-- end of card -->




        </div>

        
      </div>
    </div>
    <div class="row">
              <div class="col-md-4 mb-4">

        <!-- start of card -->
        <div class="card">
  <!-- <img src="assets/img/hero.jpg" class="img-thumbnail " alt="..."> -->

  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
</div>
<!-- end of card -->

    <!-- start of card -->
    <div class="col-md-4 mb-4">
    <div class="card">
  <!-- <img src="assets/img/hero.jpg" class="img-thumbnail " alt="..."> -->

  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
</div>
<!-- end of card -->

    <!-- start of card -->
    <div class="col-md-4 mb-4">
    <div class="card">
  <!-- <img src="assets/img/hero.jpg" class="img-thumbnail " alt="..."> -->

  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
</div>
<!-- end of card -->
    </div>
  </div>
</section>
<!-- Section: Design Block -->
<section>

</section>

</div>



</body>
<script src="js/bootstrap.bundle.min.js"></script>
</html>