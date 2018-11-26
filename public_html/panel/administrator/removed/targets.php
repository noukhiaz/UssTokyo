<?php 
$current_page = 'targets';
$table_name = 'target_types';
?>
 <div class="page-head">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject bold uppercase">Target Types management</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="btn-group">
                                                <a href="index.php?p=add_targets">
													<button id="sample_editable_1_new" class="btn sbold green"> Add New
                                                        <i class="fa fa-plus"></i>
                                                    </button>
												</a>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
<?php if(isset($_GET['del'])){
echo '<div class="alert alert-success"><button class="close" data-close="alert"></button>Record is deleted successfully</div>';
}?>							
<!-- <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">-->
 <table class="table table-striped table-hover table-bordered" id="sample_3">
                                        <thead>
                                            <tr>
                                                <th>Sr. no</th>
                                                <th> Name</th>
                                                <th> Status </th>
                                                <th> Actions </th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php
$sql = mysql_query("SELECT * from $table_name order by id Asc");
while($row = mysql_fetch_array($sql))
{
?>										
                                            <tr class="odd gradeX">
                                                <td><?php echo $row['id'];?></td>
                                                <td><?php echo $row['name'];?> </td>
                                                <td>
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
                                                                <a href="index.php?p=add_targets&id=<?php echo $row['id'];?>&edit=1">
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