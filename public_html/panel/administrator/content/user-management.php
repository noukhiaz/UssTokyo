<?php 
$current_page = 'users';
$table_name = 'users';
?>
 <div class="page-head">
                        <!-- BEGIN PAGE TITLE -->
                        <!-- <div class="page-title">
                            <h1>Managed Datatables
                                <small></small>
                            </h1>
                        </div>
                        END PAGE TITLE -->
                       
                    </div>
                    <!-- END PAGE HEAD-->
                    <!-- BEGIN PAGE BREADCRUMB -->
                   <!-- <ul class="page-breadcrumb breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <a href="#">Users</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <span class="active">Datatables</span>
                        </li>
                    </ul>
                     END PAGE BREADCRUMB -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                   
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light bordered">
<div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject bold uppercase font-dark">User management</span>
                    <span class="caption-helper"> </span>
                </div>
                <div class="actions">
                   <a href="index.php?p=add-user">
                    <button id="sample_editable_1_new" class="btn sbold green"> Add New<i class="fa fa-plus"></i></button></a>
                </div>
            </div> 

                              
                                <div class="portlet-body">
                                    <table  class="table table-striped table-bordered table-hover" id="sample_5" > 
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;width: 12px; padding-left:5px; padding-right:5px;">
                                                    <!--<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                                        <span></span>
                                                    </label>-->
													UID
                                                </th>
                                                <th style="text-align: center;width: 12px;padding-left:5px; padding-right:5px;"> Name</th>
												<th style="text-align: center;width: 12px;padding-left:5px;padding-right:5px;">Username </th>
                                                <th style="text-align: center;width: 12px;padding-left:5px; padding-right:5px;"> Email</th>
                                                <th style="text-align: center;width: 12px;padding-left:5px; padding-right:5px;"> Records </th>
                                                <th style="text-align: center;width: 78px;padding-left:5px; padding-right:5px;"> Status </th>
                                                <th style="text-align: center;width: 12px;padding-left:5px; padding-right:5px;"> Joined </th>
												<th style="text-align: center;width: 12px;padding-left:5px; padding-right:5px;"> Expiry </th>
                                                <th style="text-align: center;width: 18px;padding-left:5px; padding-right:40px;"> Actions     </th>
                                                <th style="text-align: center;width: 12px;padding-left:5px; padding-right:5px;"> Country / </br>Join </th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php
//$sql = mysql_query("SELECT * from users order by id desc");
$perpage = 20;
if(isset($_GET["page"])){ $page = intval($_GET["page"]); } else { $page = 1; }
$calc = $perpage * $page;
$start = $calc - $perpage;
 $sql = mysql_query("SELECT * from users  order by id desc Limit $start, $perpage");
while($row = mysql_fetch_array($sql))
{
?>										
                                            <tr class="odd gradeX">
                                                <td style="text-align: center;">
												<?php echo $row['id'];?>
                                                    <!--<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1" />
                                                        <span></span>
                                                    </label>-->
                                                </td>
                                                <td> <?php echo $row['name'];?> </td>
											    <td> <?php echo $row['username'];?> <br />
													<?php echo $row['pass'];?>	</td>
                                                
                                                <td style="font-size: 11px;">
                                                      <?php echo $row['email'];?> 
                                                </td>
												<td style="font-size: 11px;">
<a href="cars_list.php?uid=<?php echo $row['id'];?>"  onClick="javascript:void window.open('cars_list.php?uid=<?php echo $row['id'];?>','1526892559135','width=1024,height=650,toolbar=0,menubar=0,location=0,status=0,scrollbars=1,resizable=1,left=0,top=0');return false;">Cars List</a>
												
												<br />	

<a href="trans_list.php?uid=<?php echo $row['id'];?>"  onClick="javascript:void window.open('trans_list.php?uid=<?php echo $row['id'];?>','1526892559135','width=1024,height=650,toolbar=0,menubar=0,location=0,status=0,scrollbars=1,resizable=1,left=0,top=0');return false;"> Transaction List</a>

												
												
												
                                                <td style="text-align: center; font-size: 10px; padding-left:5px;padding-right:5px;">
                                                    <?php if($row['is_paid'] != '1'){?>
													 <span class="label label-sm label-danger" style="font-size: 10px;"> 
													Free
													 </span>
													 <?php }else{?>
													 <span class="label label-sm label-success" style="font-size: 10px;">  Paid </span>
													 <?php }?>
													<br />

													<?php if($row['is_active'] != '1'){?>
													 <span class="label label-sm label-danger" style="font-size: 10px;"> 
													Suspended
													 </span>
													 <?php }else{?>
													 <span class="label label-sm label-success" style="font-size: 10px;"> Active </span>
													 <?php }?>
													&nbsp;&nbsp;&nbsp;
													 <?php if($row['is_admin'] != '0'){?> 
													<span class="label label-sm label-warning" style="font-size: 10px;"> 
													Admin
													 </span>
													 <?php }?>
													 
                                                </td>
                                                <td class="center" style="font-size: 11px;"> <?php 
												//echo time();
												$date = time();
												//echo date('d m Y', $date);
												echo date('Y-m-d', $row['reg_date']);
												
												
												?> </td>
                                                <td class="center" style="font-size: 11px;"> <?php 
                                                echo $row['expiry_date'];
                                                
                                                
                                                ?> </td>
												
                                                <td>
                                                    <div class="btn-group">
                                                        <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu pull-left" role="menu">
                                                            <li>
                                                                <a href="index.php?p=add-user&id=<?php echo $row['id'];?>&edit=1">
                                                                    <i class="icon-pencil"></i> Edit </a>
                                                            </li>
															<li class="divider"> </li>
                                                            <li>
<a href="delete.php?p=<?php echo $current_page;?>&t=<?php echo $table_name;?>&i=<?php echo $row['id'];?>"> <i class="icon-trash"></i> Delete </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>


<?php $countryy_id = $row['countryy'];
                $mysql_countries = mysql_query("select * from countries where id = '$countryy_id' AND is_active = '1'");
                $row_countries = mysql_fetch_assoc($mysql_countries);
?>



                                                <td style="font-size: 13px;">

                                                    <?php echo $row_countries['name'].' /';?> <br />
                                                     <?php if($row['Source_Join']==NULL){echo "Null";}else{echo $row['Source_Join'];};?> 
                                                    
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
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>
<?php include("table-footer-js.php");?>