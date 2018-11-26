<!-- menu start -->

   <nav id="menu" class="mega-menu">

    <!-- menu list items container -->

    <section class="menu-list-items">

     <div class="container"> 

      <div class="row"> 

       <div class="col-lg-12 col-md-12"> 

        <!-- menu logo -->

        <ul class="menu-logo">

            <li>

                <a href="index"><img id="logo_img" src="images/logo-light.png" alt="logo"> </a>

            </li>

        </ul>

        <!-- menu links -->

        <ul class="menu-links">

            <!-- active class -->

<?php 

	$file_name = basename($_SERVER['PHP_SELF']);

    $active = "active";
    $asia=['Pakistan','Japan','Sri Lanka','Bangladesh','Thailand','Dubai','Oman','Qatar','Saudi Arabia'];
    $carribean=['Antigua and Barbuda','Bahamas','Barbados','Belize','Dominica','Grenada','Guyana','Jamaica','Montserrat',
                'Saint Kitts and Nevis','Saint Lucia','British Virgin Islands','Cayman Islands','Saint Vincent and the Grenadines',
                 'Trinidad and Tobago','Turks and Caicos Islands'];
    $america=['United States Of America','Canada'];
    $europe=['United Kingdom','Ireland','Malta','Cyprus'];
    $oceania=['Australia','New Zealand'];

?>			

            <li <?php if($file_name == 'index.php'){echo 'class='.$active;}?>><a href="index<?php echo $phpext;?>"> Home</a></li>

			

            <li <?php if( $file_name == 'country.php'){echo 'class='.$active;}?>>
    
            <a >Country</a>
          
          
               <ul class="drop-down-multilevel" style=" border-top: 0px solid #db2d2e; border-radius:9px;">

  
              <li><a >Asia</a>

                  <ul class="drop-down-multilevel" style=" border-top: 0px solid #db2d2e; border-radius:9px; ">
                   <?php
                    foreach ($asia as $value) {
                      echo "<li><a href='country.php?country=".$value."'>".$value."</a></li>";
                    }?>
                    </ul>
              </li>


              <li><a >Carribean</a>
                  <ul class="drop-down-multilevel" style=" border-top: 0px solid #db2d2e; border-radius:9px; overflow: auto;
                    max-height:400px;  ">
                   <?php
                    foreach ($carribean as $value) {
                      echo "<li><a href='country.php?country=".$value."'>".$value."</a></li>";
                    }?>
                    </ul>
              </li>


              <li><a >America</a>
                  <ul class="drop-down-multilevel" style=" border-top: 0px solid #db2d2e; border-radius:9px; ">
                   <?php
                    foreach ($america as $value) {
                      echo "<li><a href='country.php?country=".$value."'>".$value."</a></li>";
                    }?>
                    </ul>
              </li>


              <li><a >Europe</a>
                  <ul class="drop-down-multilevel" style=" border-top: 0px solid #db2d2e; border-radius:9px; ">
                   <?php
                    foreach ($europe as $value) {
                      echo "<li><a href='country.php?country=".$value."'>".$value."</a></li>";
                    }?>
                    </ul>
              </li>
              <li><a >Oceania</a>
                  <ul class="drop-down-multilevel" style=" border-top: 0px solid #db2d2e; border-radius:9px; ">
                   <?php
                    foreach ($oceania as $value) {
                      echo "<li><a href='country.php?country=".$value."'>".$value."</a></li>";
                    }?>
                    </ul>
              </li>



                </ul>
                
          
          
          </li>




			<li <?php if(($file_name == 'search.php') || ($file_name == 'auction.php')){echo 'class='.$active;}?>><a href="search<?php echo $phpext;?>">Auction</a>

			

			</li>
<li <?php if($file_name == 'stock.php'){echo 'class='.$active;}?>><a href="stock<?php echo $phpext;?>">Stock</a></li>

			<li <?php if($file_name == 'investor.php'){echo 'class='.$active;}?>><a href="investor<?php echo $phpext;?>">Investor's Portal</a></li>

      <li <?php if($file_name == 'about.php'){echo 'class='.$active;}?>><a href="about<?php echo $phpext;?>">About us</a></li>




			<li <?php if($file_name == 'contact.php'){echo 'class='.$active;}?>><a href="contact<?php echo $phpext;?>">Contact us</a></li>

        </ul>

       </div>

      </div>

     </div>

    </section>

   </nav>

  <!-- menu end -->