<?php

namespace FS\lib;

$db = new db();

?>
<div id="login-form" style="display: none;">
    <span id="close-icon">&times;</span>
    <form action="./parts/login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <input type="submit" value="Login">
    </form>
</div>

<?php
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $username = $_POST["username"];
     $password = $_POST["password"];

     if ($db->checkUser($username, $password)) {
         header("Location: http://localhost/Piatrik_pr/admin.php");
         exit();
     } else {
         echo "Access denied";
     }

 } else {
     echo "";
 }
?>
