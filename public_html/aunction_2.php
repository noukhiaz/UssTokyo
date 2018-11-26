<?php include('inc_nt_login.php');
   include('panel/config.php');
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>www.USSTokyo.com: Auction</title>
      <?php include('inc_head.php');?>
   </head>
   <body>
      <!--=================================
         loading -->
      <!--=================================
         loading -->
      <!--=================================
         header -->
      <header id="header" class="defualt">
         <?php include('inc_menu_top.php');?>
         <!--================================= mega menu -->
         <div class="menu">  
            <?php include('inc_menu.php');?>
         </div>
      </header>
      <!--================================= header -->
      <style>
         @media (min-width:1025px){
         .mobile
         {
         display:block;
         }
         .mobile_none
         {
         display:none;
         }
         .list-inline>li {
         border:0px !important;
         min-height : 45px;
         vertical-align : middle;
         }
         }
         @media (max-width:1024px){
         .mobile
         {
         display:none;
         }
         .mobile_none
         {
         display:inherit;
         }
         }
         .table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
         border-color: #e3e3e3;
         padding: 10px 5px;
         vertical-align:middle;
         }
         th
         {
         text-align:center;
         }
         .list-inline>li {
         padding-right: 7px !important;
         padding-left: 7px !important;
         font-size: 13px !important;
         margin-bottom:3px;
         }
         thead th{ color:#FFFFFF; border:0px;}
         tbody tr:hover{ background-color:#F7F7F7;}
      </style>
      <!--=================================
         inner-intro -->
      <section class="inner-intro bg-2 bg-overlay-black-70">
         <div class="container">
            <div class="row text-center intro-title">
               <div class="col-lg-6 col-md-6 text-left">
                  <h1 class="text-white">Cars listing </h1>
               </div>
               <div class="col-lg-6 col-md-6 text-right">
                  <ul class="page-breadcrumb">
                     <li><a href="index.php"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-double-right"></i></li>
                     <li><span>Cars Listing</span> </li>
                  </ul>
               </div>
            </div>
         </div>
      </section>
      <!--=================================
         inner-intro -->
      <!--=================================
         product-listing  -->
      <section class="product-listing page-section-ptb">
         <div class="container">
         <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12">
         <!--<div class="sorting-options-main">--> 
         <div class="row">
         <?php 
            $sql = mysql_query("select * from cars where is_active = '1'");
            while($row = mysql_fetch_array($sql)){
               ?>    
         <?php }?>         
         <?php
            ################
            ## MODELS
            ################
            if (isset($_GET['vendor'])) {
              $arr = aj_get("select model_id,model_name from main where marka_name='".$_GET['vendor']."' group by model_name order by model_name",60,0); // 1=>debug
              //prn($arr);
              foreach($arr as $v) {
                echo '<div class="col-lg-3 col-md-3"><a href="?model='.$v['MODEL_NAME'].'">'.$v['MODEL_NAME'].'</a></div>';
              }
            }
            
            ################
            ## LIST OF CARS
            ################
            elseif (isset($_GET['model'])) {
              ?>
         <div class="row ">
            <?php
               //http://www.w3programmers.com/simple-pagination-with-php-and-mysql/
               $perpage = 10;
               if(isset($_GET["page"])){
               $page = intval($_GET["page"]);
               }
               else {
               $page = 1;
               }
               $calc = $perpage * $page;
               $start = $calc - $perpage;
               
               if(isset($_REQUEST['model'])){
               $model = $_REQUEST['model'];
               $where = "model_name = '$model'";
               }
               // search by model and auction date
               if((isset($_REQUEST['model'])) && (isset($_REQUEST['date']))){
               $model = $_REQUEST['model'];
               $auction_date = $_REQUEST['date'];
               $where = "model_name = '$model' AND auction_date LIKE '$auction_date%'";
               }
               // search by year
               if((isset($_REQUEST['model'])) 
               && (isset($_REQUEST['date'])) 
               && (isset($_REQUEST['rate_a']))
               ){
               $model = $_REQUEST['model'];
               $auction_date = $_REQUEST['date'];
               $rate_a = $_REQUEST['rate_a'];
               $where = "model_name = '$model' AND rate >= '$rate_a' AND auction_date LIKE '$auction_date%'";
               }
               
               // search by model, date, rate range
               if((isset($_REQUEST['model'])) 
               && (isset($_REQUEST['date'])) 
               && (isset($_REQUEST['rate_a']))
               && (isset($_REQUEST['rate_b']))
               ){
               $model = $_REQUEST['model'];
               $auction_date = $_REQUEST['date'];
               $rate_a = $_REQUEST['rate_a'];
               $rate_b = $_REQUEST['rate_b'];
               //$where = "model_name = '$model' AND (rate>='$rate_a' and rate<='$rate_b') AND auction_date LIKE '$auction_date%'";
               $where = "model_name = '$model' AND (rate>='$rate_a' and rate<='$rate_b')";
               }
               
               // search by Auctioner
               if((isset($_REQUEST['model'])) 
               && (isset($_REQUEST['AUCTION']))
               ){
               $model = $_REQUEST['model'];
               $AUCTION = $_REQUEST['AUCTION'];
               $where = "model_name = '$model' AND auction LIKE '$AUCTION%'";
               }
               // search by Lot
               if((isset($_REQUEST['model'])) 
               && (isset($_REQUEST['id']))
               ){
               $model = $_REQUEST['model'];
               $id = $_REQUEST['id'];
               $where = "model_name = '$model' AND id = '$id'";
               }
               // search by Lot
               if((isset($_REQUEST['lot'])) 
               ){
               $lot = ''.$_REQUEST['lot'];
               $where = "lot LIKE '$lot%' ";
               }
               // search by CC / Power
               if((isset($_REQUEST['model'])) 
               && (isset($_REQUEST['ENG_V']))
               ){
               $model = $_REQUEST['model'];
               $ENG_V = $_REQUEST['ENG_V'];
               $where = "model_name = '$model' AND eng_v = '$ENG_V'";
               }
               // search by CC / Power
               
               if((isset($_REQUEST['mileage']))
               ){
               $mileage = $_REQUEST['mileage'];
               if(isset($_REQUEST['mileage_to'])){
               if( $_REQUEST['mileage_to'] != ''){
                     $mileage_to = $_REQUEST['mileage_to'];
                     $where = "mileage >= '$mileage' AND mileage <= '$mileage_to'";
                     }
                  }
               else
                  {
                     
                     $where = "mileage >= '$mileage'";
                  }
               }
               
               
               
               
               //select AVG(finish), model_name from stats WHERE marka_name='toyota' and status='sold' group by model_id
               //select * from main where model_name='corolla' and marka_name='toyota' and (rate>='3' and rate<='6') and year>=1990 order by year desc limit 4,50
               //select * from stats WHERE auction_date LIKE '2017-04-03%' limit 5
               //echo $where;
               $get_cars = aj_get("select * from main where $where  order by year desc Limit $start, $perpage"); // 1=>debug
               
               
               $get_cars_counterss = aj_get("select * from main where $where  "); // 1=>debug
                $aa = 0; 
                 foreach($get_cars_counterss as $va)
                     {
                     $aa++;
                     }
                     echo '<h4>Total <span style="color:#c20003">'.$aa . '</span> records found for <span style="color:#c20003">'.$_GET['model'].'</span></h4>';
               $model = $_GET['model'];
               
               ?>
            <div class="mobile_none">
               <?php
                  foreach($get_cars as $va)
                  {
                  
                  //echo mysql_field_name($get_cars, 0) . "\n";
                  
                  
                  ?>
               <div class="car-grid ">
                  <div class="row">
                     <div class="col-lg-4 col-md-4">
                        <div class="car-item gray-bg text-center">
                           <div class="car-image">
                              <?php
                                 $new_string = str_replace("&h=50", '', $va['IMAGES']);
                                 //echo $new_string;
                                   $img = explode('#',$new_string);
                                 // echo '<img src="'.implode('"><img src="',$img).'"  class="img-responsive" style="max-height: 175px;"">';
                                 
                                 ?>
                              <center>
                                 <?php
                                    $img = explode('#',$new_string);
                                      //$arr[0]['IMAGES'] = '<img src="'.implode('&w=320"><img src="',$img).'&w=320">'; // remove &w=320 to view full size
                                    foreach($img as $element)
                                    //foreach(array_slice($img,1) as $key=>$element)
                                    {
                                    ?>
                                 <img src="<?php echo $element;?>" class="img-responsive" style="max-height: 175px;"/>  <?php 
                                    }
                                    ?>             
                              </center>
                              <div class="car-overlay-banner">
                                 <ul>
                                    <li><a href="car_detail_auction.php?id=<?php echo $va['ID'];?>"><i class="fa fa-link"></i></a></li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-8 col-md-8" style="padding:0px;">
                        <div class="car-details">
                           <div class="car-title">
                              <div class="car-list">
                                 <ul class="list-inline">
                                    <li> <strong>Auction Date:</strong>  <?php //echo ;
                                       $x = $va['AUCTION_DATE'];
                                       echo strtok($x, " "); // Laura
                                                         
                                                         ?></li>
                                    <li><strong>Lot: </strong> <?php echo $va['LOT'];?> </li>
                                    <li><strong>Brand: </strong> <?php echo $va['MARKA_NAME'];?></li>
                                    <li><strong>Name: </strong> <?php echo $va['MODEL_NAME'];?></li>
                                    <br>
                                    <li> <strong>Auctioner:</strong> <?php echo $va['AUCTION'];?></li>
                                    <li> <strong>Grade:</strong> <?php echo $va['GRADE'];?></li>
                                    <li> <i class="fa fa-registered"></i> <?php echo $va['YEAR'];?></li>
                                    <li> <i class="fa fa-tachometer"></i> <?php echo number_format($va['MILEAGE']);?> km</li>
                                    <li> <i class="fa fa-taxi"></i> <?php echo $va['ENG_V'];?></li>
                                    <li> <i class="fa fa-cog"></i> <?php echo $va['KPP'];?></li>
                                    <li> <i class="fa fa-paint-brush"></i> <?php echo $va['COLOR'];?></li>
                                    <li> <i class="fa fa-yen"></i>  <?php echo number_format($va['START']);?></li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <?php }?>          
            </div>
            <table class="table table-bordered table-responsive mobile">
               <thead>
                  <tr bgcolor="#c20003">
                     <th>Lot No.</th>
                     <th>Pic</th>
                     <th>Auc Date</th>
                     <th>Auction</th>
                     <th>Year</th>
                     <th>Make</th>
                     <th>Name</th>
                     <th>Grade</th>
                     <th>Mileage (km)</th>
                     <th>Displace</th>
                     <th>Trans</th>
                     <th>Color</th>
                     <th>Condition</th>
                     <th>Equip</th>
                     <th>Status</th>
                     <th>Starting Price</th>
                  </tr>
               </thead>
               <tbody>
                  <?php 
                     $img = explode('#',$get_cars[0]['IMAGES']);
                       //$arr[0]['IMAGES'] = '<img src="'.implode('&w=320"><img src="',$img).'&w=320">'; // remove &w=320 to view full size
                     
                     //foreach($img as $element)
                     $f = 0;
                     $colour = 'blue';
                       foreach($get_cars as $va)
                     {
                     if($f % 2 == 0) 
                         {
                           $bgcolor= "#ffffff";
                        }
                        else 
                       {
                          $bgcolor= "#f5f5f5";
                       }
                        $f++;
                        echo "<tr bgcolor='$bgcolor'> ";
                     ?>         
                  <td style="text-align:center;"><a href="car_detail_auction.php?id=<?php echo $va['ID'];?>">
                     <?php echo $va['LOT'];?>
                     <?php //echo $va['LOT'];?></a>
                  </td>
                  <td><a href="car_detail_auction.php?id=<?php echo $va['ID'];?>">
                     <?php
                        $img = explode('#',$va['IMAGES']);
                        echo '<img src="'.implode('"><img src="',$img).'">';
                        ?></a> 
                  </td>
                  <td><?php echo $va['AUCTION_DATE'];?></td>
                  <td><?php echo $va['AUCTION'];?></td>
                  <td><?php echo $va['YEAR'];?></td>
                  <td><?php echo $va['MARKA_NAME'];?></td>
                  <td><?php echo $va['MODEL_NAME'];?></td>
                  <td style="text-align:center;"><?php echo $va['RATE'];?></td>
                  <td style="text-align:center;"><?php echo number_format($va['MILEAGE']);?> </td>
                  <td style="text-align:center;"><?php echo $va['ENG_V'];?></td>
                  <td style="text-align:center;"><?php echo $va['KPP'];?></td>
                  <td style="text-align:center;"><?php echo $va['COLOR'];?></td>
                  <td style="text-align:center;"><?php echo $va['GRADE'];?></td>
                  <td style="text-align:center;"><?php echo $va['EQUIP'];?></td>
                  <td style="text-align:center;"><?php echo $va['STATUS'];?></td>
                  <td>¥ <?php echo number_format($va['START']);?></td>
                  </tr>
                  <?php }?>              
               </tbody>
            </table>
            <div class="row">
               <div class="col-lg-12 col-md-12">
                  <div class="pagination-nav text-center">
                     <ul class="pagination">
                        <?php
                           //echo  $_SERVER['QUERY_STRING'] ; 
                              
                              $url_query = $_SERVER['QUERY_STRING'];
                              //$qs = str_replace("&page=1, ",$url_query);
                           if(isset($_GET['page'])){
                           $page =   $_GET['page'];
                           }
                           else{
                           $page =   1;
                           }
                           $page_a = 'page='.$page.'&';
                             
                             
                             
                              $text = str_replace($page_a, '', $url_query);
                           ?>
                        <?php $new_url = $text;
                           //echo $new_url;
                           ?>
                        <?php //print_r($_GET);
                           $get_cars_counterss = aj_get("select * from main where $where  "); // 1=>debug
                            $aa = 0; 
                             foreach($get_cars_counterss as $va)
                                 {
                                 $aa++;
                                 }
                           $totalPages = ceil($aa / $perpage);
                              if($page <=1 ){
                              echo "<li><a>Prev</a></li>";
                              }
                           else
                              {
                              $j = $page - 1;
                              echo "<li><a href='?page=$j&$new_url'>Prev</a></li>";
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
                              {
                              echo "<li><a>Next</a></li>";
                              }
                           else
                              {
                              $j = $page + 1;
                              echo "<li><a href='?page=$j&$new_url'>Next</a></li>";
                              }
                           
                           
                           ?>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         <?php 
            }
            
            ################
            ## LOT BY ID
            ################
            elseif(isset($_GET['id'])) {
              $arr = aj_get("select * from main where id='".$_GET['id']."'",30,0); // 1=>debug
              //prn($arr);
              $img = explode('#',$arr[0]['IMAGES']);
              $arr[0]['IMAGES'] = '<img src="'.implode('&w=320"><img src="',$img).'&w=320">'; // remove &w=320 to view full size
              foreach($arr[0] as $key => $val) {
                echo "<b>$key</b> $val<br>";
              }
            }
            
            ##############
            ## VENDORS
            ##############
            else {
               /*
              $arr = aj_get("select marka_id,marka_name from main where 
               marka_name = 'TOYOTA'
               OR marka_name = 'BMW' 
               OR marka_name = 'ISUZU' 
               OR marka_name = 'JEEP' 
               OR marka_name = 'MITSUBISHI' 
               OR marka_name = 'NISSAN' 
               OR marka_name = 'PORSCHE' 
               OR marka_name = 'SUZUKI' 
              group by marka_id order by marka_name ASC",120,0); // 1=>debug  // 120 min = 2 hour
              //prn($arr);
              foreach($arr as $v) {
                echo '<a href="?vendor='.$v['MARKA_NAME'].'">'.$v['MARKA_NAME'].'</a><br>'; // you can use $v['MARKA_ID'] as well
              }
              */
            }
            
            
            ## TIME
            $mtime = explode(' ',microtime());
            //echo '<span style="color:#c00"><br>'.round($mtime[1]+$mtime[0]-$start_time,3).' sec</span><br><br>';
            
            
            
            ?>
      </section>
      <!--=================================
         product-listing  -->
      <!--=================================
         footer -->
      <footer class="footer footer-black bg-3 bg-overlay-black-90">
         <?php include('inc_footer.php');?>
      </footer>
      <!--=================================
         footer -->
      <!--=================================
         back to top -->
      <div class="car-top">
         <span><img src="images/car.png" alt=""></span>
      </div>
      <!--=================================
         back to top -->
      <!--=================================
         jquery -->
      <!-- jquery  -->
      <script type="text/javascript" src="js/jquery.min.js"></script>
      <!-- bootstrap -->
      <script type="text/javascript" src="js/bootstrap.min.js"></script>
      <!-- mega-menu -->
      <script type="text/javascript" src="js/mega-menu/mega_menu.js"></script>
      <!-- jquery-ui -->
      <script type="text/javascript" src="js/jquery-ui.js"></script>
      <!-- select -->
      <script type="text/javascript" src="js/select/jquery-select.js"></script>
      <!-- custom -->
      <script type="text/javascript" src="js/custom.js"></script>
   </body>
</html>

