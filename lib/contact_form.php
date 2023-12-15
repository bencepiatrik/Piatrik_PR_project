<?php

include "db.php";

use FS\lib\db;

$db = new db();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $msg = $_POST["message"];

    $db->insertFormData($full_name, $email, $subject, $msg);

    header("Location: http://localhost/Piatrik_pr/contact.php?status=success");
    exit();

} else {
    echo "Form not submitted.";
}
?>
