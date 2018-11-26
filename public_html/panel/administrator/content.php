<style>
/*div#sample_1_paginate {
    display: none !important;
}*/
</style>
<?php 
	$page=$_GET["p"];
	switch ($page) {
	case "dashboard":
	include('dash-content.php');
	break;
	case "cars":
	include("content/cars.php");
	break;
	case "win_cars":
	include("content/win_cars.php");
	break;
	case "cars_list":
	include("content/cars_list.php");
	break;
	
	
	
	case "users":
	include("content/user-management.php");
	break;
	
	case "countries":
	include("content/countries.php");
	break;
	
	case "provinces":
	include("content/provinces.php");
	break;
	case "transactions":
	include("content/transactions.php");
	break;
	
	case "cities":
	include("content/cities.php");
	break;
	
	case "regions":
	include("content/regions.php");
	break;
	
	case "companies":
	include("content/companies.php");
	break;
	
	case "brands":
	include("content/brands.php");
	break;

	case "bids":
	include("content/bids.php");
	break;
	
	case "pix":
	include("content/pictures.php");
	break;

	case "add-user":
	include("forms/add-user.php");
	break;
	
	case "add-country":
	include("forms/country.php");
	break;
	
	case "country-province":
	include("forms/country-province.php");
	break;
	
	case "add_cities":
	include("forms/country-cities.php");
	break;
	case "post_new_cars_auction":
	include("forms/post_new_cars_auction.php");
	break;
	
	case "add_regions":
	include("forms/country-regions.php");
	break;
	
	case "add_companies":
	include("forms/add_companies.php");
	break;
	
	
	case "add_cars":
	include("forms/add_cars.php");
	break;
	
	case "edit_cars_auction":
	include("forms/edit_cars_auction.php");
	break;
	
	case "add_transaction":
	include("forms/add_transaction.php");
	break;
	
	
	
	case "add_brands":
	include("forms/add_brands.php");
	break;
	
	case "add_pic":
	include("forms/add_pic.php");
	break;
	
	case "add_cars_auction":
	include("forms/add_cars_auction.php");
	break;

	
//	case "Logout":
//	unset($_SESSION['id']);
	//header('location: index.php');
//	break;
//	default:
	//header('location:login.php');
}
?>