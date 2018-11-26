<?php 
$current_page = 'transactions';
$table_name = 'win_finance';
?>
<?php //include('../../inc_script.php');?>
 <div class="page-head">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light bordered">
<div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject bold uppercase font-dark">Transactions Management</span>
                    <span class="caption-helper"> </span>
                </div>
                <div class="actions">
                  <a href="index.php?p=add_transaction">
                    <button id="sample_editable_1_new" class="btn sbold green"> Add Transaction<i class="fa fa-plus"></i></button></a>
                </div>
            </div>                                
                                
                                <div class="portlet-body">
                                  
<?php if(isset($_GET['del'])){
echo '<div class="alert alert-success"><button class="close" data-close="alert"></button>Record is deleted successfully</div>';
}?>							
<?php
//$search_date = $_GET['date'];
/*
$uid = $_SESSION['id'];
$user_mysql = mysql_query("SELECT * from users where id = $uid");
$user = mysql_fetch_assoc($user_mysql);
*/
?>
		<table class="table table-striped table-hover table-bordered" id="sample_1">
	<!--<table class="table table-striped table-hover table-bordered" id="sample_1">-->

                                        <thead>

                                            <tr>
<th style="width: 1px; padding:0px; margin:0px;"></th>
                        <th style="text-align: center; width: 12px; padding-left:2px; padding-right:2px;">T-ID</th>
						<th style="text-align: center; width:60px;"> Date</th>
						<th style="text-align: center; padding-left:2px; padding-right:2px;"> Vehicle</th>
						<th style="text-align: center; padding-left:2px; padding-right:2px;"> Amount <br />Received</th>
						<th style="text-align: center; padding-left:2px; padding-right:2px;"> Exchange <br />Rate</th>		
						<th style="text-align: center; padding-left:2px; padding-right:2px;"> Local <br />Currency</th>
						<th style="text-align: center; padding-left:2px; padding-right:2px;"> Comments</th>
						<th style="text-align: center; padding-left:2px; padding-right:2px;"> UserName</th>
						<th style="text-align: center; padding-left:12px; padding-right:12px;"> Action</th>

                                            </tr>

                                        </thead>

                                        <tbody>

<?php 
//echo $search_date;
$table_name = 'win_finance';
?>
<?php 
$perpage = 20;
if(isset($_GET["page"])){ $page = intval($_GET["page"]); } else { $page = 1; }
$calc = $perpage * $page;
$start = $calc - $perpage;
//$WHERE = "user_id = '$uid'";
 $sql = mysql_query("SELECT * from $table_name  order by id desc Limit $start, $perpage");
?>
<?php
while($row = mysql_fetch_array($sql))

{
$date = $row['reg_date'];
$reg_date = date('d-m-Y',$date);
?>
									
<tr>   
<td style="padding:0px; margin:0px;"></td>	                                         
<td style="text-align: center; width:100px; padding-left:0px; padding-right:0px;"><strong><?php echo $row['id'];?></strong>
<!--
<br><?php if($row['car_id'] == '0'){echo '-';}else{?><a target="_blank" href="invoice.php?iid=<?php echo $row['car_id'];?>">IID-<?php echo $row['car_id'];?></a>
 <?php }?>
 -->
</td>                                               

 <td style="text-align: center;  width:100px; padding-left:0px; padding-right:0px;">
<?php     
 
$date = $row['reg_date'];
	//echo $date;
	//echo '<br>';
	//echo date('d-m-Y',$date);
	//echo '<br>';
	date_default_timezone_set('Asia/Tokyo');
 //echo  date('d-m-Y',$date);
 echo $row['trans_date'];
	
?></td>
 <td style="text-align: left; width: 140px;">
 <?php if(($row['car_id'] == '0') || ($row['car_id'] == '1') || ($row['car_id'] == '2')){echo '-';}else{
 $car_name = $row['car_id'];
 ?>
 <?php $get_carss = mysql_query("SELECT * from winingcars where id = '$car_name' ");
$mysql_fetch_car = mysql_fetch_assoc($get_carss);
?>
 
 
 <a href="../../invoice-local.php?i=<?php echo $row['id'];?>&<?php echo md5($row['car_id']);?>"  onClick="javascript:void window.open('../../invoice-local.php?i=<?php echo $row['car_id'];?>&<?php echo md5($row['car_id']);?>','1526892559135','width=1024,height=650,toolbar=0,menubar=0,location=0,status=0,scrollbars=1,resizable=1,left=0,top=0');return false;"><?php echo $mysql_fetch_car['make'];?> <?php echo $mysql_fetch_car['name'];?></a>
 
 
 
 
 
 
 
 <?php }?>
 </td>
<td style="text-align: center;width:100px; padding-left:0px; padding-right:0px;"> <?php echo $row['currency'];?> <?php echo number_format($row['amount']);?> </td> 	
<td style="text-align: center;width:60px; padding-left:0px; padding-right:0px;"><?php echo $row['conversion_rate'];?></td> 	
<td style="text-align: center;width:100px; padding-left:0px; padding-right:0px;"><?php //echo $user['currency'];?>  <?php echo number_format($row['conversion_rate']*$row['amount']);?> </td> 	




<td><?php echo $row['description'];?></td> 
<td><?php $userID = $row['user_id'];
$sql_user = mysql_query("select * from users where id = $userID");

$mysql_user_name = mysql_fetch_assoc($sql_user);
?>
 <a href="trans_list.php?uid=<?php echo $mysql_user_name['id'];?>"  onClick="javascript:void window.open('trans_list.php?uid=<?php echo $mysql_user_name['id'];?>','1526892559135','width=1024,height=650,toolbar=0,menubar=0,location=0,status=0,scrollbars=1,resizable=1,left=0,top=0');return false;"> <?php echo $mysql_user_name['name'];?></a>
</td> 

<td>
                                                                <a href="index.php?p=add_transaction&id=<?php echo $row['id'];?>&edit=1">
                                                                    <i class="icon-pencil"></i> Edit </a>
							&nbsp; &nbsp; 
<a href="delete.php?p=<?php echo $current_page;?>&t=<?php echo $table_name;?>&i=<?php echo $row['id'];?>"> <i class="icon-trash"></i> Delete </a>
                                                          </td>


</tr>
<!--<tr class="odd gradeX">
<td colspan="7">
<strong>Comments: </strong><?php echo $row['description'];?>
</td>
</tr>-->

											<?php } //}?>                                           

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
$get_cars_counterss = mysql_query("SELECT * from $table_name  ");
$mysql_fetch = mysql_fetch_assoc($get_cars_counterss);
$mysql_counter = mysql_num_rows($get_cars_counterss);

/*not editable Asad */
$totalPages = ceil($mysql_counter / $perpage);
if($page <=1 ){
echo "<li><a>Prev Page</a></li>";
}
else
{
$j = $page - 1;
echo "<li><a href='?page=$j&$new_url'>Prev Page</a></li>";
}
for($i=1; $i <= $totalPages; $i++)
{
	if($i<>$page)
	{
	echo "<li><a href='?page=$i&$new_url'>$i</a></li>";
	}
	else
	{
	echo "<li class='active'><a href=''>$i</a></li>";
	}
}
if($page == $totalPages )
{ echo "<li><a>Next Page</a></li>";}
else{$j = $page + 1;
 echo "<li><a href='?page=$j&$new_url'>Next Page</a></li>";
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
                    </div>
<?php include("table-footer-js.php");?>