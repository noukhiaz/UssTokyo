<?php 
$current_page = 'facts';
$table_name = 'fact_reports';

$sql = mysql_query("SELECT *  FROM fact_reports   ");

?>
 <div class="page-head">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light bordered">


<div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject bold uppercase font-dark">Fact sheet management</span>
                    <span class="caption-helper"> </span>
                </div>
                <div class="actions">
                    <a href="index.php?p=add_fact">
                    <button id="sample_editable_1_new" class="btn sbold green"> Add New<i class="fa fa-plus"></i></button></a>
                </div>
            </div>



                                <div class="portlet-body">
<?php if(isset($_GET['del'])){
echo '<div class="alert alert-success"><button class="close" data-close="alert"></button>Record is deleted successfully</div>';
}?>	
					
<!-- <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">-->
<table  class="table table-striped table-bordered table-hover" id="sample_1" >
<!-- <table class="table table-striped table-bordered table-hover table-header-fixed" id="sample_2">-->
                                        <thead>
                                            <tr>
												<th style="text-align:center; width: 12px;">ID</th>
												<th> Title</th>
                                                <th style="text-align:center; width: 12px;"> File Type</th>
                                                <th style="text-align:center; width: 12px;"> Download</th>
                                                <th style="text-align:center; width: 12px;"> Status </th>
                                                <th style="text-align:center; width: 12px;"> Actions </th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php
while($row = mysql_fetch_array($sql))
{
?>										
                                            <tr class="odd gradeX">
                                                <td style="text-align:center;"><?php echo $row['id'];?></td>
												<td><?php echo $row['name'];?></td>
											   
<td style="text-align:center;">

<?php $file_type_fact = $row['file_type'];  
    switch ($file_type_fact) {   
    case "doc":
    $style_file = 'fa-file-text';
    $style_filea = 'label-info';
    break;
    case "docx":
    $style_file = 'fa-file-text';
    $style_filea = 'label-info';
    break;
    case "jpg":
    case "jpeg":
    case "png":
    case "gif":
    $style_file = 'fa-picture-o';
    $style_filea = 'label-warning';
    break;
    case "pdf":
    $style_file = 'fa-file-pdf-o';
    $style_filea = 'label-danger';
    break;
    default:
    $style_file = 'fa-file';
     $style_filea = 'label-success';
    }
?>

<span class="label label-sm  <?php echo $style_filea;?>">
<i class="fa <?php echo $style_file;?>"></i>
</span>
</td>

<td style="text-align:center;">
<a href="../download.php?fact=<?php echo $row['file_name'];?>"><span class="label label-sm <?php echo $style_filea;?>"> Download                                                   </span></a>
</td>




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
                                                    <div class="btn-group" style="text-align:center;">
<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu pull-left" role="menu">
                                                            <li>
                                                                <a href="index.php?p=add_fact&id=<?php echo $row['id'];?>&edit=1">
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