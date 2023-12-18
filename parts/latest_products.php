<?php

if (!class_exists('FS\lib\db')) {
    include "lib/db.php";
}
use FS\lib\db as MyDb;

$db = new MyDb();

$latestItems = $db->getLatestItems();
?>

<div class="latest-products">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Latest Products</h2>
                    <a href="products.php">View All Products <i class="fa fa-angle-right"></i></a>
                </div>
            </div>

            <?php foreach ($latestItems as $item): ?>
                <div class="col-md-4">
                    <div class="product-item">
                        <a href="#"><img src="<?= $item['img_src'] ?>" alt=""></a>
                        <div class="down-content">
                            <a href="#"><h4><?= $item['name'] ?></h4></a>
                            <h6>$<?= $item['price'] ?></h6>
                            <p><?= $item['properties'] ?></p>

                            <ul class="stars">
                                <?php
                                $stars = (int)$item['stars'];

                                for ($i = 1; $i <= 5; $i++) {
                                    $starClass = ($i <= $stars) ? '' : '-o';
                                    echo '<li><i class="fa fa-star' . $starClass . '"></i></li>';
                                }
                                ?>
                            </ul>
                            <span>Reviews (<?= rand(10, 50) ?>)</span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>

