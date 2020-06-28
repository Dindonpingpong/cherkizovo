<?php
include_once "config/connector.php";

function ft_get_staff($link, $sql) {
    $res = mysqli_query($link, $sql);
    $msg = array();
    while ($row = mysqli_fetch_row($res)) {
        $tmp = array();
        $tmp['Name'] = $row[0];
        $tmp['SurName'] = $row[1];
        $tmp['MiddleName'] = $row[2];
        $tmp['Department'] = $row[3];
        $tmp['Job'] = $row[4];
        $tmp['Phone'] = $row[5];
        $tmp['Email'] = $row[6];
        $tmp['DateBirth'] = $row[7];
        $msg[] = $tmp;
    }
    return $msg;
}

function ft_fill_staff() {
    $link = ft_connect_to_db();
    $sql = "SELECT Name, Surname, MiddleName, Department, Job, Phone, Email,  DateBirth FROM Staff";
    $filled = "";
    $res = ft_get_staff($link, $sql);
    foreach ($res as $val) {
        $file = file_get_contents("components/staff.php");
        $file = str_replace("{Name}", $val['Name'], $file);
        $file = str_replace("{SurName}", $val['SurName'], $file);
        $file = str_replace("{MiddleName}", $val['MiddleName'], $file);
        $file = str_replace("{Department}", $val['Department'], $file);
        $file = str_replace("{Job}", $val['Job'], $file);
        $file = str_replace("{Phone}", $val['Phone'], $file);
        $file = str_replace("{Email}", $val['Email'], $file);
        $file = str_replace("{DateBirth}", $val['DateBirth'], $file);
        $filled .= $file; 
    }
    return $filled;
}

function ft_get_personal($login) {
    $link = ft_connect_to_db();
    $sql = "SELECT Name, Surname, MiddleName, Job, Department, DateBirth, Address, FamilyStatus, Education, Email, Phone 
    FROM Staff WHERE Login = '$login'";
    $res = mysqli_query($link, $sql);
    $row = mysqli_fetch_row($res);
    return $row;
}

function ft_fill_options($dep) {
    $link = ft_connect_to_db();
    $sql = "SELECT ID, Name, SurName, MiddleName FROM Staff WHERE Department = '$dep'";
    $filled = "";
    $res = mysqli_query($link, $sql);
    $msg = array();
    while ($row = mysqli_fetch_row($res)) {
        $tmp = array();
        $tmp['StaffID'] = $row[0];
        $tmp['Name'] = $row[1];
        $tmp['SurName'] = $row[2];
        $tmp['MiddleName'] = $row[3];
        $msg[] = $tmp;
    }
    foreach ($msg as $val) {
        $file = file_get_contents("components/option.php");
        $file = str_replace("{StaffID}", $val['StaffID'], $file);
        $file = str_replace("{Name}", $val['Name'], $file);
        $file = str_replace("{SurName}", $val['SurName'], $file);
        $file = str_replace("{MiddleName}", $val['MiddleName'], $file);
        $filled .= $file; 
    }
    return $filled;
}