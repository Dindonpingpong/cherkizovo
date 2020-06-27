<?php

include_once "config/connector.php";

function ft_auth($login, $pass)
{
    $link = ft_connect_to_db();
    $hash = hash('sha512', $pass);
    $sql = "SELECT Department from Staff where Login = '$login' and Password ='$hash'";
    $res = mysqli_query($link, $sql);
    $row = mysqli_fetch_row($res);
    if (isset($row))
        return $row[0];
    return false;
}
