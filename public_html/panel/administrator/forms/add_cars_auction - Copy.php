<?php 
//print_r($_REQUEST);
include('../../inc_script.php');
$page_name = 'cars';
$current_page = 'add_cars';
$table_name = 'bidding';
if(isset($_POST['submit'])){
//$name = $_POST['name'];
$make = $_POST['make'];
$year_model = $_POST['year_model'];
$grade = $_POST['grade'];
$fuel = $_POST['fuel'];
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
$short_descip = $_POST['short_descip'];
$is_active = $_POST['is_active'];
$is_sold = $_POST['is_sold'];
$investr_id = $_POST['investr_id'];
$lotn = $_POST['lotn'];
$trans = $_POST['trans'];
$date = time();
//print_r($_POST); // 'form posted';
if($_POST['form_typo'] != 'edit'){
$result = mysql_query("SELECT * FROM $table_name where chasis = '$chasis'");
$num_rows = mysql_num_rows($result);
			if($num_rows <= '0')
				{
						mysql_query("INSERT INTO $table_name set 
						`lotn` = '$lotn',
						`trans` = '$trans',
						`make` = '$make',
						`year_model` = '$year_model',
						`grade` = '$grade',
						`fuel` = '$fuel',
						`condi` = '$condi',
						`equipment` = '$equipment',
						`yard` = '$yard',
						`brands_id` = '$brands_id',
						`chasis` = '$chasis',
						`mileage` = '$mileage',
						`displace` = '$displace',
						`conde` = '$conde',
						`colorr` = '$colorr',
						`price` = '$price',
						`short_descip` = '$short_descip',
						`is_active` = '$is_active',
						`is_sold` = '$is_sold',
						`investr_id` = '$investr_id',
						`reg_date` = '$date'
						");
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
		`lotn` = '$lotn',
						`trans` = '$trans',
						`make` = '$make',
						`year_model` = '$year_model',
						`grade` = '$grade',
						`fuel` = '$fuel',
						`condi` = '$condi',
						`equipment` = '$equipment',
						`yard` = '$yard',
						`brands_id` = '$brands_id',
						`chasis` = '$chasis',
						`mileage` = '$mileage',
						`displace` = '$displace',
						`conde` = '$conde',
						`colorr` = '$colorr',
						`price` = '$price',
						`short_descip` = '$short_descip',
						`is_sold` = '$is_sold',		
						`investr_id` = '$investr_id',				
						`is_active` = '$is_active'
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
echo $row['id'];
echo '<br />';
echo $row['car_id'];


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
}
echo '<br />';
echo $col;

$car_id = $row['car_id'];


$arr = aj_get("select * from ".$table." where id='$car_id'",30,0);
 foreach($arr as $v) { 
 echo $v['MARKA_NAME'];
 echo $v['MODEL_NAME'];

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
                                            
											






<div>

<!-- Column left START -->
<div class="col-md-6">

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
<input type="text" name="make" value="<?php echo $v['YEAR'];?>"  class="form-control" />
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
<input type="text" name="make" value="<?php echo $v['LOT'];?>"  class="form-control" />
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
<input type="text" name="make" value="<?php echo $v['TIME'];?>"  class="form-control" />
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
<input type="text" name="make" value="<?php echo $v['AUCTION'];?>"  class="form-control" />
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
<input type="text" name="make" value="<?php echo $v['RATE'];?>"  class="form-control" />
</div>
</div>
</div>





<div class="form-group">
<label class="control-label col-md-4">Equepment
 <span class="required"> * </span>
</label>
<div class="col-md-8">
 <div class="input-icon right">
<i class="fa"></i>
<input type="text" name="make" value="<?php echo $v['EQUIP'];?>"  class="form-control" />
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
<input type="text" name="make" value="<?php echo $v['GRADE'];?>"  class="form-control" />
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
<input type="text" name="make" value="<?php echo $v['MODEL_NAME'];?>"  class="form-control" />			
         
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
<input type="text" name="make" value="<?php echo $v['KUZOV'];?>"  class="form-control" />

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
<input type="text" name="make" value="<?php echo $v['MILEAGE'];?>"  class="form-control" />

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
<input type="text" name="make" value="<?php echo $v['ENG_V'];?>"  class="form-control" />

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
<input type="text" name="make" style="text-transform: capitalize;" value="<?php echo $v['COLOR'];?>"  class="form-control" />
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
<input type="text" name="make" value="<?php echo $v['KPP'];?>"  class="form-control" />
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
<input type="text" name="make" value="<?php echo $v['START'];?>"  class="form-control" />
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
<input type="text" name="make" value="<?php echo $v['FINISH'];?>"  class="form-control" />
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
<input type="text" name="make" value="<?php echo $v['STATUS'];?>"  class="form-control" />
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
                                                <label class="control-label col-md-3">Investor Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="mt-radio-list" data-error-container="#form_2_membership_error">
														 <select class="form-control" name="investr_id" >	
<?php if(isset($_GET['edit'])){?>
<option selected="selected"></option>
	<option value="0" disabled="disabled">------------------</option>
<?php $investr_id =  $row['investr_id'];

$sql_investa = mysql_query("select * from users where id = '$investr_id' ");
$sql_insta = mysql_fetch_array($sql_investa);
    print('<option value='.$sql_insta['id'].'>'.$sql_insta['name'].'</option>'."\n");

?>



<?php }else{?>	        
<option value="0"  >------------------</option>
<?php }
$sql_invest = mysql_query("select * from users where is_investr = '1' AND is_active = '1' ");
while($sql_inst = mysql_fetch_array($sql_invest)){
    print('<option value='.$sql_inst['id'].'>'.$sql_inst['name'].'</option>'."\n");
}
?>
        </select>
                                                        
                                                    </div>
                                                </div>
                                            </div>																	
											



<div class="form-group">
                                                <label class="control-label col-md-3">Sold
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="mt-radio-list" data-error-container="#form_2_membership_error">
														<label class="mt-radio">
                                                            <input type="radio" name="is_sold" value="1" <?php if(isset($_GET['edit'])){ if($row['is_sold'] == '1'){echo 'checked="checked"';}}?>  required> Yes, its Sold
                                                            <span></span>
                                                        </label>
                                                        <label class="mt-radio">
                                                            <input type="radio" name="is_sold" value="0" <?php if(isset($_GET['edit'])){ if($row['is_sold'] == '0'){echo 'checked="checked"';}}?> required> No
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
		

		
   