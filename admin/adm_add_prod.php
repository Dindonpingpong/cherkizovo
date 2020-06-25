<?php

include_once "back/get_items.php";
include_once "config/connector.php";

function ft_check_name($name, $tag, $link) {
    if (strlen($name) == 0)
        return "Нет названия товара";
    $sql_check_name = "SELECT Name FROM Products WHERE Name = '$name'";
    $res = mysqli_query($link, $sql_check_name);
    $row = mysqli_fetch_row($res);
    if (isset($row))
        return "Такое название уже есть в базе";
    return true;
}

function ft_check_tag($tag, $link) {
    $sql_check_tag = "SELECT Name FROM Tags WHERE Name = '$tag'";
    $res = mysqli_query($link, $sql_check_tag);
    $row = mysqli_fetch_row($res);
    if (isset($row))
        return false;
    return true;
}

function ft_add_prod($arr)
{
    $name = $arr['name'];
    $desc = $arr['desc'];
    $price = $arr['price'];
    $quan = $arr['quan'];
    $path = $arr['path'];
    $tag = $arr['tag'];
    $link = ft_connect_to_db();
    $ret = ft_check_name($name, $tag, $link);
    if (!isset($ret))
        return $ret;
    if (ft_check_tag($tag, $link)) {
        $sql_check_tag = "INSERT INTO Tags (Name) VALUES ('$tag')";
        $res = mysqli_query($link, $sql_check_tag);
        $row = mysqli_fetch_row($res);
        if (isset($row))
            return 'Не удалось добавить тэг';
    }

    $sql_insert = "INSERT INTO Products (Name, Description, Price, Quantity, Path) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($link, $sql_insert);
    mysqli_stmt_bind_param($stmt, 'ssdis' ,$name, $desc, $price, $quan, $path);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    $sql_insert_tag = "INSERT INTO Products_Tags VALUES 
    (( SELECT TagID FROM Tags WHERE Name = '$tag'), (SELECT ProductID FROM Products WHERE Name = '$name'))";
    $res = mysqli_query($link, $sql_insert_tag);
    $row = mysqli_fetch_row($res);
    if (isset($row))
        return 'Не удалось добавить товар';
    return 'OK';
}
