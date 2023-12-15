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

    public function insertFormData(string $name, string $email, string $subject, string $message): bool
    {
        $sql = "INSERT INTO contact (full_name, email, subject, msg) VALUES (:full_name, :email, :subject, :msg)";

        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(':full_name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':subject', $subject);
            $stmt->bindParam(':msg', $message);
            $stmt->execute();

            return true;
        } catch (\PDOException $e) {
            echo "Insertion failed: " . $e->getMessage();
            return false;
        }
    }
}

