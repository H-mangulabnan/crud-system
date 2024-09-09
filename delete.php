<?php
include("classes/connection.php");

$db = new Database();
$conn = $db->connect();

if(isset($_GET['deleteid'])) {
    $id = $_GET['deleteid']; // Accessing the deleteid from the URL

    // Delete the user
    $sql = "DELETE FROM `users` WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    
    if($result){
        // Reset auto-increment
        $sql_reset_ai = "SET @new_id = 0; UPDATE `users` SET `id` = (@new_id := @new_id + 1); ALTER TABLE `users` AUTO_INCREMENT = 1;";
        mysqli_multi_query($conn, $sql_reset_ai);
        header('location:users.php');
        exit;
    } else {
        die(mysqli_error($conn));
    }
}
?>
