<?php include('inc_nt_login.php');

		include('panel/config.php');

?>

<!DOCTYPE html>

<html lang="en">

<head>

<title>www.USSTokyo.com: My Cars</title>

<?php include('inc_head.php');?>

</head>



<body>








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

 

 <section class="inner-intro bg-1 bg-overlay-black-70">

  <div class="container">

     <div class="row text-center intro-title">

           <div class="col-lg-6 col-md-6 text-left">

             <h3 class="text-white">My Cars </h3>

           </div>

           <div class="col-lg-6 col-md-6 text-right">

             <ul class="page-breadcrumb">

                <li><a href="index.php"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-double-right"></i></li>

				<li><a href="myaccount.php"><i class="fa fa-home"></i> My Account</a> <i class="fa fa-angle-double-right"></i></li>

                <li><span>My Cars</span> </li>

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

   <div class="col-lg-3 col-md-3 col-sm-4">

     <div class="blog-sidebar">

          <div class="sidebar-widget">

	 <div class="sidebar-widget">

<?php include('my_left_siderbar.php');?>

          </div>

		  </div>

		  </div>

		  </div>

     <div class="col-lg-9 col-md-9 col-sm-8">

      

        <div class="row">

          

          

         

            

<?php 
$uid = $_SESSION['id'];
?>
<?php 
$perpage = 25;
if(isset($_GET["page"])){ $page = intval($_GET["page"]); } else { $page = 1; }
$calc = $perpage * $page;
$start = $calc - $perpage;
$table_name = 'cars';
$WHERE = "is_active = '1' AND investr_id = '$uid'";
$sql = mysql_query("SELECT * from $table_name where $WHERE  order by id desc Limit $start, $perpage");
?>
<?php 
while($row = mysql_fetch_array($sql)){

	?>	   

		 <!---------------Car start-------------------->

		     <div class="col-lg-4 col-md-4">

            <div class="car-item gray-bg text-center">

             <div class="car-image">

<?php 

$cid = $row['id'];

$px_sql = mysql_query("select * from car_pix where car_id = $cid order by id desc limit 1");

$sql_px = mysql_fetch_assoc($px_sql);

?>												

<img src="uploads/<?php echo $sql_px['pic_name'];?>" class="img-responsive" />	

			   

               <div class="car-overlay-banner">

                <ul> 

                  <li><a href="car_detail.php?id=<?php echo $row['id'];?>"><i class="fa fa-link"></i></a></li><!--

                  <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>-->

                 </ul>

               </div>

             </div>

             <div class="car-list">

               <ul class="list-inline">

                 <li><i class="fa fa-registered"></i> <?php echo $row['year'];?></li>

                 <li><i class="fa fa-cog"></i> <?php echo $row['trans'];?> </li>

                 <li> <?php echo number_format($row['mileage']);?> mi</li>

               </ul>

            </div>

             <div class="car-content">

              <div class="star">

               <i class="fa fa-star orange-color"></i>

                <i class="fa fa-star orange-color"></i>

                <i class="fa fa-star orange-color"></i>

                <i class="fa fa-star orange-color"></i>

                <i class="fa fa-star-o orange-color"></i>

               </div>

<?php $bid = $row['brands_id'];
$sqlbrands = mysql_query("select * from brands where id = '$bid'");
$bid = mysql_fetch_array($sqlbrands);
			   ?>

               <a href="car_detail.php?id=<?php echo $row['id'];?>"><?php echo $bid['name'];?></a>

               <div class="separator"></div>

               <div class="price">

                 <!--<span class="old-price">$35,568</span>-->

                 <span class="new-price">$<?php echo number_format($row['price']);?> </span>

               </div>

             </div>

           </div>

		   

		   

		   

		   

		   <div class="car-list" style="background-color:#c20003; padding-left:10px; padding-right:10px;">

<?php

$result=mysql_query("SELECT count(*) as total from bidding where car_id = '$cid'");

$data=mysql_fetch_assoc($result);



$rowSQL = mysql_query( "SELECT MAX( bid_price ) AS max FROM `bidding` where car_id = '$cid'" );

$row = mysql_fetch_array( $rowSQL );

$largestNumber = $row['max'];

?>		   

               <ul class="list-inline">

                 <li>

				 <a href="my_bidding.php?id=<?php echo $cid;?>"><strong style="color:#FFFFFF;">Total Bids: <?php echo $data['total'];?></strong></a>

				 

				 </li>

                 <li><strong style="color:#FFFFFF;">Highest Bid: $<?php echo number_format($largestNumber);?></strong> </li>

               </ul>

            </div>

			

			

			

			

		   </div>

<?php }?>		   

		  

		  

		  

		  

		  

		  

		  

		  

          </div>

		  

		  

		  
<!------------------------------------------------------------------------------->
 <div class="row">
               <div class="col-lg-12 col-md-12">
                  <div class="pagination-nav text-center">
                     <ul class="pagination">
<?php
/*not editable Asad */
$url_query = $_SERVER['QUERY_STRING']; if(isset($_GET['page'])){ $page =   $_GET['page'];}else{$page =   1;}
$page_a = 'page='.$page.'&'; $text = str_replace($page_a, '', $url_query); $new_url = $text;
/*not editable Asad */
$get_cars_counterss = mysql_query("SELECT * from $table_name where $WHERE ");
$mysql_fetch = mysql_fetch_assoc($get_cars_counterss);
$mysql_counter = mysql_num_rows($get_cars_counterss);

/*not editable Asad */
$totalPages = ceil($mysql_counter / $perpage);
if($page <=1 ){
echo "<li><a>Prev</a></li>";
}
else
{
$j = $page - 1;
echo "<li><a href='?page=$j&$new_url'>Prev</a></li>";
}
for($i=1; $i <= $totalPages; $i++)
{
	if($i<>$page)
	{
	echo "<li><a href='?page=$i&$new_url'>$i</a></li>";
	}
	else
	{
	echo "<li class='active'><a href=''>$i</a></li>";
	}
}
if($page == $totalPages )
{ echo "<li><a>Next</a></li>";}
else{$j = $page + 1;
 echo "<li><a href='?page=$j&$new_url'>Next</a></li>";
}
/****************/
?>
                     </ul>
                  </div>
               </div>
            </div>
<!------------------------------------------------------------------------------->	

		  

		  

      
	  

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

