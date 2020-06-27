<?php

include_once "config/connector.php";

function ft_get_pr_projects($link, $sql) {
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

function ft_get_smm_projects($link, $sql) {
    $res = mysqli_query($link, $sql);
    $msg = array();
    while ($row = mysqli_fetch_row($res)) {
        $tmp = array();
        $tmp = array();
        $tmp['Date'] = $row[0];
        $tmp['Description'] = $row[1];
        $tmp['Price'] = $row[3];
        $tmp['LIkes'] = $row[4];
        $tmp['Dislikes'] = $row[5];
        $tmp['Views'] = $row[6];
        $tmp['Shares'] = $row[7];
        $tmp['Comments'] = $row[8];
        $tmp['Name'] = $row[9];
        $tmp['Status'] = $row[10];
        $msg[] = $tmp;
    }
    unset($tmp);
    return $msg;
}

function ft_fill_projects($department) {
    $link = ft_connect_to_db();
    $filled = "";
    if ($department == "SMM") {
        $sql = "SELECT CreatedAt, Description, Price, Likes, Dislikes, Views, Shares, Comments, Staff.Login, Stat 
        FROM SMM INNER JOIN Staff WHERE SMM.ID = Staff.ID";
        $res = ft_get_smm_projects($link, $sql);
        foreach ($res as $val) {
            $file = file_get_contents("components/smm_project.php");
            $file = str_replace("{Date}", $val['Date'], $file);
            $file = str_replace("{Description}", $val['Description'], $file);
            $file = str_replace("{Price}", $val['Price'], $file);
            $file = str_replace("{LIkes}", $val['LIkes'], $file);
            $file = str_replace("{Dislikes}", $val['Dislikes'], $file);
            $file = str_replace("{Views}", $val['Gallery'], $file);
            $file = str_replace("{Shares}", $val['Shares'], $file);
            $file = str_replace("{Comments}", $val['Comments'], $file);
            $file = str_replace("{Name}", $val['Name'], $file);
            $file = str_replace("{Status}", $val['Status'], $file);
            $filled .= $file; 
        }
        return $filled;
    }
    else {
        $sql = "SELECT Date(DatePR), Description, Price, Tv, MassMedia, Gallery, PosComments, NegComments, Staff.Login, Stat 
        FROM PR INNER JOIN Staff WHERE PR.ID = Staff.ID";
        $res = ft_get_pr_projects($link, $sql);
        foreach ($res as $val) {
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
    
}