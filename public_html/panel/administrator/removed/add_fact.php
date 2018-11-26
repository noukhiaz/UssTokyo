<?php 
$page_name = 'facts';
$current_page = 'add_fact';
$table_name = 'fact_reports';
if(isset($_POST['submit'])){
$name = $_POST['name'];
//$file_name = $_POST['file_name'];
$is_active = $_POST['is_active'];
$date = time();
//print_r($_POST); // 'form posted';
//////////////////////////////////////////////////////////////////////////////////////////////
$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$file_name = basename( $_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
//$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
echo $imageFileType ;
/*if(isset($_POST["submit"])) {
   // $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
     $check = (!isset($_FILES["fileToUpload"]["name"]));
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}*/
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
/*if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}*/
// Allow certain file formats
/*if($imageFileType == "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" )*/
if($imageFileType == "exe") {
    echo "Sorry, only JPG, JPEG, PNG, Word, PDF & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
       // echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
//////////////////////////////////////////////////////////////////////////////////////////////
	if($_POST['form_typo'] != 'edit'){
$result = mysql_query("SELECT * FROM $table_name where name = '$name'");
$num_rows = mysql_num_rows($result);
			if($num_rows <= '0')
				{
						mysql_query("INSERT INTO $table_name set 
						`name` = '$name',
						`is_active` = '$is_active',
                        `file_name` = '$file_name',
                        `file_type` = '$imageFileType',
						`reg_date` = '$date'
						");
						$success = '1';
										
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
        `file_name` = '$file_name',
        `file_type` = '$imageFileType',
		`is_active` = '$is_active'
		WHERE id = '$uid'
		");
		$success = '2';
		
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
										<?php if(isset($_GET['edit'])){echo "Edit Fact Sheet";}else{echo 'Add new Fact Sheet';}?>
										
										</span>
                                    </div>
                                   
                                </div>
                                <div class="portlet-body">
                                    <!-- BEGIN FORM-->

								



 <form  action="index.php?p=<?php echo $current_page;?><?php if(isset($_GET['edit'])){echo "&id=".$row['id']."&edit=1";}?>" method="post" id="form_sample_2"  enctype="multipart/form-data" class="form-horizontal">

								
                                        <div class="form-body">
<?php include("form-alerts.php");?>
<input type="hidden" name="uid" <?php if(isset($_GET['edit'])){echo "value=".$row['id']."";}?>>	
                                            
                                            <div class="form-group  margin-top-20">
                                                <label class="control-label col-md-3">Title
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
<input type="text" class="form-control" name="name" <?php if(isset($_GET['edit'])){ ?> value="<?php echo $row['name'];?>"<?php }?> /> 
														</div>
                                                </div>
                                            </div>
                                            <div class="form-group  margin-top-20">
                                                <label class="control-label col-md-3">File
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
    <input type="file" name="fileToUpload" class="form-control" <?php if(isset($_GET['edit'])){ ?> value="<?php echo $row['file_name'];?>"<?php }?>  id="fileToUpload" required>

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
   