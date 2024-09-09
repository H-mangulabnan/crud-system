<?php

class Login
{
    private $error = "";

    public function evaluate($data)
    {
        $email = addslashes($data['email']);
        $password = addslashes($data['password']);

        //query to check if the user exists
        $query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
        $DB = new Database();
        $DB->connect();  // Ensure connection is made
        $result = $DB->read($query);

        if ($result) {
            $row = $result[0];

            if ($password == $row['password']) {
                // Create session data
                $_SESSION['kuromi_userid'] = $row['userid'];
            } else {
                $this->error .= "Wrong Password<br>";
            }
        } else {
            $this->error .= "<div class='alert alert-danger' role='alert'>Email does not exist. Please <a href='signup.php' class='alert-link'>register first</a>.</div>";
        }

        return $this->error;
    }
}
