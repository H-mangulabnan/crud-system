<?php

class Signup
{
    private $error = "";

    public function evaluate($data)
    {
        foreach ($data as $key => $value) {
            if (empty($value)) {
                $this->error .= $key . " is empty!";
            }
        }

        if ($this->error == "") {
            // no error
            return $this->create_user($data);
        } else {
            return $this->error;
        }
    }

    public function create_user($data)
    {
        if (isset($data['email']) && isset($data['password']) && isset($data['name'])) {
            $email = $data['email'];
            $password = $data['password'];
            $name = $data['name'];

            // Create a unique userid
            $userid = $this->create_userid();

            // Connect to the database
            $DB = new Database();
            $conn = $DB->connect();

            // Check if connection is successful
            if (!$conn) {
                return "Database connection failed";
            }

            // Prepare and execute the insert query
            $query = "INSERT INTO users (userid, name, email, password) VALUES ('$userid', '$name', '$email', '$password')";
            $result = $DB->save($query);

            if ($result) {
                return ""; // Success
            } else {
                return "Error creating user";
            }
        } else {
            return "Name, Email, or password is missing.";
        }
    }

    private function create_userid()
    {
        $length = rand(4, 19);
        $number = "";
        for ($i = 0; $i < $length; $i++) {
            $new_rand = rand(0, 9);
            $number .= $new_rand;
        }
        return $number;
    }
}

?>
