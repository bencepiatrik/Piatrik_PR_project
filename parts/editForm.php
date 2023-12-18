<?php
class editDb
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
        if (!empty($host)) {
            $this->host = $host;
        }

        if (!empty($port)) {
            $this->port = $port;
        }

        if (!empty($username)) {
            $this->username = $username;
        }

        if (!empty($password)) {
            $this->password = $password;
        }

        if (!empty($dbName)) {
            $this->dbName = $dbName;
        }

        try {
            $this->connection = new \PDO(
                "mysql:host=$this->host;dbname=$this->dbName;charset=utf8mb4",
                $this->username,
                $this->password
            );
        } catch (\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function saveEdit($productId, $name, $price, $properties, $stars, $imgSrc, $featured, $flashDeal, $lastMinute)
    {
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
}

$db = new editDb();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["saveEdit"])) {
        $productId = $_POST["productId"];
        $editedProductName = $_POST["editedProductName"];
        $editedProductPrice = $_POST["editedProductPrice"];
        $editedProductProperties = $_POST["editedProductProperties"];
        $editedProductStars = $_POST["editedProductStars"];
        $editedProductImgSrc = $_POST["editedProductImgSrc"];
        $editedProductFeatured = isset($_POST["editedProductFeatured"]) ? 1 : 0;
        $editedProductFlashDeal = isset($_POST["editedProductFlashDeal"]) ? 1 : 0;
        $editedProductLastMinute = isset($_POST["editedProductLastMinute"]) ? 1 : 0;

        $db->saveEdit($productId, $editedProductName, $editedProductPrice, $editedProductProperties, $editedProductStars, $editedProductImgSrc, $editedProductFeatured, $editedProductFlashDeal, $editedProductLastMinute);

        header("Location: http://localhost/Piatrik_pr/admin.php");
        exit();
    }
}
?>

<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<div id="editFormContainer" class="edit-form-container">
    <form method="post" action="./parts/editForm.php">
        <h2>Edit Product</h2>
        <div class="mb-3">
            <label for="editedProductName" class="form-label">Name:</label>
            <input type="text" name="editedProductName" value="<?php echo $productToEdit['name']; ?>" required class="form-control">
        </div>
        <div class="mb-3">
            <label for="editedProductPrice" class="form-label">Price:</label>
            <input type="number" name="editedProductPrice" value="<?php echo $productToEdit['price']; ?>" step="0.01" required class="form-control">
        </div>
        <div class="mb-3">
            <label for="editedProductProperties" class="form-label">Properties:</label>
            <input type="text" name="editedProductProperties" value="<?php echo $productToEdit['properties']; ?>" class="form-control">
        </div>
        <div class="mb-3">
            <label for="editedProductStars" class="form-label">Stars:</label>
            <input type="number" name="editedProductStars" value="<?php echo $productToEdit['stars']; ?>" class="form-control">
        </div>
        <div class="mb-3">
            <label for="editedProductImgSrc" class="form-label">Image Source:</label>
            <input type="text" name="editedProductImgSrc" value="<?php echo $productToEdit['img_src']; ?>" class="form-control">
        </div>
        <div class="form-check mb-3">
            <input type="checkbox" name="editedProductFeatured" <?php echo $productToEdit['featured']; ?> class="form-check-input">
            <label for="editedProductFeatured" class="form-check-label">Featured</label>
        </div>
        <div class="form-check mb-3">
            <input type="checkbox" name="editedProductFlashDeal" <?php echo $productToEdit['flash_deal']; ?> class="form-check-input">
            <label for="editedProductFlashDeal" class="form-check-label">Flash Deal</label>
        </div>
        <div class="form-check mb-3">
            <input type="checkbox" name="editedProductLastMinute" <?php echo $productToEdit['last_minute']; ?> class="form-check-input">
            <label for="editedProductLastMinute" class="form-check-label">Last Minute</label>
        </div>
        <input type="hidden" name="productId" value="<?php echo $productToEdit['id']; ?>">
        <button type="submit" name="saveEdit" class="btn btn-primary">Save Changes</button>
    </form>
</div>
