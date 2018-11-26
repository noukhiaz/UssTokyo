


<?php

		$message ="<html><head><style>";
		$message.="p {";
     	$message.="margin-left: 40px;";
     	$message.="font-family: Sans-serif;";
     	$message.="font-size: 17px;";
		$message.="}";
		$message.="</style>";
		$message.="</head><body>";
		$message.="<h2> Dear Mr / Ms ". $name." </h2>";
		$message.="<br>";
		$message.="<p>Welcome to the <b><a href='https://www.usstokyo.com'>UssTokyo.com</a></b> Family. We are the world's leading new and used car(s) exporters.<br><br>";

		$message.="We wish this Endeavour be fruitful for you. We will strive to the best of our capabilities to make this relationship everlasting.<br><br>";

		$message.="<b>A company can only survive with the love and support it receives from its customers. At <b><a href='https://www.usstokyo.com'> UssTokyo.com </a></b>, customer first is and will always be the policy. </b><br><br>";

		$message.="This company has been created with sweat and passion. You will see glimpses of it through our services. <br><br>";

		$message.="We look forward to doing a healthy transaction with you.<br><br><br>";

		$message.="<b>Here's how we can help you buy your car(s):</b> <br><br>";
		

		$message.="<b>1-</b> Please go through our <b><a href='https://www.usstokyo.com/stock'> Stock List </a></b> for any car(s) you would like to buy. (Please note that our stock might be country-specific)<br>";
		 $message.="<b>2-</b> If you could not see your required car(s) in our stock list then please, <b><a href='https://www.usstokyo.com/contact'> Contact us </a></b> and let us know your desired vehicle with model and all other specifications and we will get back to you ASAP.<br>";
		$message.="<b>3-</b> If you wish to buy directly from the <b><a href='https://www.usstokyo.com/search'> Auction </a></b> in Japan, please email us back and we will help you have access to the Japanese auctions where you can bid on the car(s) yourself (100,000 Yen deposit required for auction house access).<br>";
		$message.="<b>4-</b> Please note that Our Team will take care of everything from buying the car(s) to delivering it to your door step(Sound's Amazing?). Our experts inspect all car(s) before we buy from the auctions. We make sure that the car(s) is up to your expectations. We then ship the car(s) to your desired country and port.<br>";
		$message.="<b>5-</b> After the ship embarks for your port with your car(s), we deliver all the required documents through DHL right at your doorstep.<br><br>";
		$message.="If you have any other Queries you know where to find us. Our expert time is available 24/7 to answer all queries that you might have at:   info@UssTokyo.com<br><br><br>";
		$message.="On behalf of the CEO and our team, we wish you again a very hearty welcome.<br><br><br>";
		$message.="<b>Best Regards</b><br><br>";
		$message.="<b>Team UssTokyo.com</b><br></p>";
		// $message.="<br>";
		$message.="</body></html>";




		//$to      = 'abdullahejaz435@gmail.com';
		$subject = 'Hi, FROM USSTOKYO.COM';
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";



	//$to = "to@to.com";
	$from = "info@UssTokyo.com";
	//$subject = "subject";
	//$message = "this is the message body";

	$headers .= "From: $from"; 
	$ok = mail($email, $subject, $message, $headers, "-f " . $from);

	if($ok==false)
		{echo " Something Went Wrong";}


	// Mail it
	//mail($to, $subject, $message, $headers);


?>