#!/usr/bin/php
<?php

include_once "connector.php";
include_once "db_info.php";
exec("sudo mysql < add_user.sql");
exec("sudo mysql  < cherkizovo.sql");
?>