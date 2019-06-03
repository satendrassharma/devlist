<?php
include "./lib/header.php";
include "./lib/User.php";

Session::checkLogin();
$user = new User();

?>

<section class="lrform">
  <h2>Register</h2>
  <?php




  // if($_SERVER["REQUEST_METHOD"]="POST" && isset($_POST['register'])){
  //     // echo "submitting..";
  //     // echo "<script>alert('You clicked the button!');</script>";
  //     //  echo "<script>Swal.fire('Good job!','You clicked the button!','success' )</script>";
  //     $result=$user->userRegistration($_POST,$_FILES);
  //     echo $result;

  // }

  if (Session::get('msg')) {
    echo Session::get('msg');
    echo "<script>Swal.fire('Good job!','You clicked the button!','success' )</script>";
    Session::set("msg", " ");
  }


  ?>

  <form action="formsubmit.php" method="POST" enctype='multipart/form-data'>
    <div class="uinfo">
      <h3>Normal Info</h3>
      <input class="ninput" type="file" name="image" />
      <input class="ninput" type="text" name="name" placeholder="enter name" />
      <input class="ninput" type="number" name="age" placeholder="enter age" />
      <input class="ninput" type="text" name="profession" placeholder="eg.developer,data scientic">
      <input class="ninput" type="email" name="email" placeholder="enter email" />
      <input class="ninput" type="password" name="password" placeholder="enter password" />
    </div>
    <div class="uinfo">
      <h3>Educational Info</h3>
      <input class="ninput" type="text" name="_10th" placeholder="enter your 10th class school">
      <input class="ninput" type="text" name="_12th" placeholder="enter your 12th class school">
      <input class="ninput" type="text" name="college" placeholder="enter your college">
    </div>
    <div class="uinfo">
      <h3>Social Info</h3>
      <input class="ninput" type="url" name="facebook" placeholder="facebook url">
      <input class="ninput" type="url" name="twitter" placeholder="twitter url">
      <input class="ninput" type="url" name="youtube" placeholder="youtube url">
      <input class="ninput" type="url" name="github" placeholder="github url">

    </div>

    <input type="submit" name="register" value="Register" id="submit" />


  </form>
</section>

<script src="script.js">
</script>
</body>

</html>