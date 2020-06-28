<?php

include_once "config/connector.php";

function ft_get_pr_projects($link, $sql)
{
    $res = mysqli_query($link, $sql);
    $msg = array();
    while ($row = mysqli_fetch_row($res)) {
        $tmp = array();
        $tmp['Date'] = $row[0];
        $tmp['Description'] = $row[1];
        $tmp['Price'] = $row[2];
        $tmp['Tv'] = $row[3];
        $tmp['MassMedia'] = $row[4];
        $tmp['Gallery'] = $row[5];
        $tmp['PosComments'] = $row[6];
        $tmp['NegComments'] = $row[7];
        $tmp['Name'] = $row[8];
        $tmp['Status'] = $row[9];
        $msg[] = $tmp;
    }
    unset($tmp);
    return $msg;
}

function ft_get_smm_projects($link, $sql)
{
    $res = mysqli_query($link, $sql);
    $msg = array();
    while ($row = mysqli_fetch_row($res)) {
        $tmp = array();
        $tmp = array();
        $tmp['Date'] = $row[0];
        $tmp['Description'] = $row[1];
        $tmp['Price'] = $row[2];
        $tmp['LIkes'] = $row[3];
        $tmp['Dislikes'] = $row[4];
        $tmp['Views'] = $row[5];
        $tmp['Shares'] = $row[6];
        $tmp['Comments'] = $row[7];
        $tmp['Name'] = $row[8];
        $tmp['Status'] = $row[9];
        $msg[] = $tmp;
    }
    unset($tmp);
    return $msg;
}

function ft_fill_smm($array) {
    $filled = "";
    foreach ($array as $val) {
        $file = file_get_contents("components/smm_project.php");
        $file = str_replace("{Date}", $val['Date'], $file);
        $file = str_replace("{Description}", $val['Description'], $file);
        $file = str_replace("{Price}", $val['Price'], $file);
        $file = str_replace("{LIkes}", $val['LIkes'], $file);
        $file = str_replace("{Dislikes}", $val['Dislikes'], $file);
        $file = str_replace("{Views}", $val['Views'], $file);
        $file = str_replace("{Shares}", $val['Shares'], $file);
        $file = str_replace("{Comments}", $val['Comments'], $file);
        $file = str_replace("{Name}", $val['Name'], $file);
        $file = str_replace("{Status}", $val['Status'], $file);
        $filled .= $file;
    }
    return $filled;
}

function ft_fill_pr($array) {
    $filled = "";
    foreach ($array as $val) {
        $file = file_get_contents("components/pr_project.php");
            $file = str_replace("{Date}", $val['Date'], $file);
            $file = str_replace("{Description}", $val['Description'], $file);
            $file = str_replace("{Price}", $val['Price'], $file);
            $file = str_replace("{Tv}", $val['Tv'], $file);
            $file = str_replace("{MassMedia}", $val['MassMedia'], $file);
            $file = str_replace("{Gallery}", $val['Gallery'], $file);
            $file = str_replace("{PosComments}", $val['PosComments'], $file);
            $file = str_replace("{NegComments}", $val['NegComments'], $file);
            $file = str_replace("{Name}", $val['Name'], $file);
            $file = str_replace("{Status}", $val['Status'], $file);
            $filled .= $file;
    }
    return $filled;
}

function ft_fill_projects($department)
{
    $link = ft_connect_to_db();
    if ($department == "SMM") {
        $sql = "SELECT Date(CreatedAt), Description, Price, Likes, Dislikes, Views, Shares, Comments, Staff.Login, Stat 
        FROM SMM INNER JOIN Staff ON SMM.StaffID = Staff.ID";
        $res = ft_get_smm_projects($link, $sql);
        return ft_fill_smm($res);
    } else {
        $sql = "SELECT Date(DatePR), Description, Price, Tv, MassMedia, Gallery, PosComments, NegComments, Staff.Login, Stat 
        FROM PR INNER JOIN Staff ON PR.ID = Staff.ID";
        $res = ft_get_pr_projects($link, $sql);
        return ft_fill_pr($res);
    }
}

function ft_sorted_pr_projects($date, $price, $comments, $staff)
{
    $link = ft_connect_to_db();
    $order = 'ORDER BY ';
    if ($date) {
        $order .= "DatePR $date";
        if ($price || $comments)
            $order .= ', ';
    }
    if ($price) {
        $order .= "Price $price";
        if ($comments)
            $order .= ', ';
    }
    if ($comments)
        $order .= "PosComments $comments";
    if ($staff) {
        if (strlen($order) > 9)
            $condition = "WHERE StaffID = $staff " . $order;
        else
            $condition = "WHERE StaffID = $staff ";
    }
    else
    {
        if (strlen($order) > 9)
            $condition = $order;
        $condition = ''; 
    }

    $sql = "SELECT Date(DatePR), Description, Price, Tv, MassMedia, Gallery, PosComments, NegComments, Staff.Login, Stat 
    FROM PR INNER JOIN Staff ON PR.StaffID = Staff.ID $condition";
    $res = ft_get_pr_projects($link, $sql);
    return ft_fill_pr($res);
}

function ft_sorted_smm_projects($date, $price, $views, $staff) {
    $link = ft_connect_to_db();
    $order = 'ORDER BY ';
    if ($date) {
        $order .= "CreatedAt $date";
        if ($price || $views)
            $order .= ', ';
    }
    if ($price) {
        $order .= "Price $price";
        if ($views)
            $order .= ', ';
    }
    if ($views)
        $order .= "Views $views";
    if ($staff) {
        if (strlen($order) > 9)
            $condition = "WHERE StaffID = $staff " . $order;
        else
            $condition = "WHERE StaffID = $staff ";
    }
    else
    {
        if (strlen($order) > 9)
            $condition = $order;
        $condition = ''; 
    }
        
    $sql = "SELECT Date(CreatedAt), Description, Price, Likes, Dislikes, Views, Shares, Comments, Staff.Login, Stat 
    FROM SMM INNER JOIN Staff ON SMM.StaffID = Staff.ID $condition";
    $res = ft_get_smm_projects($link, $sql);
    return ft_fill_smm($res);
}