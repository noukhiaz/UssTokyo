<?php include('inc_nt_login.php');
    include('panel/config.php');
if(isset($_POST['name'])){
//print_r($_POST);
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$is_invidual = $_POST['is_invidual'];
$company_name = $_POST['company_name'];
$url = $_POST['url'];
$mobile = $_POST['mobile'];
$address = $_POST['address'];
$city = $_POST['city'];
$countryy = $_POST['countryy'];
$port = $_POST['port'];
$uid = $_SESSION['id'];
						mysql_query("UPDATE users set 
						`name` = '$name',
						`lastname` = '$lastname',
						`is_invidual` = '$is_invidual',
						`company_name` = '$company_name',
						`url` = '$url',
						`mobile` = '$mobile',						
						`address` = '$address',
						`city` = '$city',
						`countryy` = '$countryy',
						`port` = '$port'
						where id = '$uid'
						");
						$success = '1';		
header('location: my_profile.php');
						?>
<meta http-equiv="refresh" content="0;URL='my_profile.php'" />
<?php }?>
<!DOCTYPE html>

<html lang="en">

<head>

<title>www.USSTokyo.com: My Profile Edit</title>

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

             <h3 class="text-white">My Profile Edit</h3>

           </div>

           <div class="col-lg-6 col-md-6 text-right">

             <ul class="page-breadcrumb">

                <li><a href="index.php"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-double-right"></i></li>

				<li><a href="myaccount<?php echo $phpext;?>">My Account</a> <i class="fa fa-angle-double-right"></i></li>

                <li><span>My Profile Edit</span> </li>

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
	<h6 style="text-align:right; color:#CC3300"><a href="my_profile<?php echo $phpext;?>">Cancel</a></h6>
</div>
	
	
<?php
	$uid = $_SESSION["id"];
	$mysql_querya = mysql_query("select * from users where id = '$uid'");
	$row = mysql_fetch_assoc($mysql_querya);
?>	
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
	  <div class="col-lg-6 col-md-6 col-sm-6">
       <div class="car-details-sidebar">
          <div class="details-block details-weight">
		  <ul>
              <li> <span style="font-weight:bold; width:250px;">First Name</span> <br><input type="text" value="<?php echo $row['name'];?>" name="name" style="width:100%; padding:5px; height:35px;"></li>
              <li> <span style="font-weight:bold; width:250px;">Last Name</span> <br><input type="text" value="<?php echo $row['lastname'];?>" name="lastname" style="width:100%; padding:5px; height:35px;"></li>
              <li> <span style="font-weight:bold; width:250px;">Account Type </span> <br>
			  
			  <select name="is_invidual"  style="width:100%; padding:5px; height:35px;">
			  <?php if($row['is_invidual'] == '1'){?>
			  <option value="1" selected="selected">Individual</option>
			  <option value="2">Company</option>
			  <?php }?>
			  <?php if($row['is_invidual'] == '2'){?>
			  <option value="1" >Individual</option>
			  <option value="2" selected="selected">Company</option>
			  <?php }?>
			  </select>
			  
			  </li>
			  <li> <span style="font-weight:bold; width:250px;">Company Name (if any) </span> <br><input type="text" value="<?php echo $row['company_name'];?>" name="company_name" style="width:100%; padding:5px; height:35px;"></li>
			  <li> <span style="font-weight:bold; width:250px;">Company URL</span> <br><input type="text" value="<?php echo $row['url'];?>" name="url" style="width:100%; padding:5px; height:35px;"></li>
			  <li>&nbsp;</li>
            </ul>
			</div>
			</div>
			</div>
			
			
			
	<div class="col-lg-6 col-md-6 col-sm-6">
       <div class="car-details-sidebar">
          <div class="details-block details-weight">
		  <ul>
              <li> <span style="font-weight:bold;">Phone / Cell</span> <br><input type="text" value="<?php echo $row['mobile'];?>" style="width:100%; padding:5px; height:35px;" name="mobile"></li>
			  <li> <span style="font-weight:bold;">Address</span> <br><input type="text" value="<?php echo $row['address'];?>" style="width:100%; padding:5px; height:35px;" name="address"></li>
              <li> <span style="font-weight:bold;">City</span> 
			  
			  <?php 
			  $city_id = $row['city'];
				$mysql_cities = mysql_query("select * from countries_cities where id = '$city_id' AND is_active = '1'");
				$row_city = mysql_fetch_assoc($mysql_cities);
			  ?><br>
			  <select name="city"  style="width:100%; padding:5px; height:35px;">
			  <option value="<?php echo $row_city['id'];?>"><?php echo $row_city['name'];?></option>
			  <option disabled="disabled"></option>
			  <?php 
			  $mysql_citiesa = mysql_query("select * from countries_cities where is_active = '1'");
				while($row_citya = mysql_fetch_array($mysql_citiesa)){
				?>
			  <option value="<?php echo $row_citya['id'];?>"><?php echo $row_citya['name'];?></option>
			  <?php }?>
			  </select>
			  </li>
              <li> <span style="font-weight:bold;">Country</span><br> 
			  <?php 
			  $countryy_id = $row['countryy'];
				$mysql_countries = mysql_query("select * from countries where id = '$countryy_id' AND is_active = '1'");
				$row_countries = mysql_fetch_assoc($mysql_countries);
				//echo $row_countries['name'];
			  ?>
			  
			  <select name="countryy" style="width:100%; padding:5px; height:35px;">
			  <option value="<?php echo $row_countries['id'];?>"><?php echo $row_countries['name'];?></option>
			  <option disabled="disabled"></option>
			  <?php 
			  $mysql_countriesa = mysql_query("select * from countries where is_active = '1'");
				while($row_countriesa = mysql_fetch_array($mysql_countriesa)){
				?>
			  <option  value="<?php echo $row_countriesa['id'];?>"><?php echo $row_countriesa['name'];?></option>
			  <?php }?>
			  </select>
			 
			  </li>
              <li> <span style="font-weight:bold;">Delivery Port</span> 
			  <?php 
			  $port_id = $row['port'];
				$mysql_ports = mysql_query("select * from ports where id = '$port_id' AND is_active = '1'");
				$row_ports = mysql_fetch_assoc($mysql_ports);
				//echo $row_ports['name'];
			  ?>
<br>			  <select name="port"   style="width:100%; padding:5px; height:35px;">
			  <option value="<?php echo $row_ports['id'];?>"><?php echo $row_ports['name'];?></option>
			  <option disabled="disabled"></option>
			  <?php 
			  $mysql_portsa = mysql_query("select * from ports where is_active = '1'");
				while($row_portsa = mysql_fetch_array($mysql_portsa)){
				?>
			  <option  value="<?php echo $row_portsa['id'];?>"><?php echo $row_portsa['name'];?></option>
			  <?php }?>
			  </select>
			  </li>
			  <li><input type="submit" value="Update" style="width:60%;"></li>
            </ul>
			</div>
			</div>
			</div>

	</form>
	

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

