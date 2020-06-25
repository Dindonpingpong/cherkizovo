<?php

function ft_print_status($name) {
    $file = file_get_contents("components/status.php");
    $file = str_replace('{status}', $name, $file);
    return $file;
}
?>