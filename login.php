<?php

include_once "back/auth.php";

if (!isset($_SESSION))
    session_start();
require('components/head.php');
$file = file_get_contents("components/header.php");
$file = str_replace("{in}", '', $file);
$file = str_replace("{adm}", ' ', $file);
$check = ft_auth(@$_POST['login'], @$_POST['password']);
if (@$_POST["submit"] === "Войти" && $check) {
    $_SESSION["logged"] = $check;
    header("Location: index.php");
}
echo $file;
?>

<section class="login">
    <div class="container">
        <h2 class="login-title">Авторизация</h2>
        <form class="login-form" method="POST">
            <input type="text" name="login" placeholder="Логин">
            <input type="password" name="password" placeholder="Пароль">
            <input type="submit" name="submit" value="Войти">
        </form>
    </div>
</section>

<?php
require('components/footer.php');
?>