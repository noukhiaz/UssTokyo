<?php include('inc_nt_login.php');

   include('panel/config.php');

   error_reporting(0);
date_default_timezone_set("Asia/Tokyo");
//print($_GET);

$date_old = strtotime($_GET['date']);
	$date_now = time();	
	$day  = date('d',$date_old);
	$day_a  = date('d',$date_now);
	
	
	$date_get = $_GET['date'];
	
	//echo 'today'.$date_now . $day_a;
	//echo '<br />';
	//echo 'old'.$date_old . $day;
	$date_now_a  = date('Y-m-d',$date_now);
	if(($date_old >= $date_now) || ($date_now_a == $date_get))
	//if(($day >= $day_a) || ($day == $day_a))
	{
	//	echo $day_a.'new';
		//echo $day.'old';
		$table = 'main';
		$col = '1';
	}
	else
	{
	//    echo $day_a.'new2';
	//	echo $day.'old2';
		$table = 'stats';
		$col = '0';
	}
	//$table = 'main';
	
/*	
$date_old = strtotime($_GET['date']);
 $date_now = time(); 
  //$day  = date('d',$date_old);
//  $day_a  = date('d',$date_now);
  
$todate_a  = date('Y-m-d',$date_now);
//$auction_date = $row['auction_date'];   
//$pieces = explode("-", $auction_date);
$mydate = $date_old;
$todaysdate=date("Y-m-d");
if ($mydate>=$todaysdate)
{
	$table = 'main';
    $col = '1';
	//$arr = aj_get("select * from main where id='".$id."'");
	//echo 'main';
}
else
{
    $table = 'stats';
    $col = '0';
	//$arr = aj_get("select * from stats where id='".$id."'");
	//echo 'stats';
}*/
//echo $table;
   ?>

<!DOCTYPE html>

<html lang="en">

   <head><meta http-equiv="Content-Type" content="text/html; charset=euc-kr">

      <title>www.USSTokyo.com: Auction</title>

      <?php include('inc_head.php');?>
		<?php include('inc_script.php');?>
<style>
body {
    font-size: 14px !important;
    color: #111111 !important;
}
</style>
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
/*
         .list-inline>li {

         padding-right: 7px !important;

         padding-left: 7px !important;

         font-size: 13px !important;

         margin-bottom:3px;

         }
		 */

         thead th{ color:#FFFFFF; border:0px;}

         tbody tr:hover{ background-color:#F7F7F7;}

      </style>

      <!--=================================

         inner-intro -->

      <section class="inner-intro bg-7 bg-overlay-black-70">

         <div class="container">

            <div class="row text-center intro-title">

               <div class="col-lg-6 col-md-6 text-left">

                  <h3 class="text-white">Cars listing </h3>

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

      





        <?PHP //ECHO $_SERVER['QUERY_STRING'];?>   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<!--
<script type="text/javascript">
function updateBids() {
   var url="auction_data.php?<?PHP ECHO $_SERVER['QUERY_STRING'];?>";
   jQuery("#priceElement").load(url);
}
setInterval("updateBids()", 5000);
</script>-->
<div id="priceElement"><?php include('auction_data_a.php');?></div>





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



