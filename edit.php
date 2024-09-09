<?php
session_start();
include("classes/connection.php");

// Create an instance of the Database class and connect to the database
$db = new Database();
$conn = $db->connect();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
    <link rel="stylesheet" href="./styles/home.css">
    <!-- Bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="box">
        <div class="logoImage d-flex py-3">
            <img src="./img/logo.png" alt="">
        </div>

        <table class="myTable">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Operation</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Use the read method to fetch data
                $sql = "SELECT * FROM `users`";
                $result = $db->read($sql);

                if ($result) {
                    foreach ($result as $row) {
                        $id = $row['id'];
                        $name = $row['name'];
                        $email = $row['email'];
                        $password = $row['password'];

                        echo '<tr>
                            <th scope="row">' . $id . '</th>
                            <td>' . $name . '</td>
                            <td>' . $email . '</td>
                            <td>' . $password . '</td>
                            <td>
                                <div class="button-container">
                                    <button class="btn btn-warning"><a href="update.php?updateid=' . $id . '" class="text-light text-decoration-none">Edit</a></button>
                                </div>
                            </td>
                        </tr>';
                    }
                } else {
                    echo '<tr><td colspan="5" class="text-center">No records found</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>


