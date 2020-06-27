<?php
if (!isset($_SESSION))
    session_start();
require('components/head.php');
$file = file_get_contents("components/header.php");
if (isset($_SESSION['logged'])) {
    $file = str_replace("{in}", 'Выйти', $file);
    // $file = str_replace("{in-out}", 'index.php', $file);
} else {
    $file = str_replace("{in}", 'Войти', $file);
    // $file = str_replace("{in-out}", 'login.php', $file);
}
echo $file;
