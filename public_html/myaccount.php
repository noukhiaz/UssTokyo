<?php include('inc_nt_login.php');

    include('panel/config.php');
?>

<!DOCTYPE html>

<html lang="en">

<head>

<title>www.USSTokyo.com: My Account</title>

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

             <h3 class="text-white">Cars listing </h3>

           </div>

           <div class="col-lg-6 col-md-6 text-right">

             <ul class="page-breadcrumb">

                <li><a href="index.php"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-double-right"></i></li>

				

                <li><span>My Account</span> </li>

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

	<h6>Welcome Mr. 


    <?php $uid = $_SESSION['id'];
$sqlaa = mysql_query("select * from users where id = '$uid'");
$rowaa = mysql_fetch_assoc($sqlaa);
echo  $rowaa['name'];?> to USSTOKYO.com</h6>

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

