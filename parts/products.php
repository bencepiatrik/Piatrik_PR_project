<?php
if (!class_exists('FS\lib\db')) {
    include "lib/db.php";
}

use FS\lib\db as MyDb;

$db = new MyDb();

$products = $db->getProducss();
?>

<div class="products">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="filters">
                    <ul>
                        <li class="active" data-filter="*">All Products</li>
                        <li data-filter=".des">Featured</li>
                        <li data-filter=".dev">Flash Deals</li>
                        <li data-filter=".gra">Last Minute</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-12">
                <div class="filters-content">
                    <div class="row grid">
                        <?php foreach ($products as $product) : ?>
                            <?php
                                $classes = '';
                                if ($product['featured'] == 1) {
                                    $classes .= ' des';
                                }
                                if ($product['flash_deal'] == 1) {
                                    $classes .= ' dev';
                                }
                                if ($product['last_minute'] == 1) {
                                    $classes .= ' gra';
                                }
                            ?>
                            ?>
                            <div class="col-lg-4 col-md-4 all<?= $classes ?>">
                                <div class="product-item">
                                    <a href="#"><img src="<?= $product['img_src'] ?>" alt=""></a>
                                    <div class="down-content">
                                        <a href="#"><h4><?= $product['name'] ?></h4></a>
                                        <h6>$<?= $product['price'] ?></h6>
                                        <p><?= $product['properties'] ?></p>
                                        <ul class="stars">
                                            <?php for ($i = 0; $i < $product['stars']; $i++) : ?>
                                                <li><i class="fa fa-star"></i></li>
                                            <?php endfor; ?>
                                        </ul>
                                        <span>Reviews (<?= rand(10, 50) ?>)</span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <ul class="pages">
                    <li class="active" ><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
