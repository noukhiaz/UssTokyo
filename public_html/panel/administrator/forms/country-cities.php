<?php 
$page_name = 'cities';
$current_page = 'add_cities';
$table_name = 'countries_cities';
if(isset($_POST['submit'])){
$name = $_POST['name'];
$country_id = $_POST['country_id'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$is_active = $_POST['is_active'];
$date = time();
//print_r($_POST); // 'form posted';
	if($_POST['form_typo'] != 'edit'){
$result = mysql_query("SELECT * FROM countries_cities where name = '$name'");
$num_rows = mysql_num_rows($result);
//echo $num_rows;
			if($num_rows <= '0')
				{
						mysql_query("INSERT INTO countries_cities set 
						`name` = '$name',
		`country_id` = '$country_id',
        `latitude` = '$latitude',
        `longitude` = '$longitude',
		`is_active` = '$is_active',	
		`province_id` = '0',					
						`reg_date` = '$date'
						");
						$success = '1';
						//echo $success ;
				?><meta http-equiv="refresh" content="0;URL='index.php?p=<?php echo $page_name;?>'" /><?php 
				}
			else
				{
					$success = '3';
				}
	}
	else
	{
		$uid = $_POST['uid'];
		mysql_query("UPDATE $table_name set 
		`name` = '$name',
		`country_id` = '$country_id',
        `latitude` = '$latitude',
        `longitude` = '$longitude',
		`is_active` = '$is_active'
		WHERE id = '$uid'
		");
		$success = '2';
		?><meta http-equiv="refresh" content="2;URL='index.php?p=<?php echo $page_name;?>'" /><?php 
	}
}
?>
<?php if(isset($_GET['edit'])){
$form_type = 'edit';
$id = $_GET['id'];
$sql = mysql_query("SELECT * FROM $table_name where id = '$id' AND is_active = '1'");
$row = mysql_fetch_assoc($sql);
//echo $row['id'];
} else {$form_type = 'add';}?>	

<div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN VALIDATION STATES-->
                            <div class="portlet light portlet-fit portlet-form bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <span class="caption-subject font-dark bold uppercase">
										<?php if(isset($_GET['edit'])){echo "Edit City";}else{echo 'Add new City';}?>
										
										</span>
                                    </div>
                                   
                                </div>
                                <div class="portlet-body">
                                    <!-- BEGIN FORM-->

								



 <form  action="index.php?p=<?php echo $current_page;?><?php if(isset($_GET['edit'])){echo "&id=".$row['id']."&edit=1";}?>" method="post" id="form_sample_2" class="form-horizontal">

								
                                        <div class="form-body">
<?php include("form-alerts.php");?>
<input type="hidden" name="uid" <?php if(isset($_GET['edit'])){echo "value=".$row['id']."";}?>>	
                                            <div class="form-group  margin-top-20">
                                                <label class="control-label col-md-3">City Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                    
	<input type="text" class="form-control" name="name" <?php if(isset($_GET['edit'])){echo "value=".$row['name']."";}?> /> 
														
														</div>
                                                </div>
                                            </div>


<div class="form-group  margin-top-20">
                                                <label class="control-label col-md-3">Latitude
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                    
    <input type="text" class="form-control" name="latitude" <?php if(isset($_GET['edit'])){echo "value=".$row['latitude']."";}?> /> 
                                                        
                                                        </div>
                                                </div>
                                            </div>

<div class="form-group  margin-top-20">
                                                <label class="control-label col-md-3">Longitude
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                    
    <input type="text" class="form-control" name="longitude" <?php if(isset($_GET['edit'])){echo "value=".$row['longitude']."";}?> /> 
                                                        
                                                        </div>
                                                </div>
                                            </div>                                            


											 <div class="form-group ">
                                                <label class="control-label col-md-3">Country
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                    


<select class="form-control" name="country_id" required>
	<option value="">Select...</option>
	<?php if(isset($_GET['edit'])){
	$country_id = $row['country_id'];
	$countries_id = mysql_query("select * from countries where id = '$country_id'");
	$rows = mysql_fetch_assoc($countries_id);
	?>
	<option value="<?php echo $rows['id'];?>" selected="selected"><?php echo $rows['name'];?></option>
	<?php }?>
	<?php 
	$region = mysql_query("select * from countries  where is_active = '1'");
	while($rows = mysql_fetch_array($region)){		?>
	<option value="<?php echo $rows['id'];?>"><?php echo $rows['name'];?></option>
	<?php }?>
</select>
														
														</div>
                                                </div>
                                            </div>
											
											<div class="form-group">
                                                <label class="control-label col-md-3">Status
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="mt-radio-list" data-error-container="#form_2_membership_error">
														<label class="mt-radio">
                                                            <input type="radio" name="is_active" value="1" <?php if(isset($_GET['edit'])){ if($row['is_active'] == '1'){echo 'checked="checked"';}}?>  required> Active
                                                            <span></span>
                                                        </label>
                                                        <label class="mt-radio">
                                                            <input type="radio" name="is_active" value="0" <?php if(isset($_GET['edit'])){ if($row['is_active'] == '0'){echo 'checked="checked"';}}?> required> De-Active
                                                            <span></span>
                                                        </label>
                                                        
                                                    </div>
                                                </div>
                                            </div>
										   <!--
										<div class="form-group last">
                                                <label class="control-label col-md-3">CKEditor
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                    <textarea class="ckeditor form-control" name="editor2" rows="6" data-error-container="#editor2_error"></textarea>
                                                    <div id="editor2_error"> </div>
                                                </div>
                                            </div>-->
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
												<input type="submit" value="Submit" name="submit" class="btn green">
                                                   <!-- <button type="submit" class="btn green">Submit</button>-->
                                                    <a href="index.php?p=<?php echo $page_name;?>" type="button" class="btn default">Cancel</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- END FORM-->
                                </div>
                            </div>
                            <!-- END VALIDATION STATES-->
                        </div>
						
						
						
                    </div>
                    <!-- END PAGE BASE CONTENT -->
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
        <?php include('form-js.php');?>
   