<?php include('inc_nt_login.php');

		include('panel/config.php');

?>

<!DOCTYPE html>

<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=euc-kr">

<title>www.USSTokyo.com: Purchased Vehicles</title>

<?php include('inc_head.php');?>
<?php include('inc_script.php');?>
</head>



<body>








<!--=================================

 header -->



<header id="header" class="defualt">

<?php include('inc_menu_top.php');?>

<!--================================= mega menu -->

<div class="menu">  

	<?php include('inc_menu.php');?>

 </div>

</header>



<!--================================= header -->





<!--=================================

 inner-intro -->

 

 <section class="inner-intro bg-1 bg-overlay-black-70">

  <div class="container">

     <div class="row text-center intro-title">

           <div class="col-lg-6 col-md-6 text-left">

             <h3 class="text-white">Purchased Vehicles </h3>

           </div>

           <div class="col-lg-6 col-md-6 text-right">

             <ul class="page-breadcrumb">

                <li><a href="index.php"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-double-right"></i></li>

				<li><a href="myaccount.php">My Account</a> <i class="fa fa-angle-double-right"></i></li>

                <li><span>Purchased Vehicles</span> </li>

             </ul>

           </div>

     </div>

  </div>

</section>



<!--=================================

 inner-intro -->





<!--=================================

product-listing  -->



<section class="product-listing page-section-ptb">

 <div class="container">

  <div class="row">


<!--
<div class="col-lg-3 col-md-3 col-sm-4">
		<div class="blog-sidebar">
			<div class="sidebar-widget">
				<div class="sidebar-widget">
					<?php //include('my_left_siderbar.php');?>
				</div>
			</div>
		</div>
 </div>
      <div class="col-lg-9 col-md-9 col-sm-8">
-->
     <div class="col-lg-12 col-md-12 col-sm-8">

	

	<?php 

$current_page = 'bids';

$table_name = 'winingcars';
//$table_name = 'bidding';

?>
<?php
$search_date = $_GET['date'];
$uid = $_SESSION['id'];
?>
<?php 
$perpage = 10;
if(isset($_GET["page"])){ $page = intval($_GET["page"]); } else { $page = 1; }
$calc = $perpage * $page;
$start = $calc - $perpage;
$WHERE = "user_id = '$uid' AND is_active = '1'";
 $sql = mysql_query("SELECT * from $table_name where $WHERE  order by id desc Limit $start, $perpage");
 $total_purchased = mysql_num_rows($sql);
?>

	<h6>Purchased Vehicles <span style="font-size:14px;">(<?php  echo  $total_purchased ; ?>)</span></h6>
  
  
  
  
