<?php

include_once "db_info.php";

$server = $DB_SERVER;
$name = $DB_USER;
$pass = $DB_PASS;
$db_name = $DB_DBN;

function ft_connect_to_db() {
    global $server;
    global $name;
    global $pass;
    global $db_name;

    try {
        $link = mysqli_connect($server, $name, $pass, $db_name);
    }
    catch (Exception $e) {
        exit("ERROR: Could not connect. " . mysqli_connect_error() . "\n");
    }
return $link;
}
