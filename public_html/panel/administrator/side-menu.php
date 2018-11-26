<?php if(($_GET['p'] == 'incident_detail') || ($_GET['p'] == 'reports')){?>
<ul class="page-sidebar-menu  page-sidebar-menu-closed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
<?php }else{?>
<ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
<?php }?>
                        <li class="nav-item start <?php if($_GET['p'] == 'dashboard'){echo 'active open';}?>">
                            <a href="index.php?p=dashboard" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">Dashboard</span>
                                
                                
                            </a>
                        </li>
						<li class="nav-item  <?php if(($_GET['p'] == 'bids') || ($_GET['p'] == 'bidss')){echo 'active open';}?>">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-money"></i>
                                <span class="title">Bids Management</span>
								<?php if(($_GET['p'] == 'bids') || ($_GET['p'] == 'bidsa')){?>
								 <span class="selected"></span>
								<span class="arrow open"></span>
								<?php }else{?>
								<span class="arrow"></span>
								<?php }?>
                            </a>
							<ul class="sub-menu " >
                                <li class="nav-item  <?php if($_GET['p'] == 'bids'){echo 'active';}?>">
                                    <a href="index.php?p=bids" class="nav-link ">
                                        <span class="title">Bids on Cars</span>
										<span class="selected"></span>
                                    </a>
                                </li>
								
							</ul>	
                        </li>
                        <li class="nav-item  <?php if(($_GET['p'] == 'cars') || ($_GET['p'] == 'add_cars')){echo 'active open';}?>">
                            <a href="" class="nav-link nav-toggle">
                                <i class="fa fa-car"></i>
                                <span class="title">Stock Cars</span>
								<span class="arrow"></span>
                            </a>
							<ul class="sub-menu">
                                <li class="nav-item <?php if(($_GET['p'] == 'cars')){echo 'active open';}?>">
                                    <a href="index.php?p=cars" class="nav-link ">
                                        <span class="title">Stock Cars List</span>
                                    </a>
                                </li>
								<li class="nav-item <?php if(($_GET['p'] == 'add_cars')){echo 'active open';}?>">
                                    <a href="index.php?p=add_cars" class="nav-link ">
                                        <span class="title">Post Stock Car</span>
                                    </a>
                                </li>
							</ul>
                        </li>
						<li class="nav-item  <?php if(($_GET['p'] == 'win_cars') || ($_GET['p'] == 'post_new_cars_auction')){echo 'active open';}?>">
                            <a href="" class="nav-link nav-toggle">
                                <i class="fa fa-car"></i>
                                <span class="title">Sold Cars</span>
								<span class="arrow"></span>
                            </a>
							<ul class="sub-menu">
                                <li class="nav-item <?php if(($_GET['p'] == 'win_cars')){echo 'active open';}?>">
                                    <a href="index.php?p=win_cars" class="nav-link ">
                                        <span class="title">Sold Cars List</span>
                                    </a>
                                </li>
								<li class="nav-item <?php if(($_GET['p'] == 'post_new_cars_auction')){echo 'active open';}?>">
                                    <a href="index.php?p=post_new_cars_auction" class="nav-link ">
                                        <span class="title">Post New Car</span>
                                    </a>
                                </li>
								
							</ul>
                        </li>
						<li class="nav-item  <?php if(($_GET['p'] == 'add_pic') || ($_GET['p'] == 'pix') ){echo 'active open';}?>">
                            <a href="" class="nav-link nav-toggle">
                                <i class="fa fa-photo"></i>
                                <span class="title">Pictures Managments</span>
								<span class="arrow"></span>
                            </a>
							<ul class="sub-menu">
							<li class="nav-item <?php if(($_GET['p'] == 'pix')){echo 'active open';}?>">
                                    <a href="index.php?p=pix" class="nav-link ">
                                        <span class="title"> Pictures List</span>
                                    </a>
                                </li>
								<li class="nav-item <?php if(($_GET['p'] == 'add_pic')){echo 'active open';}?>">
                                    <a href="index.php?p=add_pic" class="nav-link ">
                                        <span class="title">Post Picture</span>
                                    </a>
                                </li>
								
							</ul>
                        </li>
                        <li class="nav-item <?php if(($_GET['p'] == 'users') || ($_GET['p'] == 'add-user')){echo 'active open';}?>">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-user"></i>
                                <span class="title">User Management</span>
								<?php if(($_GET['p'] == 'users') || ($_GET['p'] == 'add-user')){?>
								 <span class="selected"></span>
								<span class="arrow open"></span>
								<?php }else{?>
								<span class="arrow"></span>
								<?php }?>
                            </a>
							<ul class="sub-menu " >
                                <li class="nav-item  <?php if($_GET['p'] == 'users'){echo 'active';}?>">
                                    <a href="index.php?p=users" class="nav-link ">
                                        <span class="title">All User</span>
										<span class="selected"></span>
                                    </a>
                                </li>
								<li class="nav-item  <?php if($_GET['p'] == 'add-user'){echo 'active';}?>">
                                    <a href="index.php?p=add-user" class="nav-link ">
                                        <span class="title">Add User</span>
										<span class="selected"></span>
                                    </a>
                                </li>
							</ul>	
                        </li>
						
                        <li class="nav-item <?php if(($_GET['p'] == 'transactions') || ($_GET['p'] == 'add_transaction')){echo 'active open';}?>">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-money"></i>
                                <span class="title">Financial Management</span>
								<?php if(($_GET['p'] == 'transactions') || ($_GET['p'] == 'add-user')){?>
								 <span class="selected"></span>
								<span class="arrow open"></span>
								<?php }else{?>
								<span class="arrow"></span>
								<?php }?>
                            </a>
							<ul class="sub-menu " >
                                <li class="nav-item  <?php if($_GET['p'] == 'transactions'){echo 'active';}?>">
                                    <a href="index.php?p=transactions" class="nav-link ">
                                        <span class="title">All Transactions</span>
										<span class="selected"></span>
                                    </a>
                                </li>
								<li class="nav-item  <?php if($_GET['p'] == 'add_transaction'){echo 'active';}?>">
                                    <a href="index.php?p=add_transaction" class="nav-link ">
                                        <span class="title">Add Transactions</span>
										<span class="selected"></span>
                                    </a>
                                </li>
							</ul>	
                        </li>
                        <li class="heading" >
                            <h3 class="uppercase">Admin Other Controlls</h3>
                        </li>
                        <li class="nav-item  <?php if(($_GET['p'] == 'companies') || ($_GET['p'] == 'add_companies') || ($_GET['p'] == 'brands') || ($_GET['p'] == 'add_brands')){echo 'active open';}?>">
                            <a href="" class="nav-link nav-toggle">
                                <i class="fa fa-building"></i>
                                <span class="title">Cars Companies</span>
								<span class="arrow"></span>
                            </a>
							<ul class="sub-menu">
                                <li class="nav-item <?php if(($_GET['p'] == 'companies') || ($_GET['p'] == 'add_companies')){echo 'active open';}?>">
                                    <a href="index.php?p=companies" class="nav-link ">
                                        <span class="title">Companies List</span>
                                    </a>
                                </li>
								<li class="nav-item <?php if(($_GET['p'] == 'brands') || ($_GET['p'] == 'add_brands')){echo 'active open';}?>">
                                    <a href="index.php?p=brands" class="nav-link ">
                                        <span class="title">Car Brands</span>
                                    </a>
                                </li>
							</ul>
                        </li>
                        
						
						<li class="nav-item  <?php if(($_GET['p'] == 'add_cities') || ($_GET['p'] == 'countries') || ($_GET['p'] == 'cities')  || ($_GET['p'] == 'add-country') || ($_GET['p'] == 'country-province') || ($_GET['p'] == 'provinces') || ($_GET['p'] == 'regions')  || ($_GET['p'] == 'add_regions')){echo 'active open';}?>">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-map"></i>
                                <span class="title">Regions / Countries</span>
                               <?php if(($_GET['p'] == 'add_cities') || ($_GET['p'] == 'countries') || ($_GET['p'] == 'cities')  || ($_GET['p'] == 'add-country') || ($_GET['p'] == 'country-province') || ($_GET['p'] == 'provinces') || ($_GET['p'] == 'regions')  || ($_GET['p'] == 'add_regions')){?>
                                 <span class="selected"></span>
                                <span class="arrow open"></span>
                                <?php }else{?>
                                <span class="arrow"></span>
                                <?php }?>
                                
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item <?php if(($_GET['p'] == 'countries') || ($_GET['p'] == 'add-country') ){echo 'active open';}?>">
                                    <a href="index.php?p=countries" class="nav-link ">
                                        <span class="title">Countries List</span>
                                    </a>
                                </li>
                                <li class="nav-item  <?php if(($_GET['p'] == 'provinces')  || ($_GET['p'] == 'country-province')){echo 'active open';}?>">
                                    <a href="index.php?p=provinces" class="nav-link ">
                                        <span class="title">Provinces</span>
                                    </a>
                                </li>
                                <li class="nav-item  <?php if(($_GET['p'] == 'cities')  || ($_GET['p'] == 'add_cities')){echo 'active open';}?>">
                                    <a href="index.php?p=cities" class="nav-link ">
                                        <span class="title">Cities</span>
                                    </a>
                                </li>
                                <li class="nav-item  <?php if(($_GET['p'] == 'regions')  || ($_GET['p'] == 'add_regions')){echo 'active open';}?>">
                                    <a href="index.php?p=regions" class="nav-link ">
                                        <span class="title">Regions</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
					
                     
                        
                       
                        <li class="nav-item  ">
                            <hr>
                            <a href="../logout.php" class="nav-link nav-toggle">
                                <i class="fa fa-sign-out"></i>
                                <span class="title">Logout</span>
                            </a>
                        </li>
                    </ul>