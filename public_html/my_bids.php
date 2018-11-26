<?php include('inc_nt_login.php');

		include('panel/config.php');

?>

<!DOCTYPE html>

<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=euc-kr">

<title>www.USSTokyo.com: My Bids</title>

<?php include('inc_head.php');?>
<?php include('inc_script.php');?>
</head>



<body>








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





<!--=================================

 inner-intro -->

 

 <section class="inner-intro bg-1 bg-overlay-black-70">

  <div class="container">

     <div class="row text-center intro-title">

           <div class="col-lg-6 col-md-6 text-left">

             <h3 class="text-white">Cars Bids </h3>

           </div>

           <div class="col-lg-6 col-md-6 text-right">

             <ul class="page-breadcrumb">

                <li><a href="index.php"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-double-right"></i></li>

				<li><a href="myaccount.php">My Account</a> <i class="fa fa-angle-double-right"></i></li>

                <li><span>Cars Bids</span> </li>

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

   <div class="col-lg-3 col-md-3 col-sm-4">

     <div class="blog-sidebar">

          <div class="sidebar-widget">

	 <div class="sidebar-widget">

<?php include('my_left_siderbar.php');?>

          </div>

		  </div>

		  </div>

		  </div>

     <div class="col-lg-9 col-md-9 col-sm-8">

	

	<?php 

$current_page = 'bids';

$table_name = 'bidding';

?>
  <form action="my_bids.php" method="get">
	<div class="col-lg-9 col-md-9 col-sm-9">
	<span style="font-size:16px; font-weight:bold;">
	Bids record for <?php echo $_GET['date'];?>
	</span>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-3">

<?php 
//$zone=3600*+9 ;
//$date= 
//echo $date;									
                                    $date = gmdate(time() + $zone);
                                    $datesa = gmdate("Y-m-d", time() + $zone); //date('Y-m-d', $date);
                                    $day_final = gmdate("d", time() + $zone);//date('d', $date);
                                    $day_number = gmdate("N", time() + $zone); //date('N', $day_final);
                                    $dates = gmdate("Y-m", time() + $zone);//date('Y-m', $date);
                                    $day = date('Y-m-d', strtotime($datesa.' +1 Weekday'));
                                    $perday = 86400;
                                    $daya = $day;
                                    $dayb = $day+($perday*2);
                                    $dayc = $day+$perday;
                                    $dayd = $day+$perday;
                                    $daye = $day+$perday;
                                    $dayf = $day+$perday;
                                    $date = $datesa;
                                    $ts = strtotime($date);
                                    $dow = date('w', $ts);
                                    $offset = $dow - 1;
                                    if ($offset < 0) {
                                        $offset = 6;
                                    }
                                    $ts = $ts - $offset*86400;
date_default_timezone_set("Asia/Tokyo");
//echo date_default_timezone_get();                                    
$time = time(); 

//echo date('d-m-Y h:m A',$time);
									//isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
									//$prev_date = date('Y-m-d', strtotime($date .' -1 day'));
									//$next_date = date('Y-m-d', strtotime($date .' +1 day'));
                                    ?>

