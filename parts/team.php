<?php

if (!class_exists('FS\lib\db')) {
    include "lib/db.php";
}

use FS\lib\db as MyDb;

$db = new MyDb();

$team = $db->getTeam();

?>

<div class="team-members">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Our Team Members</h2>
                </div>
            </div>

            <?php
            foreach ($team as $member) {
                echo '<div class="col-md-4">';
                echo '<div class="team-member">';
                echo '<div class="thumb-container">';
                echo '<img src="' . $member['img_src'] . '" alt="">';
                echo '<div class="hover-effect">';
                echo '<div class="hover-content">';
                echo '<ul class="social-icons">';
                echo '<li><a href="#"><i class="fa fa-facebook"></i></a></li>';
                echo '<li><a href="#"><i class="fa fa-twitter"></i></a></li>';
                echo '<li><a href="#"><i class="fa fa-linkedin"></i></a></li>';
                echo '<li><a href="#"><i class="fa fa-behance"></i></a></li>';
                echo '</ul>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '<div class="down-content">';
                echo '<h4>' . $member['full_name'] . '</h4>';
                echo '<span>' . $member['position'] . '</span>';
                echo '<p>' . $member['description'] . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</div>