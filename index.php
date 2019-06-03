<?php
include "./lib/header.php";
include "./lib/User.php";
$user = new User();


if (Session::get('login')) {
    $id = Session::get('id');
    $result = $user->getUserById($id);
    // print_r($result);
    // echo $id;
} else if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $user->getUserById($id);
} else {
    Session::checkSession();
}

// print_r($_SESSION);

?>


<section class="profile">
    <img src="<?php echo $result->image; ?>" alt="profile" />
    <div class="userinfo">

        <div class="Info">
            <h2>Normal Info</h2>
            <p><span>Name: </span>
                <?php echo $result->name; ?>
            </p>
            <p><span>Age: </span>
                <?php echo $result->age; ?>
            </p>
            <p><span>Profession:</span>
                <?php echo $result->profession; ?>
            </p>
            <p><span>email:</span>
                <?php echo $result->email; ?>
            </p>

        </div>
        <div class="Info">
            <h2>Educaional Info</h2>
            <p><span>10th: </span><?php echo $result->_10th; ?></p>
            <p><span>12th: </span><?php echo $result->_12th; ?></p>
            <p><span>college:</span><?php echo $result->college; ?></p>
        </div>
        <div class="Info">
            <h2>Social Info</h2>
            <p><span>facebook </span>&nbsp;<a href="<?php echo $result->furl; ?>"><i class="fab fa-facebook"></i></a></p>
            <p><span>twitter </span>&nbsp;<a href="<?php echo $result->turl; ?>"><i class="fab fa-twitter"></i></a></p>
            <p><span>github </span>&nbsp;<a href="<?php echo $result->gurl; ?>"><i class="fab fa-github"></i></a></p>
            <p><span>youtube </span>&nbsp;<a href="<?php echo $result->yurl; ?>"><i class="fab fa-youtube"></i></a></p>
        </div>

    </div>
</section>



</body>

</html>