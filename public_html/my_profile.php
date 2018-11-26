<?php include('inc_nt_login.php');

    include('panel/config.php');
?>

<!DOCTYPE html>

<html lang="en">

<head>

<title>www.USSTokyo.com: My Profile</title>

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

             <h3 class="text-white">My Profile </h3>

           </div>

           <div class="col-lg-6 col-md-6 text-right">

             <ul class="page-breadcrumb">

                <li><a href="index.php"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-double-right"></i></li>

				<li><a href="myaccount.php">My Account</a> <i class="fa fa-angle-double-right"></i></li>

                <li><span>My Profile</span> </li>

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

<div class="col-lg-6 col-md-6 col-sm-6">
	<h6>My Profile</h6>
</div>

<div class="col-lg-6 col-md-6 col-sm-6">
	<h6 style="text-align:right; color:#CC3300"><a href="profile-edit<?php echo $phpext;?>">Edit</a></h6>
</div>
	
	
<?php
	$uid = $_SESSION["id"];
	$mysql_querya = mysql_query("select * from users where id = '$uid'");
	$row = mysql_fetch_assoc($mysql_querya);
?>	
	  <div class="col-lg-6 col-md-6 col-sm-6" style="background:#FFF;">
       <div class="car-details-sidebar">
          <div class="details-block details-weight">
		  <ul>
              <li> <span>First Name</span> <strong class="text-right"><?php echo $row['name'];?></strong></li>
              <li> <span>Last Name</span> <strong class="text-right"><?php echo $row['lastname'];?></strong></li>
              <li> <span>Account Type </span> <strong class="text-right"><?php if($row['is_invidual'] == '1'){echo 'Individual';}else{echo 'Company';}?></strong></li>
			  <li> <span>Phone / Cell</span> <strong class="text-right"><?php echo $row['mobile'];?></strong></li>
			  <?php if(($row['company_name'] == '') || ($row['company_name'] == '0')){echo '';}else{?>
			  <li> <span>Company Name (if any) </span> <strong class="text-right"><?php echo $row['company_name'];?></strong></li>
			  <?php }?>
			  
			  <li> <span>Delivery Port</span> <strong class="text-right">
			  <?php 
			  $port_id = $row['port'];
				$mysql_ports = mysql_query("select * from ports where id = '$port_id'");
				$row_ports = mysql_fetch_assoc($mysql_ports);
				echo $row_ports['name'];
			  ?>
			  </strong></li>
            </ul>
			</div>
			</div>
			</div>
			
			
			
	<div class="col-lg-6 col-md-6 col-sm-6" style="background:#FFF;">
       <div class="car-details-sidebar">
          <div class="details-block details-weight">
		  <ul>
              
			<!--  <li> <span>Address</span> <strong class="text-right" style="display:inline;"><?php echo $row['address'];?></strong></li>
			  -->
			  <li>
			  <table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td width="40%" style="vertical-align:top;">Address</td>
    <td><strong><?php echo $row['address'];?></strong></td>
  </tr>
</table>
</li>
			  <!--
              <li> <span>City</span> <strong class="text-right">
			  
			  <?php 
			  $city_id = $row['city'];
				$mysql_cities = mysql_query("select * from countries_cities where id = '$city_id'");
				$row_city = mysql_fetch_assoc($mysql_cities);
				echo $row_city['name'];
			  ?>
			  
			  </strong></li>
			  -->
              <li> <span>Country</span> <strong class="text-right">
			  <?php 
			  $countryy_id = $row['countryy'];
				$mysql_countries = mysql_query("select * from countries where id = '$countryy_id'");
				$row_countries = mysql_fetch_assoc($mysql_countries);
				echo $row_countries['name'];
			  ?>
			  </strong></li>
			  <?php if(($row['url'] == '') || ($row['url'] == '0')){echo '';}else{?>
			  <li> <span>Company URL</span> <strong class="text-right"><?php echo $row['url'];?></strong></li>
			  <?php }?>
              
            </ul>
			</div>
			</div>
			</div>

	
	

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

