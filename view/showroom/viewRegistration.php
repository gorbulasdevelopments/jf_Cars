<!-- Content Start -->
	<div id="content_container">
		
	<?php 
	
	//include ROOT_DIR . "/view/searchBar.php";
	
	?>
	<div id="content">
<?php	

	if(sizeof($this->result) > 0) {	
        foreach($this->result as $record) {	

			echo "<div class=\"page_location\">";
				echo "<a href=\"/\">Homepage</a> > <a href=\"/showroom\"> Showroom</a> > <a href=\"/showroom/" . $record['vehicle_make'] . "\"> " . $record['vehicle_make'] . " </a> > <a href=\"/showroom/" . $record['vehicle_make'] . "/" . $record['vehicle_model'] . "\"> " . $record['vehicle_model'] . " </a> > "  . $record['vehicle_year'] . " " . $record['vehicle_make'] . " " . $record['vehicle_model'] . " - " . $record['vehicle_registration'];
			echo "</div>";

			$vehicleRegistraion = $record['vehicle_registration'];
?>		
            <div class="vehicle_container_full">
			<div class="vehicle_description">
				<h2><b>£<?php echo $record['sale_price'] ?></b> | <?php echo $record['vehicle_year'] . " " . $record['vehicle_make'] . " " . $record['vehicle_model'] ?></h2>
				<h3><?php echo $record['sale_summary'] ?></h3>
			</div>
			<div class="vehicle_image">
				<?php 
					if(sizeof($this->vehicleImages) > 0) {
						foreach($this->vehicleImages as $vehicleImage) {	
							echo "<img class=\"vehicleImages\" src=\"/media/media.jpg?id=" . base64_encode($record['vehicle_make'] . "/" . $record['vehicle_model'] . "/" . $record['vehicle_registration'] . "/" . $vehicleImage['vehicle_image_url']) ."\" style=\"width: 100%; display: none; float: left;\" />";
						}
						
						echo "<button id=\"left_button\" onclick=\"$(this).plusDivs(-1)\">&#10094;</button>";
						echo "<button id=\"right_button\"  onclick=\"$(this).plusDivs(1)\">&#10095;</button>";
					} else {
						echo "<div class=\"no_image\"><h3>Awaiting Image</h3></div>";
					}
				?>

				
			</div>
			<div style=" margin-bottom: 40px;float: right; padding-right: 10px; text-align: center;">
				<div><h3>Vehicle Registration</h3></div>
				<div id="vehicleNumberPlate"><?php echo $record['vehicle_registration']; ?></div>
				<div id="enquiryContainer">
				<h1 style="display: none">Enquire about this vehicle</h1>
				<div id="enquiryFormContainer">
					<form id="vehicleEnquiryForm" method="POST" action="/showroom/vehicleEnquiry">
						<input type="hidden" name="vehicleRegistration" value="<?php echo $vehicleRegistraion; ?>" />
						<table id="enquiryTable" style="text-align: left; padding: 20px;">
							<tr>
								<td>
									<select name="enquiryType" value="" required>
										<option selected hidden value="">Please select an enquiry</option>
										<option value="viewing">I would like to view this vehilce</option></option>
										<option value="question">I have a question about this vehicle</option>
										<option value="testDrive">I would like to book a test drive</option>
									</select>	
								</td>
							</tr>						
							<tr>
								<td><input type="text" name="customerName" required placeholder="Enter Name"></td>
							</tr>
							<tr>
								<td><input type="tel" pattern="0[0-9]{10}" name="customerNumber" required placeholder="Telephone Number"></td>
							</tr>
							<tr>
								<td><input type="email" name="customerEmail" required placeholder="Email Address"></td>
							</tr>
							<tr>
								<td><textarea name="customerMessage" required placeholder="Message"></textarea></td>
							</tr>
							<tr>
								<td colspan = "2" style="text-align: center;">
									<input type="submit" value="Submit Enquiry" />
								</td>
							</tr>
						</table>
					</form>
				</div>
			</div>
			</div>

			<div class="spacer"></div>
			<div style="float: left; width: 100%; margin-top: 30px; text-align: center; margin-bottom: 40px;">
				<h1>Vehicle Summary</h1>
			</div>	
			<div id="vehicleSummary">
				<div class="vehicleDetails">
					<div class="detailContainer">
						<div class="detailContainerLabel">
							<span>Make:</span>
						</div>
						<div class="detailContainerValue">
							<?php echo $record['vehicle_make'] ?>
						</div>
					</div>
					
					<div class="detailContainer">
						<div class="detailContainerLabel">
							<span>Model:</span>
						</div>
						<div class="detailContainerValue">
							<?php echo $record['vehicle_model'] ?>
						</div>
					</div>
					<div class="detailContainer">
						<div class="detailContainerLabel">
							<span>Body Style:</span>
						</div>
						<div class="detailContainerValue">
							<?php echo $record['vehicle_body_style'] ?>
						</div>
					</div>
					<div class="detailContainer">
						<div class="detailContainerLabel">
							<span>Doors:</span>
						</div>
						<div class="detailContainerValue">
							<?php echo $record['vehicle_doors'] ?>
						</div>
					</div>
					<div class="detailContainer">
						<div class="detailContainerLabel">
							<span>Seats:</span>
						</div>
						<div class="detailContainerValue">
							<?php echo $record['vehicle_seats'] ?>
						</div>
					</div>
					<div class="detailContainer">
						<div class="detailContainerLabel">
							<span>Colour:</span>
						</div>
						<div class="detailContainerValue">
							<?php echo $record['vehicle_colour'] ?>
						</div>
					</div>
					<div class="detailContainer">
						<div class="detailContainerLabel">
							<span>Engine Size:</span>
						</div>
						<div class="detailContainerValue">
							<?php echo ceil( $record['vehicle_engine_size'] / 100 ) * 100; ?>
						</div>
					</div>
					<div class="detailContainer">
						<div class="detailContainerLabel">
							<span>Transmission:</span>
						</div>
						<div class="detailContainerValue">
							<?php echo $record['vehicle_transmission']; ?>
						</div>
					</div>
					<div class="detailContainer">
						<div class="detailContainerLabel">
							<span>Gears:</span>
						</div>
						<div class="detailContainerValue">
							<?php echo $record['vehicle_gears']; ?>
						</div>
					</div>
				</div>
				<div style="clear: both"> </div>
			</div>

			<div class="spacer"></div>

			<div style="float: left; width: 100%; margin-top: 30px; text-align: center; margin-bottom: 40px;">
				<h1>Performance and Economy</h1>
			</div>	
			<div id="vehiclePerformance">
				<div class="vehicleDetails">
					<div class="detailContainer">
						<div class="detailContainerLabel">
							<span>Fuel Consumption (urban):</span>
						</div>
						<div class="detailContainerValue">
							<?php echo $record['vehicle_fuel_urban'] ?> mpg
						</div>
					</div>
					<div class="detailContainer">
						<div class="detailContainerLabel">
							<span>Fuel Consumption (extra urban):</span>
						</div>
						<div class="detailContainerValue">
							<?php echo $record['vehicle_fuel_extra_urban'] ?> mpg
						</div>
					</div>
					<div class="detailContainer">
						<div class="detailContainerLabel">
							<span>Fuel Consumption (combined):</span>
						</div>
						<div class="detailContainerValue">
							<?php echo $record['vehicle_fuel_combined'] ?> mpg
						</div>
					</div>
					<div class="detailContainer">
						<div class="detailContainerLabel">
							<span>Engine Power:</span>
						</div>
						<div class="detailContainerValue">
							<?php echo $record['vehicle_bhp'] ?> bhp
						</div>
					</div>
					<div class="detailContainer">
						<div class="detailContainerLabel">
							<span>Torque:</span>
						</div>
						<div class="detailContainerValue">
							<?php echo $record['vehicle_torque'] ?> lbs/ft
						</div>
					</div>
					<div class="detailContainer">
						<div class="detailContainerLabel">
							<span>Top Speed:</span>
						</div>
						<div class="detailContainerValue">
							<?php echo $record['vehicle_max_speed'] ?> mph
						</div>
					</div>
				</div>
				<div style="clear: both"> </div>
			</div>

			<div class="spacer"></div>

<div style="float: left; width: 100%; margin-top: 30px; text-align: center; margin-bottom: 40px;">
				<h1>Running Costs</h1>
			</div>
<div id="vehicleRunningCosts">
				<div class="vehicleDetails">
					
					<div class="detailContainer">
						<div class="detailContainerLabel">
							<span>Road Tax (6 Months):</span>
						</div>
						<div class="detailContainerValue">
							£<?php echo $record['vehicle_road_tax_6'] ?>
						</div>
					</div>
					<div class="detailContainer">
						<div class="detailContainerLabel">
							<span>Road Tax (12 months):</span>
						</div>
						<div class="detailContainerValue">
							£<?php echo $record['vehicle_road_tax_12'] ?>
						</div>
					</div>
					<div class="detailContainer">
						<div class="detailContainerLabel">
							<span>Fuel Tank:</span>
						</div>
						<div class="detailContainerValue">
							<?php echo $record['vehicle_fuel_tank'] ?> litres
						</div>
					</div>
					<div class="detailContainer">
						<div class="detailContainerLabel">
							<span>Filling Cost (Based on £1.18 per litre):</span>
						</div>
						<div class="detailContainerValue">
							£<?php echo ($record['vehicle_fuel_tank'] * 1.18) ?>
						</div>
					</div>
					
				</div>
				<div style="clear: both"> </div>
			</div>
			<div class="spacer"></div>

			<div style="float: left; width: 100%; margin-top: 30px; text-align: center; margin-bottom: 40px;">
			
				<h1>Vehicle Extras</h1>
			</div>
			<div id="vehicleExtras">
				<div class="vehicleDetails" style=" line-height: 30px; padding-left: 20px;">
					<?php
						$safetyExtras = json_decode($record['vehicle_safety']);
						
						foreach($safetyExtras as $item) {
							echo "<div class=\"detailContainer\">";
							echo $item;
							echo "</div>";
						}
						
						$interiorExtras = json_decode($record['vehicle_interior']);
						
						foreach($interiorExtras as $item) {
							echo "<div class=\"detailContainer\">";
							echo $item;
							echo "</div>";
						}
						
						$exteriorExtras = json_decode($record['vehicle_exterior']);
						
						foreach($exteriorExtras as $item) {
							echo "<div class=\"detailContainer\">";
							echo $item;
							echo "</div>";
						}
						
						$comfortExtras = json_decode($record['vehicle_comfort']);
						
						foreach($comfortExtras as $item) {
							echo "<div class=\"detailContainer\">";
							echo $item;
							echo "</div>";
						}
						
						$otherExtras = json_decode($record['vehicle_other']);
						
						foreach($otherExtras as $item) {
							echo "<div class=\"detailContainer\">";
							echo $item;
							echo "</div>";
						}
						
					
					?>

				</div>
				<div style="clear: both"></div>
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
	</div>
	<!-- Content End -->