<?php

class Database
{
    private $host = "localhost";
    private $username = "root";
    private $password = "12345";
    private $db = "kuromi_db";
    private $conn;

    function connect()
    {
        $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->db);
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        return $this->conn;
    }

    function read($query)
    {
        $result = mysqli_query($this->conn, $query);

        if (!$result) {
            return false;
        } else {
            $data = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
            return $data;
        }
    }

    function save($query)
    {
        $result = mysqli_query($this->conn, $query);

        if (!$result) {
            return false;
        } else {
            return true;
        }
    }
}

?>
