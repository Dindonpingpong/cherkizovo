<?php
include_once "back/get_projects.php";
if (!isset($_SESSION))
	session_start();
require('dhead.php');
if ($_SESSION['logged'] == "SMM")
	require('smm_projects.php');
else if ($_SESSION['logged'] == "PR")
	require('pr_projects.php');
?>

<?php
require('components/footer.php');