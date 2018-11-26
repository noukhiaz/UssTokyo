<?php
    error_reporting(0);
session_start();
if(!isset($_SESSION['id']))
{
	header('location: auctions.php');

}
?>