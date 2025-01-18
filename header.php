		<!-- start header -->
		<header>
			<div class="top wow bounceInUp">
				<div class="container">
					<div class="row">

						<div class="col-md-6 wow bounceInUp" data-wow-delay="400ms">
							<ul class="topleft-info">
								<li><i class="glyphicon glyphicon-earphone wow bounce""></i> <?php
												$myQuery="select * from theme_view where id=1";
												$record=mysqli_query($myCon,$myQuery);

												$row=mysqli_fetch_array($record);
												echo $row["phone_number"];
									?>
								</li>
							</ul>
						</div>

						<div class="col-md-6 wow bounceInUp" data-wow-delay="400ms">
							<div id="sb-search" class="sb-search">
								<form action="search.php" method="post">
									<div class="form-group input-group">
										<input type="text" name="search" placeholder="Search" required maxlength="30" class="form-control">
										<span class="input-group-btn">
                            				<button type="submit" class="btn">
                            					<span class="glyphicon glyphicon-search"></span>
                            				</button>
                        				</span>
									</div>
								</form>
							</div>


						</div>
					</div>
				</div>
			</div>

			<div class="navbar navbar-default navbar-static-top wow bounceInLeft" data-wow-delay="500ms">
				<div class="container" >
					<div class="navbar-header" >
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
						<a class="navbar-brand"href="index.php">
							<img src="images/logo.png" style="width: 9%;height: 80%; display: inline;" alt=""> Garments Shop
						</a>
					</div>
					<div class="navbar-collapse collapse">
						<ul class="nav navbar-nav">
							<li id="menuHome" class="active">
								<a href="index.php">
								 <span class="glyphicon glyphicon-home"></span> Home</a>
							</li>
							<li id="menuCategories" class="dropdown">
								<a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">
									 <span class="glyphicon glyphicon-th-list"></span> Categories </a>
								<ul class="dropdown-menu">
									<li class="dropdown-submenu">
										<a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown">
											<span class="glyphicon glyphicon-fire"></span> Men's Stuff
										</a>
										<ul class="dropdown-menu">
											<?php
												$myQuery="select * from subcategory where cat_id=1";
												$record=mysqli_query($myCon,$myQuery);

												while($row=mysqli_fetch_array($record))
												{
			
													 echo '<li><a href="category.php?subCat_name='.$row['subCat_name'].'&cat_name=Men\'s Stuff&subCat_id='.$row['subCat_id'].'">'.$row["subCat_name"].'</a></li>';
												}
											?>
										</ul>
									</li>																		
									<li class="dropdown-submenu">
										<a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown">
											<span class="glyphicon glyphicon-tint"></span> Women's Stuff
										</a>
										<ul class="dropdown-menu">
											<?php
												$myQuery="select * from subcategory where cat_id=2";
												$record=mysqli_query($myCon,$myQuery);

												while($row=mysqli_fetch_array($record))
												{
			
													 echo '<li><a href="category.php?subCat_name='.$row['subCat_name'].'&cat_name=Women\'s Stuff&subCat_id='.$row['subCat_id'].'">'.$row["subCat_name"].'</a></li>';
												}
											?>
										</ul>
									</li>
									<li class="dropdown-submenu">
										<a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown">
											<span class="glyphicon glyphicon-leaf"></span> Kids Stuff
										</a>
										<ul class="dropdown-menu">
											<?php
												$myQuery="select * from subcategory where cat_id=3";
												$record=mysqli_query($myCon,$myQuery);

												while($row=mysqli_fetch_array($record))
												{
			
													 echo '<li><a href="category.php?subCat_name='.$row['subCat_name'].'&cat_name=Kids Stuff&subCat_id='.$row['subCat_id'].'">'.$row["subCat_name"].'</a></li>';
												}
											?>
										</ul>
									</li>
								</ul>
							</li>
							<li id="manuAbout"><a href="about.php"><span class="glyphicon glyphicon-heart"></span> About</a></li>
							<li id="menuContact"><a href="contact.php"> <span class="glyphicon glyphicon-phone"></span> Contact Us</a></li>
							<?php
                    					$myEmail="";
                    					if(isset($_SESSION["user_email"])){
											$myEmail=$_SESSION["user_email"];
										}
										if(isset($_SESSION["admin_email"])){
											$myEmail=$_SESSION["admin_email"];
										}
									$myQuery="select * from cart where user_email='$myEmail'";
									$record=mysqli_query($myCon,$myQuery);
									$count=mysqli_num_rows($record);
							?>
							<li id="menuCart"><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart 
								<span id="count" class="badge"><?php echo $count ?></span></a></li>

							
									<?php
									
										if(isset($_SESSION["user"])){
											echo '<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>
											 '.$_SESSION['user'].' <span class="caret"></span></a>
											 	<ul class="dropdown-menu">
											 		<li><a href="profile.php"> <span class="glyphicon glyphicon-eye-open"></span> View Profile</a></li>
											 		<li class="divider"></li>
											 		<li><a href="logout.php?logout=user"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
											 	</ul>
											 	</li>';
										}else if(isset($_SESSION["admin"])){
											echo '<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>
											 '.$_SESSION['admin'].' <span class="caret"></span></a>
											 	<ul class="dropdown-menu">
											 		<li><a href="adminPanel.php"> <span class="glyphicon glyphicon-cog"></span> Admin Panel</a></li>
											 		<li><a href="profile.php"> <span class="glyphicon glyphicon-eye-open"></span> View Profile</a></li>
											 		<li class="divider"></li>
											 		<li><a href="logout.php?logout=admin"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>										 												
											 	</ul>
											 	</li>';
										}else{
											echo '<li><a href="login.php"><span class="glyphicon glyphicon-user"></span> Sign In / Up</a>';
										}
									?>
								
							</li>
						</ul>
					</div>
				</div>
			</div>
		</header>