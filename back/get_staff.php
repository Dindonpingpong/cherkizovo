<?php
include_once "config/connector.php";

function ft_get_staff($link, $sql) {
    $res = mysqli_query($link, $sql);
    $msg = array();
    while ($row = mysqli_fetch_row($res)) {
        $tmp = array();
        $tmp['SurName'] = $row[0];
        $tmp['MiddleName'] = $row[1];
        $tmp['Email'] = $row[3];
        $tmp['Phone'] = $row[5];
        $tmp['DateBirth'] = $row[6];
        $tmp['Address'] = $row[7];
        $tmp['FamilyStatus'] = $row[8];
        $tmp['Education'] = $row[9];
        $tmp['Job'] = $row[10];
        $tmp['Department'] = $row[11];
        $tmp['Salary'] = $row[12];
        $msg[] = $tmp;
    }
    return $msg;
}

function ft_fill_staff() {
    $link = ft_connect_to_db();
    $sql = "SELECT Surname, MiddleName, Email, Phone, DateBirth, Address, FamilyStatus, Education, Job, Department, Salary FROM Staff;";
    $filled = "";
    $res = ft_get_staff($link, $sql);
    foreach ($res as $val) {
        $file = file_get_contents("components/staff.php");
        $file = str_replace("{SurName}", $val['SurName'], $file);
        $file = str_replace("{MiddleName}", $val['MiddleName'], $file);
        $file = str_replace("{Email}", $val['Email'], $file);
        $file = str_replace("{Phone}", $val['Phone'], $file);
        $file = str_replace("{DateBirth}", $val['DateBirth'], $file);
        $file = str_replace("{Address}", $val['Address'], $file);
        $file = str_replace("{FamilyStatus}", $val['FamilyStatus'], $file);
        $file = str_replace("{Education}", $val['Education'], $file);
        $file = str_replace("{Job}", $val['Job'], $file);
        $file = str_replace("{Department}", $val['Department'], $file);
        $file = str_replace("{Salary}", $val['Salary'], $file);
        $filled .= $file; 
    }
    return $filled;
}
?>