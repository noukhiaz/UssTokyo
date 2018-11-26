<!--=================================

         product-listing  -->

      <section class="product-listing page-section-ptb">

         <div class="">

         <div class="row">

         <div class="col-lg-14 col-md-12 col-sm-12">

         <!--<div class="sorting-options-main">--> 

         <div class="row">

         <?php 

            $sql = mysql_query("select * from cars where is_active = '1'");

            while($row = mysql_fetch_array($sql)){

              }?>       

         <?php

            ################

            ## MODELS

            ################

            if (isset($_GET['vendor'])) {

 $arr = aj_get("select model_id,model_name from $table where marka_name='".$_GET['vendor']."' group by model_name order by model_name",60,0); // 1=>debug

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
/*			
	if((isset($_REQUEST['lot'])))

               {

if($lot != ''){
                $lot = ''.$_REQUEST['lot'];
                $auction_date = $_REQUEST['date'];
                $WHERE = "auction_date LIKE '$auction_date%' AND lot = '$lot'";
				$get_cars = aj_get("select * from $table where $WHERE "); // 1=>debug
				$get_cars_counterss = aj_get("select * from $table where $WHERE"); // 1=>debug	
				 $aa = 0; 
					if (!$get_cars_counterss) { $get_cars_counterss = []; }
	                if (!$get_cars) { $get_cars = []; }
	                 foreach($get_cars_counterss as $va)
		              {
		                  $aa++;
			          }
		              echo '<h4>Total <span style="color:#c20003">'.$aa . '</span> records found for <span style="color:#c20003"> Lot '. $lot .'</span></h4>';
		       }
}			   
else{			   		
	  } 		
			
*/			

              // unset empty filter

              if ($_REQUEST['model'] == '') { unset($_REQUEST['model']); }

              if ($_REQUEST['date'] == '') { unset($_REQUEST['date']); }

              if ($_REQUEST['auction'] == '') { unset($_REQUEST['auction']); }

              if ($_REQUEST['lot'] == '') { unset($_REQUEST['lot']); }

           //   if ($_REQUEST['year_from'] == '') { unset($_REQUEST['year_from']); }

      //        if ($_REQUEST['year_to'] == '') { unset($_REQUEST['year_to']); }

          //    if ($_REQUEST['mileage_from'] == '') { unset($_REQUEST['mileage_from']); }

          //    if ($_REQUEST['mileage_to'] == '') { unset($_REQUEST['mileage_to']); }

//              if ($_REQUEST['price_start'] == '') { unset($_REQUEST['price_start']); }

           //   if ($_REQUEST['price_to'] == '') { unset($_REQUEST['price_to']); }

             // if ($_REQUEST['displace_from'] == '') { unset($_REQUEST['displace_from']); }

           //   if ($_REQUEST['displace_to'] == '') { unset($_REQUEST['displace_to']); }

              unset($_REQUEST['PHPSESSID']);

              unset($_REQUEST['mark_name']);

              unset($_REQUEST['submit']);

          

               // print_r($_REQUEST);die();

               //http://www.w3programmers.com/simple-pagination-with-php-and-mysql/

               $perpage = 25;

               if(isset($_GET["page"])){ $page = intval($_GET["page"]); } else { $page = 1; }



               $calc = $perpage * $page;

               $start = $calc - $perpage;

               

               // Handle Multi Where Clauses

               $WHERE = [];

               

               // search by model

               if(isset($_REQUEST['model']))

               {

                 $model = $_REQUEST['model'];

                 $WHERE[] = "model_name = '$model'";

               }

               // search by auction date

               if((isset($_REQUEST['date'])))

               {

                 $auction_date = $_REQUEST['date'];

                 $WHERE[] = "auction_date LIKE '$auction_date%'";

               }

               // search by Auctioner
/*
               if((isset($_REQUEST['auction'])))

               {

                 $auctioner = $_REQUEST['auction'];

                 $WHERE[] = "AUCTION LIKE '$auctioner%'";

               }
*/
               // search by Lot

               

              /*
			  
			   // search by Year From & To

               if((isset($_REQUEST['year_from']) && isset($_REQUEST['year_to'])))

               {

                  $year_from = $_REQUEST['year_from'];

                  $year_to = $_REQUEST['year_to'];

                  if ($year_from < $year_to)

                  {

                    $WHERE[] = "YEAR BETWEEN '$year_from' AND '$year_to'";

                  

                  }else

                  {

                    $WHERE[] = "YEAR BETWEEN '$year_to' AND '$year_from'";



                  }

               }
         
           if((isset($_REQUEST['year_from']) && !isset($_REQUEST['year_to'])))

               {

                  $year_from = $_REQUEST['year_from'];

             //     $year_to = $_REQUEST['year_to'];

                

                    $WHERE[] = "YEAR >= '$year_from'";

                  

                  }
         
         \\\\\
		 
		 
		 
		 
		 if((isset($_REQUEST['grade_from']) && isset($_REQUEST['grade_to'])))
               {
			   
					  $grade_from = $_REQUEST['grade_from'];
					  $grade_to = $_REQUEST['grade_to'];
                  	if($grade_from <= $grade_to)
                  {
				  echo 'From'.$_REQUEST['grade_from'];
				   echo 'To'.$_REQUEST['grade_to'];
				   echo 'khan';
				  	//if($grade_from == ''){$grade_from = '1';}
					//if($grade_to == ''){$grade_to = '3000';}
                    $WHERE[] = "GRADE BETWEEN '$grade_from' AND '$grade_to'";
                  }
				  else
                  {
				  echo $_REQUEST['grade_to'];
				  echo 'asad';
					// $WHERE[] = "ENG_V BETWEEN '$displace_to' AND '$displace_from'";
					$WHERE[] = "GRADE >= '$grade_from' ";
                  }				  
               }

			  */
			  
			  
			    if((isset($_REQUEST['mileage_from']) && isset($_REQUEST['mileage_to'])))
               {
					  $mileage_from = $_REQUEST['mileage_from'].'000';
					  $mileage_to = $_REQUEST['mileage_to'].'000';
                  if($mileage_from <= $mileage_to)
                  {
				  //echo 'asad';
				  //echo $mileage_from;
				  if(($mileage_from != '') ||($mileage_from != ''))
					{
					if($mileage_from == '0'){$mileage_from = '0';}
					if($mileage_to == '0'){$mileage_to = '100000000';}
                    $WHERE[] = "MILEAGE BETWEEN '$mileage_from' AND '$mileage_to'";
					}	
                  else
                  {
				  echo 'khan';
					// $WHERE[] = "ENG_V BETWEEN '$displace_to' AND '$displace_from'";
					$WHERE[] = "MILEAGE >= '$mileage_from' ";
                  }
				  }
				  				  
               }
			  
			  
               
			   
			   
			   
			   if((isset($_REQUEST['year_from']) && isset($_REQUEST['year_to'])))
               {
					  $year_from = $_REQUEST['year_from'];
					  $year_to = $_REQUEST['year_to'];
                  	if($year_from <= $year_to)
                  {
				  	if($year_from == ''){$year_from = '1900';}
					if($year_to == ''){$year_to = '3000';}
                    $WHERE[] = "YEAR BETWEEN '$year_from' AND '$year_to'";
                  }
				  else
                  {
					// $WHERE[] = "ENG_V BETWEEN '$displace_to' AND '$displace_from'";
					$WHERE[] = "YEAR >= '$year_from' ";
                  }				  
               }
			   
			 

               // search by Price Start & End
/*
               if((isset($_REQUEST['price_start']) && isset($_REQUEST['price_to'])))
               {
                  $price_start = $_REQUEST['price_start'];
                  $price_to = $_REQUEST['price_to'];
                  if ($price_start < $price_to)
                  {
                    $WHERE[] = "START BETWEEN '$price_start' AND '$price_to'";
                  }else
                  {
                    $WHERE[] = "START BETWEEN '$price_to' AND '$price_start'";
                  }

               }
*/
			if((isset($_REQUEST['price_start']) && isset($_REQUEST['price_to'])))
               {
					  $price_start = $_REQUEST['price_start'];
					  $price_to = $_REQUEST['price_to'];
                  	if($price_start <= $price_to)
                  {
				  	if($price_start == ''){$price_start = '0';}
					if($price_to == ''){$price_to = '100000000';}
                    $WHERE[] = "START BETWEEN '$price_start' AND '$price_to'";
                  }
				  else
                  {
					// $WHERE[] = "ENG_V BETWEEN '$displace_to' AND '$displace_from'";
					$WHERE[] = "START >= '$price_start' ";
                  }				  
               }
             
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
	
		 
			   if((isset($_REQUEST['displace_from']) && isset($_REQUEST['displace_to'])))
               {
					  $displace_from = $_REQUEST['displace_from'];
					  $displace_to = $_REQUEST['displace_to'];
                  	if($displace_from <= $displace_to)
                  {
				  	if($displace_from == ''){$displace_from = '0';}
					if($displace_to == ''){$displace_to = '10000';}
                    $WHERE[] = "ENG_V BETWEEN '$displace_from' AND '$displace_to'";
                  }
				  else
                  {
					// $WHERE[] = "ENG_V BETWEEN '$displace_to' AND '$displace_from'";
					$WHERE[] = "ENG_V >= '$displace_from' ";
                  }				  
               }



           

               $WHERE = !(empty($WHERE)) ? implode(" AND ",$WHERE) : "1";
			   
		   

           //     print_r($WHERE); 
			//	echo $table;
        //die();

               

               //select AVG(finish), model_name from stats WHERE marka_name='toyota' and status='sold' group by model_id

               //select * from main where model_name='corolla' and marka_name='toyota' and (rate>='3' and rate<='6') and year>=1990 order by year desc limit 4,50

               //select * from stats WHERE auction_date LIKE '2017-04-03%' limit 5

               //echo $where;

//  $get_cars = aj_get("select * from $table where $WHERE  order by AUCTION_DATE desc, YEAR  desc Limit $start, $perpage"); // 1=>debug


         
          $get_cars = aj_get("select * from $table where $WHERE  order by AUCTION, LOT ASC, YEAR  desc Limit $start, $perpage"); // 1=>debug


$get_cars_counterss = aj_get("select * from $table where $WHERE"); // 1=>debug  

                $aa = 0; 

                if (!$get_cars_counterss) { $get_cars_counterss = []; }

                if (!$get_cars) { $get_cars = []; }

                 foreach($get_cars_counterss as $va)

                  {

                  $aa++;

                  }

        //  echo '<h4>Total <span style="color:#c20003">'.$aa . '</span> records found</h4>';
                  echo '<h4>Total <span style="color:#c20003">'.$aa . '</span> records found for <span style="color:#c20003">'.$_GET['model'].'</span></h4>';
          //echo '<h4> <span style="color:#c20003">Search: </span> records found for <span style="color:#c20003">'.$_GET['model'].'</span></h4>';

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

                                    <li><a target="_blank"  href="car_detail_auction.php?id=<?php echo $va['ID'];?>&col=<?php echo $col;?>"><i class="fa fa-link"></i></a></li>

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

                                    <li> <strong>Auction Grade:</strong> <?php echo $va['GRADE'];?></li>

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

                     <th style="width:70px;">Lot No.</th>

                     <th>Pic</th>

                     <th style="width:80px;">Auction <br />Time</th>

                     <th>Auction</th>

                     <th style="width:50px;">Year</th>

                     <th>Make</th>

                     <th style="width:70px;">Name</th>
						<th style="width:70px;">Chassis</th>
						<th> Package / Type</th>
						
						
                     <th style="width:50px;">Auction Grade</th>
					 
					 <th style="width:50px;">Fuel</th>

                     <th style="width:70px;">Mileage (KM)</th>

                     <th style="width:70px;">Displace</th>

                     <th>Trans</th>

                     <th>Color</th>

                     

                     <!--<th>Equip</th>-->

                     

                     <th style="width: 100px;">Starting Price &yen;</th>
					 
					 <th style="width: 100px;">Your Bid &yen;</th>
					 <th>Group</th>
					 
                     <th>Status</th>
<th style="width: 100px;">Result &yen;</th
                  ></tr>

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

                  <td style="text-align:center;"><a target="_blank"  href="car_detail_auction.php?id=<?php echo $va['ID'];?>&col=<?php echo $col;?>">

                     <?php echo $va['LOT'];?>

                     <?php //echo $va['LOT'];?></a>

                  </td>

                  <td style="width: 78px;"><a target="_blank"  href="car_detail_auction.php?id=<?php echo $va['ID'];?>&col=<?php echo $col;?>">

                     <?php

                        $img = explode('#',$va['IMAGES']);

                        echo '<img src="'.implode('"><img src="',$img).'">';

                        ?></a> 

                  </td>

                  <td style="width: 87px; text-align: center;"><?php $string = $va['AUCTION_DATE'];
				  
				  echo substr($string, 11);
				  ?></td>

                  <td style="text-align:center;"><?php echo $va['AUCTION'];?></td>

                  <td><?php echo $va['YEAR'];?></td>

                  <td><?php echo $va['MARKA_NAME'];?></td>
				  
				  

                  <td><?php echo $va['MODEL_NAME'];?></td>
				  
				 <td style="text-align:center;"><?php echo $va['KUZOV'];?></td> <!-- chassis -->
				 
				   <td style="text-align:center;"><?php echo $va['GRADE'];?></td>
				   
				   

                  <td style="text-align:center;"><?php echo $va['RATE'];?></td>
				  <td style="text-align:center;">-<?php //echo $va['KPP_TYPE'];?></td> <!-- FUEL -->

                  <td style="text-align:center;"><?php echo number_format($va['MILEAGE']);?> </td>

                  <td style="text-align:center;"><?php echo $va['ENG_V'];?></td>

                  <td style="text-align:center;"><?php echo $va['KPP'];?></td>

                  <td style="text-align:center; text-transform: capitalize;"><?php echo $va['COLOR'];?></td>

                 

                  

                 

                  <td style="text-align:center;width: 87px;"> <?php echo number_format($va['START']);?></td>
				  
				  <td style="text-align:center; ">

<?php
$user_id = $_SESSION['id'];
//echo $user_id;
$car_id =  $va['ID'];
$sql_bid = mysql_query("select * from bidding where car_id = '$car_id' AND user_id = '$user_id'" );
$row_bid = mysql_fetch_assoc($sql_bid);
$coubet = mysql_num_rows($sql_bid);
?>


<?php if($coubet != '0'){
$accepted =  $row_bid['is_accepted'] ;  
$bid_price =  number_format($row_bid['bid_price']);  
//echo  number_format($bid_price);
   ?>
   


<?php if($accepted == '0'){ ?> <span style="color:#0066CC; font-weight:bold;"><?php echo $bid_price;?></span> <?php  }?>
<?php if($accepted == '1'){ ?> <span style="color:#009900; font-weight:bold;"><?php echo $bid_price;?></span> <?php  }?>



<?php }else{echo '';}?>
               


              </td> <!-- your bid -->
				  
				  <td style="text-align:center;">

<?php echo $row_bid['groupp'];?>
              </td> <!-- group -->
				  
 <td style="text-align:center;width: 87px; font-size:11px;">
 <?php //echo $va['STATUS'];?>

 
 
<?php if($va['STATUS'] == 'SOLD'){ ?> <span style="color:#009900; font-weight:bold;"><?php echo $va['STATUS'];?></span>   <br/><?php  }?>
<?php if($va['STATUS'] == 'CANCELLED'){ ?> <span style="color:#0066CC; font-weight:bold;"><?php echo $va['STATUS'];?></span>   <br/><?php  }?>
<?php if($va['STATUS'] == 'NOT SOLD'){ ?> <span style="color:#0066CC; font-weight:bold;"><?php echo $va['STATUS'];?></span>   <br/><?php  }?>
<?php if(($va['STATUS'] == '0')){ ?> <span style="color:#0066CC; font-weight:bold;">NOT SOLD</span>   <br/><?php  }?>

 
 </td>
  <td style="text-align:center;width: 87px;">
 
<?php 

if($va['STATUS'] != '')
{
if($va['FINISH'] != '')
{ echo number_format($va['FINISH']); 

}else{echo '0';
}
}?>

 
 
 </td>
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

                         /*  $get_cars_counterss = aj_get("select * from $table where $where  "); // 1=>debug

                        if (!$get_cars_counterss) { $get_cars_counterss = []; }

                            $aa = 0; 

                             foreach($get_cars_counterss as $va)

                                 {

                                 $aa++;

                                 }*/
                 
$get_cars_counterss = aj_get("select * from $table where $WHERE"); // 1=>debug
                $aa = 0; 

                if (!$get_cars_counterss) { $get_cars_counterss = []; }

                if (!$get_cars) { $get_cars = []; }

                 foreach($get_cars_counterss as $va)

                  {

                  $aa++;

                  }

                 
                

                           $totalPages = ceil($aa / $perpage);
               
            //    echo  $totalPages;

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
//echo $totalPages;
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

              $arr = aj_get("select * from $table where id='".$_GET['id']."'",30,0); // 1=>debug

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