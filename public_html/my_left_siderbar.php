		   <!-- <h6>Quick Links</h6>-->
		   <?php date_default_timezone_set("Asia/Tokyo");//$time = time();?>
<div class="widget-link" style="background:#000;">
	<ul>
<!--	<li><a href="myaccount.php" class="active"><i class="fa fa-angle-right" style="padding-left:20px;"></i> Dashboard </a></li>-->
	<li><a href="my_bids<?php echo $phpext;?>?date=<?php echo date('Y-m-d',time());?>"><i class="fa fa-angle-right" style="padding-left:20px;"></i> My Bids </a></li>
<!--	<li><a href="my_fav.php"><i class="fa fa-angle-right" style="padding-left:20px;"></i> My Favourites</a></li>-->
	
	<!--
	<li><a href="my_consignee.php"><i class="fa fa-angle-right" style="padding-left:20px;"></i> Consignee Details</a></li>
	<li><a href="#"><i class="fa fa-angle-right" style="padding-left:20px;"></i> Support (0)</a></li>	
	<?php
	$uid = $_SESSION["id"];
	$mysql_querya = mysql_query("select * from users where id = '$uid'");
	$roww = mysql_fetch_assoc($mysql_querya);
	if($roww['is_investr'] == '1'){
	?>
	<li class="active"><a href="my_cars.php"><i class="fa fa-angle-right" style="padding-left:20px;"></i> My Cars</a></li>
	<?php }?>
	-->
<li><a href="my_purchasing<?php echo $phpext;?>"><i class="fa fa-angle-right" style="padding-left:20px;"></i> Purchase History</a></li>
	
	<li><a href="my_finance<?php echo $phpext;?>"><i class="fa fa-angle-right" style="padding-left:20px;"></i> Finance History</a></li>
	<li><a href="my_profile<?php echo $phpext;?>"><i class="fa fa-angle-right" style="padding-left:20px;"></i> My Profile</a></li>
	<li><a href="my_password<?php echo $phpext;?>"><i class="fa fa-angle-right" style="padding-left:20px;"></i> Change Password</a></li>
	<li><a href="logout<?php echo $phpext;?>"><i class="fa fa-angle-right" style="padding-left:20px;"></i> Logout</a></li>
	</ul>
</div>