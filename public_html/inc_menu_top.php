<style>
    

.hide_desktop {
    display: inline !important;
}
.li_style{
border-right:1px solid #CCCCCC !important; 
padding-right:5px !important; 
padding-left:5px !important; 
font-size:12px !important;

}
@media screen and (min-width: 768px) {
  .hide_desktop {
    display: none  !important;
  }
}

    
</style>
<div class="topbar" style="background:#F7F7F7;">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6" style="padding-right:0px;">
        <div class="topbar-left text-left">
           <ul class="list-inline">
             <li style="font-size:13px; padding:0px;"> <i class="fa fa-envelope-o"> </i> info@usstokyo.com</li> 
			 <li style="font-size:13px; padding:0px;"> <i class="fa fa-phone"></i>  +81 8013340786</li> 
             <li style="font-size:13px; padding:0px;"> <i class="fa fa-clock-o"></i> Mon - Sat 9:00 AM - 5PM JST</li>
           </ul>
        </div>
      </div>
      <div class="col-lg-6 col-md-6">
        <div class="topbar-right text-right">
           <ul class="list-inline">
			 
            
            
            <!-- <li><a href="#"><i class="fa fa-twitter"></i></a></li>   -->
            <!-- <li><a href="#"><i class="fa fa-instagram"></i></a></li>   
             <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>  
			 <?php
			 //session_start();
			 if(isset($_SESSION['id']))
			 {
$uid = $_SESSION['id'];
$sqlaa = mysql_query("select * from users where id = '$uid'");
$rowaa = mysql_fetch_assoc($sqlaa);
$user_name = $rowaa['name'];
			 ?>
			 <li>Hi <?php echo $user_name;?>!</li>
			 <li><a href="my_bids.php?date=<?php echo date('Y-m-d',time());?>"><i class="fa fa-user"></i> &nbsp&nbsp My List</a></li>  
			 <li><a href="logout<?php echo $phpext;?>"><i class="fa fa-lock"></i> &nbsp&nbsp logout</a></li>  
			 <?php }else{
			 ?>
			 <li><a href="auctions<?php echo $phpext;?>"><i class="fa fa-user"></i> &nbsp&nbsp Login</a></li>  
			 <?php }?>
			 <li><a href="duties-in-pakistan<?php echo $phpext;?>"><i class="fa fa-money"></i> &nbsp&nbsp Excise Duties</a></li>  
			<li class="hide_desktop"><a href="search<?php echo $phpext;?>">Auction</a></li>
			<li class="hide_desktop"><a href="investor<?php echo $phpext;?>">Investors' Portal</a></li>
			-->
			<?php
			 //session_start();
			 if(isset($_SESSION['id']))
			 {
$uid = $_SESSION['id'];
$sqlaa = mysql_query("select * from users where id = '$uid'");
$rowaa = mysql_fetch_assoc($sqlaa);
$user_name = $rowaa['name'];
			 ?>
			 <li class="li_style"><a href="my_profile<?php echo $phpext;?>">Hi <strong><?php echo $user_name;?></strong> !</a></li>
			 <li class="li_style"><a href="my_purchasing<?php echo $phpext;?>">My Account</a></li>  
			<li class="li_style"><a href="my_profile<?php echo $phpext;?>">My Profile</a></li>  
			 <li class="li_style"><a href="my_bids<?php echo $phpext;?>?date=<?php echo date('Y-m-d',time());?>">My Bids</a></li>  
			 <li class="li_style"><a href="logout<?php echo $phpext;?>">Logout</a></li>  
			 <?php }else{
			 ?>
			 <li class="li_style"><a href="auctions<?php echo $phpext;?>">Login</a></li>  
	 <li class="li_style" style="color:#CC0000; font-weight:bold;"><a href="registration<?php echo $phpext;?>" style="color:#CC0000; font-weight:bold;">Register Here</a></li>  
			 <?php }?>
			 
			<!--<li><a href="#"><i class="fa fa-lock"></i> &nbsp&nbsp Register</a></li>-->		 
			<li class="hide_desktop li_style"><a href="search<?php echo $phpext;?>">Auction</a></li>
			<li class="hide_desktop li_style"><a href="investor<?php echo $phpext;?>">Investor's Portal</a></li>
			
			 <li><a href="https://web.facebook.com/USSTOKYOcom-1869087010071627/" target="_blank"><i class="fa fa-facebook"></i></a></li>   
			
           </ul>
        </div>
      </div>
    </div>
  </div>
</div>