<?php 
include('inc_nt_login.php');
include('panel/config.php');
$bid = $_GET['bid'];
mysql_query("DELETE FROM `bidding` WHERE id = '$bid'");
echo "Processing...";
?>
 <meta http-equiv="refresh" content="0;URL='
car_detail_auction.php?id=<?php echo $_GET['id'];?>&col=<?php echo $_GET['col'];?>&cid=<?php echo $_GET['cid'];?>'" />