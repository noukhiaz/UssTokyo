<?php session_start();

		include('panel/config.php');

?>

<!DOCTYPE html>

<html lang="en">

<head>

<title>www.USSTokyo.com: Pakistan 660cc, 1000cc, 1300cc, 1500cc Vans & Pickups</title>

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

 

 <section class="inner-intro bg-7 bg-overlay-black-70">

  <div class="container">

     <div class="row text-center intro-title">

           <div class="col-lg-6 col-md-6 col-sm-6 text-left">

             
		<?php include('sub-menu-pakistan.php');?>

           </div>

           <div class="col-lg-6 col-md-6 col-sm-6 text-right">

             <ul class="page-breadcrumb">

                <li><a href="index.php"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-double-right"></i></li>

                <li><span><?php  echo $_GET['country'];?></span> </li>

             </ul>

        </div>

     </div>

  </div>

</section>



<!--=================================

 inner-intro -->





<!--=================================

 welcome -->



<section class="welcome-4 page-section-ptb white-bg">

  <div class="container">

    <div class="row">

      <div class="col-md-offset-1 col-md-10">

         <div class="section-title">

           

           <h2 style="color: #00008B;"><?php echo $_GET['country']; ?></h2>
           

           
         </div>

      </div>

    </div>

<?php 

               if(isset($_GET['country']))
               $country = $_GET['country'];
                include('country_policy_adder.php');                    

              $countrylist = array('Pakistan','Japan','Sri Lanka','Bangladesh','Thailand','Dubai','Oman','Qatar','Saudi Arabia','Antigua and Barbuda','Bahamas','Barbados','Belize','Dominica','Grenada','Guyana','Jamaica','Montserrat',
                'Saint Kitts and Nevis','Saint Lucia','British Virgin Islands','Cayman Islands','Saint Vincent and the Grenadines',
                 'Trinidad and Tobago','Turks and Caicos Islands','United States Of America','Canada','United Kingdom','Ireland','Malta','Cyprus','Australia','New Zealand');
              
              if(isset($country) && in_array($country, $countrylist)){
                addcountry($country);
              } else {
                include('index.php');
              }
              

?>

    <div class="row">



      <div class="col-lg-3 col-md-3 col-sm-5">

        <div class="feature-box-3">

        

          <div class="content">

            <h6 style="color:#cc2003;">Auctions</h6>

            <p>We give you access to all Auction Houses in Japan, including UssTokyo , the biggest cars auction in the world.</p>

          </div>

         </div>

      </div>

      <div class="col-lg-3 col-md-3 col-sm-5">

        <div class="feature-box-3">

         

          <div class="content">

            <h6 style="color:#cc2003;">No Hidden Costs</h6>

            <p>Buying direct from Auctions means there will be no hidden costs and you get what you buy.</p>

          </div>

         </div>

      </div>

      <div class="col-lg-3 col-md-3 col-sm-5">

        <div class="feature-box-3">

          

          <div class="content">

              <h6 style="color:#cc2003;">Investors’ Platform</h6>

            <p>Buy a car from any auction and sell it to customers anywhere in the world through our Investors’ Platform. </p>

          </div>

         </div>

      </div>

      <div class="col-lg-3 col-md-3 col-sm-5">

        <div class="feature-box-3">

          

          <div class="content">

            <h6 style="color:#cc2003;">Secured Payments</h6>

            <p>All payments are totally secured with our trusted payment system. </p>

          </div>

         </div>

      </div>

    </div>

  </div>

</section>




 

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



<!-- appear -->

<script type="text/javascript" src="js/jquery.appear.js"></script>



<!-- counter -->

<script type="text/javascript" src="js/counter/jquery.countTo.js"></script>



<!-- owl-carousel -->

<script type="text/javascript" src="js/owl-carousel/owl.carousel.min.js"></script>



<!-- select -->

<script type="text/javascript" src="js/select/jquery-select.js"></script>



<!-- custom -->

<script type="text/javascript" src="js/custom.js"></script>

  

</body>

</html>

