<?php include('../config.php');
$table = $_GET['t'];
$id = $_GET['i'];
$page = 'index.php?del=1&p='.$_GET['p'];
mysql_query("DELETE FROM $table where id = '$id'");
header("location: $page");
?>