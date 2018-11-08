<!-- Content Start -->
	<div id="content_container">

	<?php 
	
	include ROOT_DIR . "/view/searchBar.php";
	
	?>
		
		
<?php	

	if(sizeof($this->result) > 0) {	
        foreach($this->result as $record) {	
?>		
            <div id="vehicle_container_full">
			<div id="vehicle_description">
				<h2><b>£<?php echo $record['sale_price'] ?></b> | <?php echo $record['vehicle_year'] . " " . $record['vehicle_make'] . " " . $record['vehicle_model'] ?></h2>
				<h3><?php echo $record['sale_summary'] ?></h3>
			</div>
			<div id="vehicle_image">
				<?php 
					if(sizeof($this->vehicleImages) > 0) {
						foreach($this->vehicleImages as $vehicleImage) {	
							echo "<img class=\"vehicleImages\" src=\"" . URL . "/media/media.jpg?id=" . base64_encode($record['vehicle_make'] . "/" . $record['vehicle_model'] . "/" . $record['vehicle_registration'] . "/" . $vehicleImage['vehicle_image_url']) ."\" style=\"width: 100%; display: none; float: left;\" />";
						}
						
						echo "<button style=\"position: absolute; bottom: 310px; left: -1px; height: 40px; margin-top: 20px; width: 30px;\" onclick=\"plusDivs(-1)\">&#10094;</button>";
						echo "<button style=\"position: absolute; bottom: 310px; right: -1px; height: 40px; margin-top: 20px; width: 30px;\" onclick=\"plusDivs(1)\">&#10095;</button>";
					} else {
						echo "<div class=\"no_image\"><h3>Awaiting Image</h3></div>";
					}
				?>

				
			</div>

			
			<div style="clear: both"></div>
			<div style="float: left; width: 100%; text-align: center; margin-top: 30px;">
				<h1>Vehicle Specification</h1>
			</div>
			
			<div id="vehicle_details">
				<ul>
					<li>Make: <?php echo $record['vehicle_make'] ?></li>
					<li>MODEL: <?php echo $record['vehicle_model'] ?></li>
					<li>DOORS: <?php echo $record['vehicle_doors'] ?></li>
					<li>COLOUR: <?php echo $record['vehicle_colour'] ?></li>
					<br />
					<li>YEAR: <?php echo $record['vehicle_year'] ?></li>
					<li>ENGINE SIZE: <?php echo $record['vehicle_engine_size'] ?></li>
					<li>FUEL TYPE: <?php echo $record['vehicle_fuel'] ?></li>
					<li>TRANSMISSION: <?php echo $record['vehicle_transmission'] ?></li>
					<li>MILEAGE: <?php echo $record['vehicle_mileage'] ?></li>
					<br />
					<li>INSURANCE GROUP: <?php echo $record['vehicle_insurance_group'] ?></li>
					<li>MPG: <?php echo $record['vehicle_mpg'] ?></li>
					<li>ROAD TAX: <?php echo $record['vehicle_road_tax'] ?></li>
				</ul>
				<div style="clear: both"></div>
			</div>
			<div style="clear: both"></div>
			
			<div style="float: left; width: 100%; text-align: center; margin-top: 30px;">
				<h1>Vehicle Extras</h1>
			</div>
			
			<div id="vehicle_details" style="margin-top: 30px; float: left; line-height: 30px; padding-left: 20px;">
				<?php echo $record['vehicle_extras'] ?>
				
			</div>

			
			<div style="width: 100%; float: left; height: 400px; text-align: center;">
				<h2>Enquire about this vehicle</h2>
			</div>
			<div style="clear: both"></div>
		</div>
		<?php
        }		
    } else {
		echo "No cars found";
	}
	
?>
		<div style="clear: both"></div>
	</div>
	<!-- Content End -->
	
	<script>
		var slideIndex = 1;
		showDivs(slideIndex);

		function plusDivs(n) {
			showDivs(slideIndex += n);
		}

		function showDivs(n) {
			var i;
			var x = document.getElementsByClassName("vehicleImages");
			if (n > x.length) {
				slideIndex = 1
			}

			if (n < 1) {
				slideIndex = x.length
			}

			for (i = 0; i < x.length; i++) {
				x[i].style.display = "none";  
			}
			x[slideIndex-1].style.display = "block";  
		}
	</script>