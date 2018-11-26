<?php include('inc_nt_login.php');
    include('panel/config.php');
if(isset($_POST['pass'])){
//print_r($_POST);
$pass = $_POST['pass'];
$uid = $_SESSION['id'];
						mysql_query("UPDATE users set 
						`pass` = '$pass'
						where id = '$uid'
						");
						$success = '1';		
//header('location: my_profile.php');
						?>
<!--<meta http-equiv="refresh" content="0;URL='my_profile.php'" />-->
<?php }?>
<!DOCTYPE html>

<html lang="en">

<head>

<title>www.USSTokyo.com: My Change Password</title>

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

             <h3 class="text-white">Change Password</h3>

           </div>

           <div class="col-lg-6 col-md-6 text-right">

             <ul class="page-breadcrumb">

                <li><a href="index.php"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-double-right"></i></li>

				<li><a href="myaccount.php">My Account</a> <i class="fa fa-angle-double-right"></i></li>

                <li><span>Change Password</span> </li>

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
	<h6>Change Password</h6>
</div>

<div class="col-lg-6 col-md-6 col-sm-6">
	<h6 style="text-align:right; color:#CC3300"><a href="my_profile.php">Cancel</a></h6>
</div>
	
	<?php if(isset($success)){
?>
<div class="col-lg-12 col-md-12 text-left " style="background:#D2FFD2; padding-top:5px;">
<p >Your Password has been changed successfully.</p>
</div>

<?php }?>
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
              <li> <span style="font-weight:bold; width:250px;">New Password</span> <br><input type="password" value="" name="pass" style="width:100%; padding:5px; height:35px;"  autocomplete="off" required></li>
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

