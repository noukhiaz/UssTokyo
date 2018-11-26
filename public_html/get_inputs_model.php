<?php 
include('config.php');
include('inc_head.php');
$q = intval($_GET['m']);
echo $q ;
?>

<?php
//echo $q;
$arr = aj_get("select model_id,model_name from main where marka_name='".$_GET['m']."' group by model_name order by model_name",60,0); // 1=>debug
  //prn($arr);
?>
<select name="model_name" onchange="showModel(this.value)">
<option value="0" selected="selected">Select Model</option>
<?php 
	 foreach($arr as $v) {
	?>
<option value="<?php echo $v['MODEL_NAME'];?>"><?php echo $v['MODEL_NAME'];?></option>
<?php }?>
</select>
<br>
<div id="txtmodel"><b>Person info will be listed here...</b></div>