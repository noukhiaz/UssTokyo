<?php 
$current_page = 'cars';
$table_name = 'cars';

$perpage = 20;
if(isset($_GET["page"])){ $page = intval($_GET["page"]); } else { $page = 1; }
$calc = $perpage * $page;
$start = $calc - $perpage;
//$sql = mysql_query("SELECT * from $table_name order by id desc");
 $sql = mysql_query("SELECT * from $table_name  order by id desc Limit $start, $perpage");
?>
 <div class="page-head">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light bordered">
                                
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject bold uppercase font-dark">Cars management</span>
                    <span class="caption-helper"> </span>
                </div>
                <div class="actions">
                    <a href="index.php?p=add_cars">
					<button id="sample_editable_1_new" class="btn sbold green"> Add New<i class="fa fa-plus"></i></button></a>
                </div>
            </div>





                                <div class="portlet-body">
                                    
<?php if(isset($_GET['del'])){
echo '<div class="alert alert-success"><button class="close" data-close="alert"></button>Record is deleted successfully</div>';
}?>	


					
<!-- <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">-->
<table class="table table-striped table-hover table-bordered" id="sample_1">
<!-- <table class="table table-striped table-bordered table-hover table-header-fixed" id="sample_2">-->
                                        <thead>
                                            <tr>
												<th style="text-align:center; width: 12px;">ID</th>
  												<th style="text-align:center;width: 12px;">Pic</th>
                                                <th style="text-align:center;width: 12px;">Make</th>
  												<th style="text-align:center;width: 12px;">Name</th>
												<th style="text-align:center;width: 12px;">Lot No</th>
												<th style="text-align:center;width: 12px;">Year</th>
												<th style="text-align:center;width: 12px;">Auction <br />Grade</th>
												<th style="text-align:center;width: 12px;">Chasis</th>
												<th style="text-align:center;width: 12px;">Package</th>
												<th style="text-align:center;width: 12px;">Fuel</th>
												<th style="text-align:center;width: 12px;">Mileage</th>
												<th style="text-align:center;width: 12px;">Displace</th>
												<th style="text-align:center;width: 12px;">Trans</th>
												
												<th style="text-align:center;width: 12px;">Cond I</th>
												<th style="text-align:center;width: 12px;">Color</th>
												<th style="text-align:center;width: 12px;">Equipment</th>
												<th style="text-align:center;width: 12px;">Yard</th>
												<th style="text-align:center;width: 12px;">Price</th>
                                                <th style="text-align:center;width: 12px;"> Status </th>
                                                <th style="text-align:center;width: 12px;"> Actions </th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php
while($row = mysql_fetch_array($sql))
{
?>										
                                            <tr class="odd gradeX">
                                                <td style="text-align:center;"><?php echo $row['id'];?></td>
                                                <td style="text-align:center;">
						
<?php 
$id = $row['id'];
$px_sql = mysql_query("select * from car_pix where car_id = '$id' order by is_front desc limit 1");
$sql_px = mysql_fetch_assoc($px_sql);
?>		
<!--										
<img src="../../uploads/<?php echo $sql_px['pic_name'];?>" width="100px"/>		
-->

<a href="../../car_images_admin.php?did=<?php echo $row['id'];?>&<?php echo md5($row['id']);?>"  onClick="javascript:void window.open('../../car_images_admin.php?did=<?php echo $row['id'];?>&<?php echo md5($row['id']);?>','1526892559135','width=1024,height=650,toolbar=0,menubar=0,location=0,status=0,scrollbars=1,resizable=1,left=0,top=0');return false;"><img src="../../uploads/<?php echo $sql_px['pic_name'];?>" width="100px"/>	</a>

<?php if($row['is_sold'] == '1'){?>
Sold
	  <?php }?>
         								
												</td>

<td>
	<?php
	$make_id = $row['make'];
	$make_id = mysql_query("select * from companies where id = '$make_id'");
	$rowses_make = mysql_fetch_assoc($make_id);
	?>
<!--<a href="index.php?p=incidents&search=1&city=<?php echo $rowses_make['id'];?>" class="font-black">-->

<?php echo $rowses_make['name'];?>
</td>											   
<td style="text-align:center;">
<?php 
	$brands_id = $row['brands_id'];
	$brands_id = mysql_query("select * from brands where id = '$brands_id'");
	$rowses_brand = mysql_fetch_assoc($brands_id);
?>

<a href="../../car_detail.php?id=<?php echo $row['id'];?>" target="_blank" class="font-black" ><?php echo $row['brands_id'];//echo $rowses_brand['name'];?></a>
</td>
<td style="text-align:center;"><?php echo $row['lotn'];?></td>
<td style="text-align:center;"><?php echo $row['year'];?></td>
<td style="text-align:center;"><?php echo $row['conde'];?></td>
<td style="text-align:center;"><?php echo $row['chasis'];?></td>
<td style="text-align:center;"><?php echo $row['grade'];?></td>
<td style="text-align:center;"><?php echo $row['fuel'];?></td>
<td style="text-align:center;"><?php echo $row['mileage'];?></td>
<td style="text-align:center;"><?php echo $row['displace'];?></td>
<td style="text-align:center;"><?php echo $row['trans'];?></td>

<td style="text-align:center;"><?php echo $row['condi'];?></td>
<td style="text-align:center;"><?php echo $row['colorr'];?></td>
<td style="text-align:center;"><?php echo $row['equipment'];?></td>
<td style="text-align:center;"><?php echo $row['yard'];?></td>
<td style="text-align:center;"><?php echo $row['price'];?></td>


                                                <td style="text-align:center;">
													<?php if($row['is_active'] != '1'){?>
													 <span class="label label-sm label-danger"> 
													Suspended
													 </span>
													 <?php }else{?>
													 <span class="label label-sm label-success"> Active </span>
													 <?php }?>
                                                </td>
  
                                                <td>






<a href="index.php?p=add_pic&cp=<?php echo $current_page;?>&carid=<?php echo $row['id'];?>" target="_blank">Add Pics </a>
<br />
<br />

<a href="index.php?p=add_cars&id=<?php echo $row['id'];?>&edit=1">Edit</a>
<br /><br />
<a href="delete.php?p=<?php echo $current_page;?>&t=<?php echo $table_name;?>&i=<?php echo $row['id'];?>" onclick="return confirm('Are you sure? You want to delete this record?');">Delete</a>




<!--

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
-->


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