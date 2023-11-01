<?php require_once('include/header.php') ?>

<div class="card mx-4 mx-md-5 shadow-5-strong" style="
        margin-top: 40px;
        background: hsla(0, 0%, 100%, 0.8);
        /* backdrop-filter: blur(30px); */
        ">
<div class="card-body py-5 px-md-5">

<div class="row d-flex justify-content-center">
  <div class="col-lg-8">
    <h2 class="fw-bold mb-3">   My Social Posts </h2>

<h4>content here</h4>
<img src="assets/img/hero.jpg" class="card-img " alt="...">

<br><br>
<dl class="row">
  <dt class="col-sm-3">Description lists</dt>
  <dd class="col-sm-9">
    <form action="" method="post">
      <!-- <label for="">Post Image</label> -->
      <input type="file" name="post_image" id="">
    <textarea name="post" id="post" class="form-control" cols="56" rows="5" ></textarea> 
    <!-- <button>Post</button> -->
    <input type="Submit" value="Post">

    </form>

</dd>

 

 
</dl>
</div>



</div>


<!-- start of the posted details -->
<div class="container d-flex">
  <div class=" card col-md-4 bg-info">
  <h3 class="text-center"><u>Peoples content here</u></h3>
  </div>


  <div class="card col-md-7">
  <?php

if ($posts) {
  foreach ($posts as $ROW ) {
    $user = new User();
    $ROW_USER = $user->get_user($ROW['UserID']);
    include('post.php');
  }
}


?>
  </div>
</div>
<!-- end of post details container -->

</div>



<?php require_once('include/Lfooter.php') ?>