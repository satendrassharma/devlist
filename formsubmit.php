 <?php
  include "./lib/header.php";
  include "./lib/User.php";
  $user = new User();
  // echo "submitting..";
  $result = $user->userRegistration($_POST, $_FILES);
  // echo $result;
  Session::set("msg", $result);
  header("Location:register.php");
  ?>