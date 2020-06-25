<?php

include_once "config/connector.php";

function ft_get_tags() {
    $link = ft_connect_to_db();
    $sql = "SELECT Name FROM Tags";
    $res = mysqli_query($link, $sql);
    $msg = array();
    while ($row = mysqli_fetch_row($res))
        $msg[] = $row[0];
    return $msg;
}

function ft_fill_tags() {
    $tags = ft_get_tags();
    $filled = "";
    foreach ($tags as $val) {
        $file = file_get_contents("components/option_tag.php");
        $file = str_replace("{Name}",  $val, $file);
        $filled .= $file;
    }
    unset($val);
    return $filled;
}