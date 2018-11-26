<?php 
$page_name = 'transactions';
$current_page = 'add_transaction';
$table_name = 'win_finance';
if(isset($_POST['submit'])){
$trans_date = $_POST['trans_date'];
$description = $_POST['description'];
$conversion_rate = $_POST['conversion_rate'];
$user_id = $_POST['user_id'];
$car_id = $_POST['car_id'];
$currency = $_POST['currency'];
$amount = $_POST['amount'];
$is_jp_transaction = $_POST['is_jp_transaction'];

$date = time();
//print_r($_POST); // 'form posted';
	if($_POST['form_typo'] != 'edit'){
$result = mysql_query("SELECT * FROM win_finance where reg_date = '$date'");
$num_rows = mysql_num_rows($result);
//echo $num_rows;
			if($num_rows <= '0')
				{
						mysql_query("INSERT INTO win_finance set 
		`trans_date` = '$trans_date',
		`description` = '$description',
        `conversion_rate` = '$conversion_rate',
        `user_id` = '$user_id',
		`car_id` = '$car_id',	
		`currency` = '$currency',	
		`amount` = '$amount',
		`is_jp_transaction` = '$is_jp_transaction',
		`bid_id` = '0',					
						`reg_date` = '$date'
						");
						$success = '1';
						//echo $success ;
				?>
				<meta http-equiv="refresh" content="0;URL='index.php?p=<?php echo $page_name;?>'" /><?php 
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
		`trans_date` = '$trans_date',
		`description` = '$description',
        `conversion_rate` = '$conversion_rate',
        `user_id` = '$user_id',
		`car_id` = '$car_id',	
		`currency` = '$currency',	
		`is_jp_transaction` = '$is_jp_transaction',
		`amount` = '$amount'
		WHERE id = '$uid'
		");
		$success = '2';
		?>				<meta http-equiv="refresh" content="0;URL='index.php?p=<?php echo $page_name;?>'" /><?php 
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
										<?php if(isset($_GET['edit'])){echo "Edit Transaction";}else{echo 'Add New Transaction';}?>
										
										</span>
                                    </div>
                                   
                                </div>
                                <div class="portlet-body">
                                    <!-- BEGIN FORM-->

								



 <form  action="index.php?p=<?php echo $current_page;?><?php if(isset($_GET['edit'])){echo "&id=".$row['id']."&edit=1";}?>" method="post" id="form_sample_2" class="form-horizontal">

								
                                        <div class="form-body">
<?php include("form-alerts.php");?>
<input type="hidden" name="uid" <?php if(isset($_GET['edit'])){echo "value=".$row['id']."";}?>>	




<script>
function showHint(str) {
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET", "forms/get_cars.php?q="+str, true);
        xmlhttp.send();
    }
}
</script>

 <div class="form-group ">
                                                <label class="control-label col-md-3">USER NAME
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                    


<select class="form-control" name="user_id" onchange="showHint(this.value)" required>
	
	<?php if(isset($_GET['edit'])){
	$user_id = $row['user_id'];
	$usrs = mysql_query("select * from users where id = '$user_id'");
	$rowsa = mysql_fetch_assoc($usrs);
	?>
	<option value="<?php echo $rowsa['id'];?>" selected="selected"><?php echo $rowsa['name'];?> <?php echo $rowsa['lastname'];?> [<?php echo $rowsa['username'];?>]</option>
	<?php }?>
	<option value="0" <?php if(isset($_GET['edit'])){?>disabled="disabled"<?php }?>>Select...</option>
	<?php $usr = mysql_query("select * from users where is_active = '1' order by id asc");
while($usr_row = mysql_fetch_array($usr)){
?> 
	<option value="<?php echo $usr_row['id'];?>"><?php echo $usr_row['name'];?> <?php echo $usr_row['lastname'];?> [<?php echo $usr_row['username'];?>]</option>
	<?php }?>
</select>
														
														</div>
                                                </div>
                                            </div>






	
<div class="form-group  margin-top-20">
                                                <label class="control-label col-md-3">Currency 
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
      <!--  <input type="hidden" name="currency" value="JPY">-->                                              
  <?php if(isset($_GET['edit'])){?>
  
  
   <label>
  <input type="radio" name="currency"  value="JPY" <?php if($row['currency'] == 'JPY'){?>checked="checked"<?php }?>  />&nbsp;JPY
  </label>&nbsp;&nbsp;&nbsp;&nbsp;
  <label>
  <input type="radio" name="currency" value="PKR" <?php if($row['currency'] == 'PKR'){?>checked="checked"<?php }?> />&nbsp;PKR
  </label>&nbsp;&nbsp;&nbsp;&nbsp;
  <label>
  <input type="radio" name="currency" value="AUD" <?php if($row['currency'] == 'AUD'){?>checked="checked"<?php }?> />&nbsp;AUD
  </label>&nbsp;&nbsp;&nbsp;&nbsp;
  <label>
  <input type="radio" name="currency" value="LKR" <?php if($row['currency'] == 'LKR'){?>checked="checked"<?php }?> />&nbsp;LKR
</label>       
  
  
  <?php } else{?>
  <label>
  <input type="radio" name="currency"  value="JPY" checked="checked" />&nbsp;JPY
  </label>&nbsp;&nbsp;&nbsp;&nbsp;
  <label>
  <input type="radio" name="currency" value="PKR" />&nbsp;PKR
  </label>&nbsp;&nbsp;&nbsp;&nbsp;
  <label>
  <input type="radio" name="currency" value="AUD" />&nbsp;AUD
  </label>&nbsp;&nbsp;&nbsp;&nbsp;
  <label>
  <input type="radio" name="currency" value="LKR" />&nbsp;LKR
</label>       

<?php }?>                                                  
                                                        </div>
                                                </div>
                                            </div>



                                            <div class="form-group  margin-top-20">
                                                <label class="control-label col-md-3">PAYMENT FOR
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                    
	<span id="txtHint">
	<?php if(isset($_GET['edit'])){
	
	$car_id = $row['car_id'];
	$user_id = $row['user_id'];
	?>
<select  class="form-control" name="car_id" >


<?php if($car_id == '0'){?><option value="0" disabled="disabled">--------------</option><?php }?>
<?php if($car_id == '1'){?><option value="1">BOOKING</option><?php }?>
<?php if($car_id == '2'){?><option value="2">SECURITY DEPOSIT</option><?php }?>



<?php 
	$cars = mysql_query("select * from winingcars where id = '$car_id'");
	while($row_cars = mysql_fetch_array($cars))
	{
	?>
<option value="<?php echo $row_cars['id'];?>" selected="selected">[<?php echo $row_cars['id'];?>] <?php echo $row_cars['make'];?> <?php echo $row_cars['name'];?> </option>
<?php }?>



<?php 
	$cars = mysql_query("select * from winingcars where user_id = '$user_id' AND id != '$car_id'");
	while($row_cars = mysql_fetch_array($cars))
	{
	?>
<option value="<?php echo $row_cars['id'];?>">[<?php echo $row_cars['id'];?>] <?php echo $row_cars['make'];?> <?php echo $row_cars['name'];?> </option>
<?php }?>

<option value="0" disabled="disabled">--------------</option>
<option value="1">BOOKING</option>
<option value="2">SECURITY DEPOSIT</option>
</select>

<?php }?>
	</span>

														
														</div>
                                                </div>
                                            </div>


<div class="form-group  margin-top-20">
                                                <label class="control-label col-md-3">Conversion Rate 1 JPY = 
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                    
    <input type="text" class="form-control" name="conversion_rate" <?php if(isset($_GET['edit'])){echo "value=".$row['conversion_rate']."";}else {echo "value='1'";}?> /> 
                                                         
                                                        </div>
                                                </div>
                                            </div>
<div class="form-group  margin-top-20">
                                                <label class="control-label col-md-3">Amount JPY
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                    
    <input type="text" class="form-control" name="amount" <?php if(isset($_GET['edit'])){echo "value=".$row['amount']."";}?> /> 
                                                     
                                                        </div>
                                                </div>
                                            </div> 
<div class="form-group  margin-top-20">
                                                <label class="control-label col-md-3">Description
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
 <textarea class="form-control" name="description">
  <?php if(isset($_GET['edit'])){echo $row['description'];}?>
 </textarea>     
 <!--                                              
    <input type="text" class="form-control" name="description" <?php if(isset($_GET['edit'])){echo "value=".$row['description']."";}?> /> 
  -->                                                   
                                                        </div>
                                                </div>
                                            </div>                                            

<div class="form-group  margin-top-20">
                                                <label class="control-label col-md-3">Transaction Date
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                    
    <input type="text" class="form-control" name="trans_date" <?php if(isset($_GET['edit'])){echo "value=".$row['trans_date']."";}else{echo "value=".date('d-m-Y',time())."";}?> /> 
                                                        
                                                        </div>
                                                </div>
                                            </div>  

		
<div class="form-group  margin-top-20">
                                                <label class="control-label col-md-3">Transaction for 
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
      <!--  <input type="hidden" name="currency" value="JPY">-->                                              
  <?php if(isset($_GET['edit'])){?>
  
  
   <label>
  <input type="radio" name="is_jp_transaction"  value="1" <?php if($row['is_jp_transaction'] == '1'){?>checked="checked"<?php }?>  />&nbsp; Car Payment in Japan (JPY)
  </label>&nbsp;&nbsp;&nbsp;&nbsp;
  <label>
  <input type="radio" name="is_jp_transaction" value="0" <?php if($row['is_jp_transaction'] == '0'){?>checked="checked"<?php }?> />&nbsp;Local Country Payment (Duty / Booking / etc)
  </label>&nbsp;&nbsp;&nbsp;&nbsp;
 
  
  <?php } else{?>
  <label>
  <input type="radio" name="is_jp_transaction"  value="1" checked="checked" />&nbsp;Car Payment in Japan (JPY)
  </label>&nbsp;&nbsp;&nbsp;&nbsp;
  <label>
  <input type="radio" name="is_jp_transaction" value="0" />&nbsp;Local Country Payment (Duty / Booking / etc)
  </label>&nbsp;&nbsp;&nbsp;&nbsp;
  <label>

<?php }?>                                                  
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
   