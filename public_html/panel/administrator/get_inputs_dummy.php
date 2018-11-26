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
$cat_id = intval($_GET['id']);
if($cat_id == '1'){
?>
<!---------------------------------------------------------------------------------------------------------------------------------->
<div>						
<div class="col-md-6">

<div class="form-group">
<label class="control-label col-md-4">Modus Operandi
 <span class="required"> * </span>
</label>
<div class="col-md-8">
 <div class="input-icon right">
<i class="fa"></i>
	<select class="form-control" name="option_multic[]" multiple="multiple">
		
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
<?php  $sqlfe = mysql_query("SELECT * from modus where is_active = '1' order by name Asc");
while($rowse = mysql_fetch_array($sqlfe)){?>
<option value="<?php echo $rowse['id'];?>"><?php echo $rowse['name'];?></option>
<?php }?>	
	</select>
</div>
</div>
</div>



<div class="form-group">
<label class="control-label col-md-4">Perpetrator
 <span class="required"> * </span>
</label>
<div class="col-md-8">
 <div class="input-icon right">
<i class="fa"></i>
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
	<?php }?>
<?php  $sql_claim = mysql_query("SELECT * from perpetrator_groups where is_active = '1' order by name Asc");
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
<input type="number" class="form-control" name="optiona" <?php if(isset($_GET['edit'])){echo "value=".$row['optiona']."";}?> > 
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
<input type="number" class="form-control" name="optionb" <?php if(isset($_GET['edit'])){echo "value=".$row['optionb']."";}?> /> 
</div>
</div>
</div>




</div>
<div class="col-md-6">


<div class="form-group">
<label class="control-label col-md-4">Terrorists Target
 <span class="required"> * </span>
</label>
<div class="col-md-8">
 <div class="input-icon right">
<i class="fa"></i>
	<select class="form-control" name="option_multib[]" multiple="multiple">
		
<?php if(isset($_GET['edit'])){
	$option_multib = $row['option_multib'];
	$multi_b = explode(',', $option_multib);
	foreach($multi_b as $multipleb_values){
    $targets = $multipleb_values;  
	$targets = mysql_query("select * from target_types where id = '$targets'");
	$rows = mysql_fetch_assoc($targets);
	?>
	<option value="<?php echo $rows['id'];?>" selected="selected"><?php echo $rows['name'];?></option>
	<?php  }?><option value="" disabled="disabled">------------------------------------</option>	
	<?php }?>
		
<?php  $sqlee = mysql_query("SELECT * from target_types where is_active = '1' order by name Asc");
while($rowee = mysql_fetch_array($sqlee)){?>
<option value="<?php echo $rowee['id'];?>"><?php echo $rowee['name'];?></option>
<?php }?>		
	</select>
</div>
</div>
</div>




<div class="form-group">
<label class="control-label col-md-4">For Casualties & Injured
 <span class="required"> * </span>
</label>
<div class="col-md-8">
 <div class="input-icon right">
<i class="fa"></i>


<select class="form-control" name="option_multic[]" multiple="multiple">
		
<?php if(isset($_GET['edit'])){
	$option_multic = $row['option_multic'];
	$multi_c = explode(',', $option_multic);
	foreach($multi_c as $multipleb_values){
    $nature = $multipleb_values;  
	$nature = mysql_query("select * from nature_types where id = '$nature'");
	$rowses = mysql_fetch_assoc($nature);
	?>
	<option value="<?php echo $rows['id'];?>" selected="selected"><?php echo $rowses['name'];?></option>
	<?php  }?><option value="" disabled="disabled">------------------------------------</option>	
	<?php }?>
		
<?php  $sqlff = mysql_query("SELECT * from nature_types where is_active = '1' order by name Asc");
while($rowesee = mysql_fetch_array($sqlff)){?>
<option value="<?php echo $rowesee['id'];?>"><?php echo $rowesee['name'];?></option>
<?php }?>		
	</select>



</div>
</div>
</div>

</div>

</div>


<?php }?>

<!---------------------------------------------------------------------------------------------------------------------------------->

















