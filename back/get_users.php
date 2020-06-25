<?php

include_once "config/connector.php";

function ft_get_users()
{
    $link = ft_connect_to_db();
    $sql = "SELECT FirstName, LastName, NickName, Email FROM Clients ORDER BY FirstName";
    $res = mysqli_query($link, $sql);
    $msg = array();
    while ($row = mysqli_fetch_row($res)) {
        $tmp = array();
        $tmp['FirstName'] = $row[0];
        $tmp['LastName'] = $row[1];
        $tmp['NickName'] = $row[2];
        $tmp['Email'] = $row[3];
        $msg[] = $tmp;
    }
    unset($tmp);
    return $msg;
}

function ft_fill_users()
{
    $users = ft_get_users();
    $filled = "";
    foreach ($users as $val) {
        $str = "<option value='{Name}'>{Name}</option>";
        $str = str_replace("{Name}",  $val['NickName'], $str);
        $filled .= $str;
    }
    return $filled;
}

function ft_get_user($name)
{
    $link = ft_connect_to_db();
    $sql = "SELECT FirstName, LastName, NickName, Email FROM Clients WHERE NickName = '$name'";
    $res = mysqli_query($link, $sql);
    $row = mysqli_fetch_row($res);
    return $row;
}

function ft_adm_fill_user($find_user)
{
    $user = ft_get_user($find_user);
    $filled = "";
    $file = file_get_contents("admin/adm_users_info.php");
    $file = str_replace("disabled", '', $file);
    $file = str_replace("Firstname",  $user[0], $file);
    $file = str_replace("Lastname", $user[1], $file);
    $file = str_replace("Nickname",  $user[2], $file);
    $file = str_replace("Email",  $user[3], $file);
    $filled .= $file;
    return $filled;
}
