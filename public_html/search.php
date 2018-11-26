<?php include('inc_nt_login.php');

   include('panel/config.php');

   header('Access-Control-Allow-Origin: *');

   //error_reporting(0);



   ?>

<!DOCTYPE html>

<html lang="en">

   <head>

      <title>www.USSTokyo.com: Auction</title>

      <?php include('inc_head.php');?>
	<?php include('inc_script.php');?>
   </head>

   <body>

      <!--=================================

         loading -->

      <!--=================================

         loading -->

      <!--=================================

         header -->

      <header id="header" class="defualt">

         <?php include('inc_menu_top.php');?>

         <!--================================= mega menu -->

         <div class="menu">  

            <?php include('inc_menu.php');?>

         </div>

      </header>

      <!--================================= header -->

      <style>
	  
 .cont_field{
border:1px solid #aac; 
background:#eaeaea; 
padding:7px; }
.cont_title{
color:#d00;
font-weight:bold;
font-size:14px;
margin:0px;
padding:0px;
}
.make_field{
padding: 5px;
border: 1px solid #999999;
background:#FFFFFF;
}


         @media (min-width:1025px){


         .mobile

         {

         display:block;

         }

         .mobile_none

         {

         display:none;

         }

         
.bg_contnainer {
    background: #f5f5f5;
    padding: 10px;
	height:450px;
}			 

         }

         @media (max-width:1024px){
.bg_contnainer {
    background: #E8E8E8;
	height:auto;
	padding: 0px;
}		 

         .mobile

         {

         display:none;

         }

         .mobile_none

         {

         display:inherit;

         }

         }


      </style>

      <!--=================================

         inner-intro -->
		 
		 
		 
		 
		 
		 


      <section class="inner-intro bg-7 bg-overlay-black-70 " style="height:130px;">
<!--
         <div class="container">

            <div class="row text-center intro-title">

               <div class="col-lg-6 col-md-6 text-left">

                  <h3 class="text-white">AUCTIONS </h3>

               </div>

               <div class="col-lg-6 col-md-6 text-right">

                  <ul class="page-breadcrumb">

                     <li><a href="index.php"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-double-right"></i></li>

                     <li><span>AUCTIONS</span> </li>

                  </ul>

               </div>

            </div>
-->
         </div>

      </section>

      <!--=================================

         inner-intro -->
		 
		 
		 



		 
	<section class="product-listing page-section-ptb "  style="background: #fff; padding-top:10px;">
         <div class="container">
            <div class="row">
		

<?php include('inc_search_desktop.php');?>


<?php //include('inc_search_mobile.php');?>




            </div>

         </div>

      </section>









	 

      
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
      <!--=================================

         footer -->

      <footer class="footer footer-black bg-3 bg-overlay-black-90">

         <?php include('inc_footer.php');?>

      </footer>

      <!--=================================

         footer -->

      <!--=================================

         back to top -->

      <div class="car-top">

         <span><img src="images/car.png" alt=""></span>

      </div>

      <!--=================================

         back to top -->

      <!--=================================

         jquery -->

      <!-- jquery  -->

      <script type="text/javascript" src="js/jquery.min.js"></script>

      <script type="text/javascript" src="js/bootstrap.min.js"></script>

      <script type="text/javascript" src="js/mega-menu/mega_menu.js"></script>

      <!-- jquery-ui -->

      <script type="text/javascript" src="js/jquery-ui.js"></script>

      <!-- 

         <script type="text/javascript" src="js/select/jquery-select.js"></script>

         -->

      <!-- custom -->

      <script type="text/javascript" src="js/custom.js"></script>



         <script>

            function showModel(str)

            {

                if (str == "") {

                    //document.getElementById("__model").innerHTML = "";

                    return;

                } else { 

                    if (window.XMLHttpRequest) {

                        // code for IE7+, Firefox, Chrome, Opera, Safari

                        xmlhttp = new XMLHttpRequest();

                    } else {

                        // code for IE6, IE5

                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

                    }

                    xmlhttp.onreadystatechange = function() {

                        if (this.readyState == 4 && this.status == 200) {

                            document.getElementById("__model").innerHTML = this.responseText;

                        }

                    };

                    xmlhttp.open("GET","api.php?q="+str+"&uri=get_model",true);

                    xmlhttp.send();

                }

            }



            function showAuction(str)

            {

                if (str == "") {

                   // document.getElementById("__auction").innerHTML = "";

                    return;

                } else { 

                    if (window.XMLHttpRequest) {

                        // code for IE7+, Firefox, Chrome, Opera, Safari

                        xmlhttp = new XMLHttpRequest();

                    } else {

                        // code for IE6, IE5

                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

                    }

                    xmlhttp.onreadystatechange = function() {

                        if (this.readyState == 4 && this.status == 200) {

                            document.getElementById("__auction").innerHTML = this.responseText;

                        }

                    };

                    xmlhttp.open("GET","api.php?q="+str+"&uri=get_auction",true);

                    xmlhttp.send();

                }

            }



            function showAuctionDate(str)

            {

                if (str == "") {

                    //document.getElementById("__auction").innerHTML = "";

                    return;

                } else { 

                    if (window.XMLHttpRequest) {

                        // code for IE7+, Firefox, Chrome, Opera, Safari

                        xmlhttp = new XMLHttpRequest();

                    } else {

                        // code for IE6, IE5

                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

                    }

                    xmlhttp.onreadystatechange = function() {

                        if (this.readyState == 4 && this.status == 200) {

                            document.getElementById("__auction").innerHTML = this.responseText;

                        }

                    };

                    xmlhttp.open("GET","api.php?q="+str+"&model="+ document.getElementById("showAuctionOptions").value +"&uri=get_auction_date",true);

                    xmlhttp.send();

                }

            }

         </script>

   </body>

</html>



