<?php

include_once "back/get_users.php";
include_once "config/connector.php";

function ft_check_nickname($name, $link)
{

    if (strlen($name) == 0)
        exit("Поле не заполнено");
    $sql_check_name = "SELECT NickName FROM Clients WHERE NickName = '$name'";
    $res = mysqli_query($link, $sql_check_name);
    $row = mysqli_fetch_row($res);
    if (isset($row))
        exit("Данный логин занят");
    return true;
}

function ft_check_email($email, $link)
{
    if (strlen($email) == 0)
        return "Поле не заполнено";
    $sql_check_email = "SELECT Email FROM Clients WHERE Email = '$email'";
    $res = mysqli_query($link, $sql_check_email);
    $row = mysqli_fetch_row($res);
    if (isset($row))
        exit("Данная почта зарегистрирована");
    return true;
}

function ft_add_user($arr)
{
    $fname = $arr['firstname'];
    $lname = $arr['lastname'];
    $nick = $arr['nickname'];
    $pass = $arr['password'];
    $email = $arr['email'];
    $link = ft_connect_to_db();
    // $ret = ft_check_nickname($nick, $link);
    // if (!isset($ret))
    //     return $ret;
    if (ft_check_email($email, $link) && ft_check_nickname($nick, $link)) {
        $sql_insert = "INSERT INTO Clients (FirstName, LastName, NickName, Password, Email) VALUES ('$fname', '$lname', '$nick', SHA2('$pass', 512), '$email')";
        $res = mysqli_query($link, $sql_insert);
        $row = mysqli_fetch_row($res);
        if (isset($row))
            exit('Не удалось добавить пользователя');
        return 'OK';
    }
}