<select name="date" onChange="this.form.submit();" style="width: 97px !important; height:24px;padding: 0px;border: 1px solid #999999; min-width:97px; float:right;">
		<option selected="selected"><?php echo $_GET['date'];?></option>
		<option disabled="disabled">---------------</option>
		<option><?php  echo date("Y-m-d", mktime(0,0,0,date("n", $time),date("j",$time)- 15 ,date("Y", $time)));?></option>
		<option><?php  echo date("Y-m-d", mktime(0,0,0,date("n", $time),date("j",$time)- 14 ,date("Y", $time)));?></option>
		<option><?php  echo date("Y-m-d", mktime(0,0,0,date("n", $time),date("j",$time)- 13 ,date("Y", $time)));?></option>
		<option><?php  echo date("Y-m-d", mktime(0,0,0,date("n", $time),date("j",$time)- 12 ,date("Y", $time)));?></option>
		<option><?php  echo date("Y-m-d", mktime(0,0,0,date("n", $time),date("j",$time)- 11 ,date("Y", $time)));?></option>
		<option><?php  echo date("Y-m-d", mktime(0,0,0,date("n", $time),date("j",$time)- 10 ,date("Y", $time)));?></option>
		<option><?php  echo date("Y-m-d", mktime(0,0,0,date("n", $time),date("j",$time)- 9 ,date("Y", $time)));?></option>
		<option><?php  echo date("Y-m-d", mktime(0,0,0,date("n", $time),date("j",$time)- 8 ,date("Y", $time)));?></option>
		<option><?php  echo date("Y-m-d", mktime(0,0,0,date("n", $time),date("j",$time)- 7 ,date("Y", $time)));?></option>
		<option><?php  echo date("Y-m-d", mktime(0,0,0,date("n", $time),date("j",$time)- 6 ,date("Y", $time)));?></option>
		<option><?php  echo date("Y-m-d", mktime(0,0,0,date("n", $time),date("j",$time)- 5 ,date("Y", $time)));?></option>
		<option><?php  echo date("Y-m-d", mktime(0,0,0,date("n", $time),date("j",$time)- 4 ,date("Y", $time)));?></option>
		<option><?php  echo date("Y-m-d", mktime(0,0,0,date("n", $time),date("j",$time)- 3 ,date("Y", $time)));?></option>
		<option><?php  echo date("Y-m-d", mktime(0,0,0,date("n", $time),date("j",$time)- 2 ,date("Y", $time)));?></option>
		<option><?php  echo date("Y-m-d", mktime(0,0,0,date("n", $time),date("j",$time)- 1 ,date("Y", $time)));?></option>
		<option><?php  echo date("Y-m-d", mktime(0,0,0,date("n", $time),date("j",$time)+ 0 ,date("Y", $time)));?></option>
		<option><?php  echo date("Y-m-d", mktime(0,0,0,date("n", $time),date("j",$time)+ 1 ,date("Y", $time)));?></option>
		<option><?php  echo date("Y-m-d", mktime(0,0,0,date("n", $time),date("j",$time)+ 2 ,date("Y", $time)));?></option>
		<option><?php  echo date("Y-m-d", mktime(0,0,0,date("n", $time),date("j",$time)+ 3 ,date("Y", $time)));?></option>
		<option><?php  echo date("Y-m-d", mktime(0,0,0,date("n", $time),date("j",$time)+ 4 ,date("Y", $time)));?></option>
		<option><?php  echo date("Y-m-d", mktime(0,0,0,date("n", $time),date("j",$time)+ 5 ,date("Y", $time)));?></option>
		<option><?php  echo date("Y-m-d", mktime(0,0,0,date("n", $time),date("j",$time)+ 6 ,date("Y", $time)));?></option>
		</select>
		
		</div></form>
		<br />&nbsp;
	<table class="table table-striped table-hover table-bordered" id="sample_3">

                                        <thead>

                                            <tr>

                        <th style="text-align: center; width: 12px;">B.ID</th>

                        <th style="text-align: center; width: 12px;"> Name</th>

												<th style="text-align: center;"> Bidding Price</th>

												<th style="text-align: center;"> Model</th>
												
												<th style="text-align: center;"> Comments</th>

                                                <th  style="text-align: center; width: 100px;"> Status </th>

                                            </tr>

                                        </thead>

                                        <tbody>

<?php
$search_date = $_GET['date'];
$uid = $_SESSION['id'];
//echo $search_date;
?>
<?php 
$perpage = 25;
if(isset($_GET["page"])){ $page = intval($_GET["page"]); } else { $page = 1; }
$calc = $perpage * $page;
$start = $calc - $perpage;
$WHERE = "user_id = '$uid' AND auction_date = '$search_date'";
 $sql = mysql_query("SELECT * from $table_name where $WHERE  order by id desc Limit $start, $perpage");
?>
<?php
//$date_bid = strtotime($_GET['date']);

//$sql = mysql_query("SELECT * from $table_name where user_id = '$uid' AND auction_date = '$search_date' order by id desc");

while($row = mysql_fetch_array($sql))

