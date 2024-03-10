<?php

class database
{
    private $hostname = "localhost";
    private $username = "root";
    private $password = "";
    private $db_name = "desajatisari";
    private $connection;

    // try connection
    function __construct()
    {
        $this->connection = mysqli_connect($this->hostname, $this->username, $this->password, $this->db_name);
        // mysqli_select_db($this->connection, $this->db_name);
    }

    // connected
    public function connected()
    {
        return $this->connection;
    }

    public function __destruct()
    {
        $this->connection->close();
    }
}

$db = new database();
$connected = $db->connected();


?>