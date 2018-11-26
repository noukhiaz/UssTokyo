<?php
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			//$headers .= 'Bcc: abdullahejaz435@gmail.com' . "\r\n";
			$headers .= 'From: <abdullahejaz435@gmail.com>'. "\r\n";
			$headers .='Reply-To: <wavesspeed@gmail.com> '."\r\n" ;
			//$to= " abdullahejaz435@gmail.com,wavesspeed@gmail.com ";
			//$to="omershafiq.cprods@gmail.com, muhammad.behzad.qureshi@gmail.com, noukhaiz@hotmail.com";
				



			if(!empty($_POST['taskin']))
			{

			$d=$_POST['datein'];
			$t=$_POST['timein'];
			$tas=$_POST['taskin'];

			$subject="Time In And Today's Task";
			$message="<b>Date : </b>".$d."<br><br>";
			$message.="<b>Time In : </b>".$t."<br><br>";
			$message.="<b>Today's Task : </b> <br> -".$tas."<br>";
			$a=mail( $to,$subject, $message, $headers);
			}	


			else if (!empty($_POST['taskprogress']))
			{

			$d=$_POST['dateout'];
			$t=$_POST['timeout'];
			$tas=$_POST['taskout'];
			$tasd=$_POST['taskdone'];
			$tasp=$_POST['taskprogress'];

			$subject="Time Out And Status";
			$message="<b>Date : </b>".$d."<br><br>";
			$message.="<b>Time Out : </b>".$t."<br><br>";
			$message.="<b>Today's Task : </b> <br> -".$tas."<br><br>";
			$message.="<b>Task's Done : </b> <br> -".$tasd."<br><br>";
			$message.="<b>Task's In Progress : </b> <br> -".$tasp."<br><br>";
			$b=mail( $to,$subject, $message, $headers);

			}
			
			


			date_default_timezone_set('Asia/Karachi');
		
?>

<!DOCTYPE html>
<html>
<body>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

Date <input type="text" name="datein" value="<?php echo $date = date('d-m-Y');?>" ><br>
Time <input type="text" name="timein" value="<?php echo $date = date('h:i: A');?>" ><br>
Today's Task <input type="textarea" name="taskin" ><br>
<input type="submit" value="Check-IN" name="a"><?php if($a){echo "Check-IN E-mail Sent Successfully";}?><br><br>  

Date <input type="text" name="dateout" value="<?php echo $date = date('d-m-Y');?>" ><br>
Time <input type="text" name="timeout" value="<?php echo $date = date('h:i: A');?>"  ><br>
Today's Task <input type="text" name="taskout" ><br>
Task Done<input type="text" name="taskdone" ><br>
Task In-Progress<input type="text" name="taskprogress" ><br>
<input type="submit" value="Check-OUT">

<?php if($b){echo "Check-OUT E-mail Sent Successfully";}?>
</form>

<p></p>

</body>
</html>