{
$date = $row['reg_date'];
$reg_date = date('d-m-Y',$date);
//if($reg_date != $search_date){echo '';}else{
?>										

                                            <tr class="odd gradeX">





<td style="text-align: center; width: 125px;"><?php 

//echo date('d-m-Y',$date);
//echo $row['auction_date'];
echo $row['id'];
//echo '';
//echo $row['lot'];
?> </td>                                               

 <td style="text-align: center; width: 175px;">



<?php     


//echo  date('d-m-Y',$date);
$car_id = $row['id'];
$id = $row['car_id'];
$selected = $row['is_accepted'];

/*$time = time();
$today = date('d',$time);

$datea = date('d',$date);
//echo  $today;
*/

/*
 $date_old = strtotime($_GET['date']);
  $date_now = time(); 
  $day  = date('d',$date_old);
  $day_a  = date('d',$date_now);
  
$todate_a  = date('Y-m-d',$date_now);
$auction_date = $row['auction_date'];   
//$pieces = explode("-", $auction_date);
$mydate = $auction_date;
$todaysdate=date("Y-m-d");
if ($mydate>=$todaysdate)
{
	$tablea = 'main';
    $col = '1';
	$arr = aj_get("select * from main where id='".$id."'");
	//echo 'main';
}
else
{
    $tablea = 'stats';
    $col = '0';
	$arr = aj_get("select * from stats where id='".$id."'");
	//echo 'stats';
}

*/
   error_reporting(0);
date_default_timezone_set("Asia/Karachi");
//date_default_timezone_set("Asia/Tokyo");
//$_GET['date'] = '2018-01-11';
$date_old = strtotime($_GET['date']);
	$date_now = time();	
	$day  = date('d',$date_old);
	$day_a  = date('d',$date_now);
	$date_get = $_GET['date'];
	$date_now_a  = date('Y-m-d',$date_now);
//	echo $date_now_a;
	if(($date_old >= $date_now) || ($date_now_a == $date_get))
	//if(($day >= $day_a) || ($day == $day_a))
	{
		$tablea = 'main';
		$col = '1';
		$arr = aj_get("select * from main where id='".$id."'");
	}
	else
	{
	//    echo $day_a.'new2';
	//	echo $day.'old2';
		$tablea = 'stats';
		$col = '0';
		$arr = aj_get("select * from stats where id='".$id."'");
	}
//echo $tablea;
/*
foreach($arr as $v) { 
?><b>
<a href="car_detail_auction.php?id=<?php echo $id ;?>&col=<?php echo $col;?>&cid=<?php echo $car_id;?>">
<?php echo $v['MODEL_NAME'];?> - <?php echo $v['MARKA_NAME'];?>
</a></b>
<?php }

*/
?>



<?php

$car_id = $row['car_id'];
$crid = $row['id'];
//$car_id = $row['car_id'];

$three_months = 86400*90;
$bid_date = $row['reg_date'];
$today = time();
$expiry = $three_months+$bid_date;
//echo date('d-m-Y',$expiry);
?>

<b>
<?php if($today > $expiry){ echo '<a href="#">';}else{?>
<a href="car_detail_auction.php?id=<?php echo $car_id ;?>&col=<?php echo $col;?>&cid=<?php echo $crid;?>"><?php }?>
<?php echo $row['bid_car_make'];?> - <?php echo $row['bid_car_name'];?>
</a>

</b>

							</td>

<td style="text-align: center;width: 110px;">&yen; <?php echo number_format($row['bid_price']);?>,000 </td> 
<td style="text-align: center;width: 110px;"><?php echo $row['year_model'];?>

<?php //foreach($arr as $v) {  echo $v['YEAR'];}?> </td> 	

												<td><?php echo $row['comments'];?> </td> 

											<!--	<td><?php $uid =  $row['user_id'];

												

$sql_usr = mysql_query("SELECT * from users where id = $uid ");

$row_user = mysql_fetch_array($sql_usr);

echo $row_user['name'];

												

												?> </td> 	-->

											   

										   

                                                

                                                <td style="text-align: center;">

                                                    <div class="btn-group">


<?php $STATUS = $v['STATUS']; 

/*
 if(($STATUS == 'SOLD') && ($selected != '1')){echo 'SOLD <br/>¥ '.number_format($v['FINISH']);}
*/
/* if(($STATUS == 'SOLD') && ($selected == '1')){echo 'You Win';}
else{ echo $STATUS;}
echo '<br/>¥ '.number_format($v['FINISH']);
*/

?>

<?php if($v['STATUS'] == 'SOLD'){ ?> <span style="color:#009900; font-weight:bold;"><?php echo $v['STATUS'];?></span>   <br/><?php  }?>
<?php if($v['STATUS'] == 'CANCELLED'){ ?> <span style="color:#0066CC; font-weight:bold;"><?php echo $v['STATUS'];?></span>   <br/><?php  }?>
<?php if($v['STATUS'] == 'NOT SOLD'){ ?> <span style="color:#0066CC; font-weight:bold;"><?php echo $v['STATUS'];?></span>   <br/><?php  }?>
<?php if(($v['STATUS'] == '0')){ ?> <span style="color:#0066CC; font-weight:bold;">NOT SOLD</span>   <br/><?php  }?>
<?php  if($selected == '1'){ ?> <span style="color:red; font-weight:bold;"><?php echo 'You Win';

//echo $crid;
$price = mysql_query("select * from winingcars where bid_id = '$crid'");
$pric = mysql_fetch_assoc($price);
echo '<br/>&yen; '.$pric['price'].',000';
?></span>   <br/><?php  }
else{

if($row['sold'] != '0'){
    ?>
    <span style="color:#009900; font-weight:bold;">SOLD</span>   <br/>
    <?php 
echo '<b>&yen; '.$row['sold'].',000'.'</b>';
}
else{

	echo '<b>&yen; '.number_format($v['FINISH']).'</b>';
}
	
}



?>
                                                        

                                                    </div>

                                                </td>

                                            </tr>

											<?php } //}?>                                           

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
$get_cars_counterss = mysql_query("SELECT * from $table_name where $WHERE ");
$mysql_fetch = mysql_fetch_assoc($get_cars_counterss);
$mysql_counter = mysql_num_rows($get_cars_counterss);

/*not editable Asad */
$totalPages = ceil($mysql_counter / $perpage);
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
{ echo "<li><a>Next</a></li>";}
else{$j = $page + 1;
 echo "<li><a href='?page=$j&$new_url'>Next</a></li>";
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

