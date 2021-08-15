<?php

$db_host = "localhost";
$db_user = "minevers_root";
$db_pass = "user@mineversal.c0m";
$db_name = "minevers_mineversal";

try {
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
} catch(PDOException $e) {
    die("Terjadi masalah: ". $e->getMessage());
}
?>