	<?php include('inc_nt_login.php');

			include('panel/config.php');

	if(isset($_POST['shipiing_contry'])){

	$shipiing_contry = $_POST['shipiing_contry'];

	$user_id = $_POST['user_id'];

	$bid_price = $_POST['bid_price'];

	$comments = $_POST['comments'];
	$bid_car_make = $_POST['bid_car_make'];
	$bid_car_name = $_POST['bid_car_name'];
	$year_model = $_POST['year_model'];
	$lot = $_POST['lot'];
	$groupp = $_POST['groupp'];
	$numm = $_POST['numm'];
	$randomm = rand(5, 15);
	$car_id = $_POST['car_id'];
	$auction_date = $_POST['auction_date'];


	$reg_date = time();

	$myip = $_SERVER["REMOTE_ADDR"];
	/*
	print_r($_POST);
	error_reporting(E_ALL);
	ini_set('display_errors', '1');*/
	$result = mysql_query("SELECT * FROM bidding where user_id = '$user_id' AND car_id = '$car_id'");

	$num_rows = mysql_num_rows($result);
	//echo $num_rows ;
				if($num_rows <= '0')

					{

							$a=mysql_query("INSERT INTO bidding(user_id,car_id,randomm,numm,groupp,bid_price,comments,shipiing_contry
								,is_auction,auction_date,myip,is_accepted,reg_date,is_active,lot,bid_car_name,bid_car_make,year_model,sold) VALUES
							('$user_id',
							'$car_id',
							'$randomm',
	       				    '$numm',
	      				    '$groupp',
							'$bid_price',
	      				    '$comments',
							'$shipiing_contry',
							'1',
							'$auction_date',
							'$myip',
							'0',
							'$reg_date',
							'1',
							'$lot',
							'$bid_car_name',
							'$bid_car_make',
							'$year_model',						
							'0')") or die(mysql_error());	
	//print_r($_POST)


	$user_name = $_REQUEST['user_name'];
	$email = $_REQUEST['user_email'];
	//$email = $_SESSION["email"];

	$bid_car_name = $_REQUEST['bid_car_name'];

		$message ="Name: " . $user_name . "\n\n Car ID: <a href='https://usstokyo.com/car_detail_auction.php?id=".$car_id."&dmy=".$auction_date."'>".$car_id."</a>
		
			\n Car Name: " . $bid_car_make . " - " . $bid_car_name . "
			\n  Auction Date: " . $auction_date . "
			\n Lot: " . $lot . "
			\n Group: " . $groupp . "
			\n Number: " . $numm . "
			\n Year / Model: " . $year_model . "
			\n Bidding Price: " . $bid_price . ",000
			\n IP: " . $myip . "
			\n Email: " . $email . "		
			\n Comments: " . $comments;
			
		
				$to      = 'noukhaiz@hotmail.com, faizrehman7777@gmail.com ,abdullahejaz435@gmail.com';
			//$to      = 'aukinternational@gmail.com';
			$subject = 'New Bid USSTokyo';
			//$message = 'hello';
			$headers = 'From: '. $email . "\r\n" .
				'Reply-To: '. $email . "\r\n" .
				'X-Mailer: PHP/' . phpversion();
			mail($to, $subject, $message, $headers);
			//$ssuccs = 'done';

	//print_r($_POST);

							?>
	          <meta http-equiv="refresh" content="0;URL='my_bids.php?date=<?php echo $auction_date;?>'" />
	        
	        <?php 
	        die();			
					}
	        else
	        {
	        	$bid_id = $_REQUEST['bid_id'];
	        	
	//die('sorry, you already applied');
	        		mysql_query("UPDATE  bidding set 

							`shipiing_contry` = '$shipiing_contry',

	            `groupp` = '$groupp',
	            `numm` = '$numm',


							`car_id` = '$car_id',

							`bid_price` = '$bid_price',

							`comments` = '$comments'						



	            where id = '$bid_id'

							");

							$success = '1';		
							$user_name = $_REQUEST['user_name'];
	$email = $_REQUEST['user_email'];
	//$email = $_SESSION["email"];

	$bid_car_name = $_REQUEST['bid_car_name'];

	?>

	<?php 
		$message ="Name: " . $user_name . "\n\n Car ID: <a href='https://usstokyo.com/car_detail_auction.php?id=".$car_id."&dmy=".$auction_date."'>".$car_id."</a>
			\n\n Car Name: " . $bid_car_make . " - " . $bid_car_name . "
			\n  Auction Date: " . $auction_date . "
			\n Lot: " . $lot . "
			\n Group: " . $groupp . "
			\n Number: " . $numm . "
			\n Year / Model: " . $year_model . "
			\n Bidding Price: " . $bid_price . ",000
			\n IP: " . $myip . "
			\n Email: " . $email . "		
			\n Comments: " . $comments;
			
		
				$to      = 'noukhaiz@hotmail.com,faizrehman7777@gmail.com';
			//$to      = 'aukinternational@gmail.com';
			$subject = 'Update - Bid USSTokyo';
			//$message = 'hello';
			$headers = 'From: '. $email . "\r\n" .
				'Reply-To: '. $email . "\r\n" .
				'X-Mailer: PHP/' . phpversion();
			mail($to, $subject, $message, $headers);
			//$ssuccs = 'done';
	//print_r($_POST)
							?>
	            <meta http-equiv="refresh" content="0;URL='my_bids.php?date=<?php echo $auction_date;?>'" /><?php 

	        }

	}		

	?>

	<!DOCTYPE html>

	<html lang="en">

	<head><meta http-equiv="Content-Type" content="text/html; charset=euc-kr">

	<title>www.USSTokyo.com: Car Details</title>

	<?php include('inc_head.php');?>
	<?php include('inc_script.php');?>

	<!-- slick css -->

	<link rel="stylesheet" type="text/css" href="css/slick/slick.css" />

	<link rel="stylesheet" type="text/css" href="css/slick/slick-theme.css" />

	</head>

	<?php 

	$id = $_REQUEST['id'];
	$timezone  = +9; //(GMT -5:00) EST (U.S. & Canada) 
	//echo gmdate("Y.m.d\\TH:i", time() + 3600*($timezone+date("I")));
	$date_track =  gmdate("Y-m-d", time() + 3600*($timezone+date("I")));


	//$dated = $_GET['dmy'];
	 
	 
	//echo $date_track;
	 
	// true if my_date is more than a month ago
	//echo (strtotime($my_date) < strtotime('1 month ago'));



	if(isset($_GET['dmy'])){
	$date_old = strtotime($_GET['dmy']);
		$date_now = time();	
		$day  = date('d',$date_old);
		$day_a  = date('d',$date_now);
		$date_get = $_GET['dmy'];
		$date_now_a  = date('Y-m-d',$date_now);
		
		
		
		if(($date_old >= $date_now) || ($date_now_a == $date_get))
		{
		
			$table = 'main';
			$col = '1';
		}
		else
		{
			$table = 'stats';
			$col = '0';
		}
		}
		else{
						if(isset($_GET['col']))
						{
							$col = $_GET['col'];
							if($col != '1')
							{
								$table = 'stats';
							}
							else
							{
								$table = 'main';	
							}
						}
						else
						{
							$table = 'main';
						}
						}
						
	//echo $table;


	  /*
	 $count = 1;
	  //$arr = aj_get("select * from main where id='".$_GET['id']."' ",60,0); // 1=>debug
	  
	SELECT * FROM main
	LEFT JOIN stats
	ON main.id=stats.id
	WHERE main.id=2;
	  
	  SELECT * FROM main m 
	      INNER JOIN stats n 
	 ON (m.id = n.id) 
	 WHERE m.id = 2
	  
	  $arr = aj_get("select * from main where id='".$_GET['id']."' < 1");
	  $arr = aj_get("select * from stats where id='".$_GET['id']."' < 1");
	  
	/*  if($conter != '1'){
		$table = 'main';
		}else{
		$tablse = 'stats';
		}
	  echo $table;
	    echo $tablse;
	$arr = aj_get("select * from ".$table." where id='".$_GET['id']."'",30,0);
	*/
	$car_idd = $_GET['id'];
	 
	$arr = aj_get("select * from ".$table." where id='".$_GET['id']."'",30,0);
	  

	  

	  



	/*

	$sql = mysql_query("select * from cars where is_active = '1' AND id = '$id'");

	$row = mysql_fetch_array($sql);

	$bidd = $row['id'];

	$sqlbrands = mysql_query("select * from brands where id = '$bidd'");

	$bid = mysql_fetch_array($sqlbrands);

	$cidd = $bid['parent_company'];

	$sqlcompanies = mysql_query("select * from companies where id = '$cidd'");

	$cid = mysql_fetch_array($sqlcompanies);

	*/

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

		 <?php 	  foreach($arr as $v) { ?>

	           <div class="col-lg-6 col-md-6 col-sm-6 text-left">

	             <h3 class="text-white"><?php echo $v['MODEL_NAME'];?> - <?php echo $v['MARKA_NAME'];?> </h3>

	           </div>

	           <div class="col-lg-6 col-md-6 col-sm-6 text-right">

	             <ul class="page-breadcrumb">

	                <li><a href="#"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-double-right"></i></li>

	                <li><a href="#">Auction Listing</a> <i class="fa fa-angle-double-right"></i></li>

	                <li><span> <?php echo $v['MODEL_NAME'];?> - <?php echo $v['MARKA_NAME'];?></span> </li>

	             </ul>

	           </div>

			    <?php }?>

	     </div>

	  </div>

	</section>


	<?php

		//echo $table;
		?>
	<!--=================================

	 inner-intro -->





	<!--=================================

	car-details -->



	<section class="car-details page-section-ptb">

	  <div class="container">

	    <div class="row">

		 <?php 	  foreach($arr as $v) { ?>

	     <div class="col-lg-9 col-md-9 col-sm-9">

		 

	       <h3><?php echo $v['MODEL_NAME'];?> - <?php echo $v['MARKA_NAME'];?></h3>

	      </div>

	     <div class="col-lg-3 col-md-3 col-sm-3">

	      <div class="car-price text-right">

	<?php
	$car_id = $_GET['id'];

	$sql = mysql_query("SELECT * from bidding where car_id = '$car_id'");
	$row = mysql_fetch_assoc($sql);
	if($row <= '0')
	{
		?>

		<strong>&yen; <?php echo $v['FINISH'];  ?> </strong>
	<?php } else if($row['sold'] <= '0'){ ?>

	<strong>&yen; <?php echo $row['sold'].',000  '; ?> </strong>

	<?php }else{?>
	<strong>&yen;  <?php $STATUS =  $v['STATUS']; ?>
			  
			  
			  <?php 
			  if($STATUS == 'SOLD' ){$disabled = "disabled";?> 
	 <?php echo number_format($v['FINISH']);?>
	 
	 
	 
	 
	 <?php }else{?>
	 <?php echo number_format($v['START']);?>
	 <?php }}?>


			 </strong>

	         <span><?php echo $v['STATUS'];?></span>

	       </div> 

	      </div> 

		  <?php }?>

	    </div>

	    <div class="row">

	<!--      <div class="col-lg-12 col-md-12">

	    <?php //include('print_option.php');?>  

	      </div>-->

	    </div>

	    <div class="row">

		<style>
		.slick-list.draggable {
	/*    height: 400px;*/
	}
		</style>

	     <div class="col-lg-7 col-md-7 col-sm-7">

	        <div class="slider-slick">

	          <div class="slider slider-for detail-big-car-gallery"> 

			  <?php //echo $v['IMAGES'];?>





	<?php

	$img = explode('#',$arr[0]['IMAGES']);

	  //$arr[0]['IMAGES'] = '<img src="'.implode('&w=320"><img src="',$img).'&w=320">'; // remove &w=320 to view full size

	foreach($img as $element)

	//foreach(array_slice($img,1) as $key=>$element)

	{

	?>
	<a href="<?php echo $element;?>" target="_blank">
	<img src="<?php echo $element;?>" class="img-responsive" style="max-height:480px;" />	
	</a>
	<?php 

	 }

	?>

				   

	            </div>

	            <div class="slider slider-nav"> 

												

	<?php 

	//$img = explode('#',$arr[0]['IMAGES']);

	  //$arr[0]['IMAGES'] = '<img src="'.implode('&w=320"><img src="',$img).'&w=320">'; // remove &w=320 to view full size

	foreach($img as $element)

	//foreach(array_slice($img,1) as $key=>$element)

	{

	?>

	<img src="<?php echo $element;?>" class="img-responsive" style="max-height:80px" />	<?php 

	 }

	?>	

	            </div>

	         </div>

	        

	     </div>

		 <div class="col-lg-5 col-md-5 col-sm-5">

		 <div class="car-details-sidebar">

	             <div class="details-form contact-2 details-weight">

	<form action="<?php echo $_SERVER['PHP_SELF'];?>?id=<?php echo $_REQUEST['id'];?>" class="gray-form" method="post">	

	<input type="hidden" class="form-control"  value="<?php echo $_SESSION['id'];?>" name="user_id" > 
	<input type="hidden" class="form-control"  value="<?php echo $_SESSION['email'];?>" name="user_email" > 	
	<input type="hidden" class="form-control"  value="<?php echo $_SESSION['name'];?>" name="user_name" > 	

	<input type="hidden" class="form-control"  value="<?php echo $_REQUEST['id'];?>" name="car_id" > 	


	   <?php    foreach($arr as $v) { ?>

	<?php $STATUS =  $v['STATUS']; 

	$Date_Auction =$v['AUCTION_DATE'];

	 // 
	$Date_Auction=substr($Date_Auction,0,11);
	$timezone= +9;
	$Curr_date = gmdate("Y-m-j ", time() + 3600*($timezone+date("I")));

	$curr_time = strtotime(gmdate("H:i:s", time() + 3600*($timezone+date("I"))));

	$auction_time_end=strtotime("08:00:00");

	$c = 0;
	$ac = 0;
	if($Date_Auction < $Curr_date){
	  $disabled = "disabled";
	  echo "<h5>Auction Closed</h5>";
	  $c++;
	  $ac++;
	//echo "<script type='text/javascript'>alert('old car');</script>";
}
	else if($Date_Auction > $Curr_date)
	  {
	  	$disabled = " ";
	  	//echo "<script type='text/javascript'>alert('Next Car');</script>";
	  }

	else if($Date_Auction == $Curr_date)
	  {
	  	if($curr_time >= $auction_time_end){
	  	$disabled = "disabled";
	  	//echo "<script type='text/javascript'>alert('Time Expire');</script>";
	  	echo "<h5>Auction Closed</h5>";
	  	$c++;
	  	$ac++;
	  }
	  }
	  if($ac==0){
	 if(!strcasecmp($STATUS,'sold') )
		{$disabled = "disabled";$c++; ?>
		 <h5>Sold</h5>

		 <?php }}
	if($ac==0){
	if(!strcasecmp($STATUS,'not sold'))   
		{$disabled = "disabled";$c++; ?>
		 <h5>Not Sold</h5>


		 <?php 
	}}if($c==0){   

	?> <h5>BID NOW</h5><?php }?>
	     
	       
	<input type="hidden" value="<?php $x = $v['AUCTION_DATE']; echo strtok($x, " ");?>" name="auction_date" > 	
	<input type="hidden" class="form-control"  value="<?php echo $v['MODEL_NAME'];?>" name="bid_car_name" >
	<input type="hidden" class="form-control"  value="<?php echo $v['MARKA_NAME'];?>" name="bid_car_make" >
	<input type="hidden" class="form-control"  value="<?php echo $v['YEAR'];?>" name="year_model" >
	<input type="hidden"class="form-control"  value="<?php echo $v['LOT'];?>" name="lot" >         

	<div class="form-group">

	                    <label>Starting Price*</label>

					
	<input type="number" class="form-control" min="<?php echo $row['price'];?>" placeholder="Starting Price: <?php echo number_format($v['START']);?> JPY" name="bid_price" disabled>

						<?php }?>

	              </div>     






	        <?php

	$user_id = $_SESSION['id'];
	$car_id =  $v['ID'];        
	$sql_bid = mysql_query("select * from bidding where car_id = '$car_id' AND user_id = '$user_id'" );
	$row_bid = mysql_fetch_assoc($sql_bid);
	$coubet = mysql_num_rows($sql_bid);
	if($coubet != '0'){
	$bid_id =  $row_bid['id'] ;  
	$accepted =  $row_bid['is_accepted'] ;  
	$groupp =  $row_bid['groupp'] ;  
	$numm =  $row_bid['numm'] ;  
	$bid_price =  $row_bid['bid_price'];  
	$shipiing_contry =  $row_bid['shipiing_contry'] ;  
	$comments =  $row_bid['comments'] ;  
	}
	?>


	          <div class="form-group">

	                   <label>Your Bid in JPY*</label>
	<?php if($coubet != '0'){?>
	<input type="text" class="form-control" value="<?php echo $bid_price;?>" style="width:110px; display:inline; text-align:right;"  name="bid_price" required <?php echo $disabled;?>><b>,000 <span>JPY</span></b>
	<input type="hidden" class="form-control" value="<?php echo $bid_id;?>" name="bid_id" required > 

	<?php }else{ ?>
	<input type="text" class="form-control"  name="bid_price" style="width:110px; display:inline;  text-align:right;"  required <?php echo $disabled ;?>><b>,000 <span>JPY</span></b>
	<?php }?>

	           </div>





	<div class="col-lg-6 col-md-6 col-sm-6">

	           <div class="form-group">

	                   <label>Group </label>

	                   
	<?php if($coubet != '0'){?>
	<select name="groupp" <?php echo $disabled;?>>
	<option></option>
	<option <?php if($groupp == 'A'){?>selected="selected"<?php }?>>A</option>
	<option <?php if($groupp == 'B'){?>selected="selected"<?php }?>>B</option>
	<option <?php if($groupp == 'C'){?>selected="selected"<?php }?>>C</option>
	<option <?php if($groupp == 'D'){?>selected="selected"<?php }?>>D</option>
	<option <?php if($groupp == 'E'){?>selected="selected"<?php }?>>E</option>
	<option <?php if($groupp == 'F'){?>selected="selected"<?php }?>>F</option>
	<option <?php if($groupp == 'G'){?>selected="selected"<?php }?>>G</option>
	<option <?php if($groupp == 'H'){?>selected="selected"<?php }?>>H</option>
	<option <?php if($groupp == 'I'){?>selected="selected"<?php }?>>I</option>
	<option <?php if($groupp == 'J'){?>selected="selected"<?php }?>>J</option>
	<option <?php if($groupp == 'K'){?>selected="selected"<?php }?>>K</option>
	<option <?php if($groupp == 'L'){?>selected="selected"<?php }?>>L</option>
	<option <?php if($groupp == 'M'){?>selected="selected"<?php }?>>M</option>
	<option <?php if($groupp == 'N'){?>selected="selected"<?php }?>>N</option>
	<option <?php if($groupp == 'O'){?>selected="selected"<?php }?>>O</option>
	<option <?php if($groupp == 'P'){?>selected="selected"<?php }?>>P</option>
	<option <?php if($groupp == 'Q'){?>selected="selected"<?php }?>>Q</option>
	<option <?php if($groupp == 'R'){?>selected="selected"<?php }?>>R</option>
	<option <?php if($groupp == 'S'){?>selected="selected"<?php }?>>S</option>
	<option <?php if($groupp == 'T'){?>selected="selected"<?php }?>>T</option>
	<option <?php if($groupp == 'U'){?>selected="selected"<?php }?>>U</option>
	<option <?php if($groupp == 'V'){?>selected="selected"<?php }?>>V</option>
	<option <?php if($groupp == 'W'){?>selected="selected"<?php }?>>W</option>
	<option <?php if($groupp == 'X'){?>selected="selected"<?php }?>>X</option>
	<option <?php if($groupp == 'Y'){?>selected="selected"<?php }?>>Y</option>
	<option <?php if($groupp == 'Z'){?>selected="selected"<?php }?>>Z</option>

	<?php }else{ ?>
	<select name="groupp" <?php echo $disabled ;?>>
	<option></option>                      
	<?php }?>

	                      <option>A</option>

	                      <option>B</option>

	                      <option>C</option>

	                      <option>D</option>

	                      <option>E</option>

	                      <option>F</option>

	                      <option>G</option>

	                      <option>H</option>

	                      <option>I</option>

	                      <option>J</option>

	                      <option>K</option>

	                      <option>L</option>

	                      <option>M</option>

	                      <option>N</option>

	                      <option>O</option>

	                      <option>P</option>

	                      <option>Q</option>

	                      <option>R</option>

	                      <option>S</option>

	                      <option>T</option>

	                      <option>U</option>

	                      <option>V</option>

	                      <option>W</option>

	                      <option>X</option>

	                      <option>Y</option>

	                      <option>Z</option>

	                   </select>

	           </div>

	</div>



	<div class="col-lg-6 col-md-6 col-sm-6">

	           <div class="form-group">

	                   <label>NUM </label>

	<?php if($coubet != '0'){?>
	<select name="numm" <?php echo $disabled;?>>


	<option <?php if($numm == '0'){?>selected="selected"<?php }?>>0</option>

	<option <?php if($numm == '1'){?>selected="selected"<?php }?>>1</option>
	<option <?php if($numm == '2'){?>selected="selected"<?php }?>>2</option>
	<option <?php if($numm == '3'){?>selected="selected"<?php }?>>3</option>



	<?php }else{ ?>
	<select name="numm" <?php echo $disabled ;?>>
	<option value="0"></option>     
	 <option>1</option>

	                      <option>2</option>

	                      <option>3</option>                 
	<?php }?>


	                     

	                   </select>

	           </div>

	</div>                   



	                <div >

	                   <label>Shipping Country*</label>

	<?php if($coubet != '0'){?>
	<select name="shipiing_contry"   required <?php echo $disabled;?> >
	<option  ><?php echo $shipiing_contry ;?></option>



	<?php }else{ ?>
	<select name="shipiing_contry"   required <?php echo $disabled ;?>>
	<option></option>                      
	<?php }?>
	    <option value="Afghanistan">Afghanistan</option>
	    <option value="Argentina">Argentina</option>
	    <option value="Armenia">Armenia</option>
	    <option value="Australia">Australia</option>
	    <option value="Austria">Austria</option>
	    <option value="Azerbaijan">Azerbaijan</option>
	    <option value="Bahrain">Bahrain</option>
	    <option value="Bangladesh">Bangladesh</option>
	    <option value="Belgium">Belgium</option>
	    <option value="Bhutan">Bhutan</option>
	    <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
	    <option value="Brazil">Brazil</option>
	    <option value="Bulgaria">Bulgaria</option>
	    <option value="Cambodia">Cambodia</option>
	    <option value="Canada">Canada</option>
	    <option value="Chile">Chile</option>
	    <option value="China">China</option>
	    <option value="Colombia">Colombia</option>
	    <option value="Congo">Congo</option>
	    <option value="Costa Rica">Costa Rica</option>
	    <option value="Croatia">Croatia (Hrvatska)</option>
	    <option value="Cuba">Cuba</option>
	    <option value="Cyprus">Cyprus</option>
	    <option value="Czech Republic">Czech Republic</option>
	    <option value="Denmark">Denmark</option>
	    <option value="Dominica">Dominica</option>
	    <option value="Dominican Republic">Dominican Republic</option>
	    <option value="Egypt">Egypt</option>
	    <option value="Estonia">Estonia</option>
	    <option value="Ethiopia">Ethiopia</option>
	    <option value="Fiji">Fiji</option>
	    <option value="Finland">Finland</option>
	    <option value="France">France</option>
	    <option value="Gambia">Gambia</option>
	    <option value="Georgia">Georgia</option>
	    <option value="Germany">Germany</option>
	    <option value="Greece">Greece</option>
	    <option value="Haiti">Haiti</option>
	    <option value="Hong Kong">Hong Kong</option>
	    <option value="Hungary">Hungary</option>
	    <option value="Iceland">Iceland</option>
	    <option value="India">India</option>
	    <option value="Indonesia">Indonesia</option>
	    <option value="Iran">Iran</option>
	    <option value="Iraq">Iraq</option>
	    <option value="Ireland">Ireland</option>
	    <option value="Israel">Israel</option>
	    <option value="Italy">Italy</option>
	    <option value="Jamaica">Jamaica</option>
	    <option value="Japan">Japan</option>
	    <option value="Jordan">Jordan</option>
	    <option value="Kazakhstan">Kazakhstan</option>
	    <option value="Kenya">Kenya</option>
	    <option value="Korea">Korea</option>
	    <option value="Kuwait">Kuwait</option>
	    <option value="Kyrgyzstan">Kyrgyzstan</option>
	    <option value="Latvia">Latvia</option>
	    <option value="Lebanon">Lebanon</option>
	    <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
	    <option value="Liechtenstein">Liechtenstein</option>
	    <option value="Macau">Macau</option>
	    <option value="Madagascar">Madagascar</option>
	    <option value="Malaysia">Malaysia</option>
	    <option value="Maldives">Maldives</option>
	    <option value="Mali">Mali</option>
	    <option value="Malta">Malta</option>
	    <option value="Mexico">Mexico</option>
	    <option value="Morocco">Morocco</option>
	    <option value="Myanmar">Myanmar</option>
	    <option value="Nepal">Nepal</option>
	    <option value="Netherlands">Netherlands</option>
	    <option value="New Zealand">New Zealand</option>
	    <option value="Nigeria">Nigeria</option>
	    <option value="Norway">Norway</option>
	    <option value="Oman">Oman</option>
	    <option value="Pakistan" selected="selected">Pakistan</option>
	    <option value="Panama">Panama</option>
	    <option value="Peru">Peru</option>
	    <option value="Philippines">Philippines</option>
	    <option value="Poland">Poland</option>
	    <option value="Portugal">Portugal</option>
	    <option value="Qatar">Qatar</option>
	    <option value="Romania">Romania</option>
	    <option value="Russia">Russian Federation</option>
	    <option value="Samoa">Samoa</option>
	    <option value="San Marino">San Marino</option>
	    <option value="Sao Tome and Principe">Sao Tome and Principe</option> 
	    <option value="Saudi Arabia">Saudi Arabia</option>
	    <option value="Singapore">Singapore</option>
	    <option value="Slovenia">Slovenia</option>
	    <option value="Solomon Islands">Solomon Islands</option>
	    <option value="Somalia">Somalia</option>
	    <option value="South Africa">South Africa</option>
	    <option value="South Georgia">South Georgia and the South Sandwich Islands</option>
	    <option value="Span">Spain</option>
	    <option value="SriLanka">Sri Lanka</option>
	    <option value="Swaziland">Swaziland</option>
	    <option value="Sweden">Sweden</option>
	    <option value="Switzerland">Switzerland</option>
	    <option value="Syria">Syrian Arab Republic</option>
	    <option value="Tajikistan">Tajikistan</option>
	    <option value="Thailand">Thailand</option>
	    <option value="Tunisia">Tunisia</option>
	    <option value="Turkey">Turkey</option>
	    <option value="Turkmenistan">Turkmenistan</option>
	    <option value="Uganda">Uganda</option>
	    <option value="Ukraine">Ukraine</option>
	    <option value="United Arab Emirates">United Arab Emirates</option>
	    <option value="United Kingdom">United Kingdom</option>
	    <option value="United States">United States</option>
	    <option value="Uzbekistan">Uzbekistan</option>
	    <option value="Venezuela">Venezuela</option>
	    <option value="Vietnam">Viet Nam</option>
	    <option value="Zimbabwe">Zimbabwe</option>
	</select>
					   

	                </div>

	<!--                <div class="form-group">

	                    <label>Email address*</label>

	                    <input type="text" class="form-control" placeholder="Email" name="email" required>

	                </div>-->

	                 

	                 <div class="form-group">

	                   <label>Comment* </label>



	<?php if($coubet != '0'){?>
	<textarea class="form-control" rows="4" placeholder="Comment" name="comments" <?php echo $disabled;?>><?php echo $comments;?></textarea>

	<?php }else{ ?>
	<textarea class="form-control" rows="4" placeholder="Comment" name="comments" <?php echo $disabled;?>></textarea>
	<?php }?>
	                  </div>

	                 <div class="form-group">





	<?php if($coubet != '0'){?>
	<button class="btn  button green" type="submit" <?php //echo $disabled ;?>>UPDATE NOW</button>

	<a href="cancel_bid.php?bid=<?php echo $bid_id;?>&id=<?php echo $_GET['id'];?>&col=<?php echo $_GET['col'];?>&cid=<?php echo $_GET['cid'];?>" class="btn  button green" <?php //echo $disabled ;?>>CANCEL BID</a>

	<?php }else{ ?>
	<?php 

	$user = mysql_query("select * from users where id = '$user_id'");
	$user_row = mysql_fetch_assoc($user);

	$paid = $user_row['is_paid'] ;
	if($paid == '0')
	{
	$disabled = "disabled";
	}?>

	<button class="btn green button red" type="submit" <?php if($paid == '0'){echo "title='Deposit Money To Start Bidding'";} echo $disabled ;?>>BID </button>
	<?php }?>

					 <!--
	          <button class="btn green button red" type="submit" <?php echo $disabled ;?>>EDIT BID</button>
					  <button class="btn green button red" type="submit" <?php echo $disabled ;?>>CANCEL BID</button>
					  -->

	                </div>

	              </form>

	            </div>

	           </div>

		</div>

		</div>

		<div class="row">

	     <div class="col-lg-6 col-md-6 col-sm-6">

	       <div class="car-details-sidebar">

	          <div class="details-block details-weight">

	            <h5>DESCRIPTION</h5>

	            <ul>



	<?php 	  foreach($arr as $v) { ?>

	              <li> <span>LOT</span> <strong class="text-right"><?php echo $v['LOT'];?></strong></li>

	<!--			  <li> <span>SERIAL</span> <strong class="text-right"><?php echo $v['SERIAL'];?></strong></li>-->

				  <li> <span>AUCTION DATE</span> <strong class="text-right"><?php echo $v['AUCTION_DATE'];?></strong></li>

				  <li> <span>AUCTION</span> <strong class="text-right"><?php echo $v['AUCTION'];?></strong></li>

				  <li> <span>MAKE</span> <strong class="text-right"><?php echo $v['MARKA_NAME'];?></strong></li>

				  <li> <span>NAME</span> <strong class="text-right"><?php echo $v['MODEL_NAME'];?></strong></li>

				  <li> <span>YEAR</span> <strong class="text-right"><?php echo $v['YEAR'];?></strong></li>

				  <li> <span>ENGINE</span> <strong class="text-right"><?php echo $v['ENG_V'];?></strong></li>

		

			  

				 

	  <?php }?>

	            </ul>

	           </div>

	           </div>

	        </div>

			

			

			

			

			

			 <div class="col-lg-6 col-md-6 col-sm-6">

	       <div class="car-details-sidebar">

	          <div class="details-block details-weight">

	            <h5>OTHER INFO</h5>

	            <ul>



	<?php 	  foreach($arr as $v) { ?>

	             

				  <li> <span>PACKAGE /  TYPE</span> <strong class="text-right"><?php echo $v['GRADE'];?></strong></li>
				  
				  <li> <span>GRADE</span> <strong class="text-right"><?php echo $v['RATE'];?></strong></li>

				  <li> <span>COLOR</span> <strong class="text-right"><?php echo $v['COLOR'];?></strong></li>

				  <li> <span>TRANSMISSION</span> <strong class="text-right"><?php echo $v['KPP'];?></strong></li>

				  <li> <span>MILEAGE</span> <strong class="text-right"><?php echo $v['MILEAGE'];?></strong></li>

				  <li> <span>START</span> <strong class="text-right">&yen; <?php echo number_format($v['START']);?></strong></li>

				  <li> <span>FINISH</span> <strong class="text-right">&yen; <?php echo number_format($v['FINISH']);?></strong></li>

				  
	<!--
				  <li> <span>AVG PRICE</span> <strong class="text-right"><?php //echo number_format($v['AVG_PRICE']);?></strong></li>-->

				  

	<li> <span>STATUS</span> <strong class="text-right"><?php echo $v['STATUS'];?></strong></li>

			  

				 

	  <?php }?>

	            </ul>

	           </div>

	           </div>

	        </div>

	       </div>

		    <?php 	  foreach($arr as $v) { ?>

			<?php if($v['INFO'] != ''){?>

	       <div class="row">

	         <div class="col-lg-12 col-md-12  col-sm-12">

	           <div id="tabs">

	          <ul class="tabs">

	             <li data-tabs="tab1" class="active"> <span aria-hidden="true" class="icon-diamond"></span> General Information</li>

	           </ul>

	           <div id="tab1" class="tabcontent"> 

				 <h6><?php echo $v['MODEL_NAME'];?> - <?php echo $v['MARKA_NAME'];?></h6>  

	             <p>

				

				 <?php echo $v['INFO'];?>

				 

				 <?php //echo nl2br($row['short_descip']);?>

				 </p>

	         </div>

	      

	      </div>

	          

	         </div>

	         

	       </div>

			<?php }}?>

		   

	<div class="row">

		 <div class="col-lg-7 col-md-7 col-sm-7">

	       <div class="car-details-sidebar">

	          <div class="details-block details-weight">

	            <h5>Auction Sheet</h5>

					<?php 

						$img = explode('#',$arr[0]['IMAGES']);

					?>

					<img src="<?php echo $img[0];?>" style="max-width: 100%;    border: 10px solid #CC0000;    padding: 2px;" class="img-responsive" >

				</div>

			</div>

		</div>   

			 <div class="col-lg-5 col-md-5 col-sm-5">

	       <div class="car-details-sidebar">

	          <div class="details-block details-weight">

	            <h5>Understanding the Japanese Auction Sheet</h5>



	 

	 

	 <div class="col-lg-6 col-md-6 col-sm-6"  style="font-family:Cuprum,Tahoma;font-size:13px;">

	 

	A1 Small Scratch<br>A2 Scratch<br>A3 Big Scratch<br>E1 Few Dimples<br>E2 Several Dimples<br>E3 Many Dimples<br>U1 Small Dent<br>U2 Dent<br>U3 Big Dent<br>W1 Repair Mark/Wave (hardly detectable)<br>W2 Repair Mark/Wave<br>W3 Obvious Repair Mark/Wave (needs to be repainted)<br>S1 Rust<br>S2 Heavy Rust<br>C1 Corrosion<br>C2 Heavy Corrosion<br>P - Paint marked<br>H - Paint faded

	          </div>

			  <div class="col-lg-6 col-md-6 col-sm-6" style="font-family:Cuprum,Tahoma;font-size:13px;">

			  X  Need to be replaced<br>XX Replaced<br>B1 Small dent with scratch (size like a thumb)<br>B2 Dent with scratch (size like flat of the hand)<br>B3 Big Dent with scratch (size like elbow)<br>Y1 Small Hole or Crack<br>Y2 Hole or Crack<br>Y3 Big Hole or Crack<br>X1 Small Crack on Windshield (approximately 1cm)<br>R  Repaired Crack on Windshield<br>RX Repaired Crack on Windshield (needs to be replaced)<br>X  Crack on Windshield (needs to be replaced)<br>G - Stone chip in glass

				</div>

				

				

				

				</div>

			</div>

		</div>      

	</div>

		   

		   

		 

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

