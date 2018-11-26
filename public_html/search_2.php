

<?php include('inc_nt_login.php');
   include('panel/config.php');
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>www.USSTokyo.com: Auction</title>
      <?php include('inc_head.php');?>
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
         @media (min-width:1025px){
         .mobile
         {
         display:block;
         }
         .mobile_none
         {
         display:none;
         }
         .list-inline>li {
         border:0px !important;
         min-height : 45px;
         vertical-align : middle;
         }
         }
         @media (max-width:1024px){
         .mobile
         {
         display:none;
         }
         .mobile_none
         {
         display:inherit;
         }
         }
         .table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
         border-color: #e3e3e3;
         padding: 10px 5px;
         vertical-align:middle;
         }
         th
         {
         text-align:center;
         }
         .list-inline>li {
         padding-right: 7px !important;
         padding-left: 7px !important;
         font-size: 13px !important;
         margin-bottom:3px;
         }
         thead th{ color:#FFFFFF; border:0px;}
         tbody tr:hover{ background-color:#F7F7F7;}
      </style>
      <!--=================================
         inner-intro -->
      <section class="inner-intro bg-2 bg-overlay-black-70">
         <div class="container">
            <div class="row text-center intro-title">
               <div class="col-lg-6 col-md-6 text-left">
                  <h1 class="text-white">Cars listing </h1>
               </div>
               <div class="col-lg-6 col-md-6 text-right">
                  <ul class="page-breadcrumb">
                     <li><a href="index.php"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-double-right"></i></li>
                     <li><span>Cars Listing</span> </li>
                  </ul>
               </div>
            </div>
         </div>
      </section>
      <!--=================================
         inner-intro -->
      <section class="product-listing page-section-ptb">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12">
                  <div class="row">
                     <div class="contact-form">
                        <form method="get" class="form-horizontal" action="auction.php" target="_blank">

                           <div class="col-lg-2 col-md-2">
                              <div class="form-group">
                                 <select size="20" class="form-control"  name="mark_name" id="selectMake">
                                    <?php $get_companya = aj_get("select marka_id,marka_name from main group by marka_id order by id DESC",120,0); // 1=>debug  // 120 min = 2 hour
                                       echo "<option value='*'>ALL</option>";
                                       foreach($get_companya as $v) {?>
                                    <option value="<?php echo $v['MARKA_NAME'];?>"><?php echo $v['MARKA_NAME'];?></option>
                                    <?php } ?>
                                 </select>
                              </div>
                           </div>
                           <div class="col-lg-3 col-md-3">
                              <div class="form-group">
                                 <?php $arr = aj_get("select model_id, model_name, count(*)  from main group by model_name order by model_name",60,0);?>
                                 <select name="model_name" size="20" id="selectModel">
                                    <option value="0" selected="selected">Select Model</option>
                                    <?php  foreach($arr as $v) { ?>
                                       <option value="<?php echo $v['MODEL_NAME'];?>"><?php echo $v['MODEL_NAME'] . '( ' . $v['TAG2'] . ' )'; ?></option>
                                    <?php }?>
                                 </select>
                              </div>
                           </div>
                           <div class="col-lg-2 col-md-2">
                              <div class="form-group">
                                 <?php 
                                    $date = time();
                                    $datesa = date('Y-m-d', $date);
                                    $day_final = date('d', $date);
                                    $day_number = date('N', $day_final);
                                    $dates = date('Y-m', $date);
                                    
                                    $day = date('Y-m-d', strtotime($datesa.' +1 Weekday'));
                                    
                                    //echo date('Y-m-d', strtotime($datesa.' +1 Weekday')); ;
                                    
                                    //echo $dates.'-'.$day;
                                    $perday = 86400;
                                    $daya = $day;
                                    $dayb = $day+($perday*2);
                                    $dayc = $day+$perday;
                                    $dayd = $day+$perday;
                                    $daye = $day+$perday;
                                    $dayf = $day+$perday;
                                    
                                    // set current date
                                    $date = $datesa;
                                    // parse about any English textual datetime description into a Unix timestamp 
                                    $ts = strtotime($date);
                                    // calculate the number of days since Monday
                                    $dow = date('w', $ts);
                                    $offset = $dow - 1;
                                    if ($offset < 0) {
                                        $offset = 6;
                                    }
                                    // calculate timestamp for the Monday
                                    $ts = $ts - $offset*86400;
                                    // loop from Monday till Sunday 
                                    ?>
                                 Date :
                                 <select name="date">
                                    <option value=""></option>
                                    <?php 
                                       for ($i = 0; $i < 6; $i++, $ts += 86400){?>
                                    <option><?php print date("Y-m-d", $ts);?></option>
                                    <?php 
                                       }
                                       //echo date('Y-m-d', strtotime($datesa.' +1 Weekday'));
                                       ?>
                                 </select>
                                 Auctions
                                 <select name="model_auctioneer" size="15" id="selectAuctioneer">
                                    <option value="0" selected="selected">Select Auctioneer</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-lg-2 col-md-2">
                              <div class="form-group">
                                 Lot No: <input type="text" name="lot" value="" style="width: 63px;" />
                                 <br /><br />
                                 Year: 
                                 <?php
                                    $already_selected_value = '';
                                    $earliest_year = 1996;
                                    
                                    ?>
                                 <select name="year_from" style="width: 40px;">
                                    <option value=""></option>
                                    <?php 
                                       foreach (range(date('Y'), $earliest_year) as $x) {
                                           print '<option>'.$x.'</option>';
                                       }
                                       ?>
                                 </select>
                                 <select name="year_to" style="width: 40px;">
                                    <option value=""></option>
                                    <?php 
                                       foreach (range(date('Y'), $earliest_year) as $x) {
                                       //print '<option value="'.$x.'"'.($x === $already_selected_value ? ' selected="selected"' : '').'>'.$x.'</option>';
                                         print '<option>'.$x.'</option>';
                                       }
                                       ?>
                                 </select>
                                 <br /><br />
                                 Milage: <br />
                                 From: <input type="text" name="mileage" value="" style="width: 50px;" /> ,00 
                                 To: <input type="text" name="mileage_to" value="" style="width: 63px;" /> ,00
                                 <br />
                              </div>
                           </div>
                           <div class="col-lg-2 col-md-2">
                              <div class="form-group">
                                 STARTING PRICE: 
                                 <select name="price_start" style="width: 40px;">
                                    <option value=""></option>
                                    <option value="100000">100000</option>
                                    <option value="300000">300,000</option>
                                    <option value="500000">500,000</option>
                                    <option value="800000">800,000</option>
                                    <option value="1000000">10,00,000</option>
                                    <option value="3000000">30,00,000</option>
                                 </select>
                                 <select name="price_to" style="width: 40px;">
                                    <option value=""></option>
                                    <option value="100000">100000</option>
                                    <option value="300000">300,000</option>
                                    <option value="500000">500,000</option>
                                    <option value="800000">800,000</option>
                                    <option value="1000000">10,00,000</option>
                                    <option value="3000000">30,00,000</option>
                                 </select>
                                 <br />
                                 DISPLANCE
                                 <select name="displace_from" style="width: 40px;">
                                    <option value=""></option>
                                    <option>2500</option>
                                    <option>1800</option>
                                    <option>1300</option>
                                    <option>1000</option>
                                 </select>
                                 <select name="displace_from" style="width: 40px;">
                                    <option value=""></option>
                                    <option>2500</option>
                                    <option>1800</option>
                                    <option>1300</option>
                                    <option>1000</option>
                                 </select>
                                 <br />
                                 <input id="submit" name="submit" type="submit" value="Send" class="button red">
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
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
         $(document).ready(function() 
         {
  
            $('#selectMake').change(function()
            {
               $.ajax(
               {
                  url: 'https://www.usstokyo.com/api.php?q=' + this.value + '&uri=get_model', type: 'GET',dataType: 'JSON',success:function (data) 
                   {
                     console.log(data);
                     // $('#selectModel').detach().appendTo('<option value="">Please Select Model</option>');
                     $('#selectModel').find('option').remove().end();
                     $.each(data, function(index, e)
                     {
                        $('#selectModel').append('<option value="'+e.MODEL_NAME+'">'+e.MODEL_NAME+'('+e.TAG2+')</option>');
                     });
                   },error: function (e) { console.log(e.message); }
               });
            });

            $('#selectModel').change(function()
            {
               $.ajax(
               {
                  url: 'https://www.usstokyo.com/api.php?q=' + this.value + '&uri=get_cars', type: 'GET',dataType: 'JSON',success:function (data) 
                   {
                     console.log(data);
                     $('#selectAuctioneer').find('option').remove().end();
                     var uniqueNames = [];
                     $.each(data, function(index, e)
                     {
                        if($.inArray(e.AUCTION, uniqueNames) === -1)
                        {
                           uniqueNames.push(e.AUCTION)
                           $('#selectAuctioneer').append('<option value="'+e.AUCTION+'">'+e.AUCTION+'</option>');
                        }
                     });
                   },error: function (e) { console.log(e.message); }
               });
            });

         });
      </script>
   </body>
</html>

