<?php include('../../config.php');?>
<?php $pid = $_GET['q'];
//echo $pid;

?>




<select  class="form-control" name="car_id" >
<option value="0" selected="selected">Select Cars</option>
<?php 
	$cars = mysql_query("select * from winingcars where user_id = '$pid'");
	while($row_cars = mysql_fetch_array($cars))
	{
	?>
<option value="<?php echo $row_cars['id'];?>">[<?php echo $row_cars['id'];?>] <?php echo $row_cars['make'];?> <?php echo $row_cars['name'];?> </option>
<?php }?>

<option value="0" disabled="disabled">--------------</option>
<option value="1">BOOKING</option>
<option value="2">SECURITY DEPOSIT</option>
</select>
