<?php 
$current_page = 'win_cars';
$table_name = 'winingcars';
//$sql = mysql_query("SELECT * from $table_name order by id desc");
$perpage = 20;
if(isset($_GET["page"])){ $page = intval($_GET["page"]); } else { $page = 1; }
$calc = $perpage * $page;
$start = $calc - $perpage;
 $sql = mysql_query("SELECT * from $table_name  order by id desc Limit $start, $perpage");
?>
 <div class="page-head">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light bordered">
                                
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject bold uppercase font-dark">All Sold Cars Management</span>
                    <span class="caption-helper"> </span>
                </div>
                <div class="actions">
                    <a href="index.php?p=post_new_cars_auction">
					<button id="sample_editable_1_new" class="btn sbold green"> Add New<i class="fa fa-plus"></i></button></a>
                </div>
            </div>





                                <div class="portlet-body">
                                    
<?php if(isset($_GET['del'])){
echo '<div class="alert alert-success"><button class="close" data-close="alert"></button>Record is deleted successfully</div>';
}?>	
					
<table class="table table-striped table-hover table-bordered" id="sample_1">
                                        <thead>
                                            <tr>
												<th style="text-align:center;width: 12px; padding-left:0px; padding-right:0px;">Pic</th>
												<th style="text-align:center; width: 16px;">Date</th>
												<th style="text-align:center; width: 12px; padding-left:5px; padding-right:5px;">ID's</th>
                                                <!--<th style="text-align:center;width: 12px;">Make</th>-->
  												<th style="text-align:center;width: 12px; padding-left:5px; padding-right:5px;">Name</th>
  												<th style="text-align:center;width: 12px; padding-left:5px; padding-right:5px;">Price</th>
												
												
												<th style="text-align:center;width: 12px; padding-left:5px; padding-right:5px;">Lot No</th>
												<th style="text-align:center;width: 12px; padding-left:5px; padding-right:5px;">Year</th>
												<!--
												<th style="text-align:center;width: 12px; padding-left:5px; padding-right:5px;">Mileage</th>
												-->
												<th style="text-align:center;width: 12px; padding-left:5px; padding-right:5px;">Grade</th>
												
												<th style="text-align:center;width: 12px;">User Name</th>
												<th style="text-align:center;width: 12px;"> Actions </th>
												<th style="text-align:center;width: 12px;">Status</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
<?php
while($row = mysql_fetch_array($sql))
{
?>										
                                            <tr class="odd gradeX">
											 <td style="text-align:center;">
						
<?php 
$id = $row['id'];
$px_sql = mysql_query("select * from car_pix where car_id = '$id' order by is_front desc limit 1");
$sql_px = mysql_fetch_assoc($px_sql);
?>	
<a href="../../car_images_admin.php?did=<?php echo $row['id'];?>&<?php echo md5($row['id']);?>"  onClick="javascript:void window.open('../../car_images_admin.php?did=<?php echo $row['id'];?>&<?php echo md5($row['id']);?>','1526892559135','width=1024,height=650,toolbar=0,menubar=0,location=0,status=0,scrollbars=1,resizable=1,left=0,top=0');return false;"><img src="../../uploads/<?php echo $sql_px['pic_name'];?>" width="100px"/>	</a>											
	
</td>
											 <td style="text-align:center; font-size:10px;">
                                                    <?php echo date('d-m-Y',$row['reg_date']);?>
                                                </td>
                                              
												 <td style="text-align:center; font-size:10px;">
                                                    
<a href="../../invoice-local.php?i=<?php echo $row['id'];?>&<?php echo md5($row['id']);?>"  onClick="javascript:void window.open('../../invoice-local.php?i=<?php echo $row['id'];?>&<?php echo md5($row['id']);?>','1526892559135','width=1024,height=650,toolbar=0,menubar=0,location=0,status=0,scrollbars=1,resizable=1,left=0,top=0');return false;"><i class="fa fa-file-pdf-o"></i> Invoice <?php echo $row['id'];?></a>
													<br /><br />
                                                     <?php if($row['bid_id'] != '0'){echo "Bid: ".$row['bid_id'];}?>
                                                   
                                                </td>
<td style="text-align:center;">
<?php	echo  $row['make'];	?> <br />
 <?php echo $row['name'];?>
</td>
<td style="text-align:center;"><?php echo number_format($row['price']);?>,000 Yen</td>

<td style="text-align:center;"><?php echo $row['lotn'];?></td>
<td style="text-align:center;"><?php echo $row['year'];?></td>
<!--
<td style="text-align:center;"><?php echo $row['mileage'];?></td>-->
<td style="text-align:center;"><?php echo $row['grade'];?></td>
<td style="text-align:center; color:#0066FF; font-weight:bold;"><?php $userID = $row['user_id'];
$sql_user = mysql_query("select * from users where id = $userID");

$mysql_user_name = mysql_fetch_assoc($sql_user);

?>
<a href="cars_list.php?uid=<?php echo $mysql_user_name['id'];?>"  onClick="javascript:void window.open('cars_list.php?uid=<?php echo $mysql_user_name['id'];?>','1526892559135','width=1024,height=650,toolbar=0,menubar=0,location=0,status=0,scrollbars=1,resizable=1,left=0,top=0');return false;"><?php echo $mysql_user_name['name'];?></a>




</td>







 <td>

<style>
.dropdown-menu {
    left: 0;
    min-width: 145px !important;
	
	}
	</style>



 <div class="btn-group">
<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="true"> Actions
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu pull-left" role="menu"  >

<li>										
<a href="index.php?p=add_pic&cp=<?php echo $current_page;?>&carid=<?php echo $row['id'];?>" target="_blank"> <i class="icon-picture"></i> Add Pics </a>
</li>

<li>										
<a href="index.php?p=add_pic&cp=<?php echo $current_page;?>&carid=<?php echo $row['id'];?>" target="_blank" >  <i class="icon-doc"></i> Add Documents </a>
</li>

<li>										
<a href="index.php?p=edit_cars_auction&id=<?php echo $row['id'];?>&edit=1"><i class="icon-pencil"></i> Edit</a>
</li>

															<li class="divider"> </li>
                                                            <li>


<a href="delete.php?p=<?php echo $current_page;?>&t=<?php echo $table_name;?>&i=<?php echo $row['id'];?>" onclick="return confirm('Are you sure? You want to delete this record?');"> <i class="icon-trash"></i> Delete</a>
                                                            </li>
                                                        </ul>
                                                    </div>





<td>
<?php if($row['status'] == '0'){?> <span class="label label-sm label-danger">In Ship</span><?php }?>
<?php if($row['status'] == '1'){?> <span class="label label-sm label-success">Delivered</span><?php }?>
<?php if($row['status'] == '2'){?> <span class="label label-sm label-warning">In Progress</span><?php }?>
<br />
<br />
<?php if($row['is_active'] != '1'){?>
													 <span class="label label-sm label-danger"> 
													Suspended
													 </span>
													 <?php }else{?><!--
													 <span class="label label-sm label-success"> Active </span>
													 -->
													 <?php }?>

</td>
                                              
  
                                               
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