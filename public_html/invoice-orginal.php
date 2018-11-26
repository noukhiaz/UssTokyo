<?php include('inc_nt_login.php');

		include('panel/config.php');

?>

<!DOCTYPE html>

<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=euc-kr">

<title>www.USSTokyo.com: Invoice</title>

<?php include('inc_head.php');?>
<?php include('inc_script.php');?>
<style>
@page {
    margin: 0;
}
.left_col, .right_col{
padding:0px;
font-size:14px;
border:0px !important;
padding:0px !important;
line-height:24px !important;
}

.right_col{

color:#0066CC;

}

.col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {

    padding-right: 5px  !important;
    padding-left: 5px  !important;
}

.product-listing .car-grid {
    border: 1px solid #e3e3e3;
    padding: 10px  !important;
}
@media print {
  #printPageButton {
    display: none;
  }
}
</style>
</head>



<body>
<center>
<img src="header.jpg"  style="width:1000px;">
</center> 


<section class="product-listing page-section-ptb" style="padding:0px; height:1010px; ">

	<div class="container" style="width:1000px;">

<?php 

$current_page = 'bids';

$table_name = 'winingcars';
//$table_name = 'bidding';
$search_date = $_GET['date'];
$uid = $_SESSION['id'];
$user_mysql = mysql_query("SELECT * from users where id = $uid");
$user = mysql_fetch_assoc($user_mysql);

$perpage = 25;
if(isset($_GET["page"])){ $page = intval($_GET["page"]); } else { $page = 1; }
$calc = $perpage * $page;
$start = $calc - $perpage;
$id_invoice = $_GET['iid'];
$WHERE = "user_id = '$uid' AND is_active = '1' AND id = '$id_invoice'";
 $sql = mysql_query("SELECT * from $table_name where $WHERE  order by id desc Limit $start, $perpage");
?>

	
  
  
   <div class="row" >
     <div class="col-lg-12 col-md-12 col-sm-8">
  
  <?php
  
    while($row = mysql_fetch_array($sql))

