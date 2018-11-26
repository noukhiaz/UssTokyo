<?php include('inc_nt_login.php');

		include('panel/config.php');

?>

<!DOCTYPE html>

<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=euc-kr">

<title>www.USSTokyo.com: Documents</title>

<?php include('inc_head.php');?>
<?php include('inc_script.php');?>
<style>
@media print {
  #printPageButton {
    display: none;
  }
}
</style>

<body>



<?php 

$current_page = 'bids';

$table_name = 'win_document';
//$table_name = 'bidding';
$search_date = $_GET['date'];
$uid = $_SESSION['id'];
$user_mysql = mysql_query("SELECT * from users where id = $uid");
$user = mysql_fetch_assoc($user_mysql);

$perpage = 25;
if(isset($_GET["page"])){ $page = intval($_GET["page"]); } else { $page = 1; }
$calc = $perpage * $page;
$start = $calc - $perpage;
$documents_id = $_GET['did'];
$WHERE = "car_id = '$documents_id'";
 $sql = mysql_query("SELECT * from $table_name where $WHERE  order by id desc Limit $start, $perpage");
?>

	
  
  
   <div class="row" >
     <div class="col-lg-12 col-md-12 col-sm-8">
  
  <?php
  
    while($row = mysql_fetch_array($sql))

{
//echo $_GET['type'];
$type = $_GET['type'];
if($type == 'auction_sheet')
{
$document = $row['auc_sheet'];
}

if($type == 'export_cert')
{
$document = $row['export_cert'];
}

if($type == 'bl')
{
$document = $row['bl'];
}
?>

<img src="uploads/<?php echo $document;?>">



<?php  }?>
<br>
<br>
<center>
<button  id="printPageButton"  onclick="javascript:window.print()" class="btn-print">Print</button> &nbsp;&nbsp;
<button  id="printPageButton"  onclick="javascript:window.close()" class="btn-print">Close</button>
</center>		
<br>
<br>

&nbsp;