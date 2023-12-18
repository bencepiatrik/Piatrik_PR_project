<?php

include "lib/db.php";

use FS\lib\db;

$db = new db();

$siteData->activePage = isset($siteData->activePage) ? $siteData->activePage : 'Home';
?>


<link rel="stylesheet" href="assets/css/login.css">


<header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.php"><h2>Sixteen <em>Clothing</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
              <ul class="navbar-nav ml-auto">
                  <?php
                    $navItems = $db->getNav();
                    foreach ($navItems as $name => $url)
                    {
                        echo '<li class="nav-item ' . (($siteData->activePage == "".$name."") ? 'active' : '') . '">
                                <a class="nav-link" href="' . $url . '">' . $name . '</a>
                              </li>';
                    }
                  ?>

              </ul>
          </div>
        </div>
      </nav>

      <div class="profile-icon-container">
        <img src="assets\images\user.svg" alt="Profile Icon" id="profile-icon">
      </div>

      <?php include 'login.php'; ?>

</header>