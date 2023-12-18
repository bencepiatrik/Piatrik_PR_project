<?php

if (!class_exists('FS\lib\db')) {
    include "lib/db.php";
}

use FS\lib\db as MyDb;

$db = new MyDb();

$services = $db->getServices();

?>



<div class="services">
    <div class="container">
        <div class="row">
            <?php
            foreach ($services as $service) {
                echo '<div class="col-md-4">';
                echo '<div class="service-item">';
                echo '<div class="icon">';
                echo '<i class="fa fa-gear"></i>';
                echo '</div>';
                echo '<div class="down-content">';
                echo '<h4>' . $service['name'] . '</h4>';
                echo '<p>' . $service['description'] . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</div>