<?php session_start();

		include('panel/config.php');

?>

<!DOCTYPE html>

<html lang="en">

<head>

<title>www.USSTokyo.com: Contact us</title>

<?php include('inc_head.php');?>

</head>



<body>



<!--=================================

  loading 

  

 <div id="loading">

  <div id="loading-center">

      <img src="images/loader2.gif" alt="">

 </div>

</div>



=================================

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





<!--=================================

 inner-intro -->

 

 <section class="inner-intro bg-7 bg-overlay-black-70">

  <div class="container">

     <div class="row text-center intro-title">

           <div class="col-lg-6 col-md-6 col-sm-6 text-left">

             <h3 class="text-white">Conatct us </h3>

           </div>

           <div class="col-lg-6 col-md-6 col-sm-6 text-right">

             <ul class="page-breadcrumb">

                <li><a href="#"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-double-right"></i></li>

                <li><span>Conatct us</span> </li>

             </ul>

           </div>

     </div>

  </div>

</section>



<!--=================================

 inner-intro -->





<!--=================================

 contact -->



<section class="contact page-section-ptb white-bg">

  <div class="container">

    <div class="row">

      <div class="col-lg-12 col-md-12">

         <div class="section-title">

           <span>We’d Love to Hear From You</span>

           <h2>LET'S GET IN TOUCH!</h2>

           <div class="separator"></div>

         </div>

      </div>

    </div>

    <div class="row">

      <div class="col-lg-4 col-md-4 col-sm-6">

       <div class="contact-box text-center">

          <i class="fa fa-map-marker"></i>

          <h5>Address</h5>

          <p>Suginami-Ku Izumi 4-17-34, Tokyo 168-0068, Japan</p>

        </div>

      </div>

      <div class="col-lg-4 col-md-4 col-sm-6">

       <div class="contact-box text-center">

          <i class="fa fa-phone"></i>

          <h5>Phone</h5>

          <p> +81 8013340786</p>

        </div>

      </div>

      <div class="col-lg-4 col-md-4 col-sm-6">

       <div class="contact-box text-center">

          <i class="fa fa-envelope-o"></i>

          <h5>Email</h5>

          <p> info@usstokyo.com</p>

        </div>

      </div><!--

      <div class="col-lg-3 col-md-3 col-sm-6">

       <div class="contact-box text-center">

          <i class="fa fa-fax"></i>

          <h5>Fax</h5>

          <p>(007) 123 456 7890</p>

        </div>

      </div>-->

    </div>

    <div class="page-section-ptb">

      <div class="row">

       <div class="col-lg-8 col-md-8">

       <div class="gray-form row">

         <div id="formmessage">Success/Error Message Goes Here</div>

           <form class="form-horizontal" id="contactform" role="form" method="post" action="php/contact-form.php">

            <div class="contact-form">

              <div class="col-lg-4 col-md-4">

               <div class="form-group">

                 <input id="name" type="text" placeholder="Name*" class="form-control"  name="name" required>

               </div> 

             </div> 

             <div class="col-lg-4 col-md-4">

               <div class="form-group">

                 <input type="email" placeholder="Email*" class="form-control" name="email" required>

                </div>

              </div>

              <div class="col-lg-4 col-md-4">

                <div class="form-group">

                  <input type="text" placeholder="Phone*" class="form-control" name="phone" required>

                </div>

              </div>

              <div class="col-lg-12 col-md-12">

                 <div class="form-group">

                   <textarea class="form-control input-message" placeholder="Comment*" rows="7" name="message" required></textarea>

                 </div>

              </div>

              <div class="col-lg-12 col-md-12">

                 <input type="hidden" name="action" value="sendEmail"/>

                 <button id="submit" name="submit" type="submit" value="Send" class="button red"> Send your message </button>

               </div>

              </div>

          </form>

          <div id="ajaxloader" style="display:none"><img class="center-block" src="images/ajax-loader.gif" alt=""></div> 

           </div> 

       </div>

      <div class="col-lg-4 col-md-4">

        <div class="opening-hours gray-bg">

          <h6>opening hours</h6>

          <ul class="list-style-none">

            <li><strong>Sunday</strong> <span class="text-red"> closed</span></li>

            <li><strong>Monday</strong> <span> 9:00 AM to 5:00 PM</span></li>

            <li><strong>Tuesday </strong> <span> 9:00 AM to 5:00 PM</span></li>

            <li><strong>Wednesday </strong> <span> 9:00 AM to 5:00 PM</span></li>

            <li><strong>Thursday </strong> <span> 9:00 AM to 5:00 PM</span></li>

            <li><strong>Friday </strong> <span> 9:00 AM to 5:00 PM</span></li>

            <li><strong>Saturday </strong> <span> 9:00 AM to 5:00 PM</span></li>

          </ul>

        </div>

      </div>

     </div>

 </div>



  </div>

</section>



<!--=================================

 contact -->





<!--=================================

 contact-map -->



 <section class="contact-map">

  <div class="container-fluid">

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10693.681997228494!2d139.64755382975775!3d35.67559053826546!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6018f300276d9c11%3A0xdb330ebe40155e3f!2sIzumi%2C+Suginami%2C+Tokyo+168-0063%2C+Japan!5e0!3m2!1sen!2s!4v1510242149328" allowfullscreen></iframe>

  </div>

 </section>



<!--=================================

 contact-map -->

 



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



<!-- select -->

<script type="text/javascript" src="js/select/jquery-select.js"></script>

 

<!-- custom -->

<script type="text/javascript" src="js/custom.js"></script>

  

</body>

</html>

