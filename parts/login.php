<?php
session_start();

include "../lib/db.php";

use FS\lib\db;

$db = new db();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $isValidUser = $db->checkUser($username, $password);

    if ($isValidUser) {
        $_SESSION["username"] = $username;
        header("Location: http://localhost/Piatrik_pr/admin.php");
        exit();
    } else {
        header("Location: http://localhost/Piatrik_pr/index.php");
    }
}
?>
