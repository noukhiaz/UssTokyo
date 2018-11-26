<?php include('panel/config.php');

//echo time();

if(isset($_POST['email'])){

$email  = $_POST['email'];

$sql = mysql_query("select * from users where email = '$email' AND is_active = '1' ");

$row = mysql_fetch_assoc($sql);

	if($row['email'] != '')

{
$email = $row['email'];
$name = $row['name'];
$pass = $row['pass'];
$username = $row['username'];
	$mailsent = 'mail  sent';
	
	$to      = $email;
$subject = 'Password Recovered';
$message = "Dear ".$name ."\n\n Your login details are here below: \n\n Username:  ". $username. " \n Password:  ". $pass. "  \n\n Regards,\n Support Team\n UssTokyo.com";
$headers = 'From: noreply@usstokyo.com' . "\r\n" .
    'Reply-To: noreply@usstokyo.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);

}

else

{

	$alerta = 'mail not sent';

}



}

?>

<!DOCTYPE html>

<html lang="en">

<head>

<title>www.USSTokyo.com: Login</title>

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

             <h3 class="text-white">Forgot Password </h3>

           </div>

          <div class="col-lg-6 col-md-6 col-sm-6 text-right">

         <ul class="page-breadcrumb">

           <li><a href="index.php"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-double-right"></i></li>

           <li><span>Forgot Password</span> </li>

         </ul>

      </div>

     </div>

  </div>

</section>



<!--=================================

 inner-intro -->





<!--=================================

 login-form  -->

<form action="<?php echo $_SERVER['PHP_SELF'];?>" class="login-form" method="post">

<section class="login-form page-section-ptb">

  <div class="container">

    <div class="row">

      <div class="col-lg-12 col-md-12">

         <div class="section-title" style="margin-bottom:0px;">

           <!--<span>Log in with your id or social media </span>-->

           <h3>Forgot Password</h3>

           <div class="separator"></div>

         </div>

		

		 </div>

							

      </div>

    </div>

    <div class="row">

     <div class="col-md-6 col-md-offset-3">

	  <?php 

							if(isset($mailsent)){

							?>	

								<div class="alert alert-success">

                                <span>Your password has been sent to you. </span>

                            </div>
<meta http-equiv="refresh" content="2;URL='auctions.php'" />
							<?php 	

							}

							?>

                            <?php 

                            if(isset($alerta)){

                            ?>  

                                <div class="alert alert-danger ">

                                <span>You have entered an invalid email id.</span>

                            </div>

                            <?php   

                            }

                            ?>

     <div class="gray-form clearfix">

         <div class="form-group">

             <label for="name">Enter Your Email</label>

               <input id="name" class="form-control" type="text" placeholder="Email" name="email">

            </div>



          

			   <button class="btn green button red" type="submit">Sign In</button>

          </div> <!--

          <div class="login-social text-center">

            <h5>Login with Social media</h5>

            <ul>

                <li><a class="fb button" href="#"><i class="fa fa-facebook"></i> Facebook</a></li>

                <li><a class="twitter button" href="#"><i class="fa fa-twitter"></i> Twitter</a></li>

                <li><a class="pinterest button" href="#"><i class="fa fa-google-plus"></i> google+</a></li>

            </ul>

          </div>           -->

      </div>

     </div>

   </div>

</section>

</form>

<!--=================================

 login-form  -->

 

 

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

