<?php
include('../config.php');
//include('time.php');
/*
optiona
optionb
optionc
optiond
optione
optionf
option_multia ------------ for multiple selection
option_multib ------------ for multiple selection 
option_multic ------------ for multiple selection 
option_multid ------------ for multiple selection 
option_multie ------------ for multiple selection 
option_multif ------------ for multiple selection 
*/
if(isset($_GET['edit'])){
$table_name = 'incidents';
$id = $_GET['id'];
$sql = mysql_query("SELECT * FROM $table_name where id = '$id'");
$row = mysql_fetch_assoc($sql);
}
$cont_id = intval($_GET['q']);
?>
<!---------------------------------------------------------------------------------------------------------------------------------->

<div class="form-group">
<label class="control-label col-md-4">Province
 <span class="required"> * </span>
</label>
<div class="col-md-8">
 <div class="input-icon right">
<i class="fa"></i>
	<select class="form-control" name="province_id" required>
		
<?php if(isset($_GET['edit'])){
	$province_id = $row['province_id'];
	$province_id = mysql_query("select * from countries_province where id = '$province_id'  AND country_id = '$cont_id'");
	$rowses_province = mysql_fetch_assoc($province_id);
	?>
	<option value="<?php echo $rowses_province['id'];?>"><?php echo $rowses_province['name'];?></option>
	<option value="" disabled="disabled">------------------</option>
	<?php }else{?>			
	<option value="">Select...</option>
	<?php }?>
<?php  $sqlaaa = mysql_query("SELECT * from countries_province where is_active = '1' AND country_id = '$cont_id' order by name Asc");
while($rowaaa = mysql_fetch_array($sqlaaa)){?>
<option value="<?php echo $rowaaa['id'];?>"><?php echo $rowaaa['name'];?></option>
<?php }?>	
</select>
</div>
</div>
</div>


<div class="form-group">
<label class="control-label col-md-4">City
 <span class="required"> * </span>
</label>
<div class="col-md-8">
 <div class="input-icon right">
<i class="fa"></i>
	<select class="form-control" name="city_id" required>
<?php if(isset($_GET['edit'])){
	$city_id = $row['city_id'];
	$city_id = mysql_query("select * from countries_cities where id = '$city_id'  AND country_id = '$cont_id'");
	$rowses_city = mysql_fetch_assoc($city_id);
	?>
	<option value="<?php echo $rowses_city['id'];?>"><?php echo $rowses_city['name'];?></option>
	<option value="" disabled="disabled">------------------</option>
	<?php }else{?>			
	<option value="">Select...</option>
	<?php }?>		
<?php  $sql_cit = mysql_query("SELECT * from countries_cities where is_active = '1' AND country_id = '$cont_id' order by name Asc");
while($row_cit = mysql_fetch_array($sql_cit)){?>
<option value="<?php echo $row_cit['id'];?>"><?php echo $row_cit['name'];?></option>
<?php }?>	
</select>
</div>
</div>
</div>
<!---------------------------------------------------------------------------------------------------------------------------------->

















