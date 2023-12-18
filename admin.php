<?php
if (!class_exists('FS\lib\db')) {
    include "lib/db.php";
}

use FS\lib\db as MyDb;

$db = new MyDb();

$products = $db->getProducss();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["addProduct"])) {
        $newProductName = $_POST["newProductName"];
        $newProductPrice = $_POST["newProductPrice"];
        $newProductProperties = $_POST["newProductProperties"];
        $newProductStars = $_POST["newProductStars"];
        $newProductImgSrc = $_POST["newProductImgSrc"];
        $newProductFeatured = isset($_POST["newProductFeatured"]) ? 1 : 0;
        $newProductFlashDeal = isset($_POST["newProductFlashDeal"]) ? 1 : 0;
        $newProductLastMinute = isset($_POST["newProductLastMinute"]) ? 1 : 0;

        $db->addProduct($newProductName, $newProductPrice, $newProductProperties, $newProductStars, $newProductImgSrc, $newProductFeatured, $newProductFlashDeal, $newProductLastMinute);

        header("Location: admin.php");
        exit();
    } elseif (isset($_POST["deleteProduct"])) {
        $productId = $_POST["productId"];
        $db->deleteProduct($productId);

        header("Location: admin.php");
        exit();
    } elseif (isset($_POST["editProduct"])) {
        $productId = $_POST["productId"];
        $productToEdit = $db->getProductById($productId);
        include "./parts/editForm.php";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/admin.css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h1 class="mt-4">Admin Panel</h1>
    <table class="table table-bordered mt-4">
        <thead class="thead-light">
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Properties</th>
            <th>Stars</th>
            <th>Image</th>
            <th>Featured</th>
            <th>Flash Deal</th>
            <th>Last Minute</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo $product['name']; ?></td>
                <td><?php echo $product['price']; ?></td>
                <td><?php echo $product['properties']; ?></td>
                <td><?php echo $product['stars']; ?></td>
                <td><?php echo $product['img_src']; ?></td>
                <td><?php echo $product['featured']; ?></td>
                <td><?php echo $product['flash_deal']; ?></td>
                <td><?php echo $product['last_minute']; ?></td>
                <td>
                    <form method="post" action="admin.php" style="display: inline-block;">
                        <input type="hidden" name="productId" value="<?php echo $product['id']; ?>">
                        <button type="submit" name="editProduct" class="btn btn-primary" onclick="toggleEditForm()">Edit</button>
                    </form>
                    <form method="post" action="admin.php" style="display: inline-block;">
                        <input type="hidden" name="productId" value="<?php echo $product['id']; ?>">
                        <button type="submit" name="deleteProduct" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <form method="post" action="admin.php" class="mt-4">
        <h2>Pridat novy produkt</h2>
        <div class="mb-3">
            <label for="newProductName" class="form-label">Name:</label>
            <input type="text" name="newProductName" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="newProductPrice" class="form-label">Price:</label>
            <input type="number" name="newProductPrice" step="0.01" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="newProductProperties" class="form-label">Properties:</label>
            <input type="text" name="newProductProperties" class="form-control">
        </div>
        <div class="mb-3">
            <label for="newProductStars" class="form-label">Stars:</label>
            <input type="number" name="newProductStars" class="form-control">
        </div>
        <div class="mb-3">
            <label for="newProductImgSrc" class="form-label">Image Source:</label>
            <input type="text" name="newProductImgSrc" class="form-control">
        </div>
        <div class="form-check mb-3">
            <input type="checkbox" name="newProductFeatured" class="form-check-input">
            <label for="newProductFeatured" class="form-check-label">Featured</label>
        </div>
        <div class="form-check mb-3">
            <input type="checkbox" name="newProductFlashDeal" class="form-check-input">
            <label for="newProductFlashDeal" class="form-check-label">Flash Deal</label>
        </div>
        <div class="form-check mb-3">
            <input type="checkbox" name="newProductLastMinute" class="form-check-input">
            <label for="newProductLastMinute" class="form-check-label">Last Minute</label>
        </div>
        <button type="submit" name="addProduct" class="btn btn-primary">Add Product</button>
    </form>

    <script src="assets/js/admin.js"></script>

</body>
</html>