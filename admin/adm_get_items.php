<?php

include_once "back/get_items.php";

function ft_fill_product_names() {
    $items = ft_get_items('All', 'ASC', 'Article');
    $filled = "";
    foreach ($items as $val) {
        $file = file_get_contents("components/option_tag.php");
        $file = str_replace("{Name}",  $val['Name'], $file);
        $filled .= $file;
    }
    return $filled;
}

function ft_adm_fill_item($find_item) {
    $item = ft_get_item($find_item);
    $filled = "";
    $file = file_get_contents("admin/adm_product_item.php");
    $file = str_replace("disabled",  '', $file);
    $file = str_replace("Product",  $item[0], $file);
    $file = str_replace("Description", $item[1], $file);
    $file = str_replace("Price",  $item[2], $file);
    $file = str_replace("Quantity",  $item[3], $file);
    $file = str_replace("Path", ("img/" . $item[4]), $file);
    $file = str_replace("Tag",  $item[5], $file);
    $filled .= $file;
    return $filled;
}
?>