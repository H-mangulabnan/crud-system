<?php

include("classes/connection.php");
include("classes/signup.php");


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $signup = new Signup();
    $result = $signup->evaluate($_POST);

    if ($result != "") {
        echo "<div style='text-align: center; font-size:25px;'>";
        echo $result;
        echo "</div>";
    } else {
        header("Location: login.php");
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="./styles/signup.css">
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
            <img src="./img/Create acc.png" alt="enter acc" class="enterAccImage">
            <div class="mb-2">
                <input name="name" type="text" class="form-control" placeholder="Name" required>
            </div>
            <div class="mb-2">
                <input name="email" type="email" class="form-control" placeholder="Email" id="exampleInputEmail1" required>
            </div>
            <div class="mb-2">
                <input name="password" type="password" class="form-control" placeholder="Password" id="exampleInputPassword1" required>
            </div>
            <div class="mb-2">
                <button type="submit" class="btn btn-primary">Sign up</button>
            </div>
            <div class="text-center">
                <a href="login.php" style="text-decoration: none;">Already a user?</a>
            </div>
            <div class="loginButton">
                <button type="submit" class="btn btn-primary">Log in</button>
            </div>

        </form>


        <img src="./img/heart1.png" class="heart1 position-absolute">

    </div>



    <!--bootstrap js-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>