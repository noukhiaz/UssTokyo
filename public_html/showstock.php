<section class="feature-car white-bg page-section-ptb">

  <div class="container">

   <div class="row">

    <div class="col-lg-12 col-md-12">

      <div class="section-title">

         <span>Check out the newest cars in our stock!</span>

         <h2>Our Stock </h2>

         <div class="separator"></div>

      </div>

    </div>

   </div>

   <div class="row">

   <div class="col-lg-12 col-md-12">

    <div class="owl-carousel-1">
<?php $sql = mysql_query("select * from cars where is_active = '1' order by id desc limit 40");
while($row = mysql_fetch_array($sql)){?>	

     <div class="item">

       <div class="car-item gray-bg text-center">

         <div class="car-image">

<?php 
$id = $row['id'];
$px_sql = mysql_query("select * from car_pix where car_id = '$id' order by is_front desc limit 1");
$sql_px = mysql_fetch_assoc($px_sql);
//if($sql_px['is_front'] == '0'){echo 'none';}else{
?>
<a href="car_detail<?php echo $phpext;?>?id=<?php echo $row['id'];?>" target="_blank">
<center>		

	<img src="uploads/<?php echo $sql_px['pic_name'];?>" class="img-responsive" style="max-height:168px" />	
</center>
</a>		   




         </div>

         <div class="car-list">

           <ul class="list-inline">
<?php if($row['year'] != ''){?><li style="padding-right: 0px; padding-left: 0px;"><i class="fa fa-registered" style="padding-right:0px;"></i> <?php echo $row['year'];?></li><?php }?>
                <?php if($row['trans'] != ''){?><li style="padding-right: 0px; padding-left: 0px;"><i class="fa fa-cog" style="padding-right:0px;"></i> <?php echo $row['trans'];?> </li><?php }?>
                 <?php if($row['mileage'] != ''){?><li style="padding-right: 0px; padding-left: 0px;"><i class="fa fa-dashboard" style="padding-right:0px;"></i> <?php echo number_format($row['mileage']);?> km</li><?php }?>

           </ul>

        </div>

         <div class="car-content">

         

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
   <span style="color:#c20003"><?php echo $row['grade'];?>   </span></div>
		   <!--
           <div class="separator"></div>
-->
           <div class="price">

            <!--<span class="old-price">$35,568</span>-->
                 <span class="new-price"><?php

                 if($row['is_sold'] == '1')
                {
                  echo '(SOLD OUT)';
                } 
                else
                {

                 echo "&yen;".$row['price'];
                } 

              ?> </span>

           </div>



         </div>

       </div>

     </div>
<?php }?>

     

    </div>

   </div>

  </div>

  </div>

</section> 