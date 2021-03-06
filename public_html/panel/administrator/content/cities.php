<?php 
$current_page = 'cities';
$table_name = 'countries_cities';
?>
 <div class="page-head">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light bordered">
<div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject bold uppercase font-dark">Cities management</span>
                    <span class="caption-helper"> </span>
                </div>
                <div class="actions">
                    <a href="index.php?p=add_cities">
                    <button id="sample_editable_1_new" class="btn sbold green"> Add New<i class="fa fa-plus"></i></button></a>
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
                                                <th style="text-align: center;width: 12px;">Sr. no</th>
                                                <th style="text-align: center;"> City Name</th>
												<th style="text-align: center;width: 12px;"> Parent Country </th>
                                                <th style="text-align: center;width: 12px;"> Latitude </th>
                                                <th style="text-align: center;width: 12px;"> Longitude </th>
                                                <th style="text-align: center;width: 12px;"> Status </th>
                                                <th style="text-align: center; width: 12px;"> Actions </th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php
$sql = mysql_query("SELECT * from $table_name order by id desc");
while($row = mysql_fetch_array($sql))
{
?>										
                                            <tr class="odd gradeX">
                                                <td style="text-align: center;"><?php echo $row['id'];?></td>
                                                <td><?php echo $row['name'];?> </td>
											    <td style="text-align: center;">
	<?php 
	$country_id = $row['country_id'];
	$region = mysql_query("select * from countries where id = '$country_id'");
	$rows = mysql_fetch_assoc($region);
	echo  $rows['name'];
	?>
											</td>
                                            <td style="text-align: center;"><?php echo $row['latitude'];?> </td>
                                            <td style="text-align: center;"><?php echo $row['longitude'];?> </td>
                                                <td style="text-align: center;">
													<?php if($row['is_active'] != '1'){?>
													 <span class="label label-sm label-danger"> 
													Suspended
													 </span>
													 <?php }else{?>
													 <span class="label label-sm label-success"> Active </span>
													 <?php }?>
                                                </td>
                                                <td>
                                                    <div class="btn-group">
<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu pull-left" role="menu">
                                                            <li>
                                                                <a href="index.php?p=add_cities&id=<?php echo $row['id'];?>&edit=1">
                                                                    <i class="icon-pencil"></i> Edit </a>
                                                            </li>
															<li class="divider"> </li>
                                                            <li>
<a href="delete.php?p=<?php echo $current_page;?>&t=<?php echo $table_name;?>&i=<?php echo $row['id'];?>"> <i class="icon-trash"></i> Delete </a>
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