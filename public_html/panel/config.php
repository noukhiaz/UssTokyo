<?php
//error_reporting(0);
/*
$con = mysql_connect("localhost", "root", "");
if(!$con)
{
die('Could not connect: ' . mysql_error());
}
$db = mysql_select_db("usstokyo", $con);
*/
$con = mysql_connect("localhost", "root", "");
if(!$con)
{
die('Could not connect: ' . mysql_error());
}
$db = mysql_select_db("usstoki_panel", $con);
?>
