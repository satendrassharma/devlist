<?php
include "./lib/header.php";
include "./lib/User.php";
$user = new User();


?>


<section class="profiles">
  <h2>Profiles</h2>
  <div class="lists">


    <?php
    $userdata = $user->getAllUsers();
    if ($userdata) {
      foreach ($userdata as $sdata) { ?>
        <a href="index.php?id=<?php echo $sdata['id']; ?>">
          <div class="list">
            <img src="<?php echo $sdata['image']; ?>" alt="img" />
            <div class="listinfo">
              <p><strong>Name: </strong><?php echo $sdata['name'] ?></p>
              <p><strong>profession: </strong><?php echo $sdata['profession'] ?></p>
              <p><strong>email: </strong><?php echo $sdata['email'] ?></p>
            </div>
          </div>
        </a>
      <?php

    }
  }
  ?>


  </div>
</section>
</body>

</html>