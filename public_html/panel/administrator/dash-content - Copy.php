<script src="../assets/global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
<script src="../assets/global/plugins/amcharts/amcharts/pie.js" type="text/javascript"></script>
<script src="../assets/global/plugins/amcharts/amcharts/themes/light.js" type="text/javascript"></script>
<link rel="stylesheet" href="../assets/global/plugins/amcharts/amcharts/plugins/export/export.css" type="text/css" media="all" />
<script src="../assets/global/plugins/amcharts/amcharts/plugins/export/export.min.js"></script>
<script src="../assets/global/plugins/amcharts/amcharts/lib//amcharts.js"></script>
<script src="../assets/global/plugins/amcharts/amcharts/lib//serial.js"></script>





<?php 
$result_incidents = mysql_query("SELECT * FROM incidents where is_active = '1'");
$num_rows_incidents = mysql_num_rows($result_incidents);
?>

<?php 
$result_fact_reports = mysql_query("SELECT * FROM fact_reports where is_active = '1'");
$num_rows_fact_reports = mysql_num_rows($result_fact_reports);
?>
<?php 
$result_users = mysql_query("SELECT * FROM users where is_active = '1'");
$num_rows_users = mysql_num_rows($result_users);
?>
<?php 
$result_users = mysql_query("SELECT * FROM users where is_active = '1'");
$num_rows_users = mysql_num_rows($result_users);
?>

<?php
$total_cities =  mysql_query("SELECT * FROM incidents where category = '1' AND is_active = '1' group by city_id"); 
$rowses_cities =   mysql_num_rows($total_cities);
?>

<div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat2 bordered">
                                <div class="display">
                                    <div class="number">
                                        <h3 class="font-red-haze">
                                            <span data-counter="counterup" data-value="<?php echo $num_rows_incidents;?> "><?php echo $num_rows_incidents;?> </span>
                                            <small class="font-green-sharp"></small>
                                        </h3>
                                        <small>TOTAL INCIDENTS</small>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-bomb"></i>
                                    </div>
                                </div>                                
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat2 bordered">
                                <div class="display">
                                    <div class="number">
                                        <h3 class="font-blue-sharp">
                                            <span data-counter="counterup" data-value="<?php echo $rowses_cities;?>"><?php echo $rowses_cities;?></span>
                                        </h3>
                                        <small>AFFECTED CITIES</small>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-map"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat2 bordered">
                                <div class="display">
                                    <div class="number">
                                        <h3 class="font-green-sharp">
                                            <span data-counter="counterup" data-value="<?php echo $num_rows_fact_reports;?> "><?php echo $num_rows_fact_reports;?> </span>
                                        </h3>
                                        <small>FACT SHEETS </small>
                                    </div>
                                    <div class="icon ">
                                        <i class="fa fa-photo "></i>
                                    </div>
                                </div><!--
                                <div class="progress-info">
                                    <div class="progress">
                                        <span style="width: 85%;" class="progress-bar progress-bar-success red-haze">
                                            <span class="sr-only">85% change</span>
                                        </span>
                                    </div>
                                    <div class="status">
                                        <div class="status-title"> change </div>
                                        <div class="status-number"> 85% </div>
                                    </div>
                                </div>-->
                            </div>
                        </div>
                        
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat2 bordered">
                                <div class="display">
                                    <div class="number">                                          
                                        <h3 class="font-purple-soft">
                                            <span data-counter="counterup" data-value="<?php echo $num_rows_users;?>"><?php echo $num_rows_users;?></span>
                                        </h3>
                                        <small>TOTAL USERS</small>
                                    </div>
                                    <div class="icon">
                                        <i class="icon-user"></i>
                                    </div>
                                </div><!--
                                <div class="progress-info">
                                    <div class="progress">
                                        <span style="width: 57%;" class="progress-bar progress-bar-success purple-soft">
                                            <span class="sr-only">56% change</span>
                                        </span>
                                    </div>
                                    <div class="status">
                                        <div class="status-title"> change </div>
                                        <div class="status-number"> 57% </div>
                                    </div>
                                </div>-->
                            </div>
                        </div>
                    </div>












				
