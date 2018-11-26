<?php //include('inc_nt_login.php');
		include('panel/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>www.USSTokyo.com: Our Stock</title>
<?php include('inc_head.php');?>
</head>

<body>

<!--=================================
  loading  <div id="loading">
  <div id="loading-center">
      <img src="images/loader2.gif" alt="">
 </div>
</div>
 -->
  

<!--=================================
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

             <h3 class="text-white">Our Stock </h3>

           </div>

           <div class="col-lg-6 col-md-6 col-sm-6 text-right">

             <ul class="page-breadcrumb">

                <li><a href="index<?php echo $phpext;?>"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-double-right"></i></li>

                <li><span>Our Stock</span> </li>

             </ul>

        </div>

     </div>

  </div>

</section>


<!--=================================
 inner-intro -->


<!--=================================
product-listing  -->

<section class="product-listing page-section-ptb">
 <div class="container">
  <div class="row">
     <div class="col-lg-12 col-md-12 col-sm-12">
       <div class="sorting-options-main"> 
       
        <div class="row">
		   
		   
	<style>
/*.list-inline>li {
    padding-right: 0px !important;
    padding-left: 1px !important;
    font-size: 12px !important;
}*/
	</style>	   
		   
		   
	<?php 
$sql = mysql_query("select * from cars where is_active = '1' order by id desc");
while($row = mysql_fetch_array($sql)){
	?>	   
		 <!---------------Car start-------------------->
		     <div class="col-lg-3 col-md-3">
            <div class="car-item gray-bg text-center">
             <div class="car-image">
<?php 
$id = $row['id'];
$px_sql = mysql_query("select * from car_pix where car_id = '$id' order by is_front desc limit 1");
$sql_px = mysql_fetch_assoc($px_sql);
?>
<a href="car_detail?id=<?php echo $row['id'];?>" target="_blank">
<center>												
	<img src="uploads/<?php echo $sql_px['pic_name'];?>" class="img-responsive" style="max-height:168px" />	
</center>
</a>
<!--
			   <a href="car_detail.php?id=<?php echo $row['id'];?>">
               <div class="car-overlay-banner">
                <ul> 
                  <li><a href="car_detail.php?id=<?php echo $row['id'];?>"><i class="fa fa-link"></i></a></li>
                  <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                 </ul>
               </div></a>-->
             </div>
             <div class="car-list">
               <ul class="list-inline">
<?php if($row['year'] != ''){?><li style="padding-right: 0px; padding-left: 0px;"><i class="fa fa-registered" style="padding-right:0px;"></i> <?php echo $row['year'];?></li><?php }?>
                <?php if($row['trans'] != ''){?><li style="padding-right: 0px; padding-left: 0px;"><i class="fa fa-cog" style="padding-right:0px;"></i> <?php echo $row['trans'];?> </li><?php }?>
                 <?php if($row['mileage'] != ''){?><li style="padding-right: 0px; padding-left: 0px;"><i class="fa fa-dashboard" style="padding-right:0px;"></i> <?php echo number_format($row['mileage']);?> km</li><?php }?>
               </ul>
            </div>
             <div class="car-content">
<!--              <div class="star">
               <i class="fa fa-star orange-color"></i>
                <i class="fa fa-star orange-color"></i>
                <i class="fa fa-star orange-color"></i>
                <i class="fa fa-star orange-color"></i>
                <i class="fa fa-star-o orange-color"></i>
               </div>-->
			    <?php 
$bid = $row['brands_id'];
$mid = $row['make'];
$sqlcompanies = mysql_query("select * from companies where id = '$mid'");
$mcid = mysql_fetch_array($sqlcompanies);

$sqlbrands = mysql_query("select * from brands where id = '$bid'");
$bid = mysql_fetch_array($sqlbrands);

			   ?>
               <a style="margin-bottom:0px;"  target="_blank" href="car_detail<?php echo $phpext;?>?id=<?php echo $row['id'];?>"><?php echo $mcid['name'];?> - <?php echo $row['brands_id'];?></a>

              <div class="star" style="margin-bottom:10px;">
<!--
           <i class="fa fa-star orange-color"></i>

            <i class="fa fa-star orange-color"></i>

            <i class="fa fa-star orange-color"></i>

            <i class="fa fa-star orange-color"></i>

            <i class="fa fa-star-o orange-color"></i>

    -->    <span style="color:#c20003"><?php echo $row['grade'];?>   </span></div>
		   <!--
           <div class="separator"></div>
-->
           <div class="price">

            <!--<span class="old-price">$35,568</span>-->
                 <span class="new-price"><?php if ($row['is_sold']=='1'){echo "(SOLD OUT)";} else { echo "&yen;".$row['price'];}?>  </span>

           </div>
             </div>
           </div>
		   </div>
<?php }?>		   
		   
		   



</div>

<div class="row">
	<div class="col-lg-12 col-md-12">
          <div class="pagination-nav text-center">
               <ul class="pagination">
                 <li><a href="#">«</a></li>
                 <li class="active"><a href="#">1</a></li>
                 <!--<li><a href="#">2</a></li>
                 <li><a href="#">3</a></li>
                 <li><a href="#">4</a></li>
                 <li><a href="#">5</a></li>-->
                 <li><a href="#">»</a></li>
               </ul>
          </div>
	</div>
</div>

</section>

<!--=================================
product-listing  -->
 
 
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

<!-- jquery-ui -->
<script type="text/javascript" src="js/jquery-ui.js"></script>

<!-- select -->
<script type="text/javascript" src="js/select/jquery-select.js"></script>

<!-- custom -->
<script type="text/javascript" src="js/custom.js"></script>
  
</body>
</html>
