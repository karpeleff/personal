<?php

//use PDO;


class DB {

    private $conn;

    public function  __construct()
    {
        $this->connect();

    }

    private function connect()
    {
        $servername = "localhost";
        $username   = "root";
        $password   = "";
        $database   = "testdb";

        try {
            $this->conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return $this;

    }

    public function prepare($sql)
    {
        $res = $this->conn->prepare($sql);
        $res->execute();

    }

    public function query(string $sql, $params = []): ?array
    {
        $sth = $this->conn->prepare($sql);
        $result = $sth->execute($params);

        if (false === $result) {
            return null;
        }

        return $sth->fetchAll();
    }

}

?>
