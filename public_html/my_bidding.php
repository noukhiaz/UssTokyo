<?php include('inc_nt_login.php');

		include('panel/config.php');

?>

<!DOCTYPE html>

<html lang="en">

<head>

<title>www.USSTokyo.com: Biddings</title>

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
$current_page = 'my_bidding';
$table_name = 'bidding';
?>
	<div class="col-lg-9 col-md-9 col-sm-9">
	<span style="font-size:16px; font-weight:bold;">
	Bids record for
<?php
$car_id = $_GET['id'];
$uid = $_SESSION['id'];
$car_sql = mysql_query("select * from cars where id = '$car_id'");
$car_row = mysql_fetch_assoc($car_sql);
$brandd = $car_row['brands_id'];

$br_sql = mysql_query("select * from brands where id = '$brandd'");
$br_row = mysql_fetch_assoc($br_sql);
echo $br_row['name'];

?>
	
	
	</span>
	</div>
	
		<br >&nbsp;
	<table class="table table-striped table-hover table-bordered" id="sample_3">

                                        <thead>

                                            <tr>

                        <th style="text-align: center; width: 12px;">Bidding Date</th>


												<th style="text-align: center;"> Bidding Price</th>

												<th style="text-align: center;"> User Name</th>
												
												<th style="text-align: center;"> Comments</th>

                                                <th  style="text-align: center; width: 100px;"> Status </th>
<th  style="text-align: center; width: 150px;"> Action </th>

                                            </tr>

                                        </thead>

                                        <tbody>


<?php 
$perpage = 25;
if(isset($_GET["page"])){ $page = intval($_GET["page"]); } else { $page = 1; }
$calc = $perpage * $page;
$start = $calc - $perpage;
$table_name = 'bidding';
$WHERE = "car_id = '$car_id'";
$sql = mysql_query("SELECT * from $table_name where $WHERE  order by id desc Limit $start, $perpage");
?>
<?php
while($row = mysql_fetch_array($sql))

{
$date = $row['reg_date'];
$reg_date = date('d-m-Y',$date);
//if($reg_date != $search_date){echo '';}else{
?>										

                                            <tr class="odd gradeX">





<td style="text-align: center; width: 125px;"><?php 



echo date('d-m-Y',$date);

//echo $row['auction_date'];

?> </td>                                               


<td style="text-align: center;width: 110px;">¥ <?php echo number_format($row['bid_price']);?> </td> 
<td>
<?php $uid =  $row['user_id'];
$sql_usr = mysql_query("SELECT * from users where id = $uid ");
$row_user = mysql_fetch_array($sql_usr);
echo $row_user['name'];
?> 
</td> 	

												<td><?php echo $row['comments'];?> </td> 

											<!--		-->

											   

										   

                                                

                                                <td style="text-align: center;">

<?php 

$selected = $row['is_accepted'];
if($selected == '1'){ ?> <span style="color:#009900; font-weight:bold;"><?php echo 'You Win';?></span>   <?php  }?>
                                                        

                                                    </div>

                                                </td>
<td style="text-align: center; font-weight:bold;">
<?php
$table_namea = 'bidding';
$WHEREa = "car_id = '$car_id' AND is_accepted = '1'";
$cr_sql = mysql_query("SELECT * from $table_namea where $WHEREa");
$cr_counter = mysql_num_rows($cr_sql);
//echo $cr_counter ;
if($cr_counter <= '0'){
?>
<?php }?>
<?php if($selected == '1'){?><a href="#">Revoke</a> 
<?php }else{?><a href="#">Winner</a><?php }?>
  &nbsp; &nbsp; | &nbsp; &nbsp; 
<a href="#">Chat</a>

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

