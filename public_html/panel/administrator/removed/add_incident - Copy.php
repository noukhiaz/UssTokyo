<?php 
$page_name = 'incidents';
$current_page = 'add_incident';
$table_name = 'incidents';
if(isset($_POST['submit'])){
$name = $_POST['name'];
$description = $_POST['description'];
$incident_date = $_POST['incident_date'];
$city_id = $_POST['city_id'];
$category = $_POST['category'];
$country_id = $_POST['country_id'];
$province_id = $_POST['province_id'];
$address = $_POST['address'];
$incident_time = $_POST['incident_time'];
$is_active = $_POST['is_active'];
if(isset($_POST['sourcea'])){$sourcea = $_POST['sourcea'];}else{ $sourcea = '';}
if(isset($_POST['type_playa'])){$type_playa = $_POST['type_playa'];}else{ $type_playa = '';}
if(isset($_POST['sourceb'])){$sourceb = $_POST['sourceb'];}else{ $sourceb = '';}
if(isset($_POST['type_playb'])){$type_playb = $_POST['type_playb'];}else{ $type_playb = '';}
if(isset($_POST['sourcec'])){$sourcec = $_POST['sourcec'];}else{ $sourcec = '';}
if(isset($_POST['type_playc'])){$type_playc = $_POST['type_playc'];}else{ $type_playc = '';}
////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['optiona'])){$optiona = $_POST['optiona'];}else{ $optiona = '';}
if(isset($_POST['optionb'])){$optionb = $_POST['optionb'];}else{ $optionb = '';}
if(isset($_POST['optionc'])){$optionc = $_POST['optionc'];}else{ $optionc = '';}
if(isset($_POST['optiond'])){$optiond = $_POST['optiond'];}else{ $optiond = '';}
if(isset($_POST['optione'])){$optione = $_POST['optione'];}else{ $optione = '';}
if(isset($_POST['optionf'])){$optione = $_POST['optionf'];}else{ $optionf = '';}
////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['option_multia'])){$option_multias = $_POST['option_multia']; $option_multia = mysql_real_escape_string(join(', ',$option_multias));}else{ $option_multia = '';}
if(isset($_POST['option_multib'])){$option_multibs = $_POST['option_multib']; $option_multib = mysql_real_escape_string(join(', ',$option_multibs));}else{ $option_multib = '';}
if(isset($_POST['option_multic'])){$option_multics = $_POST['option_multic']; $option_multic = mysql_real_escape_string(join(', ',$option_multics));}else{ $option_multic = '';}
if(isset($_POST['option_multid'])){$option_multids = $_POST['option_multid']; $option_multid = mysql_real_escape_string(join(', ',$option_multids));}else{ $option_multid = '';}
if(isset($_POST['option_multie'])){$option_multies = $_POST['option_multie']; $option_multie = mysql_real_escape_string(join(', ',$option_multies));}else{ $option_multie = '';}
if(isset($_POST['option_multif'])){$option_multifs = $_POST['option_multif']; $option_multif = mysql_real_escape_string(join(', ',$option_multifs));}else{ $option_multif = '';}
////////////////////////////////////////////////////////////////////////////////
$send_email = $_POST['send_email'];
$date = time();
print_r($_POST); // 'form posted';
	if($_POST['form_typo'] != 'edit'){
$result = mysql_query("SELECT * FROM $table_name where name = '$name'");
$num_rows = mysql_num_rows($result);
			if($num_rows <= '0')
				{
						mysql_query("INSERT INTO $table_name set 
						`name` = '$name',
						`description` = '$description',
						`incident_date` = '$incident_date',
						`incident_time` = '$incident_time',
						`city_id` = '$city_id',
						`optiona` = '$optiona',
						`optionb` = '$optionb',
						`optionc` = '$optionc',
						`optiond` = '$optiond',
						`optione` = '$optione',
						`optionf` = '$optionf',
						`option_multia` = '$option_multia',
						`option_multib` = '$option_multib',
						`option_multic` = '$option_multic',
						`option_multid` = '$option_multid',
						`option_multie` = '$option_multie',
						`option_multif` = '$option_multif',
						`category` = '$category',
						`country_id` = '$country_id',
						`province_id` = '$province_id',
						`address` = '$address',
						`sourcea` = '$sourcea',
						`type_playa` = '$type_playa',
						`sourceb` = '$sourceb',
						`type_playb` = '$type_playb',
						`sourcec` = '$sourcec',
						`type_playc` = '$type_playc',
						`send_email` = '$send_email',
						`is_active` = '$is_active',
						`reg_date` = '$date'
						");
						$success = '1';
				?><!--<meta http-equiv="refresh" content="2;URL='index.php?p=<?php echo $page_name;?>'" />--><?php 
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
						`description` = '$description',
						`incident_date` = '$incident_date',
						`incident_time` = '$incident_time',
						`city_id` = '$city_id',
						`optiona` = '$optiona',
						`optionb` = '$optionb',
						`optionc` = '$optionc',
						`optiond` = '$optiond',
						`optione` = '$optione',
						`optionf` = '$optionf',
						`option_multia` = '$option_multia',
						`option_multib` = '$option_multib',
						`option_multic` = '$option_multic',
						`option_multid` = '$option_multid',
						`option_multie` = '$option_multie',
						`option_multif` = '$option_multif',
						`category` = '$category',
						`country_id` = '$country_id',
						`province_id` = '$province_id',
						`address` = '$address',
						`sourcea` = '$sourcea',
						`type_playa` = '$type_playa',
						`sourceb` = '$sourceb',
						`type_playb` = '$type_playb',
						`sourcec` = '$sourcec',
						`type_playc` = '$type_playc',
						`send_email` = '$send_email',
						`is_active` = '$is_active'
		WHERE id = '$uid'
		");
		$success = '2';
		?><!--<meta http-equiv="refresh" content="2;URL='index.php?p=<?php echo $page_name;?>'" />--><?php 
	}
}
?>
<style>
.mt-radio {
float:left;
padding-right:10px;
}
</style>
<?php if(isset($_GET['edit'])){
$form_type = 'edit';
$id = $_GET['id'];
$sql = mysql_query("SELECT * FROM $table_name where id = '$id'");
$row = mysql_fetch_assoc($sql);
//echo $row['id'];
} else {$form_type = 'add';}?>	


<script>
function showCat(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getuser.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>



<style type="text/css">
    .box{
        display: none;
    }
    .red{ background: #ff0000; }
    .green{ background: #228B22; }
    .blue{ background: #0000ff; }
</style>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
/*$(document).ready(function(){
    $("#select").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue){
                $(".box").not("." + optionValue).hide();
                $("." + optionValue).show();
            } else{
                $(".box").hide();
            }
        });
    }).change();
});
*/
/*
$(document).ready(function(){
    $("#select").change(function(){
        $(this).find("option:selected").each(function(){
            if($(this).attr("value")=="politics"){
                $(".box").not(".politics").hide();
                $(".politics").show();
            }
            else if($(this).attr("value")=="terror"){
                $(".box").not(".terror").hide();
                $(".terror").show();
            }
            else{
                $(".box").hide();
            }
        });
    }).change();
});*/
</script>



<!--------------------Time------------------------------------>
		 <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="../assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/clockface/css/clockface.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
	
	

<div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN VALIDATION STATES-->
                            <div class="portlet light portlet-fit portlet-form bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-user font-green"></i>
                                        <span class="caption-subject font-green bold uppercase">
										<?php if(isset($_GET['edit'])){echo "Edit Incident";}else{echo 'Add new Incident';}?>
										
										</span>
                                    </div>
                                   
                                </div>
                                <div class="portlet-body">
                                    <!-- BEGIN FORM-->
 <form  action="index.php?p=<?php echo $current_page;?><?php if(isset($_GET['edit'])){echo "&id=".$row['id']."&edit=1";}?>" method="post" id="form_sample_2" class="form-horizontal">

								
                                        <div class="form-body">
<?php include("form-alerts.php");?>
<input type="hidden" name="uid" <?php if(isset($_GET['edit'])){echo "value=".$row['id']."";}?>>	
                                            
											
											
<!-- Column left Start-->	
<div class="col-md-12">




<div class="form-group">
<label class="control-label col-md-2">Title
 <span class="required"> * </span>
</label>
<div class="col-md-10">
 <div class="input-icon right">
<i class="fa"></i>
<input type="text" class="form-control" name="name" <?php if(isset($_GET['edit'])){?> value="<?php echo $row['name'];}?>" />

</div>
</div>
</div>


<div class="form-group">
<label class="control-label col-md-2">Description
 <span class="required"> * </span>
</label>
<div class="col-md-10">
 <div class="input-icon right">
<i class="fa"></i>
<!--<textarea cols="45" rows="10" ></textarea>-->
 <textarea class="ckeditor form-control" name="description" rows="6" data-error-container="#editor2_error"><?php if(isset($_GET['edit'])){echo $row['description'];}?></textarea>
</div>
</div>
</div>












</div>
<!-- Column left END -->






<div>
	<div class="col-md-12">
		<div class="form-group">
		<label class="control-label col-md-2">Category
		 <span class="required"> * </span>
		</label>
				<div class="col-md-10">
				 <div class="input-icon right">
				<i class="fa"></i>
				<!--<?php //echo $row['category'];?>
					<select class="form-control " name="categorya" id="select" required>
						<option value="">Select...</option>
				<?php 
				
				if(isset($_GET['edit'])){
					$category = $row['category'];
					$category = mysql_query("select * from categories where id = '$category'");
					$rowses_cat = mysql_fetch_assoc($category);
					?>
					<option value="<?php echo $rowses_cat['short_name'];?>" selected="selected"><?php echo $rowses_cat['name'];?></option>
					<option value="" disabled="disabled">------------------</option>
					<?php }?>		
				<?php  $sql_cat = mysql_query("SELECT * from categories where is_active = '1' order by id Asc");
				while($row_cat = mysql_fetch_array($sql_cat)){?>
				<option value="<?php echo $row_cat['short_name'];?>"><?php echo $row_cat['name'];?></option>
				<?php }?>	
				</select>
				-->
<select class="form-control " name="category" onchange="showCat(this.value)">
<option value="">Select...</option>
				<?php 
				
				if(isset($_GET['edit'])){
					$category = $row['category'];
					$category = mysql_query("select * from categories where id = '$category'");
					$rowses_cat = mysql_fetch_assoc($category);
					?>
					<option value="<?php echo $rowses_cat['id'];?>" selected="selected"><?php echo $rowses_cat['name'];?></option>
					<option value="" disabled="disabled">------------------</option>
					<?php }?>		
				<?php  $sql_cat = mysql_query("SELECT * from categories where is_active = '1' order by id Asc");
				while($row_cat = mysql_fetch_array($sql_cat)){?>
				<option value="<?php echo $row_cat['id'];?>"><?php echo $row_cat['name'];?></option>
				<?php }?>	
  </select>
				</div>
				</div>
		</div>
</div>




	
	















<div class="col-md-12">

<?php //include('incident_inputs.php');?>
<div id="txtHint"></div>
</div>










<!-- Column left START -->
<div class="col-md-6">












<div class="form-group">
<label class="control-label col-md-4">Incident Date <span class="required"> * </span>
</label>
<div class="col-md-8">
 <div class="input-icon right">
<i class="fa"></i>
										<div class="input-group date date-picker" data-date-format="dd-mm-yyyy">
										<?php $time = time();
										
										if(isset($_GET['edit']))
										{
											$date_ed = $row['incident_date'];
										} 
										else
										{ 
											$date_ed = date('d-m-Y', $time);
										}
										
										?><?php //echo $date_ed;?>
 <input type="text" name="incident_date" class="form-control" readonly <?php if(isset($_GET['edit'])){?> value="<?php echo $row['incident_date'];}else{ echo $date_ed;}?>" required>
 
                                                        <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                    </div>
</div>
</div>
</div>







<div class="form-group">
<label class="control-label col-md-4">Country
 <span class="required"> * </span>
</label>
<div class="col-md-8">
 <div class="input-icon right">
<i class="fa"></i>
	<select class="form-control" name="country_id" required>
		<option value="">Select...</option>
<?php if(isset($_GET['edit'])){
	$country_id = $row['country_id'];
	$country_id = mysql_query("select * from countries where id = '$country_id'");
	$rowses_contry = mysql_fetch_assoc($country_id);
	?>
	<option value="<?php echo $rowses_contry['id'];?>" selected="selected"><?php echo $rowses_contry['name'];?></option>
	<option value="" disabled="disabled">------------------</option>
	<?php }?>			
<?php  $sql_cont = mysql_query("SELECT * from countries where is_active = '1' order by id desc");
while($row_cont = mysql_fetch_array($sql_cont)){?>
<option value="<?php echo $row_cont['id'];?>"><?php echo $row_cont['name'];?></option>
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
		<option value="">Select...</option>
<?php if(isset($_GET['edit'])){
	$city_id = $row['city_id'];
	$city_id = mysql_query("select * from countries_cities where id = '$city_id'");
	$rowses_city = mysql_fetch_assoc($city_id);
	?>
	<option value="<?php echo $rowses_city['id'];?>" selected="selected"><?php echo $rowses_city['name'];?></option>
	<option value="" disabled="disabled">------------------</option>
	<?php }?>			
<?php  $sql_cit = mysql_query("SELECT * from countries_cities where is_active = '1' order by id desc");
while($row_cit = mysql_fetch_array($sql_cit)){?>
<option value="<?php echo $row_cit['id'];?>"><?php echo $row_cit['name'];?></option>
<?php }?>	
</select>
</div>
</div>
</div>

























</div>	
<!-- Column left END -->		



<!-- Column Right Start-->	
<div class="col-md-6">




<div class="form-group">
                                                <label class="control-label col-md-4">Incident Time
												<span class="required"> * </span>
												</label>
                                                <div class="col-md-8">
                                                    <div class="input-icon">
                                                        <i class="fa fa-clock-o"></i>
 <input type="text" name="incident_time" class="form-control timepicker timepicker-default" readonly <?php if(isset($_GET['edit'])){?> value="<?php echo $row['incident_time'];}?>" required>
														
														
														</div>
                                                </div>
                                            </div>



<div class="form-group">
<label class="control-label col-md-4">Province
 <span class="required"> * </span>
</label>
<div class="col-md-8">
 <div class="input-icon right">
<i class="fa"></i>
	<select class="form-control" name="province_id" required>
		<option value="">Select...</option>
<?php if(isset($_GET['edit'])){
	$province_id = $row['province_id'];
	$province_id = mysql_query("select * from countries_province where id = '$province_id'");
	$rowses_province = mysql_fetch_assoc($province_id);
	?>
	<option value="<?php echo $rowses_province['id'];?>" selected="selected"><?php echo $rowses_province['name'];?></option>
	<option value="" disabled="disabled">------------------</option>
	<?php }?>			
<?php  $sqlaaa = mysql_query("SELECT * from countries_province where is_active = '1' order by id desc");
while($rowaaa = mysql_fetch_array($sqlaaa)){?>
<option value="<?php echo $rowaaa['id'];?>"><?php echo $rowaaa['name'];?></option>
<?php }?>	
</select>
</div>
</div>
</div>







<div class="form-group">
<label class="control-label col-md-4">Address
</label>
<div class="col-md-8">
 <div class="input-icon right">
<input type="text" class="form-control" name="address" <?php if(isset($_GET['edit'])){?> value="<?php echo htmlentities($row['address']);}?>" /> 
</div>
</div>
</div>





</div>

<!-- Column right END -->	












								

	 <div class="row">		
<div class="col-md-12">	 				
			<h3>Additional Information</h3>					
</div>			
	<!-- Column left Start-->	
<div class="col-md-12">
					
							









<div class="form-group">
<label class="control-label col-md-2">Source Link 1
</label>
<div class="col-md-5">
 <div class="input-icon right">
<i class="fa"></i>
<input type="text" class="form-control" name="sourcea" <?php if(isset($_GET['edit'])){?> value="<?php echo htmlentities($row['sourcea']);}?>" /> 
</div>
<span class="help-block"> http://www.google.com</span>
</div>


<div class="col-md-5">
<div class="mt-radio-list" data-error-container="#form_2_membership_error">
														<label class="mt-radio">
                                                            <input type="radio" name="type_playa" value="1" <?php if(isset($_GET['edit'])){ if($row['type_playa'] == '1'){echo 'checked="checked"';}}?>  /> Vemio
                                                            <span></span>
                                                        </label>
                                                        <label class="mt-radio">
                                                            <input type="radio" name="type_playa" value="2" <?php if(isset($_GET['edit'])){ if($row['type_playa'] == '2'){echo 'checked="checked"';}}?> /> Youtube
                                                            <span></span>
                                                        </label>
														<label class="mt-radio">
                                                            <input type="radio" name="type_playa" value="3" <?php if(isset($_GET['edit'])){ if($row['type_playa'] == '3'){echo 'checked="checked"';}}?> /> Weblink
                                                            <span></span>
                                                        </label>
                                                        
                                                    </div>

</div>
</div>











<div class="form-group">
<label class="control-label col-md-2">Source Link 2
</label>
<div class="col-md-5">
 <div class="input-icon right">
<i class="fa"></i>
<input type="text" class="form-control" name="sourceb" <?php if(isset($_GET['edit'])){?> value="<?php echo htmlentities($row['sourceb']);}?>" /> 
</div>
<span class="help-block"> http://www.google.com</span>
</div>


<div class="col-md-5">
<div class="mt-radio-list" data-error-container="#form_2_membership_error">
														<label class="mt-radio">
                                                            <input type="radio" name="type_playb" value="1" <?php if(isset($_GET['edit'])){ if($row['type_playb'] == '1'){echo 'checked="checked"';}}?>  /> Vemio
                                                            <span></span>
                                                        </label>
                                                        <label class="mt-radio">
                                                            <input type="radio" name="type_playb" value="2" <?php if(isset($_GET['edit'])){ if($row['type_playb'] == '2'){echo 'checked="checked"';}}?> /> Youtube
                                                            <span></span>
                                                        </label>
														<label class="mt-radio">
                                                            <input type="radio" name="type_playb" value="3" <?php if(isset($_GET['edit'])){ if($row['type_playb'] == '3'){echo 'checked="checked"';}}?> /> Weblink
                                                            <span></span>
                                                        </label>
                                                        
                                                    </div>

</div>
</div>




<div class="form-group">
<label class="control-label col-md-2">Source Link 3
</label>
<div class="col-md-5">
 <div class="input-icon right">
<i class="fa"></i>
<input type="text" class="form-control" name="sourcec" <?php if(isset($_GET['edit'])){?> value="<?php echo htmlentities($row['sourcec']);}?>" > 
</div>
<span class="help-block"> http://www.google.com</span>
</div>


<div class="col-md-5">
<div class="mt-radio-list" data-error-container="#form_2_membership_error">
														<label class="mt-radio">
                                                            <input type="radio" name="type_playc" value="1" <?php if(isset($_GET['edit'])){ if($row['type_playc'] == '1'){echo 'checked="checked"';}}?>  /> Vemio
                                                             <span></span>
                                                        </label>
                                                        <label class="mt-radio">
                                                            <input type="radio" name="type_playc" value="2" <?php if(isset($_GET['edit'])){ if($row['type_playc'] == '2'){echo 'checked="checked"';}}?> /> Youtube
                                                             <span></span>
                                                        </label>
														<label class="mt-radio">
                                                            <input type="radio" name="type_playc" value="3" <?php if(isset($_GET['edit'])){ if($row['type_playc'] == '3'){echo 'checked="checked"';}}?> /> Weblink
                                                            <span></span>
                                                        </label>
                                                        
                                                    </div>

</div>
</div>





							
	
	
	<div class="form-group">
                                                <label class="control-label col-md-3">Send Email to users
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="mt-radio-list" data-error-container="#form_2_membership_error">
														<label class="mt-radio">
                                                            <input type="radio" name="send_email" value="1" <?php if(isset($_GET['edit'])){ if($row['send_email'] == '1'){echo 'checked="checked"';}}?>  required> Yes
                                                            <span></span>
                                                        </label>
                                                        <label class="mt-radio">
                                                            <input type="radio" name="send_email" value="0" <?php if(isset($_GET['edit'])){ if($row['send_email'] == '0'){echo 'checked="checked"';}}?> required> No
                                                            <span></span>
                                                        </label>
                                                        
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

</div>										
	
	
	
	
	
	
	
	
	
	
	
							
</div>							
								
											
											
											
										
										
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
		

		
   