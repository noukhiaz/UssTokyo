<?php include('panel/config.php');
//print_r($_POST);
if(isset($_POST['username'])){
$username  = $_POST['username'];
$password  = $_POST['password'];
$mobile  = $_POST['mobile'];
$name  = $_POST['name'];
$address  = $_POST['address'];
$dob  = $_POST['dob'];
$countryy  = $_POST['countryy'];
$email  = $_POST['email'];
$is_paid = '0';
$is_active = '1';
$is_admin = '0';
$date = time();
$result = mysql_query("SELECT * FROM users where username = '$username' OR email = '$email'");
$num_rows = mysql_num_rows($result);
			if($num_rows <= '0')
				{
						mysql_query("INSERT INTO `users` set 
						`name` = '$name',
						`lastname` = '',
						`company_name` = '',
						`url` = '',
						`port` = '0',
						`is_investr` = '0',
						`expiry_date` = '2020-11-25',
						`username` = '$username',
						`email` = '$email',
						`pass` = '$password',
						`is_paid` = '$is_paid',
						`is_admin` = '$is_admin',
						`reg_date` = '$date',
						`mobile` = '$mobile',
						`address` = '$address',
						`countryy` = '$countryy',
						`dob` = '$dob',						
						
						`is_active` = '$is_active'
						");
						$success = '1';



						//sending welcome meaasge to new registered user
						include('message.php');







						//echo 'done';
						//print_r($_POST);
				?><meta http-equiv="refresh" content="0;URL='auctions.php'" /><?php 
				}
else{$registration_error = '1';}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>www.USSTokyo.com: Registration</title>
<?php include('inc_head.php');?>
</head>

<body>

<!--=================================

  loading 

+
  

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
             <h3 class="text-white">User Registration </h3>
           </div>
          <div class="col-lg-6 col-md-6 col-sm-6 text-right">
         <ul class="page-breadcrumb">
           <li><a href="index.php"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-double-right"></i></li>
           <li><span>User Registration</span> </li>
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
           <h3>User Registration</h3><!--
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
$timezone  = +9; //(GMT -5:00) EST (U.S. & Canada) 
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
		   
		<!--   <?php  /*if(isset($registration_error)){echo '<br>
<br><center>
<div style="background:red; width:50%;">
<span style="color:white;">The username / email you entered is already registered, please try unique.</span>
</div></center>
';}*/?>-->
         </div>
		
		 </div>
							
      </div>
    </div>
	
	<div class="row">
     <div class="col-md-6 col-md-offset-3">
					
						 <?php 
							if(isset($registration_error)){
							?>	
								<div class="alert alert-danger ">
                                <span>The username / email you entered is already registered, please try unique.</span>
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
			</div>
			</div>				
	
<div class="row">	
<div class="container">
 <div class="gray-form clearfix">
 <form action="<?php echo $_SERVER['PHP_SELF'];?>" class="login-form" method="post">	 
				<div class="col-md-3">
						<div class="form-group">
						 <label for="name"><strong>Name*</strong> </label>
						   <input id="name" class="form-control" type="text" placeholder="" name="name" style="border:1px solid #999999;" required>
						</div>
				</div>		
				<div class="col-md-3">
						<div class="form-group">
						 <label for="name"><strong>Email</strong> </label>
						   <input id="name" class="form-control" type="text" placeholder="" name="email" style="border:1px solid #999999;" required>
						</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
					<label for="name"><strong>User name*</strong> </label>
					<input id="name" class="form-control" type="text" placeholder="" name="username" style="border:1px solid #999999;" required>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="Password"><strong>Password*</strong> </label>
						<input id="Password" class="form-control" type="password" placeholder="" name="password" style="border:1px solid #999999;" required>
					</div> 
				</div>
				<div class="col-md-3">
					<div class="form-group">
					 <label for="name"><strong>Mobile</strong> </label>
					   <input id="name" class="form-control" type="text" placeholder="" name="mobile" style="border:1px solid #999999;" required>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
					<label for="name"><strong>Date of Birth</strong> (29-08-2000)</label>
					 <input id="name" class="form-control" type="text" placeholder="29-08-2000" name="dob" style="border:1px solid #999999;">
					 </div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
					<label for="name"><strong>Address / City</strong> </label>
					<input id="name" class="form-control" type="text" placeholder="" name="address" style="border:1px solid #999999;">
					</div>
				</div>
				<div class="col-md-3">
				<div class="form-group">
             <label for="name"><strong>Country</strong> </label>
			  <select name="countryy" id="countryya" class="form-control"  style="width:100%; padding:5px; height:43px; border:1px solid #999999;" required>
				<?php if(isset($_GET['edit'])){ 
				$countryy_id = $row['countryy'];
				$mysql_countries = mysql_query("select * from countries where id = '$countryy_id' AND is_active = '1'");
				$row_countries = mysql_fetch_assoc($mysql_countries);
				?>
				<option value="<?php echo $row_countries['id'];?>"><?php echo $row_countries['name'];?></option>
				<option  disabled="disabled"></option>
				<?php }else {?>  			  
			  <option></option>
			  <?php  
			  }
			  $mysql_countriesa = mysql_query("select * from countries where is_active = '1'");
				while($row_countriesa = mysql_fetch_array($mysql_countriesa)){
				?>
			  <option  value="<?php echo $row_countriesa['id'];?>"><?php echo $row_countriesa['name'];?></option>
			  <?php }?>
			  </select>	
			  
            </div>
				</div>



				<div class="col-md-3">
					<div class="form-group">
					<label for="name"><strong>User name*</strong> </label>
					<input id="name" class="form-control" type="text" placeholder="" name="username" style="border:1px solid #999999;" required>
					</div>
					</div>	
			<div class="col-md-3" >
				<div class="form-group" >
             		<label for="name"><strong>How Did You Know Us</strong> </label>
			 			 <select name="knowus" id="knowus" class="form-control"  style="width:100%; padding:5px; height:43px; border:1px solid #999999;" required>
									<option value=""></option>
									<option value="" ></option>  			  
					    	    	<option value=""></option>
								    <option value=""></option>
						 </select>	
			  
            </div>
				</div>



			<div class="col-md-12">
				<button class="btn green button red" type="submit">Register</button>
			</div>
				
	</div>
</div>	
</div>	
	
	
	
	
	
	
	
	
    
							
							
    
         	
			
			
			
			
			
			
			
            
			  
			  
			  
			  
			  
			  <!--
            <div class="form-group">
              <div class="remember-checkbox mb-30">
                 <label for="one"> Already account?</label>
                 <a href="auctions.php" class="pull-right">Login</a>
                </div>
              </div>-->
			   
          </div>
		  </form>
      </div>
     </div>
   </div>
</section>
<br>
<br>
<br><br>
<br>
<br>
<br>

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