{
//echo $row['reg_date'];
  ?>
  <div class="row"  style="padding-top:20px;">
<div class="col-lg-6 col-md-6 col-sm-6">
<strong>  Invoice No.: <?php echo $row['id'];?></strong>
</div>  

<div class="col-lg-6 col-md-6 col-sm-6" style="text-align:right;">
<strong>
Date: 
<?php $date = $row['reg_date'];
$reg_date = date('d-m-Y',$date);
echo $reg_date ;
?>  </strong>
</div>  
</div>
  
  
  
 
&nbsp;
  
  <div class="row">
   <div class="col-lg-2 col-md-2 col-sm-2">
  &nbsp;
  </div> 
  <div class="col-lg-10 col-md-10 col-sm-10">
  
 
 <table>
 <tr>
 	<td style="width:150px;"><strong>  Customer Name:  </strong></td>
	<td> Mr / Ms. <?php echo $user['name'];?> <?php echo $user['lastname'];?></td>
 </tr><!--
 <tr>
 	<td><strong> Phone / Cell: </strong></td>
	<td><?php echo $user['mobile'];?></td>
</tr>-->
<tr>
 	<td valign="top"><strong> Address: </strong></td>
	<td> <?php // echo $user['address'];?>
	<?php 
	
	$city_id = $user['city'];
	$city_mysql = mysql_query("SELECT * from countries_cities where id = $city_id");
$city = mysql_fetch_assoc($city_mysql);
	echo $city['name'];
	?>, <?php $contry_id =  $user['countryy'];
	$conty_mysql = mysql_query("SELECT * from countries where id = $contry_id");
$contry = mysql_fetch_assoc($conty_mysql);
		echo $contry['name'];
	?></td>
</tr>
 
 <tr>
 	<td></td>
	<td>&nbsp;</td>
</tr>
 </table> 
  

</div>  
</div>
  





</div>  
  
  
  
  
  
  
  <div class="car-grid" style="border: solid 0px #CCCCCC; background:#fff; ">
           <div class="row">
            
			  

			  
			  <div class="col-lg-12 col-md-12"  >		
				<div class="car-details">
						<div class="car-title">
						 <a href="#" style="font-size:21px; cursor:default; padding-top:10px;"><?php echo $row['make'];?> - <?php echo $row['name'];?></a><br>

						 <p style="font-size:12px; line-height:6px;">
						 <!--<span style="font-size:14px; font-weight:bold;"><?php echo $row['make'];?> - <?php echo $row['name'];?></span>-->	
						 
						 </p>  



<table class="table " style="  margin-bottom: 2px;">
  <tr>
    <td class="left_col">Chasis No:</td>
    <td class="right_col"><?php echo $row['chasis'];?></td>
    <td class="left_col">CC:</td>
    <td class="right_col"><?php echo $row['displace'];?></td>
	<td class="left_col"><strong>Total Japan Amount</strong>:</td>
    <td class="right_col"><strong>Yen <?php 
	$price =$row['price'].'000';
	$frieght = $row['freight_chrgs'];
	$inspaction = $row['inspection'];
	$vanning =  $row['vanning'];
	$commission = $row['comssion']; 
	
	$totel_auc = $price+$frieght+$inspaction+$vanning+$commission;
	
	echo number_format($totel_auc);?></strong>
	
	
	
	</td>

  </tr>
   <tr>
    <td class="left_col">Lot No.:</td>
    <td class="right_col"><?php echo $row['lotn'];?></td>
    <td class="left_col">Model Year:</td>
    <td class="right_col"><?php echo $row['year'];?></td>
	
	<?php if($row['sold_currency'] != '0'){
	?>
	<td class="left_col"><strong>Currency Conversion</strong>:</td>
    <td class="right_col"><strong>
    
    1 JPY = 
    <?php
   
    if($row['sold_currency'] == '1')
    {
        echo 'PKR';
    }
    
    if($row['sold_currency'] == '2')
    {
        echo 'AUD';
    }
    echo $row['currency_rate'];
    ?> 
    
    
    <?php 

//	echo number_format($totel_auc);?></strong>
	
	
	
	</td>
	
	<?php }?>
	
	<?php 
$car_id =$row['id'] ;

$sql_ship_reg = mysql_query("select * from win_ship_country where car_id = '$car_id' ");
$rowss_reg = mysql_fetch_assoc($sql_ship_reg);
$rowss_regs =  mysql_num_rows($rowss_reg);
//echo $car_id.'<br>';
//echo $rowss_reg['id'];
if(($rowss_reg == '0') || ($rowss_reg == '')){?>
<td class="left_col"></td>
<td class="left_col"></td>
<?php 
}
else
{
?>
	<td class="left_col" style="width:170px;">
	
	<strong>Total Regional Amount</strong>:</td>
    <td class="right_col"><strong><?php echo $rowss_reg['currency'];?> <?php 
	$custom_duties =$rowss_reg['custom_duties'];
	$clearances =$rowss_reg['clearances'];
	$freight_charges =$rowss_reg['freight_charges'];
	

	
	$total_regional = $custom_duties+$clearances+$freight_charges;
	
	echo number_format($total_regional);?></strong></td>
	<?php }?>
	
  </tr> 
   <tr>
    <td class="left_col">Color:</td>
    <td class="right_col"><?php echo $row['colorr'];?></td>
    <td class="left_col">Mileage:</td>
    <td class="right_col"><?php echo number_format($row['mileage']);?></td>
    	<?php if($row['sold_currency'] != '0'){
	?>
	<td class="left_col"><strong>Total</strong>:</td>
    <td class="right_col"><strong>
    
   
    <?php
   
    if($row['sold_currency'] == '1')
    {
        echo 'PKR';
    }
    
    if($row['sold_currency'] == '2')
    {
        echo 'AUD';
    }
    //echo $row['currency_rate'];
    ?> 
    
    
    <?php 
	$price =$row['price'].'000';
	$frieght = $row['freight_chrgs'];
	$inspaction = $row['inspection'];
	$vanning =  $row['vanning'];
	$commission = $row['comssion']; 
	
	$totel_auca = $price+$frieght+$inspaction+$vanning+$commission;
	$totel_auc = $totel_auca*$row['currency_rate'];
	echo number_format($totel_auc);?></strong>
	
	
	
	</td>
	
	<?php }?>
  </tr> 
     <tr>
    <td class="left_col">Auction Grade:</td>
    <td class="right_col"><?php echo $row['grade'];?></td>
    <td class="left_col">Package:</td>
    <td class="right_col"> <?php echo $row['packag'];?> </td>
  </tr> 
  
  
   <tr>
    <td class="left_col">Auction House:</td>
    <td class="right_col"><?php echo $row['auction_house'];?></td>
    <td class="left_col">Auction Country:</td>
    <td class="right_col"><?php echo $row['auction_country'];?></td>
  </tr>
   <tr>
    <td class="left_col">Destination Country:</td>
    <td class="right_col"><?php echo $row['destination_country'];?></td>
	<></td>td class="left_col"
    <td class="right_col"></td>
  </tr>
 
</table>



<?php
$car_id =$row['id'] ;

$sql_finance_reg = mysql_query("select * from win_finance where car_id = '$car_id' ");
$rowss_finance = mysql_fetch_assoc($sql_finance_reg);
$rowss_finances =  mysql_num_rows($rowss_finance);
//echo $car_id.'<br>';
$rowss_finances = $rowss_finance['id'];
if(($rowss_finances == '0') || ($rowss_finances == '')){?><br>
<br>

<center><strong>No financial records.</strong></center>
<?php 
}
else
{
?>
<br>
<center>
<hr style="width:50%; color:#CCCCCC; border:#CCCCCC solid 1px;;">
</center>
<br>
<a href="#" style="font-size:21px; cursor:default; padding-top:10px;">Financial Details</a>

<table class="table " style="margin-bottom: 2px;">
<tr>
	<td style="width:150px; text-align:center; font-weight:bold;">Transaction ID</td>
	<td style="width:100px; text-align:center;  font-weight:bold;">Date</td>	
	<td style="text-align:center;  font-weight:bold;">Description</td>	
	
	<td style="width:150px;text-align:center;  font-weight:bold;">Amount</td>	
	<td style="width:90px;text-align:center;  font-weight:bold;">Exchange <br>Rate</td>
	<td style="width:150px;text-align:center;  font-weight:bold;">Total Amount</td>		
</tr>
<?php $sql_finance = mysql_query("select * from win_finance where car_id = '$car_id' ");
while($row_finance = mysql_fetch_array($sql_finance)){
?>
<tr>
	<td style="text-align:center;"><?php echo $row_finance['id'];?></td>
	<td style="text-align:center;"><?php 
	
	$date = $row_finance['reg_date'];
	
	echo date('d-m-Y',$date);
	
	?></td>	
	<td><?php echo $row_finance['description'];?></td>		
	
	<td style="text-align:left; padding-right:30px;"><?php echo $row_finance['currency'];?> <?php echo number_format($row_finance['amount']);?></td>		
	<td style="text-align:center;"><?php echo $row_finance['conversion_rate'];?></td>
	<td style="text-align:center;">PKR <?php echo number_format($row_finance['conversion_rate']*$row_finance['amount']);?></td>
</tr>
<?php }?>
<tr>
	<td colspan="5" style="text-align:right;"><strong>TOTAL </strong></td>
	<td style="text-align:left; padding-right:30px;"><strong><?php //echo $rowss_reg['currency'];?> 
	PKR 
	<?php 



$finance_sum_query = mysql_query("SELECT car_id, SUM(`amount` * conversion_rate) as total_amount
FROM win_finance where car_id = '$car_id'   GROUP BY car_id");

$finance = mysql_fetch_assoc($finance_sum_query);
	
	$total_recvd = $finance['total_amount'];
	echo number_format($total_recvd);
	?></strong></td>		
</tr>


</table>


<!--
<center>
<h5>Payment Details</h5>
<table   width="330" >
<tr>
	<td><strong>Total Amount</strong></td>
	<td>
	 <strong><?php //echo $rowss_reg['currency'];?>Yen <?php 
	$curnt_rate = $row['currency_rate'];
	//echo $curnt_rate;
	
	//$auct = $totel_auc*$row['currency_rate'];
	//$total_amount_in_pkr = $total_regional+$totel_auc;
$total_amount_in_pkr = $totel_auc;
	echo number_format($total_amount_in_pkr);
	?></strong>
	
	<strong>
	
	</strong></td>		
</tr>
<tr>
	<td ><strong>Payment Received</strong></td>
	<td style="text-align:left; padding-right:30px;"><strong><?php //echo $rowss_reg['currency'];?>Yen <?php
	
		$finance_sum_querya = mysql_query("SELECT car_id, SUM(amount) as total_amount
FROM win_finance where car_id = '$car_id'   GROUP BY car_id");
$finance_amount = mysql_fetch_assoc($finance_sum_querya);
	
	$total_recvd_without_conversion = $finance_amount['total_amount'];
	echo number_format($total_recvd_without_conversion);

	//echo number_format($total_recvd);
	?></strong></td>		
</tr>
<?php
//$balance = $total_amount_in_pkr-$total_recvd;

$balance = $total_amount_in_pkr-$total_recvd_without_conversion;

if($balance == '0'){}else{?>

<tr>
	<td style="color:#E60000;"><strong>Balance</strong></td>
	<td style="text-align:left; padding-right:30px; color:#E60000;"><strong><?php //echo $rowss_reg['currency'];?>Yen <?php  echo number_format($balance);?></strong></td>		
</tr><?php }?>
</table>
<br>

<span style="font-weight:bold; font-size:12px;">Note: Currency conversion rate is applied.</span>
<?php }?>
<br>
<br>



</center>	
-->
<center>
<button  id="printPageButton"  onclick="javascript:window.print()" class="btn-print">Print</button> &nbsp;&nbsp;
<button  id="printPageButton"  onclick="javascript:window.close()" class="btn-print">Close</button>
</center>				   
						   
						  </div>
	               </div>
				</div>
	
				

				
				
				
				
				
				
				
				
				
		
				
				   
				   
						  
						 
				</div>
				
				
				
				
				
				
		
				
			
               </div>
             </div>
  
  <?php }?>
  
	</div> 
</section>

<center>
<img src="footer.jpg"  style="width:1000px;">
</center>	

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/mega-menu/mega_menu.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/select/jquery-select.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>

