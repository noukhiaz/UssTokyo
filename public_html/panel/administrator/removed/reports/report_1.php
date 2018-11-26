
<?php
if(isset($_GET['search'])){
if(isset($_GET['country_id']))
	{
		$country_id = $_GET['country_id'];
		$where = "WHERE country_id = '$country_id'";
		$wherea = "WHERE t1.country_id = '$country_id'";
		$sortby = 'Country';
	}
	if(isset($_GET['city']))
	{
		$city_id = $_GET['city'];
		$where = "WHERE city_id = '$city_id'";
		$wherea = "WHERE t1.city_id = '$city_id'";
		$sortby = 'City';
	}
	if(isset($_GET['category']))
	{
		$category = $_GET['category'];
		$where = "WHERE category = '$category'";
		$wherea = "WHERE t1.category = '$category'";
		$sortby = 'City';
	}
	
}	
	?>


<!-- Content start here------------->		

 <div class="page-head">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light bordered">
	
  <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject bold uppercase">Incidents Reports by 
					<?php
					if(isset($_GET['cat'])){
					$category = $_GET['cat'];
					$category = mysql_query("select * from categories where id = '$category'");
					$rowses_cat = mysql_fetch_assoc($category);
					echo $rowses_cat['name'];
					}
					?>
										</span>
                                    </div>
                                </div>															
	<?php
$optiona = 'Victims';
$optionb = 'Wounded';
$optionc = 'Damage Loss'; 
$optiond = '';
$optione = '';
$optionf = '';
$option_multia  = 'Modus Operandi';
$option_multib  = 'Perpetrator';
$option_multic  = 'Terrorists Target';
$option_multid  = 'For Casualties & Injured';
$option_multie  = 'Weapons Used by Terrorists';
$option_multif  = ''; 
	$query =  mysql_query("SELECT 
	category, SUM(optiona), SUM(optionb),count(option_multia) as claimed, count(city_id) as city_id,  optionc   FROM $table_name $where "); 
	$rowse = mysql_fetch_array($query);
	?>
			
<div class="col-md-12">			
	<div class="col-md-3">
		<span class="caption-subject bold font-blue uppercase">Total Victims</span>
		<span class="caption-helper bold font-black"><?php echo '('.$rowse['SUM(optiona)'].')';?></span>
	</div>
	<div class="col-md-3">
		<span class="caption-subject bold font-blue uppercase">Total Wounded</span>
		<span class="caption-helper bold font-black"><?php echo '('.$rowse['SUM(optionb)'].')';?></span>
	</div>
	<div class="col-md-3">
	<span class="caption-subject bold font-blue uppercase">Total Attacks</span>
			<span class="caption-helper bold font-black">
			<?php 				
				$result = mysql_query("select * from $table_name  $where");  
				$number_of_rows = mysql_num_rows($result);  
				echo "(". $number_of_rows. ")";  
			?>
			</span>
	</div>			



<div class="col-md-2">
		<span class="caption-subject bold font-blue uppercase">Total Countries</span>
		<span class="caption-helper bold font-black"><?php 
		$total_country =  mysql_query("SELECT * FROM incidents as t1 LEFT JOIN countries as t2 ON find_in_set(t2.id, 
t1.country_id)  $wherea  group by t2.id"); 
		$rowses_country =   mysql_num_rows($total_country);
		echo '('.$rowses_country.')';
		?></span>
	</div>	
	
	</div>				
	
	<br />
<br />


<?php 
$total_cities =  mysql_query("SELECT * FROM incidents as t1 LEFT JOIN countries_cities as t2 ON find_in_set(t2.id, 
t1.city_id)  $wherea  group by t2.id"); 
		$rowses_cities =   mysql_num_rows($total_cities);
		//echo '('.$rowses_cities.')';
/*
$record_nat =  mysql_query("SELECT * FROM $table_name  WHERE $where group by optionc"); 
$length_nat =   mysql_num_rows($record_nat);

$record_target =  mysql_query("SELECT * FROM $table_name  WHERE $where group by option_multic"); 
$length_target =   mysql_num_rows($record_target);
*/






$query_modus  =   "SELECT * FROM $table_name as t1 LEFT JOIN modus as t2 ON find_in_set(t2.id, 
t1.option_multia)  $wherea  group by t2.id";
$record_mudus =   mysql_query($query_modus);
$length_modus =   mysql_num_rows($record_mudus);

