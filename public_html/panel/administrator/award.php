<?php include('../config.php');
$table = $_GET['t'];
$id = $_GET['i'];
$win = $_GET['win'];
$page = 'index.php?del=1&p='.$_GET['p'];
mysql_query("UPDATE  $table 
SET is_accepted = '$win'
 where id = '$id'");
 if($win != '0'){
header("location: index.php?p=add_cars_auction&id=$id");
}else
{
header("location: index.php?p=bids");
}
?>