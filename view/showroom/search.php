<!-- Content Start -->
<div id="content_container">
	
	<script>
	$(document).ready(function() {



		$(".vehicle_container").click(function() {
			window.location = $(this).find("a").attr("href"); 
			return false;
		});
});
	</script>

	<?php 
	
	include ROOT_DIR . "/view/searchBar.php";

	echo "<div id=\"content\">";

	if(sizeof($this->result) > 0) {	
	
		echo "<h2>We currently have " . sizeof($this->result) . " vehicles available in our showroom.</h2>";
	
        foreach($this->result as $record) {	
?>		

			<div id="vehicle_container" class="vehicle_container">
			
			<div id="vehicle_description">
				<h2><?php echo $record['vehicle_year'] . " " . $record['vehicle_make'] . " " . $record['vehicle_model'] ?></h2>
				<h3><?php echo $record['sale_summary'] ?></h3>
			</div>
			<div id="vehicle_image">
				<?php 
					if(!is_null($record['vehicle_image'])) {
						echo "<a href=\"" . URL . "/showroom/" . $record['vehicle_make'] . "/" . $record['vehicle_model'] . "/" . $record['vehicle_registration'] . "\"><img src=\"" . URL . "/media/media.jpg?id=" . base64_encode($record['vehicle_make'] . "/" . $record['vehicle_model'] . "/" . $record['vehicle_registration'] . "/" . $record['vehicle_image']) ."\" /></a>";
					} else {
						echo "<div class=\"no_image\">Awaiting Image</div>";
					}		
				?>
				
				<div id="vehicle_image_count"><?php echo $record['vehicle_image_count']; ?> Image<?php echo $record['vehicle_image_count'] == 1 ? '' : 's'; ?></div>
			</div>
			
			<div id="vehicle_details">
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
			
			<div id="vehicle_price">
				<h1>£<?php echo $record['sale_price'] ?></h1>
			</div>
		</div>
		<?php
        }		
    } else {
		echo "<h2>There are no vehicles available in our showroom.</h2>";
	}
	
?>
		<div style="clear: both"></div>
		</div>
	</div>
    <!-- Content End -->