$query_claimed  =   "SELECT * FROM $table_name as t1 LEFT JOIN perpetrator_groups as t2 ON find_in_set(t2.id, 
t1.option_multib)  $wherea  group by t2.id";
$result_claimed =   mysql_query($query_claimed);
$length_claimed =   mysql_num_rows($result_claimed);

$query_target  =   "SELECT * FROM $table_name as t1 LEFT JOIN target_types as t2 ON find_in_set(t2.id, 
t1.option_multic)  $wherea  group by t2.id";
$record_target =   mysql_query($query_target);
$length_target =   mysql_num_rows($record_target);


$query_nat  =   "SELECT * FROM $table_name as t1 LEFT JOIN nature_types as t2 ON find_in_set(t2.id, 
t1.option_multid)  $wherea  group by t2.id";
$record_nat =   mysql_query($query_nat);
$length_nat =   mysql_num_rows($record_nat);

/*
$record_modus =  mysql_query("SELECT * FROM $table_name  WHERE $where group by option_multia"); 
$length_modus =   mysql_num_rows($record_modus);
*/
?>





										<table  class="table table-striped table-bordered table-hover"  >
                                        <thead>
                                            <tr>
												<th>Number of Cities (<?php echo $rowses_cities;?>)</th>
												<th>For Casualties & Injured (<?php echo $length_nat;?>)</th>
												<th>PERPETRATOR  (<?php echo $length_claimed;?>)</th>
												<th>TERRORISTS TARGET (<?php echo $length_target;?>)</th>
												<th>Modus Operadi (<?php echo $length_modus;?>)</th>
                                            </tr>
                                        </thead>
                                        <tbody>	
										<tr class="odd gradeX">
										<td>
										<?php 
										
while($row_cities  =   mysql_fetch_array($total_cities))
{
//echo $row_claimed["id"];
	$cities  = $row_cities["id"]; 
	$cites = mysql_query("select * from countries_cities where id = '$cities'");
	$citess = mysql_fetch_assoc($cites);
	echo '<a href="index.php?p=incidents&search=1&city='.$citess['id'].'"  class="font-black">'. $citess['name'].' </a>';
	
	if(isset($_GET['country_id'])){
	$results = mysql_query("select * from incidents  $where AND city_id =  '$cities' ");  
}
else
{$results = mysql_query("select * from incidents  where city_id =  '$cities' ");  }
	$number_of_rowss = mysql_num_rows($results);  
	echo "(". $number_of_rowss. ") <br />"; 
}
			?>
										</td>
										<td>
									
			
			<?php 
			//$record_cat =  mysql_query("SELECT * FROM $table_name WHERE $where  order by id desc"); 
			
	/*	
	 $nat_row = mysql_fetch_array($record_nat);
	 $option_multid = $nat_row['option_multid'];
	$multi_d = explode(',', $option_multid);
	$sep = '';
	foreach($multi_d as $multipled_values){
    $natured = $multipled_values;  
	$natures = mysql_query("select * from nature_types where id = '$natured'");
	$rowsesd = mysql_fetch_assoc($natures);
	$sses[] = '<a href="index.php?p=incidents&search=1&option_multid='.$rowsesd['id'].'"  class="font-black">'.$sep.$rowsesd['name'].' </a>';
	}
	echo implode(' <br /> ', $sses);
		*/	 
		
while($nat_row = mysql_fetch_array($record_nat)){	
			$option_multid = $nat_row["id"]; 
			$rowsess_nature = mysql_query("select * from nature_types where id = '$option_multid'");
			$rowses_natre = mysql_fetch_assoc($rowsess_nature);
	echo '<a href="index.php?p=incidents&search=1&option_multid='.$rowses_natre['id'].'"  class="font-black">'.$rowses_natre['name'].' </a><br />';
			 }		
		
			 ?>
			
			
										</td>
										<td>
										<?php 
										
