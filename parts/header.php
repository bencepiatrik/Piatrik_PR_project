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

    <div id="login-form" style="display: none;">
        <span id="close-icon">&times;</span>
        <form action="parts/login.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <input type="submit" value="Login">
        </form>
    </div>

</header>


