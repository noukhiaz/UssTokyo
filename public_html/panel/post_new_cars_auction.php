<?php if(!isset($_REQUEST['id'])){?>
<form method="get" action="http://usstokyo.com/panel/administrator/index.php?p=post_new_cars_auction">

<input type="hidden" value="<?php echo $_GET['p'];?>" name="p" />

<select name="user_id" class="form-control">
	<option value="0">Select User</option>
<?php $usr = mysql_query("select * from users where is_active = '1' order by id asc");
while($usr_row = mysql_fetch_array($usr)){
?> 
	<option value="<?php echo $usr_row['id'];?>"><?php echo $usr_row['name'];?> <?php echo $usr_row['lastname'];?> [<?php echo $usr_row['username'];?>]</option>
	<?php }?>
</select>
<br />
<br />

Car ID:
<input type="text" value="" name="id" class="form-control" placeholder="gKmM3eOOlJeug" />
<br />
On car details page, copy id in URL: e.g(http://usstokyo.com/car_detail_auction.php?id=<strong>gKmM3eOOlJeug</strong>&col=0) 
<br />
<br />

<input type="submit" value="Add Car" />

</form>
<?php 
}
else{?>
<?php 
//print_r($_REQUEST);
include('../../inc_script.php');
$page_name = 'bids';
$current_page = 'add_cars_auction';
$table_name = 'winingcars';
if(isset($_POST['submit'])){
//$name = $_POST['name'];
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

$name = $_POST['name'];
$auction_country = $_POST['auction_country'];
$destination_country = $_POST['destination_country'];
$currency_rate = $_POST['currency_rate'];




error_reporting(0);



$date = time();

if($_POST['form_typo'] != 'edit'){
    
$result = mysql_query("SELECT * FROM $table_name where chasis = '$chasis'");
$num_rows = mysql_num_rows($result);
			if($num_rows <= '0')
				{
				    //print_r($_POST); // 'form posted';
					/*	mysql_query("INSERT INTO winingcars set `lotn` = '$lotn', `bid_id` = '$bid_id', `user_id` = '$user_id', 
						`freight_chrgs` = '$freight_chrgs', `comssion` = '$comssion', `inspection` = '$inspection', `vanning` = '$vanning', 
						`status` = '$status', `start_price` = '$start_price', `currency_rate` = '$currency_rate', `auction_country` = '$auction_country', 
						`destination_country` = '$destination_country', `name` = '$name', `make` = '$make', `auction_time` = '$auction_time',
						`auction_house` = '$auction_house', `packag` = '$packag', `grade` = '$grade', `fuel` = '0', `trans` = '$trans', 
						`equipment` = '$equipment', `yard` = 'asd', `chasis` = '$chasis', `mileage` = '$mileage', `displace` = '$displace', 
						`conde` = 'asd', `condi` = 'asd', `colorr` = '$colorr', `price` = '$price', `short_descip` = '$short_descip', 
						`is_active` = '$is_active', `is_auction` = '1', `year` = '$year_model' where id = ''
						");*/
						mysql_query("INSERT INTO winingcars set `lotn` = '$lotn', `bid_id` = '$bid_id', `user_id` = '$user_id', 
						`freight_chrgs` = '$freight_chrgs', `comssion` = '$comssion', `inspection` = '$inspection', `vanning` = '$vanning', 
						`status` = '$status', `start_price` = '$start_price', `currency_rate` = '$currency_rate', `auction_country` = '$auction_country', 
						`destination_country` = '$destination_country', `name` = '$name', `make` = '$make', `auction_time` = '$auction_time',
						`auction_house` = '$auction_house', `packag` = '$packag', `grade` = '$grade', `fuel` = '0', `trans` = '$trans', 
						`equipment` = '$equipment', `yard` = 'asd', `chasis` = '$chasis', `mileage` = '$mileage', `displace` = '$displace', 
						`conde` = 'asd', `condi` = 'asd', `colorr` = '$colorr', `price` = '$price', `short_descip` = '$short_descip', 
						`is_active` = '$is_active', `is_auction` = '1', `year` = '$year_model', `reg_date` = '$date'"); 
	
						
						
						echo mysql_insert_id();
						echo 'Record added successfully';
						$success = '1';
						
						
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
$valid_formats = array("jpg", "png", "gif", "zip", "bmp");
$max_file_size = 1024*1000; //100 kb
$path = "../../uploads/"; // Upload directory
$count = 0;
$car_id = mysql_insert_id();
$reg_date = time();
	// Loop $_FILES to exeicute all files
	foreach ($_FILES['files']['name'] as $f => $pic_name) {    
 
	    if ($_FILES['files']['error'][$f] == 4) {
	        continue; // Skip file if any error found
	    }	       
	    if ($_FILES['files']['error'][$f] == 0) {	           
	        if ($_FILES['files']['size'][$f] > $max_file_size) {
	            $message[] = "$pic_name is too large!.";
	            continue; // Skip large files
	        }
			elseif( ! in_array(pathinfo($pic_name, PATHINFO_EXTENSION), $valid_formats) ){
				$message[] = "$pic_name is not a valid format";
				continue; // Skip invalid file formats
			}
	        else{ // No error found! Move uploaded files 
			
	            if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$pic_name))
//	            if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$pic_name))				
				
				mysql_query("INSERT into car_pix (`reg_date`,`car_id`,`pic_name`) VALUES('$reg_date','$car_id','$pic_name')");
	            $count++; // Number of successfully uploaded file
				
	        }
	    }
	}
}
						
						
						
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
						winingcars set `lotn` = '$lotn', `bid_id` = '$bid_id', `user_id` = '$user_id', 
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
		?><meta http-equiv="refresh" content="0;URL='index.php?p=<?php echo $page_name;?>'" /><?php 
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
<?php if(isset($_GET['edit'])){?>
        xmlhttp.open("GET","get_inputs.php?id=<?php echo $_GET['id'];?>&edit=a&q="+str,true);
<?php }else{?>
        xmlhttp.open("GET","get_inputs.php?q="+str,true);
<?php }?>
        xmlhttp.send();
    }
}
</script>
<?php
$id = $_GET['id'];
$sql = mysql_query("SELECT * FROM bidding where id = '$id'");
$row = mysql_fetch_assoc($sql);
//echo $row['id'];
//echo '<br />';
//echo $row['car_id'];


  $date_now = time(); 
  $day_a  = date('d',$date_now);
  
$todate_a  = date('Y-m-d',$date_now);
$auction_date = $row['auction_date'];   
$pieces = explode("-", $auction_date);

//echo $pieces['2'];	

$mydate = $auction_date;
$todaysdate=date("Y-m-d");
if($todaysdate > $auction_date)
{
//echo 'older';
$col = '0';
$table = 'stats';
}else
{
$col = '1';
$table = 'main';
//$table = 'stats';
}
//echo '<br />';
//echo $col;

$car_id = $_GET['id'];

//echo '<br />';
//echo $car_id;
$arr = aj_get("select * from ".$table." where id='$car_id'",30,0);
 foreach($arr as $v) { 
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



									
 <form  action="index.php?p=<?php echo $current_page;?><?php if(isset($_GET['edit'])){echo "&id=".$row['id']."&edit=1";}?>" method="post" id="form_sample_2" class="form-horizontal"enctype="multipart/form-data">

								
                                        <div class="form-body">
<?php include("form-alerts.php");?>
<input type="hidden" name="uid" <?php if(isset($_GET['edit'])){echo "value=".$row['id']."";}?>>	
                                            
<input type="hidden" name="conde" value=""  class="form-control" />											
<input type="hidden" name="condi" value=""  class="form-control" />
<input type="hidden" name="yard" value=""  class="form-control" />											
<input type="hidden" name="brands_id" value=""  class="form-control" />




<input type="hidden" name="bid_id" value="0"  class="form-control" />

<input type="hidden" name="user_id" value="<?php echo $_GET['user_id'];?>"  class="form-control" />




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
<input type="text" name="freight_chrgs" <?php if(isset($_GET['edit'])){echo "value=".$row['freight_chrgs']."";}else{echo "value='0'";}?>  class="form-control" />
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
<input type="text" name="comssion" <?php if(isset($_GET['edit'])){echo "value=".$row['comssion']."";}else{echo "value='0'";}?>  class="form-control" />
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
<input type="text" name="inspection" <?php if(isset($_GET['edit'])){echo "value=".$row['inspection']."";}else{echo "value='0'";}?>  class="form-control" />
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
<input type="text" name="vanning" <?php if(isset($_GET['edit'])){echo "value=".$row['vanning']."";}else{echo "value='0'";}?>  class="form-control" />
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
	<option value="2">In Process</option>
	<option value="0">In Ship</option>
	<option value="1">In Delivered</option>
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
<input type="text" name="make" value="<?php echo $v['MARKA_NAME'];?>"  class="form-control" />
</div>
</div>
</div>

<div class="form-group">
<label class="control-label col-md-4">Year <span class="required"> * </span></label>
    <div class="col-md-8">
        <div class="input-icon right">
        <i class="fa"></i>
<input type="text" name="year_model" value="<?php echo $v['YEAR'];?>"  class="form-control" />
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
<input type="text" name="lotn" value="<?php echo $v['LOT'];?>"  class="form-control" />
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
<input type="text" name="auction_time" value="<?php echo $v['TIME'];?>"  class="form-control" />
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
<input type="text" name="auction_house" value="<?php echo $v['AUCTION'];?>"  class="form-control" />
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
<input type="text" name="grade" value="<?php echo $v['RATE'];?>"  class="form-control" />
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
<input type="text" name="equipment" value="<?php echo $v['EQUIP'];?>"  class="form-control" />
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
<input type="text" name="name" value="<?php echo $v['MODEL_NAME'];?>"  class="form-control" />			
         
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
<input type="text" name="chasis" value="<?php echo $v['KUZOV'];?>"  class="form-control" />

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
<input type="text" name="mileage" value="<?php echo $v['MILEAGE'];?>"  class="form-control" />

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
<input type="text" name="displace" value="<?php echo $v['ENG_V'];?>"  class="form-control" />

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
<input type="text" name="colorr" style="text-transform: capitalize;" value="<?php echo $v['COLOR'];?>"  class="form-control" />
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
<input type="text" name="trans" value="<?php echo $v['KPP'];?>"  class="form-control" />
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
<input type="text" name="start_price" value="<?php echo $v['START'];?>"  style="width:100px; padding-right: 33px; padding-left: 12px;     height: 34px;    padding: 6px 12px;    background-color: #fff; border: 1px solid #c2cad8;     border-radius: 4px;" />,000
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
<input type="text" name="price" value="<?php echo $v['FINISH'];?>"  style="width:100px; padding-right: 33px; padding-left: 12px;     height: 34px;    padding: 6px 12px;    background-color: #fff; border: 1px solid #c2cad8;     border-radius: 4px;" />,000
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
<input type="text" name="currency_rate" value="1"  class="form-control" />
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
<input type="text" name="packag" value="<?php echo $v['GRADE'];?>"  class="form-control" />
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
<input type="text" name="destination_country" value="Pakistan"  class="form-control" />
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
<input type="text" name="auction_country" value="Japan"  class="form-control" />
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
 <textarea class=" form-control" name="short_descip" rows="6" ><?php if(isset($_GET['edit'])){echo $row['short_descip'];}?></textarea>
</div>
</div>
</div>




<?php if(isset($_GET['edit'])){echo '';}else{?>

<div class="form-group">
<label class="control-label col-md-2">Photos
 <span class="required"> * </span>
</label>
<div class="col-md-10">
 <div class="input-icon right">
<i class="fa"></i>
<input type="file" class="form-control" name="files[]" multiple="multiple" />
</div>
</div>
</div>
<?php }?>





</div>
<!-- Column left END -->















					
											
											
<div class="form-group">
                                                <label class="control-label col-md-3">Status
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="mt-radio-list" data-error-container="#form_2_membership_error">
														<label class="mt-radio">
                                                            <input type="radio" name="is_active" value="1" <?php if(isset($_GET['edit'])){ if($row['is_active'] == '1'){echo 'checked="checked"';}}else{echo 'checked="checked"';}?>   required> Active
                                                            <span></span>
                                                        </label>
                                                        <label class="mt-radio">
                                                            <input type="radio" name="is_active" value="0" <?php if(isset($_GET['edit'])){ if($row['is_active'] == '0'){echo 'checked="checked"';}}?> required> De-Active
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
			  <?php }?>
        <?php include('form-js.php');?>
		

		
 