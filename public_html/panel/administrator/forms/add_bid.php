<?php 
$page_name = 'bids';
$current_page = 'add_bid';
$table_name = 'bidding';
if(isset($_POST['submit'])){
$is_active = $_POST['is_active'];
$comments = $_POST['comments'];
$shipiing_contry = $_POST['shipiing_contry'];
$bid_price = $_POST['bid_price'];
$car_id = $_POST['car_id'];
$user_id = $_POST['user_id'];
$auction_date = $_POST['auction_date'];
$reg_date = $_POST['reg_date'];
$is_auction = $_POST['is_auction'];
$myip = $_POST['myip'];
$year_model = $_POST['year_model'];
$lot = $_POST['lot'];
$bid_car_name = $_POST['bid_car_name'];
$bid_car_make = $_POST['bid_car_make'];

//print_r($_POST); // 'form posted';
if($_POST['form_typo'] != 'edit'){
$result = mysql_query("SELECT * FROM $table_name where user_id = '$user_id' AND car_id = '$car_id'");
$num_rows = mysql_num_rows($result);
			if($num_rows <= '0')
				{
						mysql_query("INSERT INTO $table_name set 
						`is_active` = '$is_active',
`comments` = '$comments',
`shipiing_contry` = '$shipiing_contry',
`auction_date` = '$auction_date',
`bid_price` = '$bid_price',
`car_id` = '$car_id',
`user_id` = '$user_id',
`bid_car_name` = '$bid_car_name',
`bid_car_make` = '$bid_car_make',
`year_model` = '$year_model',
`lot` = '$lot',
`myip` = '$myip',
`reg_date` = '$reg_date',
`is_auction` = '$is_auction'

						");
						$success = '1';
				?>
				<meta http-equiv="refresh" content="0;URL='index.php?p=<?php echo $page_name;?>'" />
				<?php 
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
		`parent_company` = '$parent_company',
		`is_active` = '$is_active'
		WHERE id = '$uid'
		");
		$success = '2';
		?>
<meta http-equiv="refresh" content="0;URL='index.php?p=<?php echo $page_name;?>'" />
<?php 
	}
}
?>
<?php if(isset($_GET['edit'])){
$form_type = 'edit';
$id = $_GET['id'];
$sql = mysql_query("SELECT * FROM $table_name where id = '$id'");
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
<?php if(isset($_GET['edit'])){echo "Edit brand";}else{echo 'Add Win Bidding';}?>
										
										</span>
                                    </div>
                                   
                                </div>
                                <div class="portlet-body">
                                    <!-- BEGIN FORM-->

								



 <form  action="index.php?p=<?php echo $current_page;?><?php if(isset($_GET['edit'])){echo "&id=".$row['id']."&edit=1";}?>" method="post" id="form_sample_2" class="form-horizontal">

								
                                        <div class="form-body">
<?php include("form-alerts.php");?>
<input type="hidden" name="uid" <?php if(isset($_GET['edit'])){echo "value=".$row['id']."";}?>>	

<input type="hidden" name="is_auction" value="1" >	
<input type="hidden" name="reg_date" value="<?php echo time();?>" >	
<input type="hidden" name="myip" value="1.1.27" >	


                                            
 <div class="form-group ">
                                                <label class="control-label col-md-3">User Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                    


<select class="form-control" name="user_id" required>
	<option value="">Select...</option>
	<?php if(isset($_GET['edit'])){
	$user_id = $row['user_id'];
	$user_id = mysql_query("select * from users where id = '$user_id' ");
	$rows = mysql_fetch_assoc($user_id);
	?>
	<option value="<?php echo $rows['id'];?>" selected="selected"><?php echo $rows['name'];?></option>
    <option value="">-----------------</option>
	<?php }?>
	<?php 
	$region = mysql_query("select * from users where is_active = '1' order by name Asc");
	while($rows = mysql_fetch_array($region)){		?>
	<option value="<?php echo $rows['id'];?>"><?php echo $rows['name'];?> <?php echo $rows['lastname'];?></option>
	<?php }?>
</select>
														
														</div>
                                                </div>
                                            </div>											
											
											<div class="form-group  margin-top-20">
                                                <label class="control-label col-md-3">Car ID
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                    
	<input type="text" class="form-control" name="car_id" <?php if(isset($_GET['edit'])){echo "value=".$row['car_id']."";}?> /> 
														
														</div>
                                                </div>
                                            </div>
											
											
											<div class="form-group  margin-top-20">
                                                <label class="control-label col-md-3">Car Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                    
	<input type="text" class="form-control" name="bid_car_name" <?php if(isset($_GET['edit'])){echo "value=".$row['bid_car_name']."";}?> placeholder="AQUA" /> 
														
														</div>
                                                </div>
                                            </div>
											
											
											<div class="form-group  margin-top-20">
                                                <label class="control-label col-md-3">Car Company
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                    
	<input type="text" class="form-control" name="bid_car_make" <?php if(isset($_GET['edit'])){echo "value=".$row['bid_car_make']."";}?> placeholder="TOYOTA" /> 
														
														</div>
                                                </div>
                                            </div>
											
											
											<div class="form-group  margin-top-20">
                                                <label class="control-label col-md-3">Model - Year
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                    
	<input type="text" class="form-control" name="year_model" <?php if(isset($_GET['edit'])){echo "value=".$row['year_model']."";}?> placeholder="2015" /> 
														
														</div>
                                                </div>
                                            </div>
											
											<div class="form-group  margin-top-20">
                                                <label class="control-label col-md-3">Lot No.
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                    
	<input type="text" class="form-control" name="lot" <?php if(isset($_GET['edit'])){echo "value=".$row['lot']."";}?> placeholder="222" /> 
														
														</div>
                                                </div>
                                            </div>
											
											
											<div class="form-group  margin-top-20">
                                                <label class="control-label col-md-3">Bid Price
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                    
	<input type="text" class="form-control" name="bid_price" <?php if(isset($_GET['edit'])){echo "value=".$row['bid_price']."";}?> style="width:80%; float:left;" />,000
														
														</div>
                                                </div>
                                            </div>
											
											
											<div class="form-group  margin-top-20">
                                                <label class="control-label col-md-3">Shipping Country
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                    
	<input type="text" class="form-control" name="shipiing_contry" value="Pakistan" /> 
														
														</div>
                                                </div>
                                            </div>
											
											
											<div class="form-group  margin-top-20">
                                                <label class="control-label col-md-3">Auction Date
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                    
	<input type="text" class="form-control" name="auction_date" placeholder="2018-07-27" /> 
														
														</div>
                                                </div>
                                            </div>
											
											
											<div class="form-group  margin-top-20">
                                                <label class="control-label col-md-3">Comments
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                    
	<input type="text" class="form-control" name="comments" <?php if(isset($_GET['edit'])){echo "value=".$row['comments']."";}?> /> 
														
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
<input type="radio" name="is_active" value="1" <?php if(isset($_GET['edit'])){ if($row['is_active'] == '1'){echo 'checked="checked"';}}else{echo 'checked="checked"';}?>  required> Active
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
   