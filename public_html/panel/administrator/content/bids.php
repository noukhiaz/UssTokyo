<?php 
$current_page = 'bids';
$table_name = 'bidding';
?>
<?php //include('../../inc_script.php');?>
 <div class="page-head">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light bordered">
<div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject bold uppercase font-dark">Bidding management</span>
                    <span class="caption-helper"> </span>
                </div>
                <div class="actions">
<!--                    <a href="index.php?p=add_companies">
                    <button id="sample_editable_1_new" class="btn sbold green"> Add New<i class="fa fa-plus"></i></button></a>-->
                </div>
            </div>                                
                                
                                <div class="portlet-body">
                                  
<?php if(isset($_GET['del'])){
echo '<div class="alert alert-success"><button class="close" data-close="alert"></button>Record is deleted successfully</div>';
}?>							
<!-- <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">-->
 <table class="table table-striped table-hover table-bordered" id="sample_3">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center; width:81px !important; padding:10px 3px;">Car ID</th>
                                                <th style="text-align: center; width: 18px; padding:10px 3px;"> Lot</th>
												<th style="text-align: center; width: 180px; padding:10px 3px;"> Name</th>
												<th style="text-align: center; width: 18px; padding:10px 3px;"> Year</th>
												<th style="text-align: center; width:50px; padding:10px 3px;"> Bidding Price</th>
												<th style="text-align: center; padding:10px 3px; width:30px;"> Comments</th>
												<th style="text-align: center; padding:10px 3px; width:30px;"> User</th>
												<th style="text-align: center; width:50px; padding:10px 3px;"> Status</th>
                                                <th  style="text-align: center; width: 80px; padding:10px 3px;"> Actions </th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php
$sql = mysql_query("SELECT * from bidding order by id desc ");
while($row = mysql_fetch_array($sql))
{
?>										
                                            <tr class="odd gradeX">
                                                <td style="text-align: center; font-size:12px; padding:10px 3px;">
												
<?php if($row['is_auction'] == '0'){echo 'S';}else{echo 'A';}?> - <?php echo $row['id'];?>
												<br />
<?php //echo date('d-m-Y',$row['reg_date']);?>

<?php echo $row['auction_date'];?>
</td>
<td style=" padding:10px 3px;"><?php echo $row['lot'];?> </td> 
                                                <td style=" padding:10px 3px;">

<?php 
//$car_id = $row['car_id'];
//$px_sql = mysql_query("select * from car_pix where car_id = $car_id order by id desc limit 1");
//$sql_px = mysql_fetch_assoc($px_sql);
?>	<!--											
<img src="../../uploads/<?php echo $sql_px['pic_name'];?>" width="100px"/>	
-->
<?php     

$id = $row['car_id'];
$date = $row['reg_date'];
$selected = $row['is_accepted'];


 //$date_old = strtotime($_GET['date']);
  $date_now = time(); 
 // $day  = date('d',$date_old);
  $day_a  = date('d',$date_now);
  
$todate_a  = date('Y-m-d',$date_now);
$auction_date = $row['auction_date'];   
$pieces = explode("-", $auction_date);

//echo $pieces['2'];	

$mydate = $auction_date;
$todaysdate=date("Y-m-d");
/*
if($todaysdate > $auction_date)
{
//echo 'older';
$col = '0';
}else
{
$col = '1';
}
*/
//echo $todaysdate;
/*
foreach($arr as $v) { ?>
<a target="_blank" href="../../car_detail_auction.php?id=<?php echo $id ;?>&col=<?php echo $col;?>">
<?php echo $v['MODEL_NAME'];?> - <?php echo $v['MARKA_NAME'];?>
</a>
<?php }

*/
?>

<a target="_blank" href="../../car_detail_auction.php?id=<?php echo $id ;?>&col=<?php echo $col;?>">
<?php echo $row['bid_car_make'];?> - <?php echo $row['bid_car_name'];?> 
</a>



	
							</td>
												<td style=" padding:10px 3px;"><?php echo $row['year_model'];?> </td> 	
												<td style=" padding:10px 3px;">&yen; <?php echo number_format($row['bid_price']);?>,000 </td> 	
												<td style=" padding:10px 3px;"><?php echo $row['comments'];?> </td> 
												<td style="text-align:center; font-size:12px; padding:10px 3px;"><?php $uid =  $row['user_id'];
												
$sql_usr = mysql_query("SELECT * from users where id = $uid ");
$row_user = mysql_fetch_array($sql_usr);
echo $row_user['name'];
												
												?> </td> 	
											   


 	<?php if($row['is_accepted'] == '0'){
	?>			<td  style="text-align:center; font-size:12px;padding:10px 3px; ">
	<?php }else{?>
<td  style="text-align:center; font-size:12px; background-color:#0099CC; color:#FFFFFF; padding:10px 3px;">
<?php }?>
<?php if($row['is_accepted'] == '0'){echo ' - ';}else{

echo 'You Win';



}?> 
</td> 							   
                         
						  
						  
						                        
                                                <td style="padding:10px 3px;">
                                                    <div class="btn-group">
<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu pull-left" role="menu">
<?php if($row['is_accepted'] == '0'){?>														
<li>										
<a href="award.php?p=<?php echo $current_page;?>&t=<?php echo $table_name;?>&i=<?php echo $row['id'];?>&win=1"> <i class="icon-key"></i> Award </a>
</li><?php }else{?>

<li>										
<a href="award.php?p=<?php echo $current_page;?>&t=<?php echo $table_name;?>&i=<?php echo $row['id'];?>&win=0"> <i class="icon-cross"></i> Cancel </a>
</li>
<?php }?>

															<li class="divider"> </li>
                                                            <li>
<a href="delete.php?p=<?php echo $current_page;?>&t=<?php echo $table_name;?>&i=<?php echo $row['id'];?>"> <i class="icon-trash"></i> Delete Bid</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
											<?php }?>                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
<?php include("table-footer-js.php");?>