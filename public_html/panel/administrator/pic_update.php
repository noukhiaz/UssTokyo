<?php include('../config.php');
$table = $_GET['t'];
$id = $_GET['i'];
if(isset($_GET['front'])){
$cid = $_GET['cid'];
mysql_query("UPDATE  $table SET is_front = '0' where car_id = '$cid'");
mysql_query("UPDATE  $table SET is_front = '1' where id = '$id'");
}
else{
$yard = $_GET['yard'];
mysql_query("UPDATE  $table SET is_yard = '$yard' where id = '$id'");
}
$page = 'index.php?update=1&p='.$_GET['p'];
header("location: $page");
?>