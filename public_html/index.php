<?php session_start();

		include('panel/config.php');

?>

<!DOCTYPE html>

<html lang="en">

<head>

<title>www.USSTokyo.com - The Best Car Dealer in Japan</title>

<?php include('inc_head.php');?>

</head>

<body>


<header id="header" class="defualt">

<?php include('inc_menu_top.php');?>

<div class="menu">  

	<?php include('inc_menu.php');?>

 </div>

</header>


<?php include("slider.php");?>


<?php include("midbody.php");?>


<?php include("showstock.php");?>



<footer class="footer footer-black bg-3 bg-overlay-black-90">

<?php include('inc_footer.php');?>

</footer>



<div class="car-top">

  <span><img src="images/car.png" alt=""></span>

</div>


<?php include("scripts.php");?>


</body>

</html>