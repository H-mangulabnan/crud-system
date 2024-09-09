<?php
session_start();

include("classes/connection.php");
include("classes/login.php");

$errorMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = new Login();
    $result = $login->evaluate($_POST);

    if ($result != "") {
        $errorMessage = $result;
    } else {
        header("Location: users.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./styles/style.css">
    <!--Bootstrap link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="box position-relative">
        <div class="clouds">
            <div class="slide">
                <img src="./img/cloud1.png" class="cloud1">
                <img src="./img/cloud2.png" class="cloud2">
                <img src="./img/cloud3.png" class="cloud3">
            </div>
            <div class="slide">
                <img src="./img/cloud1.png" class="cloud1">
                <img src="./img/cloud2.png" class="cloud2">
                <img src="./img/cloud3.png" class="cloud3">
            </div>
        </div>
        
        <div class="kuromi position-absolute">
            <img src="./img/kuromi.png" alt="kuromi" class="kuromiPic">
        </div>
        <form method="post" action="" class="d-flex flex-column justify-content-center align-items-center">
            <img src="./img/logo.png" alt="logo" class="logo">
            <img src="./img/enter acc.png" alt="enter acc" class="enterAccImage">

            <?php
            if ($errorMessage != "") {
                echo $errorMessage;
            }
            ?>

            <div class="mb-3">
                <input name="email" type="email" class="form-control" placeholder="Email" id="exampleInputEmail1" required>
            </div>
            <div class="mb-3">
                <input name="password" type="password" class="form-control" placeholder="Password" id="exampleInputPassword1" required>
            </div>
            <div class="mb-2">
                <button type="submit" class="btn btn-primary">Log in</button>
            </div>
            <div class="mt-3">
                <a href="signup.php" class="button">Sign up</a>
            </div>
        </form>

        <img src="./img/heart1.png" class="heart1 position-absolute">
    </div>

    <!--bootstrap js-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
