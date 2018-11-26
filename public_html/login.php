<?php include('panel/config.php');
//echo time();
if(isset($_POST['username'])){
$username  = $_POST['username'];
$password  = $_POST['password'];
$sql = mysql_query("select * from users where username = '$username' AND pass = '$password'");
$row = mysql_fetch_assoc($sql);
	if($row['email'] != '')
		{
$toBeComparedDate = $row['expiry_date'];
$today = (new DateTime())->format('Y-m-d'); //use format whatever you are using
$expiry = (new DateTime($toBeComparedDate))->format('Y-m-d');
//echo ();
 if((strtotime($today)) > (strtotime($expiry))){
//echo $toBeComparedDate;
/*echo strtotime($today);
echo '<br>';
echo strtotime($expiry);*/
                $alerta = 'Your membership is expired';
            }
            else{
			session_start();
$_SESSION["id"] = $row['id'];
			if($row['is_admin'] != '1')
			{
				header('location: search.php');				
			}
			else
			{
				header('location: panel/administrator/index.php?p=dashboard');				
			}
            }
			
		}
	else
		{
			$alert = 'try again';
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
             <h3 class="text-white">Login </h3>
           </div>
          <div class="col-lg-6 col-md-6 col-sm-6 text-right">
         <ul class="page-breadcrumb">
           <li><a href="index.php"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-double-right"></i></li>
           <li><span>Login</span> </li>
         </ul>
      </div>
     </div>
  </div>
</section>

<!--=================================
 inner-intro -->


<!--=================================
 login-form  -->

<section class="login-form page-section-ptb">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12">
         <div class="section-title" style="margin-bottom:0px;">
           <!--<span>Log in with your id or social media </span>-->
           <h3>Login To Your Account</h3>
           <div class="separator"></div>
         </div>
		
		 </div>
							
      </div>
    </div>
    <div class="row">
     <div class="col-md-6 col-md-offset-3">
<form action="<?php echo $_SERVER['PHP_SELF'];?>" class="login-form" method="post">	 					
						 <?php 
							if(isset($alert)){
							?>	
								<div class="alert alert-danger ">
                                <span>You have entered invalid username / password. </span>
                            </div>
							<?php 	
							}
							?>
                            <?php 
                            if(isset($alerta)){
                            ?>  
                                <div class="alert alert-danger ">
                                <span>Your membership is expired. </span>
                            </div>
                            <?php   
                            }
                            ?>
     <div class="gray-form clearfix">
         <div class="form-group">
             <label for="name">User name* </label>
               <input id="name" class="form-control" type="text" placeholder="User name" name="username">
            </div>
            <div class="form-group">
             <label for="Password">Password* </label>

               <input id="Password" class="form-control" type="password" placeholder="Password" name="password">
              </div> 
            <div class="form-group">
              <div class="remember-checkbox mb-30">
                 <input type="checkbox" name="one" id="one">
                 <label for="one"> Remember me</label>
                 <a href="forgot.php" class="pull-right">Forgot Password?</a>
                </div>
              </div>
			   <button class="btn green button red" type="submit">Sign In</button>
          </div>
		  </form>
      </div>
     </div>
   </div>
</section>

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
