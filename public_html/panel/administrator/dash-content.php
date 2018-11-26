<script src="../assets/global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
<script src="../assets/global/plugins/amcharts/amcharts/pie.js" type="text/javascript"></script>
<script src="../assets/global/plugins/amcharts/amcharts/themes/light.js" type="text/javascript"></script>
<link rel="stylesheet" href="../assets/global/plugins/amcharts/amcharts/plugins/export/export.css" type="text/css" media="all" />
<script src="../assets/global/plugins/amcharts/amcharts/plugins/export/export.min.js"></script>
<script src="../assets/global/plugins/amcharts/amcharts/lib//amcharts.js"></script>
<script src="../assets/global/plugins/amcharts/amcharts/lib//serial.js"></script>





<?php 

$brands = mysql_query("SELECT * FROM brands where is_active = '1'");
$tot_brands = mysql_num_rows($brands);


$cars = mysql_query("SELECT * FROM cars where is_active = '1'");
$Tot_cars = mysql_num_rows($cars);


$result_users = mysql_query("SELECT * FROM users where is_active = '1'");
$num_rows_users = mysql_num_rows($result_users);


$result_users = mysql_query("SELECT * FROM users where is_active = '1'");
$num_rows_users = mysql_num_rows($result_users);


$companies =  mysql_query("SELECT * FROM companies where is_active = '1'"); 
$rowses_cities =   mysql_num_rows($companies);
?>

<div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat2 bordered">
                                <div class="display">
                                    <div class="number">
                                        <h3 class="font-red-haze">
                                            <span data-counter="counterup" data-value="<?php echo $tot_brands;?> "><?php echo $tot_brands;?> </span>
                                            <small class="font-green-sharp"></small>
                                        </h3>
                                        <small>TOTAL BRANDS</small>
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
                                        <small>AUCTION SALES</small>
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
                                            <span data-counter="counterup" data-value="<?php echo $Tot_cars;?> "><?php echo $Tot_cars;?> </span>
                                        </h3>
                                        <small>LISTING SALES </small>
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