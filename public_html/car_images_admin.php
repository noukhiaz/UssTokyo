<?php //include('inc_nt_login.php');
		include('panel/config.php');
?>
<!DOCTYPE html>

<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=euc-kr">

<title>www.USSTokyo.com: Car Images</title>

<?php include('inc_head.php');?>
<?php include('inc_script.php');?>

<!-- slick css -->

<link rel="stylesheet" type="text/css" href="css/slick/slick.css" />

<link rel="stylesheet" type="text/css" href="css/slick/slick-theme.css" />

</head>

<?php 

$id = $_REQUEST['id'];

?>	



<body>
<section class="car-details page-section-ptb">
				  <div class="container">
								<div class="row">
									<div class="slider-slick">
									  <div class="slider slider-for detail-big-car-gallery"> 
											<?php
											$id = $_GET['did'];
											$sql = mysql_query("select * from car_pix where car_id = '$id' order by id asc");
										//	$row = mysql_fetch_assoc($sql);
											?><?php ?>
											<?php  while($row = mysql_fetch_array($sql)){ //echo $row['id'];
											//echo $row['pic_name'];?>
											<a href="" target="_blank">
											<img src="uploads/4352Honda Fit Hybrid - UssTokyo.com.jpg" class="img-responsive" style=" max-height:500px; width: auto !important;" />	
											</a>
											<?php  }?>
									  </div>
							
										<div class="slider slider-nav"> 
											<?php  $sqla = mysql_query("select * from car_pix where car_id = '$id' order by id asc");
											while($rowa = mysql_fetch_array($sqla)){// echo $rowa['id'];?><img title="<?php echo $rowa['id'];?>" src="uploads/<?php echo $rowa['pic_name'];?>" class="img-responsive" />	<?php  }?>	
										 </div>
									</div>
							</div>
				</div>
</section>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/mega-menu/mega_menu.js"></script>
<script type="text/javascript" src="js/jquery.appear.js"></script>
<script type="text/javascript" src="js/owl-carousel/owl.carousel.min.js"></script>
<script type="text/javascript" src="js/slick/slick.min.js"></script>
<script type="text/javascript" src="js/select/jquery-select.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript" src="js/forms/recaptcha.js"></script>
</body>
</html>

