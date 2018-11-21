	<!-- Content Start -->
	<div id="content_container">
		<div id="index_banner">
		<div style="width: 850px; margin-top: 100px; z-index: 20; position: absolute; top: 300px; margin: 0px auto; left: 0; right: 0;">
			<?php 
				include ROOT_DIR . "/view/searchBar.php";
			?>
			</div>
			<img src="<?php echo $images_directory ?>/slide-02.jpg" style="width: 100%;" />
			
			<p style="position: absolute; left: 0; top: 40%; width: 100%; text-align: center; color: #fff; font-weight: bold; font-size: 32px;">FIND YOUR PERFECT CAR TODAY</p>
			
		</div>

	
		<div id="content">
		<div style="width: 80%; margin: 0px auto; text-align: center; margin-top: 40px;">
			<h1>Welcome to <font style="color: red;">JF</font> CARS</h1>
			<h3>THE BEST WAY TO BUY YOUR NEXT CAR</h3>
			<br />
			<p>If you are looking to purchase a quality used vehicle in the Kings Lynn area, then you have reached the right place! JF Car Sales are proud to offer you a excellent customer service on a wide range of vehicle, so why not check out our <a href="/showroom">showroom</a>?</p>
			
			<p>At JF Car Sales, we don't just sell you a vehicles, we sell you a professional car buying experience with the aim to make your purchase as easy as possible. </p>

			<p>Our <a href="/showroom">showroom</a> is updated regularly in order to offer vehicles to suit everyone.</p>

			<h3>Still can't find what you are looking for?</h3>
			<p>Why not give us a call on <b>07500 123456</b> and we will try our best to find your perfect vehicle.</p>
		</div>
		<div class="spacer"></div>
		<div style="text-align: center;">
			<h1>Latest additions to our stock</h1>
			<div class="spacer"></div>

			<?php foreach($this->latestSale as $record) {	 ?>
				<div class="vehicle_container">
							
				<div class="vehicle_description">
					<h2><a href="/showroom/"<?php echo $record['vehicle_make'] . "/" . $record['vehicle_model'] . "/" . $record['vehicle_registration']; ?>><?php echo $record['vehicle_year'] . " " . $record['vehicle_make'] . " " . $record['vehicle_model'] ?></a></h2>
					<h3><?php echo $record['sale_summary'] ?></h3>
				</div>
				<div class="vehicle_image">
					<?php 
						if(!is_null($record['vehicle_image'])) {
							echo "<a href=\"/showroom/" . $record['vehicle_make'] . "/" . $record['vehicle_model'] . "/" . $record['vehicle_registration'] . "\"><img src=\"/media/media.jpg?id=" . base64_encode($record['vehicle_make'] . "/" . $record['vehicle_model'] . "/" . $record['vehicle_registration'] . "/" . $record['vehicle_image']) ."\" /></a>";
						} else {
							echo "<div class=\"no_image\">Awaiting Image</div>";
						}		
					?>
					
					<div class="vehicle_image_count"><?php echo $record['vehicle_image_count']; ?> Image<?php echo $record['vehicle_image_count'] == 1 ? '' : 's'; ?></div>
				</div>

				<div class="vehicle_details">
					<ul>
						<li>ENGINE SIZE: <?php echo $record['vehicle_engine_size'] ?></li>
						<li>MILEAGE: <?php echo $record['vehicle_mileage'] ?></li>
						<li>FUEL TYPE: <?php echo $record['vehicle_fuel'] ?></li>
						<li>YEAR: <?php echo $record['vehicle_year'] ?></li>
						<li>TRANSMISSION: <?php echo $record['vehicle_transmission'] ?></li>
						<li>INSURANCE GROUP: <?php echo $record['vehicle_insurance_group'] ?></li>
						<li>MPG: <?php echo $record['vehicle_mpg'] ?></li>
						<li>ROAD TAX: <?php echo $record['vehicle_road_tax'] ?></li>
					</ul>
					<?php //echo substr(md5($record['sale_id']), 0, 8); ?>
				</div>

				<div class="vehicle_price">
					<h1>£<?php echo $record['sale_price'] ?></h1>
				</div>
				<div style="clear: both"></div>
				</div>
			<?php
			}		
			?>
			
		</div>
		<div class="spacer"></div>
		<div style="width: 100%; height: 420px;">
		
			<div  id="myCarousel" style="margin: 0px auto; text-align: center;" class="carousel slide" data-ride="carousel" data-interval="10000">
				<h1>Customer Reviews</h1>
				<div class="spacer"></div>
				<div class="carousel-inner">
					<div class="item active">
						<span class="reviewMessage">
							Such a fantastic buying experience
						</span>

						<span class="reviewAuthor">
							Matt S. 2018
						</span>
					</div>

					<div class="item">
						<span class="reviewMessage">
							I found my perfect cars with JF Cars
						</span>

						<span class="reviewAuthor">
							Nikki S. 2017
						</span>
					</div>

					<div class="item">
						<span class="reviewMessage">
							JF Cars offer a top notch service
						</span>

						<span class="reviewAuthor">
							Dave F. 14/02/2018
						</span>
					</div>

				</div>

				
			</div>
		
		</div>
		
		<div style="clear: both"></div>
</div>
	</div>
    <!-- Content End -->