<?php
$id = $_GET['id'];
$sql = mysql_query("SELECT * from incidents where id = '$id' ");
$row = mysql_fetch_array($sql);

?>	 
<style>
.font-black{ color:#000000 !important;}
</style>                   
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN PROFILE SIDEBAR -->
                            <div class="profile-sidebar">

                                <!-- PORTLET MAIN -->
                                <div class="portlet light bordered">

                                    <div>
									
<?php
if($row['category'] == '1')
{
$optiona = 'Victims';
$optionb = 'Wounded';
$optionc = 'Damage Loss'; 
	$tablec = 'damage';
	$damage = $row['optionc'];
	$damages = mysql_query("select * from $tablec where id = '$damage'");
	$rowsedes = mysql_fetch_assoc($damages);
	$msgc = '<a href="index.php?p=incidents&search=1&optionc='.$rowsedes['id'].'"  class="font-black">'.$rowsedes['name'].'</a>';
	
$optiond = '';
$optione = '';
$optionf = '';
$option_multia  = 'Modus Operandi';
$option_multib  = 'Perpetrator';
$option_multic  = 'Terrorists Target';
$option_multid  = 'For Casualties & Injured';
$option_multie  = 'Weapons Used by Terrorists';
$option_multif  = ''; 
?>									
<span class="caption-subject bold font-blue uppercase">PSM ID: </span>
<span class="caption-helper bold font-black"><?php echo $row['id'];?></span>
<hr />

<span class="caption-subject bold font-blue uppercase"><?php echo $optiona;?>: </span>
<span class="caption-helper bold font-black"><?php echo $row['optiona'];?></span>
<hr />

<span class="caption-subject bold font-blue uppercase"><?php echo $optionb;?>: </span>
<span class="caption-helper bold font-black"><?php echo $row['optionb'];?></span>
<hr />

<span class="caption-subject bold font-blue uppercase"><?php echo $optionc;?>: </span>
<span class="caption-helper bold font-black"><?php echo $msgc;?></span>
<hr />

<span class="caption-subject bold font-blue uppercase"><?php echo $option_multia;?>: </span>
<span class="caption-helper bold font-black">
<?php $modus_id = $row['option_multia'];
	$multi_a = explode(',', $modus_id);
	$sep = '';
	$result = '';
	foreach($multi_a as $multiplea_values){
    $modus_ida = $multiplea_values;
	$modus = mysql_query("select * from modus where id = '$modus_ida'");
	$rowsss = mysql_fetch_assoc($modus);
	$ssss[] = '<a href="index.php?p=incidents&search=1&option_multia='.$rowsss['id'].'"  class="font-black">'.$sep.$rowsss['name'].' </a>';
	}
	echo implode(' / ', $ssss);
?></span>
<hr />


<span class="caption-subject bold font-blue uppercase"><?php echo $option_multib;?> : </span>
<span class="caption-helper bold font-black">
<?php $option_multib = $row['option_multib'];
	$option_multib = explode(',', $option_multib);
	foreach($option_multib as $multiple_values){
    $option_multib = $multiple_values;  
	$option_multibb = mysql_query("select * from perpetrator_groups where id = '$option_multib'");
	$option_multibbv = mysql_fetch_assoc($option_multibb);
	$short_name = $option_multibbv['short_name'];
	if($short_name != ''){ $short_name = ' ('.$short_name.')';} else{$short_name = '';}
    $s[] = '<a href="index.php?p=incidents&search=1&option_multib='.$option_multibbv['id'].'"  class="font-black">'.$sep.$option_multibbv['name'].$short_name.'</a>';
	}
	echo implode(' / ', $s);
	?>
	 
</span>


<hr />
<span class="caption-subject bold font-blue uppercase"><?php echo $option_multic;?>: </span>
<span class="caption-helper bold font-black"><?php 
	$option_multic = $row['option_multic'];
	$multi_c = explode(',', $option_multic);
	foreach($multi_c as $multiplec_values){
    $targets = $multiplec_values;  
	$targets = mysql_query("select * from target_types where id = '$targets'");
	$rows = mysql_fetch_assoc($targets);
	$sasss[] = '<a href="index.php?p=incidents&search=1&option_multic='.$rows['id'].'"  class="font-black">'.$sep.$rows['name'].' </a>';
	}
	echo implode(' / ', $sasss);
	?>
	</span>
<hr />


<span class="caption-subject bold font-blue uppercase"><?php echo $option_multid;?>: </span>
<span class="caption-helper bold font-black">
<?php 
	$option_multid = $row['option_multid'];
	$multi_d = explode(',', $option_multid);
	foreach($multi_d as $multipled_values){
    $natured = $multipled_values;  
	$natures = mysql_query("select * from nature_types where id = '$natured'");
	$rowsesd = mysql_fetch_assoc($natures);
	$sses[] = '<a href="index.php?p=incidents&search=1&option_multic='.$rowsesd['id'].'"  class="font-black">'.$sep.$rowsesd['name'].' </a>';
	}
	echo implode(' / ', $sses);
	 ?>
	</span>
<hr />



<span class="caption-subject bold font-blue uppercase"><?php echo $option_multie;?>: </span>
<span class="caption-helper bold font-black"><?php 
	$option_multie = $row['option_multie'];
	$multi_e = explode(',', $option_multie);
	foreach($multi_e as $multiplee_values){
    $weapan = $multiplee_values;  
	$weapon = mysql_query("select * from weapon where id = '$weapan'");
	$rowses_weap = mysql_fetch_assoc($weapon);
$ssaaas[] = '<a href="index.php?p=incidents&search=1&option_multid='.$rowses_weap['id'].'"  class="font-black">'.$sep.$rowses_weap['name'].' </a>';
	}
	echo implode(' / ', $ssaaas);
	?>
	</span>
<hr />





<?php }?>


<span class="caption-subject bold font-blue uppercase">Category : </span>
<span class="caption-helper bold font-black">
<?php
	$category = $row['category'];
	$category = mysql_query("select * from categories where id = '$category'");
	$rowses_cat = mysql_fetch_assoc($category);
	?>
<a href="index.php?p=incidents&search=1&category=<?php echo $rowses_cat['id'];?>"  class="font-black"><?php echo $rowses_cat['name'];?></a>
</span>
										
										
<hr />
<span class="caption-subject bold font-blue uppercase">Region : </span>
<span class="caption-helper bold font-black">
<?php
	$region_id = $row['region_id'];
	$region_id = mysql_query("select * from countries_region where id = '$region_id'");
	$rowses_region = mysql_fetch_assoc($region_id);
	?>
<a href="index.php?p=incidents&search=1&region=<?php echo $rowses_region['id'];?>"  class="font-black"><?php echo $rowses_region['name'];?></a>
</span>

<hr />
<span class="caption-subject bold font-blue uppercase">Country : </span>
<span class="caption-helper bold font-black">
<?php 
	$country_id = $row['country_id'];
	$country_id = mysql_query("select * from countries where id = '$country_id'");
	$rowses_contry = mysql_fetch_assoc($country_id);
?>
<a href="index.php?p=incidents&search=1&country_id=<?php echo $rowses_contry['id'];?>" class="font-black" ><?php echo $rowses_contry['name'];?></a>
</span>


<hr />
<span class="caption-subject bold font-blue uppercase">Province : </span>
<span class="caption-helper bold font-black">
<?php 
	$province_id = $row['province_id'];
	$province_id = mysql_query("select * from countries_province where id = '$province_id'");
	$rowses_province = mysql_fetch_assoc($province_id);
	?>
<a href="index.php?p=incidents&search=1&province=<?php echo $rowses_province['id'];?>" class="font-black"><?php echo $rowses_province['name'];?></a>
</span>

<hr />
<span class="caption-subject bold font-blue uppercase">City : </span>
<span class="caption-helper bold font-black">
<?php
	$city_id = $row['city_id'];
	$city_id = mysql_query("select * from countries_cities where id = '$city_id'");
	$rowses_city = mysql_fetch_assoc($city_id);
	?>
<a href="index.php?p=incidents&search=1&city=<?php echo $rowses_city['id'];?>" class="font-black"><?php echo $rowses_city['name'];?></a>
</span>



										
										<!---
                                        <div class="margin-top-20 profile-desc-link">
                                            <i class="fa fa-globe"></i>
                                            <a href="http://www.keenthemes.com">www.keenthemes.com</a>
                                        </div>
                                        <div class="margin-top-20 profile-desc-link">
                                            <i class="fa fa-twitter"></i>
                                            <a href="http://www.twitter.com/keenthemes/">@keenthemes</a>
                                        </div>
                                        <div class="margin-top-20 profile-desc-link">
                                            <i class="fa fa-facebook"></i>
                                            <a href="http://www.facebook.com/keenthemes/">keenthemes</a>
                                        </div>-->
                                    </div>
                                </div>
                                <!-- END PORTLET MAIN -->
                            </div>
                            <!-- END BEGIN PROFILE SIDEBAR -->
                            <!-- BEGIN PROFILE CONTENT -->
                         
											
											
											
						<!-- Content start here------------->					
									
						 <div class="profile-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="portlet light bordered">
										
										 <div class="portlet-title">
										 <div class="caption font-red-sunglo"><!--
												<i class="icon-settings font-red-sunglo"></i>-->
												<span class="caption-subject bold uppercase"> <?php echo $row['name'];?></span>
												</div>
									<div class="actions">
                                        <div class="btn-group">
                                            <a class="btn btn-sm green dropdown-toggle" href="javascript:;" data-toggle="dropdown"> Actions
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="index.php?p=add_incident&id=<?php echo $row['id'];?>&edit=1"><i class="icon-pencil"></i> Edit </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
<div class="form-group m-form__group row">
						<div class="col-lg-6">
							<small><i class="fa fa-clock-o"></i> Posted at: <?php echo $row['incident_date'];?> - <?php echo $row['incident_time'];?> </small>
						</div>
						<div class="col-lg-6" style="text-align: right;">
							<small>
<a href="#"><i class="fa fa-envelope-o"></i> Follow this: <?php echo $row['incident_date'];?> - <?php echo $row['incident_time'];?> </a>
</small>
						</div>
					</div>	                                




												
											<h6 class="caption-subject bold uppercase"></h6>		
											 <?php echo $row['short_descip'];?> 
										</div>
									</div>
								</div>
							</div>
											
											
											
											
											
											
											
											
						<!-- Content start here-->					
									
						 <div class="profile-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="portlet light bordered">	
											<h6 class="caption-subject bold uppercase">Full Story</h6>
											<hr />	
													<?php echo $row['description'];
													 //echo nl2br($row['description']);
													 ?>
										</div>
									</div>
								</div>
							</div>
							<!-- Content END here----------------- -->				
									
									
									
									
									
									
									
									
									
									
									
							<?php if(($row['sourcea'] !='') && ($row['sourceb'] !='') && ($row['sourcec'] !='')){?>		
									
							<div class="profile-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="portlet light bordered">		
											
											<h4>Sources and other links</h4>
											<div class="margin-top-20 profile-desc-link">
											
											<?php if($row['type_playa'] == '1'){$typess =  'vimeo';}?>
											<?php if($row['type_playa'] == '2'){$typess =  'youtube';}?>
											<?php if($row['type_playa'] == '3'){$typess = 'globe';}?>
											
											<?php if($row['sourcea'] !=''){?>
											
                                            <i class="fa fa-<?php echo $typess;?>"></i> 
											Source 1: <br />

                                            <?php 
											if($row['type_playa'] == '3'){?>
											<a href="<?php echo $row['sourcea'];?>"><?php echo $row['sourcea'];?></a><?php }else
											{echo $row['sourcea'];}?>
											<?php }?>
                                        	</div>
											
											
											
											
											
											
											
											
											<div class="margin-top-20 profile-desc-link">
											
											<?php if($row['type_playb'] == '1'){$typess =  'vimeo';}?>
											<?php if($row['type_playb'] == '2'){$typess =  'youtube';}?>
											<?php if($row['type_playb'] == '3'){$typess = 'globe';}?>
											
											<?php if($row['sourceb'] !=''){?>
                                            <i class="fa fa-<?php echo $typess;?>"></i> 
											Source 2: <br />

                                            <?php 
											if($row['type_playb'] == '3'){?>
											<a href="<?php echo $row['sourceb'];?>"><?php echo $row['sourceb'];?></a><?php }else
											{echo $row['sourceb'];}?>
											<?php }?>
                                        	</div>
											
											
											
											
											
											
											
											
											<div class="margin-top-20 profile-desc-link">
											
											<?php if($row['type_playc'] == '1'){$typess =  'vimeo';}?>
											<?php if($row['type_playc'] == '2'){$typess =  'youtube';}?>
											<?php if($row['type_playc'] == '3'){$typess = 'globe';}?>
											
											<?php if($row['sourcec'] !=''){?>
                                            <i class="fa fa-<?php echo $typess;?>"></i> 
											Source 3: <br />

                                            <?php 
											if($row['type_playc'] == '3'){?>
											<a href="<?php echo $row['sourcec'];?>"><?php echo $row['sourcec'];?></a><?php }else
											{echo $row['sourcec'];}?>
											<?php }?>
                                        	</div>
											
											
											
											
											
                                         </div>
										</div>
									</div>
								</div>
								<?php }?>



						</div>
						
					</div>
						<div style="border:0px solid #333333;">
						
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d106384.18136617204!2d72.96299266108123!3d33.56621780465293!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38df948974419acb%3A0x984357e1632d30f!2s<?php echo $rowses_city['name'];?>%2C+Pakistan!5e0!3m2!1sen!2s!4v1507187352270" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
						
						</div>
								
      <?php include("table-footer-js.php");?>  