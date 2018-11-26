<?php 
if(isset($_POST['submit'])){
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$is_paid = $_POST['is_paid'];
$is_admin = $_POST['is_admin'];
$expiry_date = $_POST['expiry_date'];
$is_investr = $_POST['is_investr'];
$mobile = $_POST['mobile'];
$address = $_POST['address'];
$city = $_POST['city'];
$countryy = $_POST['countryy'];
$port = $_POST['port'];
$url = $_POST['url'];
$dob = $_POST['dob'];
$company_name = $_POST['company_name'];
$is_active = $_POST['is_active'];

$date = time();
$uid = $_POST['uid'];
//print_r($_POST); // 'form posted';
	if($_POST['form_typo'] != 'edit'){
$result = mysql_query("SELECT * FROM users where username = '$username' OR email = '$email'");
$num_rows = mysql_num_rows($result);
			if($num_rows <= '0')
				{
						mysql_query("INSERT INTO `users` set 
						`name` = '$name',
						`lastname` = '$lastname',
						`username` = '$username',
						`email` = '$email',
						`pass` = '$pass',
						`is_paid` = '$is_paid',
						`is_admin` = '$is_admin',
                        `expiry_date` = '$expiry_date',
						`reg_date` = '$date',
						`is_investr` = '$is_investr',
						`mobile` = '$mobile',
						`address` = '$address',
						`city` = '$city',
						`countryy` = '$countryy',
						`port` = '$port',
						`url` = '$url',
						`company_name` = '$company_name',		
						`dob` = '$dob',						
						
						`is_active` = '$is_active'
						");
						$success = '1';
				?><meta http-equiv="refresh" content="0;URL='index.php?p=users'" /><?php 
				}
			else
				{
					$success = '3';
				}
	}
	else
	{
		mysql_query("UPDATE `users` set 
		`name` = '$name',
		`lastname` = '$lastname',
		`username` = '$username',
		`email` = '$email',
		`pass` = '$pass',
		`is_paid` = '$is_paid',
		`is_admin` = '$is_admin',
        `expiry_date` = '$expiry_date',
		`is_investr` = '$is_investr',
						`mobile` = '$mobile',
						`address` = '$address',
						`city` = '$city',
						`countryy` = '$countryy',
						`port` = '$port',
						`url` = '$url',
						`company_name` = '$company_name',	
						`dob` = '$dob',							
		`is_active` = '$is_active',
		`reg_date` = '$date'
		WHERE id = '$uid'
		");
		$success = '2';
		print_r($_post);
		?>
		<!--<meta http-equiv="refresh" content="0;URL='index.php?p=users'" />--><?php 
	}
}
?>
<?php if(isset($_GET['edit'])){
$form_type = 'edit';
$id = $_GET['id'];
$sql = mysql_query("SELECT * FROM users where id = '$id'");
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
										<?php if(isset($_GET['edit'])){echo "Edit User";}else{echo 'Add new user';}?>
										
										</span>
                                    </div>
                                   
                                </div>
                                <div class="portlet-body">
                                    <!-- BEGIN FORM-->

								



 <form  action="index.php?p=add-user<?php if(isset($_GET['edit'])){echo "&id=".$row['id']."&edit=1";}?>" method="post" id="form_sample_2" class="form-horizontal">

								
                                        <div class="form-body">
<?php include("form-alerts.php");?>
<input type="hidden" name="uid" <?php if(isset($_GET['edit'])){echo "value=".$row['id']."";}?>>	
                                            <div class="form-group  margin-top-20">
                                                <label class="control-label col-md-3">First Name
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
                                                <label class="control-label col-md-3">Last Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                    
	<input type="text" class="form-control" name="lastname" <?php if(isset($_GET['edit'])){echo "value=".$row['lastname']."";}?> /> 
														
														</div>
                                                </div>
                                            </div>
											 <div class="form-group ">
                                                <label class="control-label col-md-3">Username
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                    
	<input type="text" class="form-control" name="username" <?php //if(isset($_GET['edit'])){echo 'disabled="disabled"';}?>  <?php if(isset($_GET['edit'])){echo "value=".$row['username']."";}?> /> 
														
														</div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label class="control-label col-md-3">Password
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                        <input type="password" class="form-control" name="pass" <?php if(isset($_GET['edit'])){echo "value=".$row['pass']."";}?> required> </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Email
                                                    <span class="required"> * </span>
                                                </label>
                                               
												
												 <div class="col-md-4">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-envelope"></i>
                                                        </span>
<input type="email" name="email"   <?php //if(isset($_GET['edit'])){echo 'disabled="disabled"';}?>  class="form-control" placeholder="Email Address" <?php if(isset($_GET['edit'])){echo "value=".$row['email']."";}?> required> </div>
                                                </div>
                                            </div>
											
                                            
											<div class="form-group  margin-top-20">
                                                <label class="control-label col-md-3">Phone
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                    
	<input type="text" class="form-control" name="mobile" <?php if(isset($_GET['edit'])){echo "value=".$row['mobile']."";}?> /> 
														
														</div>
                                                </div>
                                            </div>
											<div class="form-group ">
                                                <label class="control-label col-md-3">Date of Birth
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
<?php 
    $time = time();
    $thrity = 86400*30;
    $tot_days = $time+$thrity;
    $dated_expiry = date("Y-m-d", $tot_days)
?>                                                        
                                                    
    <input type="text" class="form-control" name="dob" placeholder="30-01-1999"   <?php if(isset($_GET['edit'])){echo "value=".$row['dob']."";
}
else
{
echo "value=".$dated_expiry."";}?> /> 


                                                        
                                                        </div>
                                                </div>
                                            </div>
											<div class="form-group  margin-top-20">
                                                <label class="control-label col-md-3">Address
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                    
	<input type="text" class="form-control" name="address" <?php if(isset($_GET['edit'])){echo "value=".$row['address']."";}?> /> 
														
														</div>
                                                </div>
                                            </div>
											
											
											
											<div class="form-group  margin-top-20">
                                                <label class="control-label col-md-3">City
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                    

 <?php 
			
				
			  ?>
			  <select name="city"  style="width:100%; padding:5px; height:35px;">
 <?php if(isset($_GET['edit'])){ 
			  $city_id = $row['city'];
				$mysql_cities = mysql_query("select * from countries_cities where id = '$city_id' AND is_active = '1'");
				$row_city = mysql_fetch_assoc($mysql_cities);
			  ?>
			  <option value="<?php echo $row_city['id'];?>"><?php echo $row_city['name'];?></option>
			  <option disabled="disabled"></option>
			<?php }else {

				
?>  			  
			  <option></option>
			  <?php 
			  $mysql_cities = mysql_query("select * from countries_cities where is_active = '1'");
				$row_city = mysql_fetch_assoc($mysql_cities);
				}
			  $mysql_citiesa = mysql_query("select * from countries_cities where is_active = '1'");
				while($row_citya = mysql_fetch_array($mysql_citiesa)){
				?>
			  <option value="<?php echo $row_citya['id'];?>"><?php echo $row_citya['name'];?></option>
			  <?php }?>
			  </select>	
														
														</div>
                                                </div>
                                            </div>
											
											
											
							<div class="form-group  margin-top-20">
                                                <label class="control-label col-md-3">Country
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                    

<?php 
			 
				
				//echo $row_countries['name'];
			  ?>
			  
			  <select name="countryy" style="width:100%; padding:5px; height:35px;">
<?php if(isset($_GET['edit'])){ 

$countryy_id = $row['countryy'];
				$mysql_countries = mysql_query("select * from countries where id = '$countryy_id' AND is_active = '1'");
				$row_countries = mysql_fetch_assoc($mysql_countries);
?>


<option value="<?php echo $row_countries['id'];?>"><?php echo $row_countries['name'];?></option>
<option  disabled="disabled"></option>
<?php }else {

				
?>  			  
			  <option></option>
			  <?php  
			  $mysql_countries = mysql_query("select * from countries where is_active = '1'");
				$row_countries = mysql_fetch_assoc($mysql_countries);
			  }
			  $mysql_countriesa = mysql_query("select * from countries where is_active = '1'");
				while($row_countriesa = mysql_fetch_array($mysql_countriesa)){
				?>
			  <option  value="<?php echo $row_countriesa['id'];?>"><?php echo $row_countriesa['name'];?></option>
			  <?php }?>
			  </select>	
														
														</div>
                                                </div>
                                            </div>	
											
											
											
<div class="form-group  margin-top-20">
                                                <label class="control-label col-md-3">Delivery Port
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                  


		  <select name="port"   style="width:100%; padding:5px; height:35px;">
<?php if(isset($_GET['edit'])){ 

$port_id = $row['port'];
				$mysql_ports = mysql_query("select * from ports where id = '$port_id' AND is_active = '1'");
				$row_ports = mysql_fetch_assoc($mysql_ports);
?>


<option value="<?php echo $row_ports['id'];?>"><?php echo $row_ports['name'];?></option>
<option  disabled="disabled"></option>
<?php }else {?>  
<?php 
			  
				$mysql_ports = mysql_query("select * from ports where is_active = '1'");
				$row_ports = mysql_fetch_assoc($mysql_ports);
				//echo $row_ports['name'];
			  ?>		  
			  <option ></option>
			 <?php }?> 
			  <?php 
			  $mysql_portsa = mysql_query("select * from ports where is_active = '1'");
				while($row_portsa = mysql_fetch_array($mysql_portsa)){
				?>
			  <option  value="<?php echo $row_portsa['id'];?>"><?php echo $row_portsa['name'];?></option>
			  <?php }?>
			  </select>
														
														</div>
                                                </div>
                                            </div>	



<div class="form-group  margin-top-20">
                                                <label class="control-label col-md-3">Company Name (if any)
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                    
	<input type="text" class="form-control" name="company_name" <?php if(isset($_GET['edit'])){echo "value=".$row['company_name']."";}?> /> 
														
														</div>
                                                </div>
                                            </div>
											
<div class="form-group  margin-top-20">
                                                <label class="control-label col-md-3">Company URL
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                    
	<input type="text" class="form-control" name="url" <?php if(isset($_GET['edit'])){echo "value=".$row['url']."";}?> /> 
														
														</div>
                                                </div>
                                            </div>																									
											
                                           <div class="form-group">
                                                <label class="control-label col-md-3">Membership
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="mt-radio-list" data-error-container="#form_2_membership_error">
                                                        <label class="mt-radio">
													 	
 <input type="radio" name="is_paid" value="0" <?php if(isset($_GET['edit'])){ if($row['is_paid'] == '0'){echo 'checked="checked"';}}else {echo 'checked="checked"';}?> required> Free
                                                            <span></span>
                                                        </label>
                                                        <label class="mt-radio">
                                                            <input type="radio" name="is_paid" value="1" <?php if(isset($_GET['edit'])){ if($row['is_paid'] == '1'){echo 'checked="checked"';}}?> required> Professional
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label class="control-label col-md-3">Membership Expiry
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
<?php 
    $time = time();
    $thrity = 86400*30;
    $tot_days = $time+$thrity;
    $dated_expiry = date("Y-m-d", $tot_days)
?>                                                        
                                                    
    <input type="text" class="form-control" name="expiry_date" placeholder="2019-01-30"   <?php if(isset($_GET['edit'])){echo "value=".$row['expiry_date']."";
}
else
{
echo "value=".$dated_expiry."";}?> /> 


                                                        
                                                        </div>
                                                </div>
                                            </div>
                                            
											
											<div class="form-group">
                                                <label class="control-label col-md-3">Investor
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="mt-radio-list" data-error-container="#form_2_membership_error">
                                                        <label class="mt-radio">
                                                            <input type="radio" name="is_investr" value="0" <?php if(isset($_GET['edit'])){ if($row['is_investr'] == '0'){echo 'checked="checked"';}}else {echo 'checked="checked"';}?> required> No
                                                            <span></span>
                                                        </label>
                                                        <label class="mt-radio">
                                                            <input type="radio" name="is_investr" value="1" <?php if(isset($_GET['edit'])){ if($row['is_investr'] == '1'){echo 'checked="checked"';}}?>  required> Yes
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label class="control-label col-md-3">Active
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="mt-radio-list" data-error-container="#form_2_membership_error">
                                                        <label class="mt-radio">
                                                            <input type="radio" name="is_active" value="0" <?php if(isset($_GET['edit'])){ if($row['is_active'] == '0'){echo 'checked="checked"';}}?> required> No
                                                            <span></span>
                                                        </label>
                                                        <label class="mt-radio">
                                                            <input type="radio" name="is_active" value="1" <?php if(isset($_GET['edit'])){ if($row['is_active'] == '1'){echo 'checked="checked"';}}else {echo 'checked="checked"';}?>  required> Yes
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label class="control-label col-md-3">Admin
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="mt-radio-list" data-error-container="#form_2_membership_error">
                                                        <label class="mt-radio">
                                                            <input type="radio" name="is_admin" value="0" <?php if(isset($_GET['edit'])){ if($row['is_admin'] == '0'){echo 'checked="checked"';}}else {echo 'checked="checked"';}?> required> No
                                                            <span></span>
                                                        </label>
                                                        <label class="mt-radio">
                                                            <input type="radio" name="is_admin" value="1" <?php if(isset($_GET['edit'])){ if($row['is_admin'] == '1'){echo 'checked="checked"';}}?>  required> Yes
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
                                                    <a href="index.php?p=users" type="button" class="btn default">Cancel</a>
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
   