while($row_claimed  =   mysql_fetch_array($result_claimed))
{
//echo $row_claimed["id"];
	$claimedby  = $row_claimed["id"]; 
	$claimedbysss = mysql_query("select * from perpetrator_groups where id = '$claimedby'");
	$rowses_claim = mysql_fetch_assoc($claimedbysss);
	echo '<a href="index.php?p=incidents&search=1&option_multib='.$rowses_claim['id'].'"  class="font-black">'. $rowses_claim['name'].' </a>';
				$result = mysql_query("select * from incidents WHERE FIND_IN_SET(  '$claimedby',  `option_multib` )");  
				$number_of_rows = mysql_num_rows($result);  
			//echo "(". $number_of_rows. ")"; 
			?>
			<br />
			<?php }?>
										</td>
										<td>
			<?php 
			while($target_row = mysql_fetch_array($record_target)){	
			$option_multicc = $target_row["id"]; 
			$rowsess_targets = mysql_query("select * from target_types where id = '$option_multicc'");
			$rowses_targets = mysql_fetch_assoc($rowsess_targets);
	echo '<a href="index.php?p=incidents&search=1&option_multic='.$rowses_targets['id'].'"  class="font-black">'.$rowses_targets['name'].' </a><br />';
			 }
			 ?>
										</td>
										<td>
			<?php 
			while($mudus_row = mysql_fetch_array($record_mudus)){	
			$option_multiaa = $mudus_row["id"]; 
			$rowsess_modus = mysql_query("select * from modus where id = '$option_multiaa'");
			$rowses_modus = mysql_fetch_assoc($rowsess_modus);
	echo '<a href="index.php?p=incidents&search=1&option_multia='.$rowses_modus['id'].'"  class="font-black">'.$rowses_modus['name'].' </a><br />';
			 }
			 ?>
										</td>
										</tr>
										</tbody>
										</table>









</div>
</div>
</div>
</div>
















 <div class="profile-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="portlet light bordered">


  								<div class="portlet-title">
                                    <div class="caption font-dark">
                                        <span class="caption-subject bold uppercase">List of incidents
										</span>
                                    </div>
                                </div>





			
<table  class="table table-striped table-bordered table-hover" id="sample_1" >
                                        <thead>
                                            <tr>
												<th>PSM ID</th>
												<!--<th> Category</th>-->
												<th> Country</th>
												<!--<th> Province</th>-->
												<th> City</th>
												<!--<th> Region</th>-->
												<th> <?php echo $optiona;?></th>
												<th> <?php echo $optionb;?></th>
												<th> <?php echo $optionc;?></th>
												<th> <?php echo $option_multia;?></th>
												<th> <?php echo $option_multib;?></th>
												<th> <?php echo $option_multic;?></th>
												<th> View News</th>
                                            </tr>
                                        </thead>
                                        <tbody>		
