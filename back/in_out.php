<?php
if (!isset($_SESSION))
    session_start();
$file = file_get_contents("components/header.php");
if (isset($_SESSION['logged'])) {
    session_destroy();
    $file = str_replace("{in}", 'Войти', $file);
    $file = str_replace("{in-out}", 'login.php', $file);
    header("Location: ../index.php");
} else {
    $file = str_replace("{in}", 'Выйти', $file);
    $file = str_replace("{in-out}", 'index.php', $file);
    header("Location: ../login.php");
}
