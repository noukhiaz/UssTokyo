<?php 
$page_name = 'pix';
$current_page = 'add_pic';
$table_name = 'car_pix';
if(isset($_POST['submit'])){
$is_yard = $_POST['is_yard'];
$car_id = $_POST['car_id'];
$reg_date = time();
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
$valid_formats = array("jpg", "png", "gif", "zip", "bmp");
$max_file_size = 1024*1000; //100 kb
$path = "../../uploads/"; // Upload directory
$count = 0;
$reg_date = time();
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
			
			$random_digit=rand(0000,9999);
			$new_file_name=$random_digit.$pic_name;
			
	            if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$new_file_name))
				mysql_query("INSERT into car_pix (`reg_date`,`car_id`,`is_yard`,`pic_name`) VALUES('$reg_date','$car_id','$is_yard','$new_file_name')");
	            $count++; // Number of successfully uploaded file
	        }
	    }
	}
	?><meta http-equiv="refresh" content="0;URL='index.php?p=<?php echo $page_name;?>'" /><?php 
//	header("location: index.php?p=$page_name");	
				}
			else
				{
					$success = '3';
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
} else {$form_type = 'add';}?>	
<div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN VALIDATION STATES-->
                            <div class="portlet light portlet-fit portlet-form bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <span class="caption-subject font-dark  bold uppercase">
										<?php if(isset($_GET['edit'])){echo "Edit Picture";}else{echo 'Add new Picture';}?>
										
										</span>
                                    </div>
                                   
                                </div>
                                <div class="portlet-body">
                                    <!-- BEGIN FORM-->
 <form  action="index.php?p=<?php echo $current_page;?><?php if(isset($_GET['edit'])){echo "&id=".$row['id']."&edit=1";}?>" method="post" id="form_sample_2" class="form-horizontal"enctype="multipart/form-data">

								
                                        <div class="form-body">
<?php include("form-alerts.php");?>
<input type="hidden" name="uid" <?php if(isset($_GET['edit'])){echo "value=".$row['id']."";}?>>	
                                            
											

<input type="hidden"  name="reg_date" value="<?php echo time();?>" />



<div>

<!-- Column left START -->
<div class="col-md-6">

<div class="form-group">
<label class="control-label col-md-4">Car ID
 <span class="required"> * </span>
</label>
<div class="col-md-8">
 <div class="input-icon right">
<i class="fa"></i>
<?php if(isset($_GET['carid'])){?><input type="text" value="<?php echo $_GET['carid'];?>"  name="car_id" /><?php }else{?>
<input type="text"  name="car_id" />
<?php }?>
</div>
</div>
</div>
</div>

<div class="col-md-6">

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

<div class="form-group  margin-top-20">
                                                <label class="control-label col-md-3">Picture Type 
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
      <!--  <input type="hidden" name="currency" value="JPY">-->                                              
  
  <label>
  <input type="radio" name="is_yard"  value="0" checked="checked" />&nbsp;Auction
  </label>&nbsp;&nbsp;&nbsp;&nbsp;
  <label>
  <input type="radio" name="is_yard" value="1" />&nbsp;Yard
  </label>&nbsp;&nbsp;&nbsp;&nbsp;
  <label>
                                           
                                                        </div>
                                                </div>
                                            </div>					
</div>
<?php }?>





</div>
<!-- Column left END -->








	
	
	
	
							
</div>							
								
											
											
											
										
										
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
		

		
   