<style type="text/css">
	select{color: #000;}

</style>
<!-- extra row -->			
<div class="col-lg-12 col-md-12 col-sm-12">
	<div class="row">
		
		<div class="col-lg-5 co5-md-5"><h4>Find your car</h4></div>
		<div class="col-lg-2 co2-md-2" style="font-weight:bold;">
		<?php $timezone  = +8; 
//echo gmdate("D j M Y  H:i:s a", time() + 3600*($timezone+date("I"))); ?>
		<a href="my_bids.php?date=<?php 
		echo gmdate("Y-m-d", time() + 3600*($timezone+date("I")));
		//echo date('Y-m-d',time());?>">My List</a>
		</div>
		<div class="col-lg-5 co5-md-5" style="text-align:right;">
		
		<span style="color:#CC0000;display: inline;">
		   <strong>Japan Standard Time</strong></span> | 
<span style="color:#000000; display: inline;">
<?php
/*
$zone=3600*+9 ;
$date=gmdate("D d M Y H:i", time() + $zone); 
echo $date;*/
?>
<!--
<script>
function date_time(id)
{
        date = new Date;
        year = date.getFullYear();
        month = date.getMonth();
        //months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'Jully', 'August', 'September', 'October', 'November', 'December');
		months = new Array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
        d = date.getDate();
        day = date.getDay();
        //days = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
		days = new Array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat');
        h = date.getHours() + 4;
        if(h<10)
        {
                h = "0"+h;
        }
        m = date.getMinutes();
        if(m<10)
        {
                m = "0"+m;
        }
        s = date.getSeconds();
        if(s<10)
        {
                s = "0"+s;
        }
        result = ''+days[day]+' '+d+' '+months[month]+'  '+year+' '+h+':'+m+':'+s;
        document.getElementById(id).innerHTML = result;
        setTimeout('date_time("'+id+'");','1000');
        return true;
}
</script>
 <span id="date_time"></span>
            <script type="text/javascript">window.onload = date_time('date_time');</script>
</span>-->
<?php $timezone  = +8; //(GMT -5:00) EST (U.S. & Canada) 
echo gmdate("D j M Y  H:i:s A", time() + 3600*($timezone+date("I"))); ?>
		</div>
		
	</div>
</div>				  
	<!-- extra row -->			  
			
 <div class="col-lg-12 col-md-12 col-sm-12">
<div class="row">
				  
				  
<!--				  <div class="col-lg-1 col-md-1">&nbsp;</div>-->
                     <div class="contact-form">




<form method="get" class="form-horizontal " action="auction.php" target="_blank">
<div class="col-lg-3 col-md-3 bg_contnainer" style="padding-bottom:4px;">
	<div class="form-group">
		<div class="cont_field">
		<h4 class="cont_title">Make:</h4>
		 <select size="20" class="form-control make_field" style="width: 100%;"  name="mark_name" onChange="showModel(this.value)">
		<?php $get_companya = aj_get("select marka_id,marka_name from main 
		
		
		WHERE MARKA_NAME IN (
		'RENAULT',
		'PEUGEOT',
		'CITROEN',
		'FIAT',
		'ALFAROMEO',
		'FORD',
		'CHRYSLER',
		'GM',
		'ROVER',
		'VOLVO',
		'OPEL',
		'VOLKSWAGEN',
		'AUDI',
		'BMW',
		'MERCEDES BENZ',
		'ISUZU',
		'SUBARU',
		'DAIHATSU',
		'SUZUKI',
		'MAZDA', 
		'MITSUBISHI',
		'HONDA',
		'NISSAN',
		'TOYOTA',
		'PORSCHE')
		   group by marka_id 
		   ORDER BY FIELD(MARKA_NAME,   
		'RENAULT',
		'PEUGEOT',
		'CITROEN',
		'FIAT',
		'ALFAROMEO',
		'FORD',
		'CHRYSLER',
		'GM',
		'ROVER',
		'VOLVO',
		'OPEL',
		'VOLKSWAGEN',
		'AUDI',
		'BMW',
		'MERCEDES BENZ',
		'ISUZU',
		'SUBARU',
		'DAIHATSU',
		'SUZUKI',
		'MAZDA', 
		'MITSUBISHI',
		'HONDA',
		'NISSAN',
		'TOYOTA'
		) DESC",120,0); // 1=>debug  // 120 min = 2 hour
		foreach($get_companya as $v) {?>
		<option style="font-size:15px;" value="<?php echo $v['MARKA_NAME'];?>"><?php echo $v['MARKA_NAME'];?></option>
		 <?php } ?>
		 </select>
		</div>								 
	</div>
</div>

<div class="col-lg-3 col-md-3 bg_contnainer">
	<div class="form-group">
		<div class="cont_field">
		<h4 class="cont_title">Model:</h4>
			<div id="__model">
			<?php $arr = aj_get("select model_id, model_name, count(*)  from main WHERE MARKA_NAME = 'TOYOTA' group by model_name order by model_name",60,0);?>
			<select name="model" size="20" style="width: 100%;" onchange='showAuction(this.value)' id="showAuctionOptions" class="make_field">
			<?php  foreach($arr as $v) { ?>
			<option style="font-size:15px;" value="<?php echo $v['MODEL_NAME'];?>"><?php echo $v['MODEL_NAME'] ; ?>
			</option><?php }?>
			</select>
			</div>
		</div>
	</div>
</div>

									<?php 
//$zone=3600*+9 ;
//$date= 
//echo $date;									
                                    $date = gmdate(time() + $zone);
                                    $datesa = gmdate("Y-m-d", time() + $zone); //date('Y-m-d', $date);
                                    $day_final = gmdate("d", time() + $zone);//date('d', $date);
                                    $day_number = gmdate("N", time() + $zone); //date('N', $day_final);
                                    $dates = gmdate("Y-m", time() + $zone);//date('Y-m', $date);
                                    $day = date('Y-m-d', strtotime($datesa.' +1 Weekday'));
                                    $perday = 86400;
                                    $daya = $day;
                                    $dayb = $day+($perday*2);
                                    $dayc = $day+$perday;
                                    $dayd = $day+$perday;
                                    $daye = $day+$perday;
                                    $dayf = $day+$perday;
                                    $date = $datesa;
                                    $ts = strtotime($date);
                                    $dow = date('w', $ts);
                                    $offset = $dow - 1;
                                    if ($offset < 0) {
                                        $offset = 6;
                                    }
                                    $ts = $ts - $offset*86400;
date_default_timezone_set("Asia/Tokyo");
//echo date_default_timezone_get();                                    
$time = time(); 

//echo date('d-m-Y h:m A',$time);
									//isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
									//$prev_date = date('Y-m-d', strtotime($date .' -1 day'));
									//$next_date = date('Y-m-d', strtotime($date .' +1 day'));
                                    ?>

<div class="col-lg-3 col-md-3 bg_contnainer">
	<div class="form-group">
		<div class="cont_field" style="height: 42px; margin-bottom:10px;">
		<h4 class="cont_title" style="float:left;">Date:</h4>                                                                 
		<select name="date" id="selectAuctioneer" onchange='showAuctionDate(this.value)' style="width: 97px !important; height:24px;padding: 0px;border: 1px solid #999999; min-width:97px; float:right;">
<!--		<option value=""></option>-->
		<option><?php  echo date("Y-m-d", mktime(0,0,0,date("n", $time),date("j",$time)- 15 ,date("Y", $time)));?></option>
		<option><?php  echo date("Y-m-d", mktime(0,0,0,date("n", $time),date("j",$time)- 14 ,date("Y", $time)));?></option>
		<option><?php  echo date("Y-m-d", mktime(0,0,0,date("n", $time),date("j",$time)- 13 ,date("Y", $time)));?></option>
		<option><?php  echo date("Y-m-d", mktime(0,0,0,date("n", $time),date("j",$time)- 12 ,date("Y", $time)));?></option>
		<option><?php  echo date("Y-m-d", mktime(0,0,0,date("n", $time),date("j",$time)- 11 ,date("Y", $time)));?></option>
		<option><?php  echo date("Y-m-d", mktime(0,0,0,date("n", $time),date("j",$time)- 10 ,date("Y", $time)));?></option>
		<option><?php  echo date("Y-m-d", mktime(0,0,0,date("n", $time),date("j",$time)- 9 ,date("Y", $time)));?></option>
		<option><?php  echo date("Y-m-d", mktime(0,0,0,date("n", $time),date("j",$time)- 8 ,date("Y", $time)));?></option>
		
		<option><?php  echo date("Y-m-d", mktime(0,0,0,date("n", $time),date("j",$time)- 7 ,date("Y", $time)));?></option>
		<option><?php  echo date("Y-m-d", mktime(0,0,0,date("n", $time),date("j",$time)- 6 ,date("Y", $time)));?></option>
		<option><?php  echo date("Y-m-d", mktime(0,0,0,date("n", $time),date("j",$time)- 5 ,date("Y", $time)));?></option>
		<option><?php  echo date("Y-m-d", mktime(0,0,0,date("n", $time),date("j",$time)- 4 ,date("Y", $time)));?></option>
		<option><?php  echo date("Y-m-d", mktime(0,0,0,date("n", $time),date("j",$time)- 3 ,date("Y", $time)));?></option>
		<option><?php  echo date("Y-m-d", mktime(0,0,0,date("n", $time),date("j",$time)- 2 ,date("Y", $time)));?></option>
		<option><?php  echo date("Y-m-d", mktime(0,0,0,date("n", $time),date("j",$time)- 1 ,date("Y", $time)));?></option>
		<option selected="selected"><?php  echo date("Y-m-d", mktime(0,0,0,date("n", $time),date("j",$time)+ 0 ,date("Y", $time)));?></option>
		<option><?php  echo date("Y-m-d", mktime(0,0,0,date("n", $time),date("j",$time)+ 1 ,date("Y", $time)));?></option>
		<option><?php  echo date("Y-m-d", mktime(0,0,0,date("n", $time),date("j",$time)+ 2 ,date("Y", $time)));?></option>
		<option><?php  echo date("Y-m-d", mktime(0,0,0,date("n", $time),date("j",$time)+ 3 ,date("Y", $time)));?></option>
		<option><?php  echo date("Y-m-d", mktime(0,0,0,date("n", $time),date("j",$time)+ 4 ,date("Y", $time)));?></option>
		<option><?php  echo date("Y-m-d", mktime(0,0,0,date("n", $time),date("j",$time)+ 5 ,date("Y", $time)));?></option>
		<option><?php  echo date("Y-m-d", mktime(0,0,0,date("n", $time),date("j",$time)+ 6 ,date("Y", $time)));?></option>
		</select>
		</div>
	
		<div class="cont_field" style="margin-bottom:10px;">
		<h4 class="cont_title">Auctions:</h4>
			<div id="__auction">
				<select name="auction" size="8" style="padding: 5px;border: 1px solid #999999; width: 100%" >
				<option style='font-size:15px;' value="" selected="selected">Select Auction</option>
				</select>
			</div>
		</div>
	
	
		<div class="cont_field" style="height: 64px; margin-bottom:10px;">
		<h4 class="cont_title">Year: </h4>                                 
		<?php
		$already_selected_value = '';
		$earliest_year = 1990;
		?>
		<select name="year_from" style="width: 94px !important; height:24px;padding: 0px;border: 1px solid #999999; min-width:94px; float:left;">
		<option value=""></option>
		<?php $count; foreach (range(date('Y'), $earliest_year) as $x) { $count++; if($count==4){
						print '<option selected="selected" style="font-size:15px;">'.$x.'</option>';
						}
						else{
						print '<option style="font-size:15px;">'.$x.'</option>';
							} }?>
		</select>
		<select name="year_to" style="width: 94px !important; height:24px;padding: 0px;border: 1px solid #999999; min-width:94px; float:right;">
		<option value=""></option>
		<?php foreach (range(date('Y'), $earliest_year) as $x) {print '<option style="font-size:15px;">'.$x.'</option>';}?>
		</select> 
		</div>
	
		<div class="cont_field" style="height: 70px; margin-bottom:10px;">
		<h4 class="cont_title">Milage: </h4>                                 
		<input type="text" name="mileage_from" value="" style="width: 70px; height:24px;padding: 0px; color: #000;border: 1px solid #999999; font-size:15px; " />  

,000 
		<input type="text" name="mileage_to" value="" style="width: 70px; height:24px;padding: 0px; color: #000; border: 1px solid #999999; font-size:15px; "/>
,000		
		</div>
	</div>
</div>

<div class="col-lg-3 col-md-3 bg_contnainer">
	<div class="form-group">
		<div class="cont_field" style="height: 42px; margin-bottom:10px;">
		<h4 class="cont_title" style="float:left;">Lot No:  </h4>                                 
		<input type="text" name="lot" value="" style=" float:right; width: 80px; color: #000; height:24px;padding: 0px;border: 1px solid #999999;" />
		</div>
	
		<div class="cont_field" style="margin-bottom:10px;">
		<h4 class="cont_title">STARTING PRICE: </h4>                                 
		<select name="price_start" style="width: 98px; height:24px;padding: 0px;border: 1px solid #999999;  margin-bottom:10px; color: #000;">
											<option value=""></option>
											<option value="100000">&yen; 100,000</option>
											<option value="300000">&yen; 300,000</option>
											<option value="500000">&yen; 500,000</option>
											<option value="800000">&yen; 800,000</option>
											<option value="1000000">&yen; 10,00,000</option>
											<option value="3000000">&yen; 30,00,000</option>
										 </select>
		&nbsp;
		<select name="price_to" style="width: 98px;  height:24px;padding: 0px;border: 1px solid #999999; color: #000;">
										  <option value=""></option>
											<option value="100000">&yen; 100,000</option>
											<option value="300000">&yen; 300,000</option>
											<option value="500000">&yen; 500,000</option>
											<option value="800000">&yen; 800,000</option>
											<option value="1000000">&yen; 10,00,000</option>
											<option value="3000000">&yen; 30,00,000</option>
										 </select>
		</div>
	
	
		<div class="cont_field" style="margin-bottom:10px;">
		<h4 class="cont_title">CONDITION: </h4>  
		<select name="grade_from" style="width: 98px; height:24px;padding: 0px;border: 1px solid #999999;  margin-bottom:10px; color: #000;">
										<option value=""></option>
											<option>6</option>
											<option>5.5</option>
											<option>5</option>
											<option>4.5</option>
											<option>4</option>
											<option>3.5</option>
											<option>3</option>
											<option>2</option>
											<option>1</option>
											<option>0</option>
											<option>R</option>
										 </select>
										 &nbsp;
										 <select name="grade_to" style="width: 98px;  height:24px;padding: 0px; color: #000;border: 1px solid #999999;">
											<option value=""></option>
											<option>6</option>
											<option>5.5</option>
											<option>5</option>
											<option>4.5</option>
											<option>4</option>
											<option>3.5</option>
											<option>3</option>
											<option>2</option>
											<option>1</option>
											<option>0</option>
											<option>R</option>
										 </select>
		</div>
	
	
	<div class="cont_field" style="margin-bottom:10px;">
		<h4 class="cont_title">DISPLACEMENT: </h4>  
		<select name="displace_from" style="width: 98px; height:24px;padding: 0px;border: 1px solid #999999;  margin-bottom:10px; color: #000;">
										<option value=""></option>
											<option>4000</option>
											<option>3500</option>
											<option>3200</option>
											<option>3000</option>
											<option>2500</option>
											<option>2200</option>
											<option>2000</option>
											<option>1800</option>
											<option>1500</option>
											<option>1300</option>
											<option>1200</option>
											<option>1000</option>
											<option>660</option>
										 </select>
										 &nbsp;
										 <select name="displace_to" style="width: 98px;  height:24px;padding: 0px; color: #000;border: 1px solid #999999;">
											<option value=""></option>
											<option>4000</option>
											<option>3500</option>
											<option>3200</option>
											<option>3000</option>
											<option>2500</option>
											<option>2200</option>
											<option>2000</option>
											<option>1800</option>
											<option>1500</option>
											<option>1300</option>
											<option>1200</option>
											<option>1000</option>
											<option>660</option>
										 </select>
		</div>
	
	
	
		<div class="cont_field" style="margin-bottom:10px;">
			<input id="submit" name="submit" type="submit" style="width:100%; padding-bottom:10px; padding-top:10px;" value="SEARCH" class="button red">
			
			<input id="submit" name="submit" type="reset" value="CLEAR" style="width:100%; padding-bottom:8px; padding-top:8px;" class="button blue">
		</div>
	</div>
</div>
</form>







                     </div>
					<!-- <div class="col-lg-1 col-md-1">&nbsp;</div>-->

                  </div>

               </div>