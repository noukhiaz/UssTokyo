<input type="hidden" name="form_typo" value="<?php echo $form_type;?>">											
<?php 
if(isset($success)){
if($success == '1'){
echo '<div class="alert alert-success"><button class="close" data-close="alert"></button> New record has been added</div>';
}
if($success == '2'){
echo '<div class="alert alert-success"><button class="close" data-close="alert"></button>Record is updated successfully</div>';
}
if($success == '3'){
echo '<div class="alert alert-danger"><button class="close" data-close="alert"></button>Sorry, You are trying to enter a duplicate record</div>';
}
}?>										
<div class="alert alert-danger display-hide"><button class="close" data-close="alert"></button> You have some form errors. Please check below.</div>
						
										
