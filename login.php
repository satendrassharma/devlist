<?php
include "./lib/header.php";
include "./lib/User.php";
?>
<?php
$user = new User();
Session::checkLogin();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $result = $user->userLogin($_POST);
}

?>
<section class="lrform">
    <h2>login</h2>
    <!-- <span class="error">Error:</span>
        <span class="success">Success:</span> -->
    <?php
    if (isset($result)) {
        echo $result;
    }
    ?>
    <form action="" method="POST">
        <input class="ninput" type="email" name="email" placeholder="enter email" />
        <input class="ninput" type="password" name="password" placeholder="enter password" />
        <input type="submit" name="login" value="Login">
    </form>
</section>

</body>

</html>