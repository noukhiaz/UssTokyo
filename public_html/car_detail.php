<?php //include('inc_nt_login.php');

		include('panel/config.php');

if(isset($_POST['shipiing_contry'])){

$shipiing_contry = $_POST['shipiing_contry'];

$user_id = $_POST['user_id'];

$bid_price = $_POST['bid_price'];

$comments = $_POST['comments'];

$car_id = $_POST['car_id'];

$reg_date = time();

$myip = $_SERVER["REMOTE_ADDR"];

//print_r($_POST);
$auction_date = date('Y-m-d',$reg_date);
$result = mysql_query("SELECT * FROM bidding where user_id = '$user_id' AND car_id = '$car_id'");

$num_rows = mysql_num_rows($result);

			if($num_rows <= '0')

				{

				//echo $num_rows;

						mysql_query("INSERT INTO bidding set 

						`shipiing_contry` = '$shipiing_contry',

						`user_id` = '$user_id',

						`car_id` = '$car_id',

						`bid_price` = '$bid_price',

						`comments` = '$comments',						

						`auction_date` = '$auction_date',
						`reg_date` = '$reg_date',

						`myip` = '$myip',

						`is_auction` = '0'

						");

						$success = '1';		

						?>
            <!--<meta http-equiv="refresh" content="0;URL='car_detail.php?id=<?php echo $car_id;?>'" />---->
            <?php 			

				}

}		

?>

<!DOCTYPE html>

<html lang="en">

<head>

<title>www.USSTokyo.com: Car Details</title>

<?php include('inc_head.php');?>

<!-- slick css -->

<link rel="stylesheet" type="text/css" href="css/slick/slick.css" />

<link rel="stylesheet" type="text/css" href="css/slick/slick-theme.css" />

</head>

<?php 

$id = $_REQUEST['id'];
$sql = mysql_query("select * from cars where is_active = '1' AND id = '$id'");

$row = mysql_fetch_array($sql);

$bidd = $row['id'];


$brand_idd = $row['brands_id'];

$sqlbrands = mysql_query("select * from brands where id = '$brand_idd'");

$bid = mysql_fetch_array($sqlbrands);

$cidd = $bid['parent_company'];


$cidd = $row['make'];

$sqlcompanies = mysql_query("select * from companies where id = '$cidd'");

$cid = mysql_fetch_array($sqlcompanies);

?>	



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

 

 <section class="inner-intro bg-7 bg-overlay-black-70">

  <div class="container">

     <div class="row text-center intro-title">

           <div class="col-lg-6 col-md-6 col-sm-6 text-left">

             <h3 class="text-white">Our Stock </h3>

           </div>

           <div class="col-lg-6 col-md-6 col-sm-6 text-right">

             <ul class="page-breadcrumb">

                <li><a href="index"><i class="fa fa-home"></i><span>Home</span></a> <i class="fa fa-angle-double-right"></i></li>

                <li><a href="stock"><span>Our Stock</span></a> <i class="fa fa-angle-double-right"></i></li>

                <li><span> <?php echo $row['brands_id'];?></span> </li>
             </ul>

        </div>

     </div>

  </div>

</section>





<!--=================================

 inner-intro -->

 




<!--=================================

 inner-intro -->





<!--=================================

car-details -->



<section class="car-details page-section-ptb">

  <div class="container">

    <div class="row">

     <div class="col-lg-9 col-md-9 col-sm-9">

       <h3><?php echo $bid['name'];?></h3>

 <!--<p> Temporibus possimus quasi beatae, Lorem ipsum dolor sit amet, consectetur adipisicing elit. aspernatur nemo maiores.</p>-->

      </div>

     <div class="col-lg-3 col-md-3 col-sm-3">

      <div class="car-price text-right">

	  <?php if($row['is_sold'] == '1'){?>

	  <strong>Sold</strong>

	  <?php }else{?>

         <strong>&yen; <?php echo $row['price'];?></strong>

         <!--<span>Exclusive Taxes & Shipping</span>-->

		 <?php }?>

       </div> 

      </div> 

    </div>

    <div class="row">

<!--      <div class="col-lg-12 col-md-12">

    <?php //include('print_option.php');?>  

      </div>-->

    </div>

    <div class="row">

     <div class="col-lg-6 col-md-6 col-sm-6">

        <div class="slider-slick">

          <div class="slider slider-for detail-big-car-gallery"> 



<?php 

//$id = $row['id'];
$px_sql = mysql_query("select * from car_pix where car_id = $id order by is_front desc ");

while($sql_px = mysql_fetch_assoc($px_sql))

{
  echo "uploads/".$sql_px['pic_name'];
?>												
  
<img src="uploads/<?php echo $sql_px['pic_name'];?>" class="img-responsive" style="max-height:405px;"  />	

<?php }?>

			   

            </div>

            <div class="slider slider-nav"> 

											

<?php 

$id = $row['id'];

$px_sql = mysql_query("select * from car_pix where car_id = $id order by is_front desc ");

while($sql_px = mysql_fetch_assoc($px_sql))

{

?>												

<img src="uploads/<?php echo $sql_px['pic_name'];?>"  class="img-responsive" style="max-height:66px" />	

<?php }?>	

            </div>

         </div>

        

     </div>

     <div class="col-lg-6 col-md-6 col-sm-6">

       <div class="car-details-sidebar">

          <div class="details-block details-weight">

            <h5>DESCRIPTION</h5>

            <ul>

              <li> <span>Stock ID</span> <strong class="text-right"><?php echo $row['id'];?></strong></li>

              <li> <span>Car Name</span> <strong class="text-right"><?php echo $cid['name'];?> - <?php echo $row['brands_id'];//echo $bid['name'];?></strong></li>
			  
			  <?php if($row['grade'] != ''){?><li> <span>Package </span> <strong class="text-right"><?php echo $row['grade'];?></strong></li><?php }?>

              <?php if($row['chasis'] != ''){?><li> <span>Chasis </span> <strong class="text-right"><?php echo $row['chasis'];?></strong></li><?php }?>

			  <?php if($row['fuel'] != ''){?><li> <span>Fuel </span> <strong class="text-right"><?php echo $row['fuel'];?></strong></li><?php }?>

			  <?php if($row['year'] != ''){?><li> <span>Model </span> <strong class="text-right"><?php echo $row['year'];?></strong></li><?php }?>

              <?php if($row['mileage'] != ''){?><li> <span>Mileage</span> <strong class="text-right"><?php echo $row['mileage'];?> </strong></li><?php }?>
			  
			  <?php if($row['displace'] != ''){?><li> <span>Displacement</span> <strong class="text-right"><?php echo $row['displace'];?> cc</strong></li><?php }?>

              <?php if($row['colorr'] != ''){?><li> <span>Color</span> <strong class="text-right"><?php echo $row['colorr'];?></strong></li><?php }?>

              <?php if($row['conde'] != ''){?><li> <span>Auction Grade</span> <strong class="text-right"><?php echo $row['conde'];?></strong></li><?php }?>
<!--
              <li> <span>Interior Condition</span> <strong class="text-right"><?php echo $row['condi'];?></strong></li>
-->
           <?php if($row['equipment'] != ''){?><li><span>Equipment </span> <strong class="text-right"><?php echo $row['equipment'];?></strong></li><?php }?>
<!--
			  <li> <span>Yard </span> <strong class="text-right"><?php echo $row['yard'];?></strong></li>
-->
 <li> <?php 


if(($row['is_sold'] == '1') || ($row['is_paid'] == '0') || ($row['investr_id'] == $_SESSION['id']))
{

$disabled = "disabled";
echo '<h5>SOLD</h5>';
}else{
$disabled = '';
//echo '<h5>Price</h5>';

?>
   
<a href="enquiry?sid=<?php echo $row['id'];?>&<?php echo md5($row['id']);?>"  onClick="javascript:void window.open('enquiry?sid=<?php echo $row['id'];?>&<?php echo md5($row['id']);?>','1526892559135','width=650,height=650,toolbar=0,menubar=0,location=0,status=0,scrollbars=0,resizable=0,left=0,top=0');return false;">
<button class="btn green button red" style="width:100%;" type="submit" <?php echo $disabled ;?>>Enquire</button>
</a>
<?php }?></li>

            </ul>

           </div>

           </div>

        </div>

       </div>

       <div class="row">

         <div class="col-lg-8 col-md-8  col-sm-8">

           <div id="tabs">

          <ul class="tabs">

             <li data-tabs="tab1" class="active"> <span aria-hidden="true" class="icon-diamond"></span> General Information</li>

           </ul>

           <div id="tab1" class="tabcontent"> 

			 <h6><?php echo $bid['name'];?></h6>  

             <p>

			 <?php echo nl2br($row['short_descip']);?>

			 </p>

         </div>

      

      </div>

          

         </div>

         <div class="col-lg-4 col-md-4 col-sm-4">

            <div class="car-details-sidebar">

             <div class="details-form contact-2 details-weight">

			
<!--
<a href="uploads/01.jpg" class="html5lightbox" title="Toronto">Image</a>
<a href="uploads/01.jpg" class="html5lightbox" data-width="480" data-height="320" title="Big Buck Bunny">Video</a>
  asad  -->
	            

               

            </div><!--

            <div class="details-location details-weight">

              <h5>Location</h5>

               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3224.017231421863!2d-79.43780268425046!3d36.09306798010035!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88532bae09664ccb%3A0xaa6b8f98d3fb8135!2s220+E+Front+St%2C+Burlington%2C+NC+27215%2C+USA!5e0!3m2!1sen!2sin!4v1475045272926" allowfullscreen></iframe>

            </div>-->

           </div>

         </div>

       </div>

	   <!--

       <div class="feature-car">

       <h6>Recently Vehicle</h6>

   <div class="row">

      <div class="col-lg-12 col-md-12">

       <div class="owl-carousel-1">

        

	   

      

       <div class="item">

         <div class="car-item gray-bg text-center">

           <div class="car-image">

             <img class="img-responsive" src="images/car/04.jpg" alt="">

             <div class="car-overlay-banner">

              <ul> 

                <li><a href="#"><i class="fa fa-link"></i></a></li>

                <li><a href="#"><i class="fa fa-dashboard"></i></a></li>

               </ul>

             </div>

           </div>

           <div class="car-list">

             <ul class="list-inline">

               <li><i class="fa fa-registered"></i> 2016</li>

               <li><i class="fa fa-cog"></i> Manual </li>

               <li><i class="fa fa-dashboard"></i> 6,000 mi</li>

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

             <a href="#">Toyota avalon hybrid </a>

             <div class="separator"></div>

             <div class="price">

               <span class="old-price">$35,568</span>

               <span class="new-price">$32,698 </span>

             </div>

           </div>

         </div>

       </div>

       

      </div>

     </div>

    </div>

   </div>-->

  </div>

</section>



<!--=================================

car-details  -->

 

 

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



<!-- bootstrap -->

<script type="text/javascript" src="js/mega-menu/mega_menu.js"></script>



<!-- appear -->

<script type="text/javascript" src="js/jquery.appear.js"></script>



<!-- owl-carousel -->

<script type="text/javascript" src="js/owl-carousel/owl.carousel.min.js"></script>



<!-- slick -->

<script type="text/javascript" src="js/slick/slick.min.js"></script>



<!-- select -->

<script type="text/javascript" src="js/select/jquery-select.js"></script>

 

<!-- custom -->

<script type="text/javascript" src="js/custom.js"></script>



<!-- php forms -->

<script type="text/javascript" src="js/forms/form-validation.js"></script>

<script src="https://www.google.com/recaptcha/api.js?render=explicit" async defer></script>

<script type="text/javascript" src="js/forms/recaptcha.js"></script>

   

</body>

</html>

