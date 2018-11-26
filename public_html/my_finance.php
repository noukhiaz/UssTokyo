<?php include('inc_nt_login.php');

    include('panel/config.php');
?>

<!DOCTYPE html>

<html lang="en">

<head>

<title>www.USSTokyo.com: My Finance</title>

<?php include('inc_head.php');?>

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

             <h3 class="text-white">Finance History </h3>

           </div>

           <div class="col-lg-6 col-md-6 text-right">

             <ul class="page-breadcrumb">

                <li><a href="index.php"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-double-right"></i></li>

				<li><a href="myaccount.php">My Account</a> <i class="fa fa-angle-double-right"></i></li>

                <li><span>Finance History</span> </li>

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

	<h6>Transaction records!</h6>

<?php
//$search_date = $_GET['date'];
$uid = $_SESSION['id'];
$user_mysql = mysql_query("SELECT * from users where id = $uid");
$user = mysql_fetch_assoc($user_mysql);
?>

	<table class="table table-striped table-hover table-bordered" id="sample_3">

                                        <thead>

                                            <tr>

                        <th style="text-align: center; width: 12px;">T-ID</th>
						<th style="text-align: center; width:60px;"> Date</th>
						<th style="text-align: center;"> Vehicle</th>
										
						<th style="text-align: center;"> Amount Received</th>
<th style="text-align: center;"> Exchange Rate</th>		
						<th style="text-align: center;"> Local Currency</th>
						<th style="text-align: center;"> Comments</th>

                                            </tr>

                                        </thead>

                                        <tbody>

<?php 
//echo $search_date;
$table_name = 'win_finance';
?>
<?php 
$perpage = 25;
if(isset($_GET["page"])){ $page = intval($_GET["page"]); } else { $page = 1; }
$calc = $perpage * $page;
$start = $calc - $perpage;
$WHERE = "user_id = '$uid'";
 $sql = mysql_query("SELECT * from $table_name where $WHERE  order by id desc Limit $start, $perpage");
?>
<?php
while($row = mysql_fetch_array($sql))

{
$date = $row['reg_date'];
//$reg_date = date('d-m-Y',$date);
?>										
<tr class="odd gradeX">                                            
<td style="text-align: center; width:100px; padding-left:0px; padding-right:0px;"><strong><?php echo $row['id'];?></strong>
<!--
<br><?php if($row['car_id'] == '0'){echo '-';}else{?><a target="_blank" href="invoice.php?iid=<?php echo $row['car_id'];?>">IID-<?php echo $row['car_id'];?></a>
 <?php }?>
 -->
</td>                                               

 <td style="text-align: center;  width:100px; padding-left:0px; padding-right:0px;">
<?php     
 
$date = $row['reg_date'];
	//echo $date;
	//echo '<br>';
	//echo date('d-m-Y',$date);
	//echo '<br>';
	date_default_timezone_set('Asia/Tokyo');
 //echo  date('d-m-Y',$date);
 echo $row['trans_date'];
	
?></td>
 <td style="text-align: left; width: 140px;">
 <?php if($row['car_id'] == '0'){echo '-';}else{
 $car_name = $row['car_id'];
 ?>
 <?php $get_carss = mysql_query("SELECT * from winingcars where id = '$car_name' ");
$mysql_fetch_car = mysql_fetch_assoc($get_carss);
?>
 
 <a target="_blank" href="invoice.php?iid=<?php echo $row['car_id'];?>"><?php echo $mysql_fetch_car['make'];?> <?php echo $mysql_fetch_car['name'];?></a>
 <?php }?>
 </td>
<td style="text-align: center;width:100px; padding-left:0px; padding-right:0px;"> <?php echo $row['currency'];?> <?php echo number_format($row['amount']);?> </td> 	
<td style="text-align: center;width:60px; padding-left:0px; padding-right:0px;"><?php echo $row['conversion_rate'];?></td> 	
<td style="text-align: center;width:100px; padding-left:0px; padding-right:0px;"><?php echo $user['currency'];?>  <?php echo number_format($row['conversion_rate']*$row['amount']);?> </td> 	




<td><?php echo $row['description'];?></td> 
</tr>
<!--<tr class="odd gradeX">
<td colspan="7">
<strong>Comments: </strong><?php echo $row['description'];?>
</td>
</tr>-->

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

