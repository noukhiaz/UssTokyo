<?php //include('time.php');
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
?>
<?php
//$q = intval($_GET['q']);
//echo $q;
/*


$sql="SELECT * FROM user WHERE id = '".$q."'";
$result = mysqli_query($con,$sql);
*/
?>

<?php //$query = $_GET['q']; echo 'Asad';?>
<div class="politics box">	
<input type="text" class="form-control" name="category"  value="2" />
<input type="text" class="form-control" name="optionbb" <?php if(isset($_GET['edit'])){echo "value=".$row['optiona']."";}?> > 
</div>					
					
					
<div class="terror box">	
<!--<input type="text" class="form-control" name="category"  <?php if(isset($_GET['edit'])){?> value="<?php echo $row['category'];}else{echo 'value="1"'; }?>"/>-->
<input type="text" class="form-control" name="category"  value="1" />
					
<div class="col-md-6">

<div class="form-group">
<label class="control-label col-md-4">Claimed by
 <span class="required"> * </span>
</label>
<div class="col-md-8">
 <div class="input-icon right">
<i class="fa"></i>
<?php



//echo $pieces[0]; // piece1

	?>

	<select class="form-control" name="option_multia[]" multiple>
		
<?php if(isset($_GET['edit'])){
	
	$claimedby = $row['option_multia'];
	$multi_a = explode(',', $claimedby);
	foreach($multi_a as $multiple_values){
    $claimedby = $multiple_values;  
	$claimedby = mysql_query("select * from perpetrator_groups where id = '$claimedby'");
	$rowses_claim = mysql_fetch_assoc($claimedby);
	?>
	<option value="<?php echo $rowses_claim['id'];?>" selected="selected"><?php echo $rowses_claim['name'];?></option>
	<?php  }?>
	
	<option value="" disabled="disabled">------------------------------------</option>
	<?php }
	else{?>			<option value="" selected="selected">Select...</option><?php }?>
<?php  $sql_claim = mysql_query("SELECT * from perpetrator_groups where is_active = '1' order by id desc");
while($row_claim = mysql_fetch_array($sql_claim)){?>
<option value="<?php echo $row_claim['id'];?>"><?php echo $row_claim['name'];?></option>
<?php }?>	
</select>
</div>
</div>
</div>


<div class="form-group">
<label class="control-label col-md-4">Victims
 <span class="required"> * </span>
</label>
<div class="col-md-8">
 <div class="input-icon right">
<i class="fa"></i>
<input type="text" class="form-control" name="optiona" <?php if(isset($_GET['edit'])){echo "value=".$row['optiona']."";}?> > 
</div>
</div>
</div>


<div class="form-group">
<label class="control-label col-md-4">Wounded
 <span class="required"> * </span>
</label>
<div class="col-md-8">
 <div class="input-icon right">
<i class="fa"></i>
<input type="text" class="form-control" name="optionb" <?php if(isset($_GET['edit'])){echo "value=".$row['optionb']."";}?> /> 
</div>
</div>
</div>




</div>
<div class="col-md-6">



















<div class="form-group">
<label class="control-label col-md-4">Target Type
 <span class="required"> * </span>
</label>
<div class="col-md-8">
 <div class="input-icon right">
<i class="fa"></i>
	<select class="form-control" name="option_multib[]" multiple="multiple">
		<option value="">Select...</option>
<?php if(isset($_GET['edit'])){
	$option_multib = $row['option_multib'];
	$multi_b = explode(',', $option_multib);
	foreach($multi_b as $multipleb_values){
    $targets = $multipleb_values;  
	$targets = mysql_query("select * from target_types where id = '$targets'");
	$rows = mysql_fetch_assoc($targets);
	?>
	<option value="<?php echo $rows['id'];?>" selected="selected"><?php echo $rows['name'];?></option>
	<?php  }?>
	<?php }?>
	<option value="" disabled="disabled">------------------------------------</option>		
<?php  $sqlee = mysql_query("SELECT * from target_types where is_active = '1' order by id desc");
while($rowee = mysql_fetch_array($sqlee)){?>
<option value="<?php echo $rowee['id'];?>"><?php echo $rowee['name'];?></option>
<?php }?>		
	</select>
</div>
</div>
</div>

<div class="form-group">
<label class="control-label col-md-4">Modus Operadi
 <span class="required"> * </span>
</label>
<div class="col-md-8">
 <div class="input-icon right">
<i class="fa"></i>
	<select class="form-control" name="option_multic[]" multiple="multiple">
		<option value="">Select...</option>
<?php if(isset($_GET['edit'])){
	$modus_id = $row['option_multic'];
	$multi_c = explode(',', $modus_id);
	foreach($multi_c as $multiplec_values){
    $modus_idc = $multiplec_values;
	$modus = mysql_query("select * from modus where id = '$modus_idc'");
	$rowsss = mysql_fetch_assoc($modus);
	?>
	<option value="<?php echo $rowsss['id'];?>" selected="selected"><?php echo $rowsss['name'];?></option>
	
	<?php  }?>
	<option value="" disabled="disabled">------------------</option>
	<?php }?>
<?php  $sqlfe = mysql_query("SELECT * from modus where is_active = '1' order by id desc");
while($rowse = mysql_fetch_array($sqlfe)){?>
<option value="<?php echo $rowse['id'];?>"><?php echo $rowse['name'];?></option>
<?php }?>	
	</select>
</div>
</div>
</div>


<div class="form-group">
<label class="control-label col-md-4">Nature of Attack
 <span class="required"> * </span>
</label>
<div class="col-md-8">
 <div class="input-icon right">
<i class="fa"></i>
	<select class="form-control" name="optionc">
		<option value="">Select...</option>
<?php if(isset($_GET['edit'])){
	$nature = $row['optionc'];
	$nature = mysql_query("select * from nature_types where id = '$nature'");
	$rowses = mysql_fetch_assoc($nature);
	?>
	<option value="<?php echo $rowses['id'];?>" selected="selected"><?php echo $rowses['name'];?></option>
	<option value="" disabled="disabled">------------------</option>
	<?php }?>
			
<?php  $sqlff = mysql_query("SELECT * from nature_types where is_active = '1' order by id desc");
while($rowesee = mysql_fetch_array($sqlff)){?>
<option value="<?php echo $rowesee['id'];?>"><?php echo $rowesee['name'];?></option>
<?php }?>	
</select>
</div>
</div>
</div>

				</div>

</div>




<!----------------------------------------------------------------------------------------->

















