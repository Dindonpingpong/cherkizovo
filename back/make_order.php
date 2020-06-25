<?php

include_once "config/connector.php";

function ft_get_user_id($login, $link)
{
    $sql = "SELECT UserID FROM Clients WHERE NickName = '$login'";
    $res = mysqli_query($link, $sql);
    $row = mysqli_fetch_row($res);
    return $row[0];
}

function ft_order($login, $orders_position, $status = 'Оплачен')
{
    $link = ft_connect_to_db();
    $UserID = ft_get_user_id($login, $link);
    $sql_add_order = "INSERT INTO Orders (ClientID, Status)  VALUES ($UserID, '$status')";
    $res = mysqli_query($link, $sql_add_order);
    $row = @mysqli_fetch_row($res);
    if (!isset($row))
        return "Закан не был создан";
    foreach ($orders_position as $val) {
        $NikcName = $val['name'];
        $Quantity = $val['quantity'];
        $sql_add_product = "INSERT INTO OrdersPosition (OrderID, ProductID, Quantity) 
        VALUES 
        (($UserID), 
        (SELECT ProductID FROM Products WHERE Name = '$NikcName'), $Quantity)";
        $res = mysqli_query($link, $sql_add_order);
        $row = mysqli_fetch_row($res);
        if (!isset($row))
            return "Товар не был добавлен";
    }
    return "Заказ оплачен";
}
?>

