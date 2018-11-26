<?php //include('inc_nt_login.php');
		include('panel/config.php');
$id = $_REQUEST['sid'];
$sql = mysql_query("select * from cars where is_active = '1' AND id = '$id'");
$row = mysql_fetch_array($sql);
$bidd = $row['id'];
$cidd = $row['make'];
$sqlcompanies = mysql_query("select * from companies where id = '$cidd'");
$cid = mysql_fetch_array($sqlcompanies);
		
		if(isset($_REQUEST['car_id'])){
	//	print_r($_REQUEST);			
		$name = $_REQUEST['name'];	
		$stock_id = $_REQUEST['car_id'];
		$email = $_REQUEST['email'];		
		$mobile = $_REQUEST['mobile'];
		$address = $_REQUEST['address'];
		$shipiing_contry = $_REQUEST['shipiing_contry'];
		$comments = $_REQUEST['comments'];				
		$myip = $_SERVER["REMOTE_ADDR"];
	//	 $bid_car_make = $cid['name'];
	//	$bid_car_name = $row['brands_id'];
		//$id = $_REQUEST['sid'];
		$sql = mysql_query("select * from cars where is_active = '1' AND id = '$stock_id'");
		$row = mysql_fetch_array($sql);
		$bidd = $row['id'];
		$cidd = $row['make'];
		$year = $row['year'];
		$grade = $row['conde'];
		$sqlcompanies = mysql_query("select * from companies where id = '$cidd'");
		$cid = mysql_fetch_array($sqlcompanies);		
		$bid_car_make = $cid['name'];
		$bid_car_name = $row['brands_id'];
		?>
		<?php 		
		
		$message ='<strong>Name:</strong> Mr./Ms.' . $name . '
		<br/> <strong>Car Name:</strong> ' . $bid_car_make . ' - ' . $bid_car_name . '
		<br/><strong> Stock ID:</strong> <a href="https://usstokyo.com/car_detail?id='.$stock_id.'">'.$stock_id.'</a>
		<br/><strong> Model: </strong>' . $year . '
		<br/><strong> Auction Grade: </strong>' . $grade . '
		<br/><strong> Email: </strong>' . $email . '
		<br/><strong> Mobile: </strong>' . $mobile . '
		<br/> <strong> Address:</strong> ' . $address . '
		<br/> <strong>IP:</strong> ' . $myip . '
		<br/> <strong>Shipping Country:</strong> ' . $shipiing_contry . '		
		<br/><strong> Comments:</strong> ' . $comments;?><?php 
			//$to      = 'noukhaiz@hotmail.com, aukinternational@gmail.com, faizrehman7777@gmail.com';
		//$too      = 'noukhaiz@hotmail.com ,info@usstokyo.com, abdullahejaz435@gmail.com';
        $too='abdullahejaz435@gmail.com';
		$subject = 'Enquiry STOCK   ' . $bid_car_make . ' - ' . $bid_car_name . ' ['. $stock_id .'] - USSTokyo.com';
		/*
		//$message = 'hello';
		$headers = 'From: '. $email . "\r\n" .
			'Reply-To: '. $email . "\r\n" .
			'X-Mailer: PHP/' . phpversion();
		mail($to, $subject, $message, $headers);
		*/
		// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= 'Noukhaiz Nadeem <noukhaiz@hotmail.com>' . "\r\n";
$headers .= 'From: '.$name.' <'.$email.'>' . "\r\n";
//$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
//$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";
// Mail it
//mail($too, $subject, $message, $headers);
		
		include('message.php');
		
	?>
	<script type="text/javascript">
 function closeWindow() {
    setTimeout(function() {
    window.close();
    }, 3000);
    }

    window.onload = closeWindow();
    </script>
	<center>
		<h3 style="font-family:Arial, Helvetica, sans-serif;">Thank you for sending your quiry, we will get back to you as soon as possible.<br>
<br>
<br>
Window will be closed in 2 seconds.</h3>
	</center>
	<?php 	
		exit();
		}
?>
<?php 

?>	

<!DOCTYPE html>

<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=euc-kr">

<title>www.USSTokyo.com Car Enquiry - <?php echo $cid['name'];?> - <?php echo $row['brands_id'];?></title>

<?php include('inc_head.php');?>
<?php include('inc_script.php');?>

<!-- slick css -->

<link rel="stylesheet" type="text/css" href="css/slick/slick.css" />

<link rel="stylesheet" type="text/css" href="css/slick/slick-theme.css" />

</head>




<body style="padding:30px;">
 <form action="<?php echo $_SERVER['PHP_SELF'];?>?id=<?php echo $_REQUEST['id'];?>" class="gray-form" method="post" enctype="multipart/form-data">	


			   

<div class="form-group">







<table width="100%" border="0">
  <tr>
    <td style="width:110px;"><h4>Vehicle: </h4></td>
    <td colspan="2"><h4><span  style="color:#c20003;"><?php echo $cid['name'];?> - <?php echo $row['brands_id'];?></span></h4></td>
  </tr>
  <tr>
    <td><h5>Stock ID: </h5></td>
    <td><h5><span  style="color:#c20003;"><?php echo $row['id'];?></span></h5></td>
	<td style="text-align:right;"><h5>E-mail: <span  style="color:#c20003;">info@usstokyo.com</span></h5></td>
  </tr>
  <tr>
  <td><h5>Price: </h5></td>
    <td><h5><span  style="color:#c20003;">&yen; <?php echo $row['price'];?></span></h5></td>
    <td style="text-align:right;"><h5>WhatsApp: <span  style="color:#c20003;">+81 80 1334 0786</span></h5></td>
	
  </tr>
</table>
<input type="hidden" class="form-control"  value="<?php echo $id;?>" name="car_id" required> 	



                </div>
				<div class="form-group">


                    <input type="text" class="form-control" placeholder="Name*" name="name" required>

                </div>				
<div class="form-group">


                    <input type="Email" class="form-control" placeholder="Email Address*" name="email" required>

                </div>
				
				<div class="form-group">


                    <input type="text" class="form-control" placeholder="Phone No*" name="mobile" required>

                </div>
				
				<div class="form-group">


                    <input type="text" class="form-control" placeholder="Address*" name="address" required>

                </div>

<div class="form-group">
            

<!--<input type="text" class="form-control" placeholder="England"  name="shipiing_contry" required>-->
<select name="shipiing_contry"  class="form-control"  required>
<option value="">Shipping Country*</option> 

<option value="Pakistan">Pakistan</option>
<option value="SriLanka">Sri Lanka</option>
<option value="Australia">Australia</option>
 <option value="Japan">Japan</option>
  <option value="" disabled="disabled">---------------</option>

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
    <option value="Pakistan">Pakistan</option>
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

                

                 

                 <div class="form-group">


                   <textarea class="form-control" rows="4" placeholder="Your Query* " name="comments" <?php echo $disabled ;?>></textarea>

                  </div>

                 <div class="form-group">


<button class="btn green button red" type="submit" <?php echo $disabled ;?> style="width:48%; float:left;">Submit</button>
<button class="btn green button red"  id="printPageButton"  onclick="javascript:window.close()" class="btn-print" style="width:48%; float:right;">Cancel</button>
                </div>

              </form>