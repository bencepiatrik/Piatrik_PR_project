<?php

namespace FS\lib;

class db
{
    private $host = "localhost";
    private $port = 3306;
    private $username = "root";
    private $password = "";
    private $dbName = "sixteen";
    private \PDO $connection;

    public function __construct(
        string $host = "",
        int $port = 3306,
        string $username = "",
        string $password = "",
        string $dbName = ""
    )
    {
        if(!empty($host)) {
            $this->host = $host;
        }

        if(!empty($port)) {
            $this->port = $port;
        }

        if(!empty($username)) {
            $this->username = $username;
        }

        if(!empty($password)) {
            $this->password = $password;
        }

        if(!empty($dbName)) {
            $this->dbName = $dbName;
        }

        try {
            $this->connection = new \PDO (
                "mysql:host=$this->host;dbname=$this->dbName;charset=utf8mb4",
                $this->username,
                $this->password
            );
        }
        catch (\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function getNav(): array
    {
        $sql = "SELECT name, url FROM nav";
        $query = $this->connection->query($sql);
        $data = $query->fetchAll(\PDO::FETCH_ASSOC);
        $navItems = [];

        foreach ($data as $navItem) {
            $navItems[$navItem['name']] = $navItem ["url"];

        }

        return $navItems;
    }
}