<div class="row">
    <div class="col-lg-6 col-xs-12 col-sm-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject bold uppercase font-dark">Attacks</span>
                    <span class="caption-helper">Total number of attacks, date wise.</span>
                </div>
                <div class="actions">
                     <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"> </a>
                </div>
            </div>
            <div class="portlet-body">
                <?php //include("pie-chart-cities.php");?>
                <?php include("bar-chart-cities.php");?>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-xs-12 col-sm-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject bold uppercase font-dark">Attacks</span>
                    <span class="caption-helper">Total number of attacks, city wise.</span>
                </div>
                <div class="actions">
                     <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"> </a>
                </div>
            </div>
            <div class="portlet-body">
                <?php //include("bar-chart-cities.php");?>
                <?php include("pie-chart-cities.php");?>
            </div>
        </div>
    </div>
</div>


                  
                    <div class="row">

<!-----------------------------------------------------------------------------------------><div class="col-lg-6 col-xs-12 col-sm-12">
                            <div class="portlet light tasks-widget bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-share font-dark hide"></i>
                                     <span class="caption-subject font-dark bold uppercase">Latest News</span>
                                     <span class="caption-helper"> summary...</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="task-content">
                                        <div class="scroller" style="height: 312px;" data-always-visible="1" data-rail-visible1="1">
                                            <!-- START TASK LIST -->
                                            <ul class="task-list">
											<?php
$sql = mysql_query("SELECT * from incidents where is_active = '1' order by id desc limit 10");
while($row = mysql_fetch_array($sql))
{
?>	
                                                <li>
                                                    <div class="task-title">
                                                     <span class="task-bell"><i class="fa fa-bell-o"></i></span>
<span class="task-title-sp"> <a href="index.php?p=incident_detail&id=<?php echo $row['id'];?>"><?php echo $row['name'];?></a> </span><!--
<span class="label label-sm label-success">Company</span><span class="task-bell"><i class="fa fa-bell-o"></i></span>-->
                                                    </div>
                                                    <div class="task-config">
                                                        <div class="task-config-btn btn-group">
                                                            <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                                <i class="fa fa-cog"></i>
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                            <ul class="dropdown-menu pull-right">
                                                                <li>
<a href="index.php?p=add_incident&id=<?php echo $row['id'];?>&edit=1"><i class="fa fa-pencil"></i> Edit </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
<?php }?>                                         
                                            </ul>
                                            <!-- END START TASK LIST -->
                                        </div>
                                    </div>
                                    <div class="task-footer">
                                        <div class="btn-arrow-link pull-right">
                                            <a href="index.php?p=incidents">See All Incidents</a>
                                            <i class="icon-arrow-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       </div>
                                               
                        <!------------------------------------------------------------------------>
                        
                        <div class="col-lg-6 col-xs-12 col-sm-12">
                            <div class="portlet light tasks-widget bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-share font-dark hide"></i>
                                     <span class="caption-subject font-dark bold uppercase">Fact Sheets</span>
                                     <span class="caption-helper">Downloads</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="task-content">
                                        <div class="scroller" style="height: 312px;" data-always-visible="1" data-rail-visible1="1">
                                            <ul class="feeds">
<?php
$sql_reports = mysql_query("SELECT * from fact_reports where is_active = '1'  order by id desc limit 10");
while($row_re = mysql_fetch_array($sql_reports))
{
?>  
                                                    <li>
                                                        <div class="col1">
                                                            <div class="cont">
                                                                <div class="cont-col1">
<?php $file_type_fact = $row_re['file_type'];  
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
                                                                </div>
                                                                <div class="cont-col2">
                                                                    <div class="desc">
                                                                        <span class="task-title-sp"> 
                                                                        <?php echo $row_re['name'];?>
                                                                    </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <a href="../download.php?fact=<?php echo $row_re['file_name'];?>">
                                                            <span class="label label-sm <?php echo $style_filea;?>"> Download                                                   </span>
                                                            </a>
                                                        </div>
                                                    </li>
                                                    <?php }?>    
                                                </ul>
                                        </div>
                                    </div>
                                    <div class="task-footer">
                                        <div class="btn-arrow-link pull-right">
                                            <a href="index.php?p=facts">See All Reports</a>
                                            <i class="icon-arrow-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                   
                            
        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<script src="../assets/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="../assets/global/plugins/moment.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/morris/morris.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/morris/raphael-min.js" type="text/javascript"></script>



        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="../assets/pages/scripts/dashboard.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="../assets/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
        <script>
            $(document).ready(function()
            {
                $('#clickmewow').click(function()
                {
                    $('#radio1003').attr('checked', 'checked');
                });
            })
        </script>