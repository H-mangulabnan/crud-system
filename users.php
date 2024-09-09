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
    <title>users</title>
    <link rel="stylesheet" href="./styles/home.css">
    <!--Bootstrap link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="box position-relative">
        <div class="logoImage d-flex pt-3">
            <img src="./img/logo.png" alt="">
        </div>

        <div class="text-center users">
            <h1 class="py-4">Users</h1>
        </div>

        <table class="myTable">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
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
                        
                        echo '<tr>
                            <th scope="row">' . $id . '</th>
                            <td>' . $name . '</td>
                            <td>' . $email . '</td>

                            <td>
                                <button class="btn btn-warning"><a href="edit.php" class="text-light text-decoration-none">Edit</a></button>
                                <button class="btn btn-danger"><a href="delete.php?deleteid=' . $id . '" class="text-light text-decoration-none">Delete</a></button>
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

    <!--bootstrap js-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>