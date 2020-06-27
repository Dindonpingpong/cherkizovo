<?php
if (!isset($_SESSION))
    session_start();
require('components/head.php');
$file = file_get_contents("components/header.php");
if (isset($_SESSION['logged'])) 
{
    if ($_SESSION['logged'] == 'adm')
        $file = str_replace("{adm}", '<li><a href="adm.php">Панель админа</a></li>', $file);
    else
        $file = str_replace("{adm}", ' ', $file);
    $file = str_replace("{in}", 'Выйти', $file);
}
else {
    $file = str_replace("{in}", 'Войти', $file);
    $file = str_replace("{adm}", ' ', $file);
}
echo $file;
