<?php 
$current_page = 'pix';
$table_name = 'car_pix';
?>
<script>
$('#sample_1').dataTable( {
  "pageLength": 50
} );
$('#example').dataTable( {
    "paging": false
} );
$('#sample_1').dataTable( {
    "paging": false
} );
</script>
 <div class="page-head">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light bordered">
<div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject bold uppercase font-dark">Pictures management</span>
                    <span class="caption-helper"> </span>
                </div>
                <div class="actions">
                    <a href="index.php?p=add_pic">
                    <button id="sample_editable_1_new" class="btn sbold green"> Add New<i class="fa fa-plus"></i></button></a>
                </div>
            </div>                                
                                
                                <div class="portlet-body">
                                  
<?php if(isset($_GET['del'])){
echo '<div class="alert alert-success"><button class="close" data-close="alert"></button>Record is deleted successfully</div>';
}?>	
<?php if(isset($_GET['update'])){
echo '<div class="alert alert-success"><button class="close" data-close="alert"></button>Record is updated successfully</div>';
}?>							
<!-- <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">-->
<!-- <table class="table table-striped table-hover table-bordered order-column" id="sample_1">-->
<table  class="table table-striped table-bordered table-hover" id="sample_1" > 
                                        <thead>
                                            <tr>
                                                <th style="text-align: center; width: 12px;">ID</th>
												<th style="text-align: center; width: 12px;">Car ID</th>
                                                <th style="text-align: center;"> Photo</th>
												<th style="text-align: center;">Type</th>
                                                <th  style="text-align: center; width: 60px;"> Actions </th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php
//$sql = mysql_query("SELECT * from $table_name order by id desc");
$perpage = 20;
if(isset($_GET["page"])){ $page = intval($_GET["page"]); } else { $page = 1; }
$calc = $perpage * $page;
$start = $calc - $perpage;
 $sql = mysql_query("SELECT * from $table_name  order by id desc Limit $start, $perpage");
while($row = mysql_fetch_array($sql))
{
$front = $row['is_front'];
?>										
                                            <tr class="odd gradeX">
                                                <td style="text-align: center;"><?php echo $row['id'];?></td>
												<td style="text-align: center;"><?php echo $row['car_id'];?></td>
                                                <td>
												
												<?php if($front == '0'){?>
												<img src="../../uploads/<?php echo $row['pic_name'];?>" style="max-height:80px;" />  
												<?php }?>
												<?php if($front == '1'){?>
												<img src="../../uploads/<?php echo $row['pic_name'];?>" style="max-height:80px; border:3px solid #FF0000;" /> 
												<?php }?>
												
												
												
												</td>
	<td style="text-align: center;">
	<?php 
	
	$yard = $row['is_yard'];
	if($yard == '0'){echo 'Auction';}
	else{ echo 'Yard';}
	
	?><br />
	<?php if($yard == '0'){?>
	<a href="pic_update.php?p=<?php echo $current_page;?>&t=<?php echo $table_name;?>&i=<?php echo $row['id'];?>&yard=1">Add to Yard</a>
	<?php }?>
	<?php if($yard == '1'){?>
	<a href="pic_update.php?p=<?php echo $current_page;?>&t=<?php echo $table_name;?>&i=<?php echo $row['id'];?>&yard=0">Add to Auction</a>
	<?php }?>
	
	<br />
	<?php if($front == '0'){?>
	<a href="pic_update.php?p=<?php echo $current_page;?>&t=<?php echo $table_name;?>&i=<?php echo $row['id'];?>&front=1&cid=<?php echo $row['car_id'];?>">Add as Main Image</a>
	<?php }?>
	<?php if($front == '1'){?>
	Main Image
	<?php }?>
	</td>									
                                                <td >
<a href="delete.php?p=<?php echo $current_page;?>&t=<?php echo $table_name;?>&i=<?php echo $row['id'];?>"> <i class="icon-trash"></i> Delete </a>
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