<style>
.left_col, .right_col{
padding:0px;
font-size:12px;
border:0px !important;
padding:0px !important;
line-height:20px !important;
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
</style>  
  
  
  
  
  <?php
  //$totalPages = 500;
$i = 1 ;


    while($row = mysql_fetch_array($sql))

{
//echo $row['reg_date'];
  ?>
  <div class="car-grid"  id='dvContents'>
           <div class="row">
            <div class="col-lg-1 col-md-1">
<div class="car-title">
<a href="#" style="font-size:14px; cursor:default; padding-top:10px;">STATUS</a><br>			
</div>
              <div class="car-item red-bg text-center" style="height: 192px;">
               <div class="car-image">

<br>
<?php if($row['status']== '1'){?>			 
<span style="color:#FFFFFF; font-weight:bold; ">Delivered</span> <br> 
			   <img class="img-responsive" src="images/keys.png" alt="Delivered" title="Delivered"  style="    padding-top: 30px; padding-left: 10px; padding-right: 10px;padding-bottom: 10px;">
<?php } if($row['status']== '0'){?>	
<span style="color:#FFFFFF; font-weight:bold; ">Shipped</span> <br> 			   
			   <img class="img-responsive" src="images/ship.png" alt="In Ship" title="In Ship" style="    padding-top: 30px; padding-left: 10px; padding-right: 10px;padding-bottom: 10px;">
			   <?php }?>
			   
<?php if($row['status']== '2'){?>	
<span style="color:#FFFFFF; font-weight:bold; ">In Process</span> <br> 			   
			   <img class="img-responsive" src="images/ship.png" alt="In Process" title="In Process" style="    padding-top: 30px; padding-left: 10px; padding-right: 10px;padding-bottom: 10px;">
			   <?php }?>			   
<br>

			   		<h1 style="color:#FFFFFF;"><?php echo  $i++;?></h1>
					
					<!--
				 <img class="img-responsive" src="uploads/dDQH6dREON7hHt1l6jKCjzWinc0aEqMFoW4lXWrqlDPyp-xQyayvVe3VdLoI.jpg" alt="">
				 <img class="img-responsive" src="uploads/dDQH6dREON7hHt1l6jKCjzWinc0aEqMExV3L7ukeMBksM-xQyayvVe3VdLoI.jpg" alt="">
				<!-- <img class="img-responsive" src="uploads/dDQH6dREON7hHt1l6jKCjzWinc0aEqMFYhopSfby4FuWP-xQyayvVe3VdLoI.jpg" alt="">-->
		
                 
               </div>
              </div>
             </div>
              
			  

			  
			  <div class="col-lg-3 col-md-3"  style="border: solid 1px #CCCCCC; background:#f9f9f9; ">		
				<div class="car-details">
						<div class="car-title">
						 <a href="#" style="font-size:14px; cursor:default; padding-top:10px;"><?php echo $row['make'];?> - <?php echo $row['name'];?></a><br>

						 <p style="font-size:12px; line-height:6px;">
						 <!--<span style="font-size:14px; font-weight:bold;"><?php echo $row['make'];?> - <?php echo $row['name'];?></span>-->	
						 
						 </p>  



<table class="table " style="    margin-bottom: 2px;">
  <tr>
    <td class="left_col">Purchasing Date:</td>
    <td class="right_col"><?php $date = $row['reg_date'];
$reg_date = date('d-m-Y',$date);
echo $reg_date ;
?></td>
  </tr>
    <tr>
    <td class="left_col">Invoice No:</td>
    <td class="right_col"><?php echo $row['id'];?></td>
  </tr>
  <tr>
    <td class="left_col">Chasis No:</td>
    <td class="right_col"><?php echo $row['chasis'];?></td>
  </tr>
   <tr>
    <td class="left_col">CC:</td>
    <td class="right_col"><?php echo $row['displace'];?></td>
  </tr>
   <tr>
    <td class="left_col">Lot No.:</td>
    <td class="right_col"><?php echo $row['lotn'];?></td>
  </tr>
    <tr>
    <td class="left_col">Model Year:</td>
    <td class="right_col"><?php echo $row['year'];?></td>
  </tr> 
   <tr>
    <td class="left_col">Auction House:</td>
    <td class="right_col"><?php echo $row['auction_house'];?></td>
  </tr>
   <tr>
    <td class="left_col">Auction Country:</td>
    <td class="right_col"><?php echo $row['auction_country'];?></td>
  </tr>
   <tr>
    <td class="left_col">Destination Country:</td>
    <td class="right_col"><?php echo $row['destination_country'];?></td>
  </tr>
  <!--
   <tr>
    <td class="left_col">Veh</td>
    <td class="right_col">Japan</td>
  </tr>      -->
</table>

						   
					
						   
						  </div>
	               </div>
				</div>
				
				
				<div class="col-lg-3 col-md-3"  style="border: solid 1px #CCCCCC; background:#f9f9f9; ">		
				<div class="car-details">
						<div class="car-title">
						 <a href="#" style="font-size:14px; cursor:default; padding-top:10px;">Pricing Details</a>
<p style="font-size:12px; line-height:2px;">&nbsp; </p> 
<table class="table ">
  <tr>
    <td class="left_col">Buying Price:</td>
    <td class="right_col">Yen <?php echo number_format($row['price']);?>,000</td>
  </tr>
  <tr>
    <td class="left_col">Freight Amount:</td>
    <td class="right_col">Yen <?php echo number_format($row['freight_chrgs']);?></td>
  </tr>
    <tr>
    <td class="left_col"> Inspection Amount:</td>
    <td class="right_col">Yen <?php echo number_format($row['inspection']);?></td>
  </tr>
    <tr>
    <td class="left_col">Vanning Amount:</td>
    <td class="right_col">Yen <?php echo number_format($row['vanning']);?></td>
  </tr>
  <tr>
    <td class="left_col">Commission Amount:</td>
    <td class="right_col">Yen <?php echo number_format($row['comssion']);?></td>
  </tr>
    <tr>
    <td class="left_col"><strong>Total Amount</strong>:</td>
    <td class="right_col"><strong>Yen <?php 
	$price =$row['price'].'000';
	$frieght = $row['freight_chrgs'];
	$inspaction = $row['inspection'];
	$vanning =  $row['vanning'];
	$commission = $row['comssion']; 
	$totel = $price+$frieght+$inspaction+$vanning+$commission;
	echo number_format($totel);?></strong></td>
  </tr>
    <tr>
    <td class="left_col">Paid Amount:</td>
    <td class="right_col">Yen
		<?php 
		$cid = $row['id'];
		$finance_sum_query = mysql_query("SELECT car_id, SUM(amount) as total_amount
FROM win_finance where car_id = '$cid' AND is_jp_transaction = '1' GROUP BY car_id");
	//$finance_sum_query = mysql_query("SELECT car_id, SUM(`amount` * conversion_rate) as total_amount
//FROM win_finance where car_id = '$cid' AND is_jp_transaction = '1' GROUP BY car_id");
$finance = mysql_fetch_assoc($finance_sum_query);
	
	$total_recvd = $finance['total_amount'];
	echo number_format($total_recvd);
	?>
	</td>
  </tr>
    <tr>
    <td class="left_col">Balance Amount:</td>
    <td class="right_col">Yen <?php echo number_format($totel-$total_recvd);?></td>
  </tr>     
</table>
						   
						   
						  </div>
	               </div>
				</div>
				
				
				<div class="col-lg-3 col-md-3"  style="border: solid 1px #CCCCCC; background:#f9f9f9;">		
				<div class="car-details">
						<div class="car-title">
						 <a href="#" style="font-size:14px; cursor:default; padding-top:10px;">Shipping Details</a>
<p style="font-size:12px; line-height:4px;">&nbsp; </p> 

<!--

-->

<?php 
$car_id =$row['id'] ;

$sql_ship = mysql_query("select * from win_ship where car_id = '$car_id' ");
$ship_row = mysql_fetch_assoc($sql_ship);
$rowss =  mysql_num_rows($sql_ship);
if($rowss == '0'){echo '<div style="text-align:center; padding-top:56px; padding-bottom:80px;"><strong>Coming Soon</strong></div>';}
else
{
?>
<table class="table ">
  <tr>
    <td class="left_col" style="min-width:75px;">Ship Name:</td>
    <td class="right_col" style="min-width:85px;"><?php echo $ship_row['name'];?></td>
  </tr>
  <tr>
    <td class="left_col">Voyage No:</td>
    <td class="right_col"><?php echo $ship_row['voyage'];?></td>
  </tr>
   <tr>
    <td class="left_col">Ship Date:</td>
    <td class="right_col"><?php echo $ship_row['ship_date'];?></td>
  </tr>
    <tr>
    <td class="left_col"> Dep. Port:</td>
    <td class="right_col"><?php echo $ship_row['departure_port'];?></td>
  </tr>
    <tr>
    <td class="left_col">Dest. Port:</td>
    <td class="right_col"><?php echo $ship_row['destination_port'];?></td>
  </tr>
    <tr>
    <td class="left_col">Est. Arrival:</td>
    <td class="right_col"><?php echo $ship_row['est_arrival'];?></td>
  </tr>
    <tr>
    <td class="left_col">Container #:</td>
    <td class="right_col"><?php echo $ship_row['container'];?></td>
  </tr>
</table>		
<?php }?>
<p style="line-height:8px;">&nbsp;</p>
				   
						  </div>
	               </div>
				</div>
				
				
				
				<div class="col-lg-2 col-md-2"  style="border: solid 1px #CCCCCC; background:#f9f9f9; ">		
				<div class="car-details">
						<div class="car-title">
						 <a href="#" style="font-size:14px; cursor:default; padding-top:10px;">Regional Details</a>
						
						   
<p style="font-size:12px; line-height:2px;">&nbsp; </p> 
<?php 
$car_id =$row['id'] ;

$sql_ship_reg = mysql_query("select * from win_ship_country where car_id = '$car_id' ");
$rowss_reg = mysql_fetch_assoc($sql_ship_reg);
$rowss_regs =  mysql_num_rows($rowss_reg);
//echo $car_id.'<br>';
//echo $rowss_reg['id'];
if(($rowss_reg == '0') || ($rowss_reg == '')){echo '<div style="text-align:center; padding-top:56px; padding-bottom:80px;"><strong>Coming Soon</strong></div> <p style="line-height:10px;">&nbsp;</p>';}
else
{
?>
<table class="table ">
   <tr>
    <td class="left_col" style="width: 80px !important;">Ship From:</td>
    <td class="right_col"><?php echo $rowss_reg['ship_from'];?></td>
  </tr>
    <tr>
    <td class="left_col">Ship To:</td>
    <td class="right_col"><?php echo $rowss_reg['ship_to'];?></td>
  </tr>
   <tr>
    <td class="left_col" style="min-width:59px;">Custom Duty:</td>
    <td class="right_col"><?php echo $rowss_reg['currency'];?> <?php echo number_format($rowss_reg['custom_duties']);?></td>
  </tr>
  <tr>
    <td class="left_col">Clearance:</td>
    <td class="right_col"><?php echo $rowss_reg['currency'];?> <?php echo number_format($rowss_reg['clearances']);?></td>
  </tr>
  <tr>
    <td class="left_col">Freight :</td>
    <td class="right_col"><?php echo $rowss_reg['currency'];?> <?php echo number_format($rowss_reg['freight_charges']);?></td>
  </tr>
  <tr>
    <td class="left_col"><strong>Total:</strong></td>
    <td class="right_col"><?php $total_local = $rowss_reg['custom_duties']+$rowss_reg['clearances']+$rowss_reg['freight_charges'];?> 
	
	
	<strong><?php echo $rowss_reg['currency'];?> <?php echo number_format($total_local);?></strong></td>
  </tr>

  <!--
     <tr>
    <td class="left_col">Phone:</td>
    <td class="right_col"><?php echo $rowss_reg['phone'];?></td>
  </tr> 
  
     <tr>
    <td class="left_col">Cell:</td>
    <td class="right_col"><?php echo $rowss_reg['cell'];?></td>
  </tr> -->
  <tr>
   <td class="left_col">&nbsp;</td>
    <td class="right_col"></td>
	</tr>
  <tr>
   <td class="left_col">&nbsp;</td>
    <td class="right_col"></td>
	</tr>	
</table>
<?php }?>


						  </div>
	               </div>
				   
				   
				   
						  
						 
				</div>
				
				
				
				
				
			<div class="col-lg-1 col-md-1">&nbsp;</div>	
				<div class="col-lg-11 col-md-11">
         <?php
		 
		 /*
		 $dates = 86400*13;
		 
		 
		 $time = time();
		 
		 $times = $time-$dates;
		 echo $times;
		 echo '<br>';
		 echo date('d-m-y',$times);       
		 */
				?>
				<div class="car-details">
                   
				   <div class="car-list  " style="margin-top:5px;">
				   <strong>Supporting Documents</strong>
                     <ul class="list-inline pull-right">
<li class="button red "><a href="invoice.php?iid=<?php echo $row['id'];?>"  style="color:#FFFFFF;" onClick="javascript:void window.open('invoice.php?iid=<?php echo $row['id'];?>','1526892559135','width=1024,height=650,toolbar=0,menubar=0,location=0,status=0,scrollbars=1,resizable=1,left=0,top=0');return false;"><i class="fa fa-file-pdf-o"></i> Invoice</a></li>

<?php
$sql_doc_reg = mysql_query("select * from win_document where car_id = '$car_id' ");
$rowss_doc = mysql_fetch_assoc($sql_doc_reg);
if($rowss_doc['auc_sheet'] == ''){echo '';}else{
?>

<li class="button red "><a href="docs.php?did=<?php echo $row['id'];?>&type=auction_sheet"  style="color:#FFFFFF;" onClick="javascript:void window.open('docs.php?did=<?php echo $row['id'];?>&type=auction_sheet','1526892559135','width=1024,height=650,toolbar=0,menubar=0,location=0,status=0,scrollbars=1,resizable=1,left=0,top=0');return false;"><i class="fa fa-file-pdf-o"></i> Auction Sheet</a></li>
<?php }if($rowss_doc['export_cert'] == ''){echo '';}else{?>
<li class="button red "><a href="docs.php?did=<?php echo $row['id'];?>&type=export_cert"  style="color:#FFFFFF;" onClick="javascript:void window.open('docs.php?did=<?php echo $row['id'];?>&type=export_cert','1526892559135','width=1024,height=650,toolbar=0,menubar=0,location=0,status=0,scrollbars=1,resizable=1,left=0,top=0');return false;"><i class="fa fa-file-pdf-o"></i> Export Certificate</a></li>
<?php }if($rowss_doc['bl'] == ''){echo '';}else{?>
<li class="button red "><a href="docs.php?did=<?php echo $row['id'];?>&type=export_cert"  style="color:#FFFFFF;" onClick="javascript:void window.open('docs.php?did=<?php echo $row['id'];?>&type=bl','1526892559135','width=1024,height=650,toolbar=0,menubar=0,location=0,status=0,scrollbars=1,resizable=1,left=0,top=0');return false;"><i class="fa fa-file"></i> Bill of Lading</a></li>
<?php }?>

<li class="button red "><a href="car_images.php"  style="color:#FFFFFF;" onClick="javascript:void window.open('car_images.php?did=<?php echo $row['id'];?>&id=zAh4lLgazenwB4&col=0','1526892559135','width=1024,height=650,toolbar=0,menubar=0,location=0,status=0,scrollbars=1,resizable=1,left=0,top=0');return false;"><i class="fa fa-photo"></i> Pictures</a></li>

                     </ul>
                   </div>
				   
                  </div>
                
				
				</div>
				
			
               </div>
             </div>
  
  
  
  <?php }?>
  
  
  
  

  
  
  
  
  
  
  

<!------------------------------------------------------------------------------->
 <div class="row">
               <div class="col-lg-12 col-md-12">
                  <div class="pagination-nav text-center">
                     <ul class="pagination">
<?php
/*not editable Asad */
$url_query = $_SERVER['QUERY_STRING']; if(isset($_GET['page'])){ $page =   $_GET['page'];}else{$page =   1;}
$page_a = 'page='.$page.'&'; $text = str_replace($page_a, '', $url_query); $new_url = $text;
/*not editable Asad */
$get_cars_counterss = mysql_query("SELECT * from $table_name where $WHERE ");
$mysql_fetch = mysql_fetch_assoc($get_cars_counterss);
$mysql_counter = mysql_num_rows($get_cars_counterss);

/*not editable Asad */
$totalPages = ceil($mysql_counter / $perpage);
if($page <=1 ){
echo "<li><a>Prev</a></li>";
}
else
{
$j = $page - 1;
//echo "<li><a href='?page=$j&$new_url'>Prev</a></li>";
echo "<li><a href='?page=$j'>Prev</a></li>";
}
for($i=1; $i <= $totalPages; $i++)
{
	if($i<>$page)
	{
//	echo "<li><a href='?page=$i&$new_url'>$i</a></li>";
	echo "<li><a href='?page=$i'>$i</a></li>";
	}
	else
	{
	echo "<li class='active'><a href=''>$i</a></li>";
	}
}
if($page == $totalPages )
{ echo "<li><a>Next</a></li>";}
else{$j = $page + 1;
// echo "<li><a href='?page=$j&$new_url'>Next</a></li>";
 echo "<li><a href='?page=$j'>Next</a></li>";
}
/****************/
?>
                     </ul>
                  </div>
               </div>
            </div>
<!------------------------------------------------------------------------------->	

	

	

	

	

	

	

	

	

	

	

	

	

	    </div>

     </div>

  </div>

</section>



<!--=================================

product-listing  -->

 

 

<!--=================================

 footer -->



<footer class="footer footer-black bg-3 bg-overlay-black-90">

<?php include('inc_footer.php');?>

</footer>

 

<!--=================================

 footer -->



 <!--=================================

 back to top -->



<div class="car-top">

  <span><img src="images/car.png" alt=""></span>

</div>



 <!--=================================

 back to top -->

 



<!--=================================

 jquery -->



<!-- jquery  -->

<script type="text/javascript" src="js/jquery.min.js"></script>

 

<!-- bootstrap -->

<script type="text/javascript" src="js/bootstrap.min.js"></script>



<!-- mega-menu -->

<script type="text/javascript" src="js/mega-menu/mega_menu.js"></script>



<!-- jquery-ui -->

<script type="text/javascript" src="js/jquery-ui.js"></script>



<!-- select -->

<script type="text/javascript" src="js/select/jquery-select.js"></script>



<!-- custom -->

<script type="text/javascript" src="js/custom.js"></script>

  

</body>

</html>

