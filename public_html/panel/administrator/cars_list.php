<?php include('../config.php');?>
<style>
td,tr,body{font-family:Arial, Helvetica, sans-serif;}
tr,td{padding-left:2px; padding-right:2px; }
tr,th,td{padding-top:5px; padding-bottom:5px; border:1px solid #333333; font-size:12px;}
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

<div style="height:170px;">&nbsp;</div>

<section class="product-listing page-section-ptb" style="padding:0px;  ">

	<div class="container">

<?php 

$current_page = 'bids';

$table_name = 'winingcars';

$uid = $_GET['uid'];

$perpage = 6;
if(isset($_GET["page"])){ $page = intval($_GET["page"]); } else { $page = 1; }
$calc = $perpage * $page;
$start = $calc - $perpage;
$where = "where user_id = '$uid' AND  is_active = '1'";
 $sql = mysql_query("SELECT * from $table_name $where  order by id desc Limit $start, $perpage");
 //$sql = mysql_query("SELECT * from `winingcars` where user_id = '$uid' AND  is_active = '1'");


?>

	
  
  
  
  
 <?php
 
 $sql_user = mysql_query("select * from users where id = $uid");

$mysql_user_name = mysql_fetch_assoc($sql_user);

?> 
 <div style="padding-right:60px;text-align:right; font-size:13px;"> 
<strong>Date:</strong> <?php 
$timezone  = +9; //(GMT -5:00) EST (U.S. & Canada) 
echo gmdate("D j M, Y", time() + 3600*($timezone+date("I"))); 
//echo date('d-m-Y',time());?>
</div>
<div style="padding-left:60px; font-size:13px;"> 
<strong>Customer Name:</strong>  MR. / MS. <?php echo $mysql_user_name['name'];?>  <?php echo $mysql_user_name['lastname'];?><br /><br />
&nbsp;
</div>
  
  
  <center>
  <strong>CARS PURCHASING HISTORY</strong><br />
  
<table border="0"  cellspacing="0" cellpadding="0" bordercolor="#999999" width="90%">
                                        <thead>
                                            <tr>
												<th style="text-align:center; width: 80px;" width="80">Date</th>
												<th style="text-align:center; width: 12px; padding-left:5px; padding-right:5px;">ID's</th>
												<th style="text-align:center;width: 12px; padding-left:0px; padding-right:0px;">Pic</th>
												
												
                                                <!--<th style="text-align:center;width: 12px;">Make</th>-->
  												<th style="text-align:center;width: 12px; padding-left:5px; padding-right:5px;">Name</th>
  												<th style="text-align:center;width: 12px; padding-left:5px; padding-right:5px;">Price  </th>
												
												
												<th style="text-align:center;width: 12px; padding-left:5px; padding-right:5px;">Received  </th>
												<th style="text-align:center;width: 12px; padding-left:5px; padding-right:5px;">Balance  </th>
												<th style="text-align:center;width: 12px; padding-left:5px; padding-right:5px;">Details</th>
												
												<th style="text-align:center;width: 12px;">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php
while($row = mysql_fetch_array($sql))
{
?>										
                                            <tr class="odd gradeX">
											<td style="text-align:center; width:130px;" width="80">
                                                    <?php echo date('d-m-Y',$row['reg_date']);?>
                                                </td>
											
											 
                                              
												 <td style="text-align:center; width:80px; ">
                                                    
<a href="../../invoice-local.php?i=<?php echo $row['id'];?>&<?php echo md5($row['id']);?>" style="color:#000000;  text-decoration:none;"  onClick="javascript:void window.open('../../invoice-local.php?i=<?php echo $row['id'];?>&<?php echo md5($row['id']);?>','1526892559135','width=1024,height=650,toolbar=0,menubar=0,location=0,status=0,scrollbars=1,resizable=1,left=0,top=0');return false;">
<i class="fa fa-file-pdf-o"></i> Invoice <br /><?php echo $row['id'];?></a>
										<!--	<br /><br />		-->

<?php //if($row['bid_id'] != '0'){echo "Bid ID <br />".$row['bid_id'];}?>
                                                   
                                                </td>
 <td style="text-align:center; width:80px;">
						
<?php 
$id = $row['id'];
$px_sql = mysql_query("select * from car_pix where car_id = '$id' AND is_front = '1' order by id desc limit 1");
$sql_px = mysql_fetch_assoc($px_sql);
?>	
<a href="../car_images_admin.php?did=<?php echo $row['id'];?>&<?php echo md5($row['id']);?>" style="color:#000000; text-decoration:none;"  onClick="javascript:void window.open('../../car_images_admin.php?did=<?php echo $row['id'];?>&<?php echo md5($row['id']);?>','1526892559135','width=1024,height=650,toolbar=0,menubar=0,location=0,status=0,scrollbars=1,resizable=1,left=0,top=0');return false;"><img src="../../uploads/<?php echo $sql_px['pic_name'];?>" width="80px"/>	</a>											
	
</td>												
<td style="text-align:center; width:80px;">
<?php	echo  $row['make'];	?> <br />
 <?php echo $row['name'];?>
</td>
<td style="text-align:center; width:130px;"><?php //echo number_format($row['price']);?>


 <?php 
	$price =$row['price'].'000';
	$frieght = $row['freight_chrgs'];
	$inspaction = $row['inspection'];
	$vanning =  $row['vanning'];
	$commission = $row['comssion']; 
	
	$totel_auc = $price+$frieght+$inspaction+$vanning+$commission;
	
	?>
	
Price: <?php echo number_format($price);?><br />
<?php if($frieght != '0'){?>Frieght: <?php echo number_format($frieght);?><br /><?php }?>
<?php if($inspaction != '0'){?>Inspaction: <?php echo number_format($inspaction);?><br /><?php }?>
<?php if($vanning != '0'){?>Vanning: <?php echo number_format($vanning);?><br /><?php }?>
<?php if($commission != '0'){?>Commission: <?php echo number_format($commission);?><br /><?php }?>
<br />
<strong>Total: <?php echo number_format($totel_auc);?> &yen; </strong>
	
	
</td>

<td style="text-align:center; width:80px;">

		<?php 
		
		//is_jp_transaction = '1'  Japan car Transaction
				//is_jp_transaction = '0'  Local Frieght or custom charges car Transaction
		$cid = $row['id'];
		$finance_sum_query = mysql_query("SELECT car_id, SUM(amount) as total_amount
FROM win_finance where car_id = '$cid' AND is_jp_transaction = '1' GROUP BY car_id");
	//$finance_sum_query = mysql_query("SELECT car_id, SUM(`amount` * conversion_rate) as total_amount
//FROM win_finance where car_id = '$cid' AND is_jp_transaction = '1' GROUP BY car_id");
$finance = mysql_fetch_assoc($finance_sum_query);
	
	$total_recvd = $finance['total_amount'];
	echo number_format($total_recvd);
	?> &yen; 
</td>
<td style="text-align:center; width:80px;"> <?php echo number_format($totel_auc-$total_recvd);?> &yen; </td>
<!--
<td style="text-align:center; width:80px;"></td>-->
<td style="text-align:left; padding-left:10px; width:80px; line-height:20px;">
<strong>Lot:</strong> <?php echo $row['lotn'];?><br />
<strong>Year:</strong> <?php echo $row['year'];?><br />

<strong>Grade:</strong> <?php echo $row['grade'];?><br />
<span  style="font-size:12px;"><strong>Mileage:</strong> <?php echo $row['mileage'];?></span>
</td>


<td style="text-align:center; width:80px;">
<?php if($row['status'] == '0'){?> <span class="label label-sm label-danger">In Ship</span><?php }?>
<?php if($row['status'] == '1'){?> <span class="label label-sm label-success">Delivered</span><?php }?>
<?php if($row['status'] == '2'){?> <span class="label label-sm label-warning">In Progress</span><?php }?>

</td>
                                              
                                            </tr>
											<?php }?>                                           
                                        </tbody>
                                    </table>
									
		
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
$get_cars_counterss = mysql_query("SELECT * from $table_name $where   ");
$mysql_fetch = mysql_fetch_assoc($get_cars_counterss);
$mysql_counter = mysql_num_rows($get_cars_counterss);

/*not editable Asad */
$totalPages = ceil($mysql_counter / $perpage);
if($page <=1 ){
echo "";
}
else
{
$j = $page - 1;
echo "<a href='?page=$j&$new_url' style='text-decoration:none; color:black; padding-right:8px;'></a>";
}
for($i=1; $i <= $totalPages; $i++)
{
	if($i<>$page)
	{
	echo "<a href='?page=$i&$new_url' style='text-decoration:none; color:black; padding-right:8px; font-weight:bold; color:blue;' class='btn-print'>$i</a>";
	}
	else
	{
	echo "<a href='#' style='text-decoration:none; color:black; padding-right:8px;' class='btn-print'>$i</a>";
	}
}
if($page == $totalPages )
{ echo "";}
else{$j = $page + 1;
 echo "<a href='?page=$j&$new_url' style='text-decoration:none; color:black; padding-right:8px;'></a>";
}
/****************/
?>
                     </ul>
                  </div>
               </div>
            </div>
<!------------------------------------------------------------------------------->	<br />
									
			</center>						
									
									
									
									
									
									
									
									
  
  
<center>
<button  id="printPageButton"  onclick="javascript:window.print()" class="btn-print">Print</button> &nbsp;&nbsp;
<button  id="printPageButton"  onclick="javascript:window.close()" class="btn-print">Close</button>
</center>				   
						   
	</div>
	</section>			