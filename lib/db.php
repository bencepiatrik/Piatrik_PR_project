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

    public  function getLatestItems(): array
    {
        $sql = "SELECT * FROM products ORDER BY date DESC LIMIT 3";
        $query = $this->connection->query($sql);
        $data = $query->fetchAll(\PDO::FETCH_ASSOC);
        $latestItems = [];

        foreach ($data as $item) {
            $latestItems[] = [
                'id' => $item['id'],
                'name' => $item['name'],
                'price' => $item['price'],
                'properties' => $item['properties'],
                'stars' => $item['stars'],
                'img_src' => $item['img_src'],
                'featured' => $item['featured'],
                'flash_deal' => $item['flash_deal'],
                'last_minute' => $item['last_minute'],
                'date' => $item['date']
            ];
        }
        return $latestItems;
    }

    public function getProducss(): array
    {
        $sql = "SELECT * FROM products";
        $query = $this->connection->query($sql);
        $data = $query->fetchAll(\PDO::FETCH_ASSOC);
        $products = [];

        foreach ($data as $item) {
            $products[] = [
                'id' => $item['id'],
                'name' => $item['name'],
                'price' => $item['price'],
                'properties' => $item['properties'],
                'stars' => $item['stars'],
                'img_src' => $item['img_src'],
                'featured' => $item['featured'],
                'flash_deal' => $item['flash_deal'],
                'last_minute' => $item['last_minute'],
                'date' => $item['date']
            ];
        }
        return $products;
    }
    public function addProduct($name, $price, $properties, $stars, $img_src, $featured, $flashDeal, $lastMinute)
    {
        try {
            $sql = "INSERT INTO products (name, price, properties, stars, img_src, featured, flash_deal, last_minute) 
                    VALUES (:name, :price, :properties, :stars, :img_src, :featured, :flashDeal, :lastMinute)";

            $stmt = $this->connection->prepare($sql);

            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':properties', $properties);
            $stmt->bindParam(':stars', $stars);
            $stmt->bindParam(':img_src', $img_src);
            $stmt->bindParam(':featured', $featured, \PDO::PARAM_INT);
            $stmt->bindParam(':flashDeal', $flashDeal, \PDO::PARAM_INT);
            $stmt->bindParam(':lastMinute', $lastMinute, \PDO::PARAM_INT);

            $stmt->execute();

            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function deleteProduct($productId)
    {
        try {
            $sql = "DELETE FROM products WHERE id = :productId";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(':productId', $productId, \PDO::PARAM_INT);
            $stmt->execute();

            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function getProductById($productId)
    {
        $sql = "SELECT * FROM products WHERE id = :productId";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':productId', $productId, \PDO::PARAM_INT);
        $stmt->execute();

        $data = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($data === false) {
            return null;
        }
        return [
            'id' => $data['id'],
            'name' => $data['name'],
            'price' => $data['price'],
            'properties' => $data['properties'],
            'stars' => $data['stars'],
            'img_src' => $data['img_src'],
            'featured' => $data['featured'],
            'flash_deal' => $data['flash_deal'],
            'last_minute' => $data['last_minute'],
            'date' => $data['date']
        ];

    }

    public function saveEdit($productId, $name, $price, $properties, $stars, $imgSrc, $featured, $flashDeal, $lastMinute) {
        $sql = "UPDATE products 
            SET 
                name = :name,
                price = :price,
                properties = :properties,
                stars = :stars,
                img_src = :imgSrc,
                featured = :featured,
                flash_deal = :flashDeal,
                last_minute = :lastMinute
            WHERE 
                id = :productId";

        $stmt = $this->connection->prepare($sql);

        $stmt->bindParam(':name', $name, \PDO::PARAM_STR);
        $stmt->bindParam(':price', $price, \PDO::PARAM_STR);
        $stmt->bindParam(':properties', $properties, \PDO::PARAM_STR);
        $stmt->bindParam(':stars', $stars, \PDO::PARAM_INT);
        $stmt->bindParam(':imgSrc', $imgSrc, \PDO::PARAM_STR);
        $stmt->bindParam(':featured', $featured, \PDO::PARAM_INT);
        $stmt->bindParam(':flashDeal', $flashDeal, \PDO::PARAM_INT);
        $stmt->bindParam(':lastMinute', $lastMinute, \PDO::PARAM_INT);
        $stmt->bindParam(':productId', $productId, \PDO::PARAM_INT);

        $stmt->execute();
    }

    public function getTeam(): array
    {
        $sql = "SELECT * FROM team";
        $query = $this->connection->query($sql);
        $data = $query->fetchAll(\PDO::FETCH_ASSOC);
        $team = [];

        foreach ($data as $item) {
            $team[] = [
                'full_name' => $item['full_name'],
                'position' => $item['position'],
                'description' => $item['description'],
                'img_src' => $item['img_src']
            ];
        }
        return $team;
    }
    public function getServices(): array
    {
        $sql = "SELECT * FROM services";
        $query = $this->connection->query($sql);
        $data = $query->fetchAll(\PDO::FETCH_ASSOC);
        $services = [];

        foreach ($data as $item) {
            $services[] = [
                'name' => $item['name'],
                'description' => $item['description']
            ];
        }
        return $services;
    }

    public function checkUser($username, $password): bool
    {
        $username = $this->connection->quote($username);
        $password = $this->connection->quote($password);

        $sql = "SELECT COUNT(*) as count FROM admin WHERE username = $username AND password = $password";
        $query = $this->connection->query($sql);
        $result = $query->fetch(\PDO::FETCH_ASSOC);

        if ($result['count'] == 1) {
            return true;
        } else {
            return false;
        }
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