<?php 
$record_cat =  mysql_query("SELECT * FROM $table_name  $where order by id desc"); 
while($cat_row = mysql_fetch_array($record_cat)){
?>
<tr class="odd gradeX">
<td style="text-align:center;"><?php echo $cat_row['id'];?></td>
<!--											   
<td style="text-align:center;">
 <?php
	$category = $cat_row['category'];
	$category = mysql_query("select * from categories where id = '$category'");
	$rowses_cat = mysql_fetch_assoc($category);
	?>
<a href="index.php?p=incidents&search=1&category=<?php echo $rowses_cat['id'];?>"  class="font-black"><?php echo $rowses_cat['name'];?></a>
</td>-->
<td>
<?php 
	$country_id = $cat_row['country_id'];
	$country_id = mysql_query("select * from countries where id = '$country_id'");
	$rowses_contry = mysql_fetch_assoc($country_id);
?>
<a href="index.php?p=incidents&search=1&country_id=<?php echo $rowses_contry['id'];?>" class="font-black" ><?php echo $rowses_contry['name'];?></a>
</td>
<!--
<td>
<?php 
	$province_id = $cat_row['province_id'];
	$province_id = mysql_query("select * from countries_province where id = '$province_id'");
	$rowses_province = mysql_fetch_assoc($province_id);
	?>
<a href="index.php?p=incidents&search=1&province=<?php echo $rowses_province['id'];?>" class="font-black"><?php echo $rowses_province['name'];?></a>
</td>
-->
<td>
<?php
	$city_id = $cat_row['city_id'];
	$city_id = mysql_query("select * from countries_cities where id = '$city_id'");
	$rowses_city = mysql_fetch_assoc($city_id);
	?>
<a href="index.php?p=incidents&search=1&city=<?php echo $rowses_city['id'];?>" class="font-black"><?php echo $rowses_city['name'];?></a>
</td>
<!--
<td>
<?php
	$region_id = $cat_row['region_id'];
	$region_id = mysql_query("select * from countries_region where id = '$region_id'");
	$rowses_region = mysql_fetch_assoc($region_id);
	?>
<a href="index.php?p=incidents&search=1&region=<?php echo $rowses_region['id'];?>"  class="font-black"><?php echo $rowses_region['name'];?></a>
</td>
-->
<td>
<?php echo $cat_row['optiona'];?>
</td>
<td>
<?php echo $cat_row['optionb'];?>
</td>
<td>
<?php 
	$damage = $cat_row['optionc'];
	$damages = mysql_query("select * from damage where id = '$damage'");
	$rowsedes = mysql_fetch_assoc($damages);
	$msgc = '<a href="index.php?p=incidents&search=1&optionc='.$rowsedes['id'].'"  class="font-black">'.$rowsedes['name'].'</a>';
	echo $msgc;
	
	
?>
</td>
<td>
<?php 
	
	//echo $cat_row['option_multic'];
	$modus_id = $cat_row['option_multia'];
	$conter = explode(',',$modus_id);
	for ($i = 0; $i < count($conter); $i++){
    $modus_idc =  $conter[$i]; 
	$modus = mysql_query("select * from modus where id = '$modus_idc'");
	$rowsss = mysql_fetch_assoc($modus);
	echo '<a href="index.php?p=incidents&search=1&option_multia='.$rowsss['id'].'"  class="font-black">'. $rowsss['name'].' </a><br />';
	}
	
	
	?>
</td>
<td>
<?php 
$option_multibb = $cat_row['option_multib'];
	$conter = explode(',',$option_multibb);
	for ($i = 0; $i < count($conter); $i++){
    $claimedby =  $conter[$i]; 
	$claimedby = mysql_query("select * from perpetrator_groups where id = '$claimedby'");
	$rowses_claim = mysql_fetch_assoc($claimedby);
	echo '<a href="index.php?p=incidents&search=1&option_multib='.$rowses_claim['id'].'"  class="font-black">'. $rowses_claim['name'].'</a><br />';
	}	
	
	?>
</td>
<td>
<?php 
	//echo $cat_row['option_multib'];
	$option_multicc = $cat_row['option_multic'];
	$conter = explode(',',$option_multicc);
	for ($i = 0; $i < count($conter); $i++){
    $targets =  $conter[$i]; 
	$targets = mysql_query("select * from target_types where id = '$targets'");
	$rows = mysql_fetch_assoc($targets);
	echo '<a href="index.php?p=incidents&search=1&option_multic='.$rows['id'].'"  class="font-black">'. $rows['name'].' </a><br />';
	}	
	?>
</td>
<td style="text-align:center;"><a href="index.php?p=incident_detail&id=<?php echo $cat_row['id'];?>" target="_blank"> <span class="label label-sm label-success"> read more </span></a></td>
 </tr>
<?php  } ?>
</tbody>
 </table>
										</div>
									</div>
								</div>
							</div>
							<!-- Content END here------------->		



























<style>
#chartdiv {
	width		: 100%;
	height		: 500px;
	font-size	: 11px;
}							
</style>
<?php $nameaa = '{
        "country": "Lithuania",
        "litres": 501.9
    }, {
        "country": "Czech Republic",
        "litres": 301.9
    }, {
        "country": "Ireland",
        "litres": 201.1
    }, {
        "country": "Germany",
        "litres": 165.8
    }, {
        "country": "Australia",
        "litres": 139.9
    }, {
        "country": "",
        "litres": 128.3
    }';?>

<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/pie.js"></script>
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />

<script>
var chart = AmCharts.makeChart("chartdiv", {
    "type": "pie",
    "theme": "light",
    "innerRadius": "40%",
    "gradientRatio": [-0.4, -0.4, -0.4, -0.4, -0.4, -0.4, 0, 0.1, 0.2, 0.1, 0, -0.2, -0.5],
    "dataProvider": [
	<?php echo $nameaa;?>
	],
    "balloonText": "[[value]]",
    "valueField": "litres",
    "titleField": "country",
    "balloon": {
        "drop": true,
        "adjustBorderColor": false,
        "color": "#FFFFFF",
        "fontSize": 16
    },
    "export": {
        "enabled": true
    }
});
</script>

<div id="chartdiv"></div>	
