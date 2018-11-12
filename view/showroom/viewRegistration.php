<style type="text/css">

	#vehicleEnquiryForm {
		width: 510px;
		margin: 0px auto;
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
		height: 500px;
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
	
	include ROOT_DIR . "/view/searchBar.php";
	
	?>
		
		
<?php	

	if(sizeof($this->result) > 0) {	
        foreach($this->result as $record) {	
			$vehicleRegistraion = $record['vehicle_registration'];
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
			<div style="float: left; width: 100%; margin-top: 30px; padding-left: 20px;">
				<h1>Vehicle Details</h1>
			</div>
				<div id="vehicleDetails">
					<div class="detailContainer">
						<div class="detailContainerLabel">
							Make:
						</div>
						<div class="detailContainerValue">
							<?php echo $record['vehicle_make'] ?>
						</div>
					</div>
					
					<div class="detailContainer">
						<div class="detailContainerLabel">
							Model:
						</div>
						<div class="detailContainerValue">
							<?php echo $record['vehicle_model'] ?>
						</div>
					</div>
					<div class="detailContainer">
						<div class="detailContainerLabel">
							Doors:
						</div>
						<div class="detailContainerValue">
							<?php echo $record['vehicle_doors'] ?>
						</div>
					</div>
					<div class="detailContainer">
						<div class="detailContainerLabel">
							Colour:
						</div>
						<div class="detailContainerValue">
							<?php echo $record['vehicle_colour'] ?>
						</div>
					</div>
				</div>
				<div style="clear: both" />

				<br />
				<br />
				<br />
				<br />
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

			
			<div id="enquiryContainer" style="width: 100%; float: left; text-align: center;">
				<h2>Enquire about this vehicle</h2>
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
					url: "http://192.168.56.101/showroom/vehicleEnquiry",
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
