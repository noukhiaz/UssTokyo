<?php
include('../config.php');
/*if(isset($_GET['edit'])){
$table_name = 'incidents';
$id = $_GET['id'];
$sql = mysql_query("SELECT * FROM $table_name where id = '$id'");
$row = mysql_fetch_assoc($sql);
}*/
$brands_id = intval($_GET['q']);
//echo intval($_GET['q']);
//if($cat_id == '1'){
	
?>
<!---------------------------------------------------------------------------------------------------------------------------------->

<div class="form-group">
<label class="control-label col-md-4">Car Name <span class="required"> * </span></label>
    <div class="col-md-8">
        <div class="input-icon right">
        <i class="fa"></i>
        <select class="form-control" name="brands_id" >	
        <option value="" disabled="disabled" selected="selected">Select</option>
            
            <?php  $sqlfe = mysql_query("SELECT * from brands where  parent_company = '$brands_id' AND is_active = '1' order by name Asc");
            while($rowse = mysql_fetch_array($sqlfe)){?>
            <option value="<?php echo $rowse['id'];?>"><?php echo $rowse['name'];?></option>
            <?php }?>	
        </select>
        </div>
    </div>
</div>












<!---------------------------------------------------------------------------------------------------------------------------------->

















