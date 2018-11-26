<?php include('inc_nt_login.php');
		include('panel/config.php');
		include('inc_head.php');	
		$q = intval($_GET['q']);	
?>

<?php
//echo $q;
$arr = aj_get("select model_id,model_name from main where marka_name='".$_GET['q']."' group by model_name order by model_name",60,0); // 1=>debug
  //prn($arr);
?>
<select name="model" size="20"  onchange="showModel(this.value)">
<option value="0" selected="selected">Select Model</option>
<?php 
	 foreach($arr as $v) {
	?>
<option value="<?php echo $v['MODEL_NAME'];?>"><?php echo $v['MODEL_NAME'];?></option>
<?php }?>
</select>