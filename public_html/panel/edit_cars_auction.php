<?php 
//print_r($_REQUEST);
//include('../../inc_script.php');
$page_name = 'win_cars';
$current_page = 'edit_cars_auction';
$table_name = 'winingcars';
if(isset($_POST['submit'])){
$name = $_POST['name'];
$make = $_POST['make'];
$year_model = $_POST['year_model'];
$grade = $_POST['grade'];
$fuel = '';//$_POST['fuel'];
$condi = $_POST['condi'];
$equipment = $_POST['equipment'];
$yard = $_POST['yard'];
$brands_id = $_POST['brands_id'];
$chasis = $_POST['chasis'];
$mileage = $_POST['mileage'];
$displace = $_POST['displace'];
$conde = $_POST['conde'];
$colorr = $_POST['colorr'];
$price = $_POST['price'];
$start_price = $_POST['start_price'];
$short_descip = $_POST['short_descip'];
$is_active = $_POST['is_active'];
$lotn = $_POST['lotn'];
$trans = $_POST['trans'];
$auction_time = $_POST['auction_time'];
$auction_house = $_POST['auction_house'];
$packag = $_POST['packag'];
$trans = $_POST['trans'];
$user_id = $_POST['user_id'];
$bid_id = $_POST['bid_id'];

$freight_chrgs = $_POST['freight_chrgs'];
$comssion = $_POST['comssion'];
$inspection = $_POST['inspection'];
$vanning = $_POST['vanning'];
$status = $_POST['status'];

$sold_currency = $_POST['sold_currency'];
$auction_country = $_POST['auction_country'];
$destination_country = $_POST['destination_country'];
$currency_rate = $_POST['currency_rate'];
//error_reporting(0);

//print_r($_POST);

$date = time();

//print_r($_POST);
		$uid = $_POST['uid'];
						mysql_query("UPDATE $table_name set 
						`sold_currency` = '$sold_currency',
						`lotn` = '$lotn', `bid_id` = '$bid_id', `user_id` = '$user_id', 
						`freight_chrgs` = '$freight_chrgs', `comssion` = '$comssion', `inspection` = '$inspection', `vanning` = '$vanning', 
						`status` = '$status', `start_price` = '$start_price', `currency_rate` = '$currency_rate', `auction_country` = '$auction_country', 
						`destination_country` = '$destination_country', `name` = '$name', `make` = '$make', `auction_time` = '$auction_time',
						`auction_house` = '$auction_house', `packag` = '$packag', `grade` = '$grade', `fuel` = '0', `trans` = '$trans', 
						`equipment` = '$equipment', `yard` = 'asd', `chasis` = '$chasis', `mileage` = '$mileage', `displace` = '$displace', 
						`conde` = 'asd', `condi` = 'asd', `colorr` = '$colorr', `price` = '$price', `short_descip` = '$short_descip', 
						`is_active` = '$is_active', `is_auction` = '1', `year` = '$year_model'
						WHERE id = '$uid'
						");
		$success = '2';
		?>
		<meta http-equiv="refresh" content="0;URL='index.php?p=<?php echo $page_name;?>'" />
		<?php 
	}

?>
<style>
.mt-radio {
float:left;
padding-right:10px;
}
</style>
<?php if(isset($_GET['edit'])){
$form_type = 'edit';} else {$form_type = 'add';}?>	
<?php
$id = $_GET['id'];


$arr = mysql_query("select * from winingcars where id='$id'");
//$arr = aj_get("select * from ".$table." where id='$car_id'",30,0);

while($v = mysql_fetch_array($arr)){
// foreach($arr as $v) { 
// echo $v['MARKA_NAME'];
// echo $v['MODEL_NAME'];

?>


<div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN VALIDATION STATES-->
                            <div class="portlet light portlet-fit portlet-form bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <span class="caption-subject font-dark  bold uppercase">
										<?php if(isset($_GET['edit'])){echo "Edit Car";}else{echo 'Add Winning Car Details';}?>
										
										</span>
                                    </div>
                                   
                                </div>
                                <div class="portlet-body">
                                    <!-- BEGIN FORM-->



									
 <form  action="index.php?p=<?php echo $current_page;?><?php if(isset($_GET['edit'])){echo "&id=".$v['id']."&edit=1";}?>" method="post" id="form_sample_2" class="form-horizontal"enctype="multipart/form-data">

								
                                        <div class="form-body">
<?php include("form-alerts.php");?>
<input type="hidden" name="uid" <?php if(isset($_GET['edit'])){echo "value=".$v['id']."";}?>>	
                                            
<input type="hidden" name="conde" value=""  class="form-control" />											
<input type="hidden" name="condi" value=""  class="form-control" />
<input type="hidden" name="yard" value=""  class="form-control" />											
<input type="hidden" name="brands_id" value=""  class="form-control" />


<!--
<input type="text" name="car_id" value="<?php //echo $v['car_id'];?>"  class="form-control" />-->
<input type="hidden" name="bid_id" value="<?php echo $v['bid_id'];?>"  class="form-control" />




<input type="hidden" name="user_id" value="<?php echo $v['user_id'];?>"  class="form-control" />

 






<div>

<!-- Column left START -->
<div class="col-md-6">

<div class="form-group">
<label class="control-label col-md-4">Freight Charges
 <span class="required"> * </span>
</label>
<div class="col-md-8">
 <div class="input-icon right">
<i class="fa"></i>
<input type="text" name="freight_chrgs" <?php if(isset($_GET['edit'])){echo "value=".$v['freight_chrgs']."";}?>  class="form-control" />
</div>
</div>
</div> 



<div class="form-group">
<label class="control-label col-md-4">Comission
 <span class="required"> * </span>
</label>
<div class="col-md-8">
 <div class="input-icon right">
<i class="fa"></i>
<input type="text" name="comssion" <?php if(isset($_GET['edit'])){echo "value=".$v['comssion']."";}?>  class="form-control" />
</div>
</div>
</div> 

 



<div class="form-group">
<label class="control-label col-md-4">Inspection
 <span class="required"> * </span>
</label>
<div class="col-md-8">
 <div class="input-icon right">
<i class="fa"></i>
<input type="text" name="inspection" <?php if(isset($_GET['edit'])){echo "value=".$v['inspection']."";}?>  class="form-control" />
</div>
</div>
</div>


 
<div class="form-group">
<label class="control-label col-md-4">Vanning
 <span class="required"> * </span>
</label>
<div class="col-md-8">
 <div class="input-icon right">
<i class="fa"></i>
<input type="text" name="vanning" <?php if(isset($_GET['edit'])){echo "value=".$v['vanning']."";}?>  class="form-control" />
</div>
</div>
</div>




<div class="form-group">
<label class="control-label col-md-4">Status
 <span class="required"> * </span>
</label>
<div class="col-md-8">
 <div class="input-icon right">
<i class="fa"></i>
<select name="status" class="form-control">
<option value="0">Select</option>
<option value="<?php echo $v['status'];?>" selected="selected">
<?php if($v['status'] == '1'){?>Delivered<?php }?>
<?php if($v['status'] == '2'){?>In Process<?php }?>
<?php if($v['status'] == '0'){?>In Ship<?php }?>
</option>
<?php if($v['status'] == '1'){?>
<option value="2">In Process</option>
<option value="0">In Ship</option>
<?php }?>
<?php if($v['status'] == '2'){?>
<option value="0">In Ship</option>
<option value="1">Delivered</option>
<?php }?>
<?php if($v['status'] == '0'){?>
<option value="2">In Process</option>
<option value="1">Delivered</option>
<?php }?>

</select>
</div>
</div>
</div>




<div class="form-group">
<label class="control-label col-md-4">Make
 <span class="required"> * </span>
</label>
<div class="col-md-8">
 <div class="input-icon right">
<i class="fa"></i>
<input type="text" name="make" value="<?php echo $v['make'];?>"  class="form-control" />
</div>
</div>
</div>

<div class="form-group">
<label class="control-label col-md-4">Year <span class="required"> * </span></label>
    <div class="col-md-8">
        <div class="input-icon right">
        <i class="fa"></i>
<input type="text" name="year_model" value="<?php echo $v['year'];?>"  class="form-control" />
        </div>
    </div>
</div>

<div class="form-group">
<label class="control-label col-md-4">Lot No.
 <span class="required"> * </span>
</label>
<div class="col-md-8">
 <div class="input-icon right">
<i class="fa"></i>
<input type="text" name="lotn" value="<?php echo $v['lotn'];?>"  class="form-control" />
</div>
</div>
</div>


<div class="form-group">
<label class="control-label col-md-4">Auc Time
 <span class="required"> * </span>
</label>
<div class="col-md-8">
 <div class="input-icon right">
<i class="fa"></i>
<input type="text" name="auction_time" value="<?php echo $v['auction_time'];?>"  class="form-control" />
</div>
</div>
</div>


<div class="form-group">
<label class="control-label col-md-4">Auction House
 <span class="required"> * </span>
</label>
<div class="col-md-8">
 <div class="input-icon right">
<i class="fa"></i>
<input type="text" name="auction_house" value="<?php echo $v['auction_house'];?>"  class="form-control" />
</div>
</div>
</div>



<div class="form-group">
<label class="control-label col-md-4">Grade
 <span class="required"> * </span>
</label>
<div class="col-md-8">
 <div class="input-icon right">
<i class="fa"></i>
<input type="text" name="grade" value="<?php echo $v['grade'];?>"  class="form-control" />
</div>
</div>
</div>





<div class="form-group">
<label class="control-label col-md-4">Equipment 
 <span class="required"> * </span>
</label>
<div class="col-md-8">
 <div class="input-icon right">
<i class="fa"></i>
<input type="text" name="equipment" value="<?php echo $v['equipment'];?>"  class="form-control" />
</div>
</div>
</div>






</div>	
<!-- Column left END -->		



<!-- Column Right Start-->
	
<div class="col-md-6">
<div id="txtHint">
    <div class="form-group">
    <label class="control-label col-md-4">Car Name <span class="required"> * </span></label>
        <div class="col-md-8">
            <div class="input-icon right">
            <i class="fa"></i>
<input type="text" name="name" value="<?php echo $v['name'];?>"  class="form-control" />			
         
            </div>
        </div>
    </div>
</div>

<div class="form-group">
<label class="control-label col-md-4">Chasis
 <span class="required"> * </span>
</label>
<div class="col-md-8">
 <div class="input-icon right">
<i class="fa"></i>
<input type="text" name="chasis" value="<?php echo $v['chasis'];?>"  class="form-control" />

</div>
</div>
</div>


<div class="form-group">
<label class="control-label col-md-4">Mileage
 <span class="required"> * </span>
</label>
<div class="col-md-8">
 <div class="input-icon right">
<i class="fa"></i>
<input type="text" name="mileage" value="<?php echo $v['mileage'];?>"  class="form-control" />

</div>
</div>
</div>


<div class="form-group">
<label class="control-label col-md-4">Displace
 <span class="required"> * </span>
</label>
<div class="col-md-8">
 <div class="input-icon right">
<i class="fa"></i>
<input type="text" name="displace" value="<?php echo $v['displace'];?>"  class="form-control" />

</div>
</div>
</div>





<div class="form-group">
<label class="control-label col-md-4">Color
 <span class="required"> * </span>
</label>
<div class="col-md-8">
 <div class="input-icon right">
<i class="fa"></i>
<input type="text" name="colorr" style="text-transform: capitalize;" value="<?php echo $v['colorr'];?>"  class="form-control" />
</div>
</div>
</div>


<div class="form-group">
<label class="control-label col-md-4">Trans
 <span class="required"> * </span>
</label>
<div class="col-md-8">
 <div class="input-icon right">
<i class="fa"></i>
<input type="text" name="trans" value="<?php echo $v['trans'];?>"  class="form-control" />
</div>
</div>
</div>

<div class="form-group">
<label class="control-label col-md-4">Start
 <span class="required"> * </span>
</label>
<div class="col-md-8">
 <div class="input-icon right">
<i class="fa"></i>
<input type="text" name="start_price" value="<?php echo $v['start_price'];?>"  style="width:100px; padding-right: 33px; padding-left: 12px;     height: 34px;    padding: 6px 12px;    background-color: #fff; border: 1px solid #c2cad8;     border-radius: 4px;" />,000
</div>
</div>
</div>


<div class="form-group">
<label class="control-label col-md-4">Price
 <span class="required"> * </span>
</label>
<div class="col-md-8">
 <div class="input-icon right">
<i class="fa"></i>
<input type="text" name="price" value="<?php echo $v['price'];?>"  style="width:100px; padding-right: 33px; padding-left: 12px;     height: 34px;    padding: 6px 12px;    background-color: #fff; border: 1px solid #c2cad8;     border-radius: 4px;" />,000
</div>
</div>
</div>


<div class="form-group">
<label class="control-label col-md-4">Currency Rate 1 JPY = 
 <span class="required"> * </span>
</label>
<div class="col-md-8">
 <div class="input-icon right">
<i class="fa"></i>
<input type="text" name="currency_rate" value="<?php echo $v['currency_rate'];?>"  class="form-control" />
</div>
</div>
</div>
<div class="form-group">
<label class="control-label col-md-4">Currency
 <span class="required"> * </span>
</label>
<div class="col-md-8">
 <div class="input-icon right">
<i class="fa"></i>
<select name="sold_currency" class="form-control">
<option value="0">Select</option>
<option value="<?php echo $v['status'];?>" selected="selected">
<?php if($v['status'] == '1'){?>PKR<?php }?>
<?php if($v['status'] == '2'){?>AU<?php }?>
<?php if($v['status'] == '0'){?>JPY<?php }?>
</option>
<?php if($v['status'] == '1'){?>
<option value="2">AU</option>
<option value="0">JPY</option>
<?php }?>
<?php if($v['status'] == '2'){?>
<option value="0">JPY</option>
<option value="1">PKR</option>
<?php }?>
<?php if($v['status'] == '0'){?>
<option value="2">AU</option>
<option value="1">PKR</option>
<?php }?>
</select>
</div>
</div>
</div>

<div class="form-group">
<label class="control-label col-md-4">Package
 <span class="required"> * </span>
</label>
<div class="col-md-8">
 <div class="input-icon right">
<i class="fa"></i>
<input type="text" name="packag" value="<?php echo $v['packag'];?>"  class="form-control" />
</div>
</div>
</div>

<div class="form-group">
<label class="control-label col-md-4">Destination Country
 <span class="required"> * </span>
</label>
<div class="col-md-8">
 <div class="input-icon right">
<i class="fa"></i>
<input type="text" name="destination_country" value="<?php echo $v['destination_country'];?>"  class="form-control" />
</div>
</div>
</div>


<div class="form-group">
<label class="control-label col-md-4">Auction Country
 <span class="required"> * </span>
</label>
<div class="col-md-8">
 <div class="input-icon right">
<i class="fa"></i>
<input type="text" name="auction_country" value="<?php echo $v['auction_country'];?>"  class="form-control" />
</div>
</div>
</div>

</div>






											
<!-- Column left Start-->	
<div class="col-md-12">







<div class="form-group">
<label class="control-label col-md-2">Short Descrtipion
 <span class="required"> * </span>
</label>
<div class="col-md-10">
 <div class="input-icon right">
<i class="fa"></i>
<!--<textarea cols="45" rows="10" ></textarea>-->
 <textarea class=" form-control" name="short_descip" rows="6" ><?php if(isset($_GET['edit'])){echo $v['short_descip'];}?></textarea>
</div>
</div>
</div>





</div>
<!-- Column left END -->















					
											
											
<div class="form-group">
                                                <label class="control-label col-md-3">Status
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="mt-radio-list" data-error-container="#form_2_membership_error">
														<label class="mt-radio">
                                                            <input type="radio" name="is_active" value="1" <?php if(isset($_GET['edit'])){ if($v['is_active'] == '1'){echo 'checked="checked"';}}else{echo 'checked="checked"';}?>   required> Active
                                                            <span></span>
                                                        </label>
                                                        <label class="mt-radio">
                                                            <input type="radio" name="is_active" value="0" <?php if(isset($_GET['edit'])){ if($v['is_active'] == '0'){echo 'checked="checked"';}}?> required> De-Active
                                                            <span></span>
                                                        </label>
                                                        
                                                    </div>
                                                </div>
                                            </div>											




<!-- Column right END -->	











	
	
	
	
	
	
	
							
</div>							
								
	<?php }?>										
											
											
										
										
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
												
<input type="submit" value="<?php if(isset($_GET['edit'])){ echo 'Update';}else{echo 'Add Record';}?>" name="submit" class="btn green">
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
		

		
   