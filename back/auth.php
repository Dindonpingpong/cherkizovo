<?php

include_once "config/connector.php";

function ft_auth($login, $pass)
{
    $link = ft_connect_to_db();
    $hash = hash('sha512', $pass);
    $sql = "SELECT Status from Clients where Nickname = '$login' and Password ='$hash'";
    $res = mysqli_query($link, $sql);
    $row = mysqli_fetch_row($res);
    if (isset($row))
        return $row[0];
    return false;
}

function ft_regist($login, $mail)
{
    $link = ft_connect_to_db();
    $sql_login = "SELECT * from Clients where Nickname = '$login'";
    $sql_mail = "SELECT * from Clients where Email ='$mail'";
    $res_login = mysqli_query($link, $sql_login);
    $res_mail = mysqli_query($link, $sql_mail);
    $row_login = mysqli_fetch_row($res_login);
    $row_mail = mysqli_fetch_row($res_mail);
    if (isset($row_login))
        exit("Данный логин используется\n");
    if (isset($row_mail))
        exit("Данная почта зарегистрирована\n");
    return true;
}

function ft_create($arr)
{
    $link = ft_connect_to_db();
    $sql = "INSERT INTO Clients (FirstName, LastName, NickName, Password, Email) VALUES ('$arr[firstname]', '$arr[lastname]', '$arr[login]', SHA2('$arr[password]', 512), '$arr[email]')";
    $res = mysqli_query($link, $sql);
    if (isset($res))
        header("Location: catalog.php");
    else
        exit("Ошибка на староне сервера, попробуйте позже\n");
}
