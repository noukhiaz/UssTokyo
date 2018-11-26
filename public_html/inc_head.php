<?php 
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
//echo $actual_link;
/*
if(empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == "off"){
    $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $redirect);
    exit();
}*/
//	if ($_SERVER["SERVER_PORT"] != 443) {
  // $url = 'https://'.$_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
?>
<!--
<meta http-equiv="refresh" content="0;URL='<?php echo $url;?>'" />
-->
<?php  //exit();}
?>


<?php //$phpext = ".php";
$phpext = "";?>
<link rel="stylesheet" type="text/css" href="chrometheme/chromestyle.css" />
<script type="text/javascript" src="js/messagebutton.js"></script> 
<script type="text/javascript" src="chromejs/chrome.js"></script>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="USSTOKYO.com, Japan Auctions, Japanese Cars in Pakistan, Japanese Cars in South Africa" />
<meta name="description" content="www.USSTokyo.com - The Best Car Dealer in Japan" />
<meta name="author" content="www.aukinternational.co.uk" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<!-- Favicon -->
<link rel="shortcut icon" href="images/favicon.ico" />
<!-- bootstrap -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
<!-- flaticon -->
<link rel="stylesheet" type="text/css" href="css/flaticon.css" />
<!-- mega menu -->
<link rel="stylesheet" type="text/css" href="css/mega-menu/mega_menu.css" />
<!-- font awesome -->
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
<!-- owl-carousel -->
<link rel="stylesheet" type="text/css" href="css/owl-carousel/owl.carousel.css" />
<!-- revolution -->
<link rel="stylesheet" type="text/css" href="revolution/css/settings.css" />
<!-- main style -->
<link rel="stylesheet" type="text/css" href="css/style.css?v=1.2" />
<!-- responsive -->
<link rel="stylesheet" type="text/css" href="css/responsive.css" />
<meta name="google-site-verification" content="G1jboJzlcD9z2qTrbV3DAA5WEWyFzVtXY8u-MC5r6BI" />
<!--
<script type='text/javascript' data-cfasync='false'>window.purechatApi = { l: [], t: [], on: function () { this.l.push(arguments); } }; (function () { var done = false; var script = document.createElement('script'); script.async = true; script.type = 'text/javascript'; script.src = 'https://app.purechat.com/VisitorWidget/WidgetScript'; document.getElementsByTagName('HEAD').item(0).appendChild(script); script.onreadystatechange = script.onload = function (e) { if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) { var w = new PCWidget({c: 'dca259c0-cf51-45e5-87d7-dec54da6224f', f: true }); done = true; } }; })();</script>
-->