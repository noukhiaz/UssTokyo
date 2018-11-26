 <ul class="pull-right additional-triggers">
				
                   <!--
                	<li><a href="#" data-toggle="dropdown">Currency <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="currencydropdown">
                            <li><a href="#"><i class="fa fa-dollar"></i></a></li>
                            <li><a href="#"><i class="fa fa-euro"></i></a></li>
                        </ul>
                   	</li>
                	<li><a href="#" data-toggle="dropdown">Language <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="languagedropdown">
                            <li><a href="#">English</a></li>
                            <li><a href="#">Spanish</a></li>
                            <li><a href="#">Portuguese</a></li>
                        </ul>
                   	</li>
					<li> <a href="#" class="search-trigger"><i class="fa fa-search"></i></a>-->
					
					<div class="search-function">
                    <a href="#" class="search-trigger">
					<span> Advance Search</span>
					<i class="fa fa-search"></i>
                    </a>
                </div>
                </li>
                </ul> 
                <!-- Main Navigation -->
<?php

$page_name = basename($_SERVER['PHP_SELF']);


?>				
                <nav class="main-navigation dd-menu toggle-menu" role="navigation">
                    <ul class="sf-menu">
                        <li class="<?php if($page_name == 'index.php'){echo 'active';}?>"><a href="index.php">Home</a></li>
						<li class="<?php if($page_name == 'about-us.php'){echo 'active';}?>"><a href="about-us.php">About Us</a></li>
						<li><a href="auction.php">Auctions</a></li>
						<li class="<?php if($page_name == 'investors.php'){echo 'active';}?>"><a href="investors.php">Investor's Portal</a></li>
						<li><a href="javascript:void(0)">Pakistan</a>
                            <ul class="dropdown">
                                <li><a href="about.html">About Us</a></li>
                                <li><a href="contact.html">Contact Us</a></li>
                                <li><a href="joinus.html">Signup</a></li>
                                <li><a href="404.html">404 Error Page</a></li>
                                <li><a href="add-listing-pricing.html">Pricing</a></li>
                                <li><a href="shortcodes.html">Shortcodes</a></li>
                                <li><a href="typography.html">Typography</a></li>
                                <li><a href="dealers-search.html">Dealer Search</a></li>
                                <li><a href="dealers-search-results.html">Dealer Search Results</a></li>
								<li><a href="#">Duties</a></li>
                            </ul>
                        </li>
						<li class="<?php if($page_name == 'duties-in-pakistan.php'){echo 'active';}?>"><a href="duties-in-pakistan.php">Duties</a></li>
						<li class="<?php if($page_name == 'contact.php'){echo 'active';}?>"><a href="contact.php">Contact Us</a></li>						
                    </ul>
                </nav> 