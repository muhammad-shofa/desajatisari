<?php

class database
{
    private $hostname = "localhost";
    private $username = "root";
    private $password = "";
    private $db_name = "desajatisari";
    private $connection;

    // try connection
    function connection()
    {
        $this->connection = mysqli_connect($this->hostname, $this->username, $this->password, $this->db_name);
        // mysqli_select_db($this->connection, $this->db_name);

    }

    // connected
    public function connected()
    {
        return $this->connection;
    }
}
?>