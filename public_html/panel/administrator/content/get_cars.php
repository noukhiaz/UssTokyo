<?php //include('../config.php');?>
<?php $pid = $_GET['q'];
echo $pid;
?>
<!--


<select class="form-control input-sm input-small input-inline " name="district" data-placement="right" style="width: 120px!important; padding-top: 6px;padding-bottom: 6px;    height:34px;">
<option value="0" selected="selected">Select District</option>
<?php 
	$city = mysql_query("select * from countries_cities where province_id = '$pid' AND is_active = '1' order by name Asc");
	while($row_city = mysql_fetch_array($city))
	{
	?>
<option value="<?php echo $row_city['id'];?>"><?php echo $row_city['name'];?></option>
<?php }?>
</select>
-->
<?php
// Array with names
$a[] = "Anna";
$a[] = "Brittany";
$a[] = "Cinderella";
$a[] = "Diana";
$a[] = "Eva";
$a[] = "Fiona";
$a[] = "Gunda";
$a[] = "Hege";
$a[] = "Inga";
$a[] = "Johanna";
$a[] = "Kitty";
$a[] = "Linda";
$a[] = "Nina";
$a[] = "Ophelia";
$a[] = "Petunia";
$a[] = "Amanda";
$a[] = "Raquel";
$a[] = "Cindy";
$a[] = "Doris";
$a[] = "Eve";
$a[] = "Evita";
$a[] = "Sunniva";
$a[] = "Tove";
$a[] = "Unni";
$a[] = "Violet";
$a[] = "Liza";
$a[] = "Elizabeth";
$a[] = "Ellen";
$a[] = "Wenche";
$a[] = "Vicky";

// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from "" 
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint .= ", $name";
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values 
echo $hint === "" ? "no suggestion" : $hint;
?>