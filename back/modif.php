<?php
include_once "config/connector.php";

function ft_change($new, $login, $type) {
    $link = ft_connect_to_db();
    if ($type == 'email')
        $mod = "Email = '$new'";
    else if ($type == 'phone')
        $mod = 'Phone =' . $new;
    else if ($type == 'passwd')
        $mod = "Password = '$new'";
    $sql = "UPDATE Staff SET $mod WHERE Login = '$login'";
    mysqli_query($link, $sql);
    if ($type !== 'passwd')
        header("Location: me.php");
}

function ft_check_old_pass($old, $login) {
    $link = ft_connect_to_db();
    $sql = "SELECT Login FROM Staff WHERE Password = '$old'";
    $res = mysqli_query($link, $sql);
    $row = mysqli_fetch_row($res);
    if (!$row || $row[0] != $login) {
        echo "<script language='javascript'>alert('Пароль неверный')</script>";
        return false;
    }
    return true;
}

function ft_add_task($id, $department, $price, $description) {
    $link = ft_connect_to_db();
    $sql = "INSERT INTO $department (Price, Description, StaffID) VALUES ($price, '$description', $id)";
    $res = mysqli_query($link, $sql);
    if (!$res) {
        echo "<script language='javascript'>alert('Проект не добавлен')</script>";
        return false;
    }
    return true;
}