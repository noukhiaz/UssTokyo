<?php 
$current_page = 'incidents';
$table_name = 'incidents';
if(isset($_GET['search'])){
	if(isset($_GET['country_id']))
	{
		$country_id = $_GET['country_id'];
		$where = "country_id = '$country_id'";
		$sortby = 'Country';
	}
	if(isset($_GET['region']))
	{
		$region = $_GET['region'];
		$where = "region_id = '$region'";
		$sortby = 'Region';
	}
	if(isset($_GET['province']))
	{
		$province = $_GET['province'];
		$where = "province_id = '$province'";
		$sortby = 'Province';
	}
	if(isset($_GET['city']))
	{
		$city = $_GET['city'];
		$where = "city_id = '$city'";
		$sortby = 'City';
	}
	if(isset($_GET['category']))
	{
		$category = $_GET['category'];
		$where = "category = '$category'";
		$sortby = 'Category';
	}
	
	if(isset($_GET['optionc']))
	{
		$optionc = $_GET['optionc'];
		$where = "optionc = '$optionc'";
	}
	
	if(isset($_GET['option_multia']))
	{
		$option_multia = $_GET['option_multia'];
		$where = " FIND_IN_SET(  '$option_multia',  `option_multia` )";
	}
	if(isset($_GET['option_multib']))
	{
		$option_multib = $_GET['option_multib'];
		$where = " FIND_IN_SET(  '$option_multib',  `option_multib` )";
	}
	if(isset($_GET['option_multic']))
	{
		$option_multic = $_GET['option_multic'];
		$where = " FIND_IN_SET(  '$option_multic',  `option_multic` )";
	}

//$sql = mysql_query("SELECT * from $table_name WHERE $where order by id desc");
//$row = mysql_fetch_array($sql);
}else{
//$sql = mysql_query("SELECT * from $table_name order by id desc");
}
?>

                              
								
						

<?php
if(isset($_GET['cat'])){
	if($_GET['cat'] == '1')
	{
		include('reports/report_1.php');	
	}
	if($_GET['cat'] == '2')
	{
		include('reports/report_2.php');	
	}	
	if($_GET['cat'] == '3')
	{
		include('reports/report_2.php');	
	}
	if($_GET['category'] == '4')
	{
		include('reports/report_2.php');	
	}
}
//include('reports/report_1.php');	
?>								


					
								
					
<?php include("table-footer-js.php");?>