  <div class="container">
   <!-- <div class="row">
     <div class="col-lg-12 col-md-12">
      <div class="social">
        <ul>
          <li><a class="facebook" href="#">facebook <i class="fa fa-facebook"></i> </a></li>
          <li><a class="twitter" href="#">twitter <i class="fa fa-twitter"></i> </a></li>
          <li><a class="pinterest" href="#">pinterest <i class="fa fa-pinterest-p"></i> </a></li>
          <li><a class="dribbble" href="#">dribbble <i class="fa fa-dribbble"></i> </a></li>
          <li><a class="google-plus" href="#">google plus <i class="fa fa-google-plus"></i> </a></li>
          <li><a class="behance" href="#">behance <i class="fa fa-behance"></i> </a></li>
        </ul>
        <br />
       </div>
      </div>
    </div>-->
    <div class="row page-section-pb" style="padding-top: 15px; padding-bottom: 0px;">
      <div class="col-lg-5 col-md-5 col-sm-5">
        <div class="about-content">
          <img class="img-responsive" id="logo-footer" src="images/logo-light.png" alt="">
          <p style="color:#909090;">There are many car dealers doing business in Japan and overseas. So, what is the difference? We give the power to you to choose the car of your liking directly from the auction, at your own price and have it delivered to your country, city and home without any hassle.
</p><p style="color:#909090;">
We will surely be guiding you to each of the steps involved and looking after the process to remove any errors.
</p>
        </div>
        
      </div>
	  
	  <div class="col-lg-2 col-md-2 col-sm-2">
        <div class="usefull-link">
        <h6 class="text-white">Quick Links</h6>
          <ul>
            <li><a href="index<?php echo $phpext;?>"><i class="fa fa-angle-double-right"></i> Home</a></li>
            <li><a href="about<?php echo $phpext;?>"><i class="fa fa-angle-double-right"></i> About us</a></li>
            <li><a href="search<?php echo $phpext;?>"><i class="fa fa-angle-double-right"></i> Auction</a></li>
            <li><a href="contact<?php echo $phpext;?>"><i class="fa fa-angle-double-right"></i> Contact us</a></li>
          </ul>
        </div> 
      </div>
	  
      <div class="col-lg-2 col-md-2 col-sm-2">
        <div class="usefull-link">
        <h6 class="text-white">Terms</h6>
          <ul>
		  	<li><a href="rules<?php echo $phpext;?>"><i class="fa fa-angle-double-right"></i> Auction Rules</a></li>
            <li><a href="terms<?php echo $phpext;?>"><i class="fa fa-angle-double-right"></i> Terms & Conditions</a></li>
            <li><a href="policy<?php echo $phpext;?>"><i class="fa fa-angle-double-right"></i> Privacy Policy</a></li>
            <!--<li><a href="#"><i class="fa fa-angle-double-right"></i> Shiping Charges</a></li>-->
            
          </ul>
        </div> 
      </div>

      <!--
      <div class="col-lg-3 col-md-3 col-sm-6">
       <div class="usefull-link">
        <h6 class="text-white">Information </h6>
          
				<ul>
				  <li><a href="#">Privacy Policy </a></li> 
				  <li><a href="#">Terms & Conditions </a></li> 
				  <li><a href="#">Financial Policy</a></li> 
				  <li><a href="#">Bidding Policy</a></li> 
				</ul>
       </div>
      </div>-->
      <div class="col-lg-3 col-md-3col-sm-6">
        <div class="news-letter">
        <h6 class="text-white">Head Office </h6>
         <div class="address">
          <ul>
            <li> <i class="fa fa-map-marker"></i><span>Suginami-Ku Izumi 4-17-34,<br />Tokyo 168-0068, Japan</span> </li>
            <li> <i class="fa fa-phone"></i><span>+81 8013340786</span> </li>
            <li> <i class="fa fa-envelope-o"></i><span>info@usstokyo.com</span> </li>
          </ul>
        </div>
        </div> 
      </div>
    </div>
  </div>
  <div class="copyright" style="padding: 10px 0;">
   <div class="container">
     <div class="row">
      <div class="col-lg-6 col-md-6">
       <div class="text-left">
	   <?php 
			$time = time();
			$year = date('y',$time);
		?>
        <p>&copy; Copyright 2017 - <?php echo $year;?> USSTOKYO.COM. All rights reserved. </p>
       </div>
      </div>
      <div class="col-lg-6 col-md-6">
        <!--<ul class="list-inline text-right">
          <li><a href="#">privacy policy </a></li> 
          <li><a href="#">terms and conditions </a></li> 
          <li><a href="contact.php">contact us </a></li>
        </ul>
      -->
       </div>
      </div>
     </div>
    </div>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-110319743-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-110319743-1');
</script>
