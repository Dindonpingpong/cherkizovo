<?php

include_once "config/connector.php";

function ft_get_items($cat_name, $sort_type, $sort_by = 'Price') {
    $link = ft_connect_to_db();
    $cat_name = ($cat_name != 'All') ? "WHERE Tags.Name = '$cat_name'": '';
    $sql = 
    "SELECT DISTINCT(Products.Name) AS Article, Products.Description, Products.Price, Products.Path
    FROM Products_Tags INNER JOIN Products ON Products_Tags.ProductID = Products.ProductID 
    INNER JOIN Tags ON Products_Tags.TagID = Tags.TagID 
    $cat_name
    ORDER BY $sort_by $sort_type";
    $res = mysqli_query($link, $sql);
    $msg = array();
    while ($row = mysqli_fetch_row($res)) {
        $tmp = array();
        $tmp['Name'] = $row[0];
        $tmp['Description'] = $row[1];
        $tmp['Price'] = $row[2];
        $tmp['Photo'] = $row[3];
        $msg[] = $tmp;
    }
    unset($tmp);
    return $msg;
}

function ft_get_item($name) {
    $link = ft_connect_to_db();
    $sql = 
    "SELECT DISTINCT(Products.Name), Products.Description, Products.Price, Products.Quantity, Products.Path, Tags.Name
    FROM Products_Tags INNER JOIN Products ON Products_Tags.ProductID = Products.ProductID 
    INNER JOIN Tags ON Products_Tags.TagID = Tags.TagID 
    WHERE Products.Name = '$name'";
    $res = mysqli_query($link, $sql);
    $row = mysqli_fetch_row($res);
    return $row;
}

function ft_fill_items($cat_name, $sort_type) {
    $items = ft_get_items($cat_name, $sort_type);
    $filled = "";
    foreach ($items as $val) {
        $file = file_get_contents("components/item.php");
        $file = str_replace("{name}",  $val['Name'], $file);
        $file = str_replace("{description}", $val['Description'], $file);
        $file = str_replace("{price}",  $val['Price'], $file);
        $file = str_replace("{src}", ("img/" . $val['Photo']), $file);
        $filled .= $file;
    }
    return $filled;
}

function ft_fill_item($name) {
    $items = ft_get_item($name);
    $filled = "";
    $file = file_get_contents("components/products_item.php");
    $file = str_replace("{name}",  $items[0], $file);
    $file = str_replace("{description}", $items[1], $file);
    $file = str_replace("{price}",  $items[2], $file);
    $file = str_replace("{count}",  $items[3], $file);
    $file = str_replace("{src}", ("../img/" . $items[4]), $file);
    $file = str_replace("{genre}",  $items[5], $file);
    $filled .= $file;
    return $filled;
}

function ft_get_items_names_prices() {
    $link = ft_connect_to_db();
    $sql = "SELECT Name, Price FROM Products";
    $res = mysqli_query($link, $sql);
    $msg = array();
    while ($row = mysqli_fetch_row($res)) {
        $msg[$row[0]] = $row[1];
    }
    return $msg;
}
