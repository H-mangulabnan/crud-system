<?php
session_start();
include("classes/connection.php");

// Create an instance of the Database class and connect to the database
$db = new Database();
$conn = $db->connect();


$id = $_GET['updateid'];

$sql = "Select * from `users` where id=$id";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

$name = $row['name'];
$email = $row['email'];
$password = $row['password'];

//handle form submission
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    //updating the data
    $sql = "update `users` set name='$name', email='$email', password='$password'
    where id='$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: users.php");
        exit;
    } else {
        die(mysqli_error($conn));
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="./styles/update.css">
    <!--Bootstrap link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="box">
        <div class="logoImage d-flex py-3">
            <img src="./img/logo.png" alt="">
        </div>
        <form method="post" action="" class="d-flex flex-column justify-content-center align-items-center">
            <table class="myTable">
                <tr>
                    <td>Name:</td>
                    <td class="py-2"><input name="name" type="text" class="form-control" placeholder="Name" value="<?php echo $name ?>" required></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td class="py-2"><input name="email" type="email" class="form-control" placeholder="Email" value="<?php echo $email ?>" required></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td class="py-2"><input name="password" type="password" class="form-control" placeholder="Password" value="<?php echo $password ?>" required></td>
                </tr>
            </table>
            <div class="text-center my-5">
                <button type="submit" name="submit" class="btn btn-primary">Update</button>
            </div>


        </form>


    </div>

    <!--bootstrap js-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>