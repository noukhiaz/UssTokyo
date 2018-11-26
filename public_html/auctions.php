<?php include('panel/config.php');
//echo time();
//date_default_timezone_set("Asia/Tokyo");

if(isset($_POST['username'])){
$username  = $_POST['username'];
$password  = $_POST['password'];
//print_r($_REQUEST);
$sql = mysql_query("select * from users where username = '$username' AND pass = '$password'");
$row = mysql_fetch_assoc($sql);

	if($row['username'] != '')
		{
$toBeComparedDate = $row['expiry_date'];
$today = (new DateTime())->format('Y-m-d'); //use format whatever you are using
$expiry = (new DateTime($toBeComparedDate))->format('Y-m-d');
//echo ();
/*
 if((strtotime($today)) > (strtotime($expiry))){
//echo $toBeComparedDate;
echo strtotime($today);
echo '<br>';
echo strtotime($expiry);
                $alerta = 'Your membership is expired';
            }
            else{*/
			session_start();
$_SESSION["id"] = $row['id'];
$_SESSION["name"] = $row['name'];
$_SESSION["email"] = $row['email'];
 if($row['is_active'] != '1')
			{
				$alert_active = 'Your membership is suspended';			
			}
			elseif($row['is_admin'] != '1')
			{
				header('location: search.php');				
			}
			
			
			else
			{
				header('location: panel/administrator/index.php?p=dashboard');				
			}
          //  }
		// AND is_active = '1'	
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
           <h3>Login To Your Account</h3><!--
<span style="color:#CC0000;     display: inline;">
		   <strong>Japan Standard Time</strong></span> | 
<span style="color:#000000; display: inline;">
<?php
/*
$zone=3600*+9 ;
$date=gmdate("D M Y H:i", time() + $zone); 
echo $date;
*/


//echo gmdate("Y/m/j H:i:s", time() + 3600*($timezone+date("I"))); 



/*
date_default_timezone_set('GMT+09');
$time = time();
echo date('d D m Y H:m',$time);*/
//echo date_default_timezone_get();
?>
</span>
-->


<span style="color:#CC0000;display: inline;">
		   <strong>Japan Standard Time</strong> | 
<?php
/*
$zone=3600*+9 ;
$date=gmdate("D d M Y H:i", time() + $zone); 
echo $date;*/
$timezone  = +8; //(GMT -5:00) EST (U.S. & Canada) 
echo gmdate("D j M Y  H:i:s A", time() + 3600*($timezone+date("I"))); 
?>

<script>
/*
function date_time(id)
{
        date = new Date;
        year = date.getFullYear();
        month = date.getMonth();
        //months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'Jully', 'August', 'September', 'October', 'November', 'December');
		months = new Array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
        d = date.getDate();
        day = date.getDay();
        //days = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
		days = new Array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat');
        h = date.getHours() + 4;
        if(h<10)
        {
                h = "0"+h;
        }
        m = date.getMinutes();
        if(m<10)
        {
                m = "0"+m;
        }
        s = date.getSeconds();
        if(s<10)
        {
                s = "0"+s;
        }
        result = ''+days[day]+' '+d+' '+months[month]+'  '+year+' '+h+':'+m+':'+s;
        document.getElementById(id).innerHTML = result;
        setTimeout('date_time("'+id+'");','1000');
        return true;
}*/
</script>
 <span id="date_time" style="color:#000000; display: inline;"></span>
         <!--   <script type="text/javascript">window.onload = date_time('date_time');</script>-->
			
</span>
<br />



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
							<?php 
                            if(isset($alert_active)){
                            ?>  
                                <div class="alert alert-danger ">
                                <span>Your membership is suspended, please contact support@usstokyo.com. </span>
                            </div>
                            <?php   
                            }
                            ?>
							
							
     <div class="gray-form clearfix">
         <div class="form-group">
             <label for="name"><strong>User name*</strong> </label>
               <input id="name" class="form-control" type="text" placeholder="" name="username" style="border:1px solid #999999;">
            </div>
            <div class="form-group">
             <label for="Password"><strong>Password*</strong> </label>

               <input id="Password" class="form-control" type="password" placeholder="" name="password" style="border:1px solid #999999;">
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
