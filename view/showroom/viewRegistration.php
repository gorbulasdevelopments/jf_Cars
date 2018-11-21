<style type="text/css">

	#vehicleEnquiryForm {
	}

	#enquiryTable {
		
	}

	#enquiryTable tr {
		
	}

	#enquiryTable tr td {
		padding: 10px;
	}

	#enquiryTable tr td option {
		padding: 10px;
		width: 234px;
	}

	#enquiryTable tr td input {
		padding: 10px;
		width: 250px;
	}

	#enquiryFormContainer {
		width: 100%;

	}

	#vehicleDetails{
		width: 100%;
		margin-top:30px;
		float: left;
		background-color: #fff;
		text-align: center;
		padding-top: 10px;
		padding-bottom: 10px;
		
	}

	#vehicleDetails .detailContainer {
		width: 29%;
		border-right: 1px solid #c0c0c0;
		margin-right: 2%;
		padding-right: 2%;
		float: left;
		text-align: left;
		font-size: 13px;
	}

	#vehicleDetails .detailContainer:nth-child(3n+3) {
		border-right: 0px;
		margin-right: 0%;
		padding-right: 0%;
	}

	#vehicleDetails .detailContainer:nth-child(3n+1) {
		margin-left: 25px;
	}

	#vehicleDetails .detailContainer .detailContainerLabel {
		width: 50%;
		float: left;
		padding-top:5px;
		padding-bottom:5px;
	}

	#vehicleDetails .detailContainer .detailContainerValue {
		padding-top: 5px;
		width: 50%;
		float: left;
		padding-bottom:5px;
		font-weight: bold;
	}



</style>

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
							echo "<img class=\"vehicleImages\" src=\"" . URL . "/media/media.jpg?id=" . base64_encode($record['vehicle_make'] . "/" . $record['vehicle_model'] . "/" . $record['vehicle_registration'] . "/" . $vehicleImage['vehicle_image_url']) ."\" style=\"width: 100%; display: none; float: left;\" />";
						}
						
						echo "<button id=\"left_button\" onclick=\"plusDivs(-1)\">&#10094;</button>";
						echo "<button id=\"right_button\"  onclick=\"plusDivs(1)\">&#10095;</button>";
					} else {
						echo "<div class=\"no_image\"><h3>Awaiting Image</h3></div>";
					}
				?>

				
			</div>
			<div style=" margin-bottom: 40px;float: right; padding-right: 30px; text-align: center;">
				<div style=""><h3>Vehicle Registration</h3></div>
				<div style=" background-color: #eed90c; border: 2px solid #000000; font-size: 28px; width: 200px; text-align: center; height: 40px; line-height: 40px; padding: 10px; border-radius: 10px;"><?php echo $record['vehicle_registration']; ?></div>
				<div style="margin-top: 40px;">Sale Summary</div>
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
			
			<div id="vehicleExtras" style="float: left; width: 100%; text-align: center; margin-top: 30px;">
				<h1>Vehicle Extras</h1>
				<?php echo $record['vehicle_safety'] ?><br />
				<?php echo $record['vehicle_interior'] ?><br />
				<?php echo $record['vehicle_exterior'] ?><br />
				<?php echo $record['vehicle_comfort'] ?><br />
				<?php echo $record['vehicle_other'] ?><br />

			</div>
			
			<div class="vehicle_details" style="margin-top: 30px; float: left; line-height: 30px; padding-left: 20px;">
				<?php echo $record['vehicle_extras'] ?>
				
			</div>

			
			<div id="enquiryContainer">
				<h1>Enquire about this vehicle</h1>
				<div id="enquiryFormContainer">
					<form id="vehicleEnquiryForm" method="POST" action="/showroom/vehicleEnquiry">
						<input type="hidden" name="vehicleRegistration" value="<?php echo $vehicleRegistraion; ?>" />
						<table id="enquiryTable" style="text-align: left; padding: 20px;">
							<tr>
								<td>Enquiry:</td>
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
								<td>Full Name:</td>
								<td><input type="text" name="customerName" required></td>
							</tr>
							<tr>
								<td>Contact Number:</td>
								<td><input type="tel" pattern="0[0-9]{10}" name="customerNumber" required></td>
							</tr>
							<tr>
								<td>Email Address:</td>
								<td><input type="email" name="customerEmail" required></td>
							</tr>
							<tr>
								<td>Message:</td>
								<td><textarea name="customerMessage" style="width: 280px; height: 100px;" required></textarea></td>
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

		$(document).ready(function() {
			$('#vehicleEnquiryForm').submit(function(event) {
				event.preventDefault();


				$.ajax({
					type: "POST",
					url: "http://zion/showroom/vehicleEnquiry",
					dataType: 'json',
					data: {data:$(this).serialize()},
					error: function (response) {
						//console.log(response);
					},
					complete: function (response) {
						$("#enquiryFormContainer").html(response.responseText);
						console.log(response);
					}
				});
			});

		});

	</script>
