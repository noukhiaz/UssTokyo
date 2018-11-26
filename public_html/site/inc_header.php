<div class="site-header-wrapper">
									
        <header class="site-header">
		<div style="border-bottom:1px solid #eee; background:#F9F9F9;" class="nonsicky">
											<div class="container sp-cont">
											<i class="fa fa-envelope-o"> </i> info@usstokyo.com
											&nbsp;&nbsp;<i class="fa fa-phone"></i>  +81 8013340786
											&nbsp;&nbsp;<i class="fa fa-clock-o"></i> Mon - Sat 9:00 AM - 5PM JST
											
											<div class="header-right">
											<a href="login.php" class="text_underline">Login</a>   &nbsp;|&nbsp; 
											<a href="registration.php"  class="text_underline">Registration</a>  &nbsp;|&nbsp;
											<a href="rules.php" class="text_underline">Auction Rules</a> &nbsp;|&nbsp;
											<a href="#" class="text_underline">FAQ's</a>
											
											&nbsp;&nbsp;&nbsp;&nbsp;
											<a href="https://web.facebook.com/USSTOKYO/"><i class="fa fa-facebook"></i></a>
											<a href="#"><i class="fa fa-twitter"></i></a>
											<a href="#"><i class="fa fa-linkedin"></i></a>
											<a href="#"><i class="fa fa-youtube"></i></a>
											</div>
											
											</div>
									</div>	
            <div class="container sp-cont">
                <div class="site-logo top_right_menu">
                    <h1><a href="index.html"><img src="images/logo.png" alt="Logo"></a></h1>
                </div>
                <div class="header-right top_right_menu">
				
                    <a href="http://auc.usstokyo.com/report" target="_blank">
					<img src="images/auction_sheet_usstokyo.com.png"  alt="auction">
					</a>
                       <!-- <span><i class="fa fa-phone"></i> Call us <strong>+81 8013340786</strong> <em>or</em> search</span>-->
                    <!--
                    <div class="user-login-panel">
                        <a href="#" class="user-login-btn" data-toggle="modal" data-target="#loginModal"><i class="icon-profile"></i></a>
                    </div>-->
               	</div>
            </div>
        </header>
        <!-- End Site Header -->
		<div class="navbar">
            <div class="container sp-cont">
               <?php include('inc_menu.php');?>
               	<a href="#" class="visible-sm visible-xs" id="menu-toggle"><i class="fa fa-bars"></i></a>
                <!-- Search Form -->
                <div class="search-form">
                    <div class="search-form-inner">
                        <form>
                            <h3>Find a Car with our Quick Search</h3>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Postcode</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Body Type</label>
                                            <select name="Body Type" class="form-control selectpicker">
                                                <option selected>Any</option>
                                                <option>Wagon</option>
                                                <option>Minivan</option>
                                                <option>Coupe</option>
                                                <option>Crossover</option>
                                                <option>Van</option>
                                                <option>SUV</option>
                                                <option>Minicar</option>
                                                <option>Sedan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Make</label>
                                            <select name="Make" class="form-control selectpicker">
                                                <option selected>Any</option>
                                                <option>Jaguar</option>
                                                <option>BMW</option>
                                                <option>Mercedes</option>
                                                <option>Porsche</option>
                                                <option>Nissan</option>
                                                <option>Mazda</option>
                                                <option>Acura</option>
                                                <option>Audi</option>
                                                <option>Bugatti</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Model</label>
                                            <select name="Model" class="form-control selectpicker">
                                                <option selected>Any</option>
                                                <option>GTX</option>
                                                <option>GTR</option>
                                                <option>GTS</option>
                                                <option>RLX</option>
                                                <option>M6</option>
                                                <option>S Class</option>
                                                <option>C Class</option>
                                                <option>B Class</option>
                                                <option>A Class</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Price Min</label>
                                            <select name="Min Price" class="form-control selectpicker">
                                                <option selected>Any</option>
                                                <option>$10000</option>
                                                <option>$20000</option>
                                                <option>$30000</option>
                                                <option>$40000</option>
                                                <option>$50000</option>
                                                <option>$60000</option>
                                                <option>$70000</option>
                                                <option>$80000</option>
                                                <option>$90000</option>
                                                <option>$100000</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Price Max</label>
                                            <select name="Max Price" class="form-control selectpicker">
                                                <option selected>Any</option>
                                                <option>$10000</option>
                                                <option>$20000</option>
                                                <option>$30000</option>
                                                <option>$40000</option>
                                                <option>$50000</option>
                                                <option>$60000</option>
                                                <option>$70000</option>
                                                <option>$80000</option>
                                                <option>$90000</option>
                                                <option>$100000</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" id="inlineCheckbox1" value="option1"> Brand new only
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" id="inlineCheckbox2" value="option2"> Certified
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Min Year</label>
                                            <select name="Min Year" class="form-control selectpicker">
                                                <option selected>Any</option>
                                                <option>2005</option>
                                                <option>2006</option>
                                                <option>2007</option>
                                                <option>2008</option>
                                                <option>2009</option>
                                                <option>2010</option>
                                                <option>2011</option>
                                                <option>2012</option>
                                                <option>2013</option>
                                                <option>2014</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Max Year</label>
                                            <select name="Max Year" class="form-control selectpicker">
                                                <option selected>Any</option>
                                                <option>2005</option>
                                                <option>2006</option>
                                                <option>2007</option>
                                                <option>2008</option>
                                                <option>2009</option>
                                                <option>2010</option>
                                                <option>2011</option>
                                                <option>2012</option>
                                                <option>2013</option>
                                                <option>2014</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Min Mileage</label>
                                            <select name="Min Mileage" class="form-control selectpicker">
                                                <option selected>Any</option>
                                                <option>10000</option>
                                                <option>20000</option>
                                                <option>30000</option>
                                                <option>40000</option>
                                                <option>50000</option>
                                                <option>60000</option>
                                                <option>70000</option>
                                                <option>80000</option>
                                                <option>90000</option>
                                                <option>100000</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Max Mileage</label>
                                            <select name="Max Mileage" class="form-control selectpicker">
                                                <option selected>Any</option>
                                                <option>10000</option>
                                                <option>20000</option>
                                                <option>30000</option>
                                                <option>40000</option>
                                                <option>50000</option>
                                                <option>60000</option>
                                                <option>70000</option>
                                                <option>80000</option>
                                                <option>90000</option>
                                                <option>100000</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Transmission</label>
                                            <select name="Transmission" class="form-control selectpicker">
                                                <option selected>Any</option>
                                                <option>5 Speed Manual</option>
                                                <option>5 Speed Automatic</option>
                                                <option>6 Speed Manual</option>
                                                <option>6 Speed Automatic</option>
                                                <option>7 Speed Manual</option>
                                                <option>7 Speed Automatic</option>
                                                <option>8 Speed Manual</option>
                                                <option>8 Speed Automatic</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Body Color</label>
                                            <select name="Body Color" class="form-control selectpicker">
                                                <option selected>Any</option>
                                                <option>Red</option>
                                                <option>Black</option>
                                                <option>White</option>
                                                <option>Yellow</option>
                                                <option>Brown</option>
                                                <option>Grey</option>
                                                <option>Silver</option>
                                                <option>Gold</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="submit" class="btn btn-block btn-info btn-lg" value="Find my vehicle now">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>