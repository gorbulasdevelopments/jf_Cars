<style type="text/css">
	#vehicle_form, #vehicleImageForm, #vehicleImageUploadForm {
		margin: 0px auto;
		width: 806px;
		margin-bottom: 30px;
		border-collapse: collapse;	
	}

    #vehicleTable, #vehicleImageTable {
        border: 1px solid #c0c0c0;
        font-size: 12px;		
		width: 100%;
		margin-bottom: 30px;
    }
	
    #vehicleTable tr {

    }

    #vehicleTable th {
		padding: 5px;
    }

	#vehicleTable td b {
        padding-left: -15px;
		font-size: 14px;
    }

    #vehicleTable td {
        padding: 10px;
    }



	
	#vehicleTable input {
        padding: 5px;
        text-align: center;
		border: 1px solid #c0c0c0;
		width: 300px;
	}

	#vehicleTable input[type='checkbox'] { 
		width: 20px;
		height: 14px;
		float: left;
		margin-top: 1px;
	}

	#vehicleTable .featureLabel { 
		/*height: 20px;*/
		line-height: 15px;
		display: block;
		float: left;
		width: 90%;
		padding-left: 10px;
		padding-bottom: 10px;
		line-height: 1.5;
	}

	#vehicleImageTable {
        border: 1px solid #c0c0c0;
		width: 100%;
        font-size: 10px;
		margin-top: 40px;
		margin-bottom: 40px;
		float: left;
		border-spacing: 0px;
    	border-collapse: collapse;
    }
	
	#vehicleImageTable th {
		padding: 5px;
		border-bottom: 1px solid #c0c0c0;
		text-align: center;
		height: 30px;
	}
	
	#vehicleImageTable tr {
		border-bottom: 1px solid #c0c0c0;
	}

    #vehicleImageTable td {
		padding: 5px;
		text-align: center;
    }
	
	#vehicleImageTable input {
        padding: 5px;
        text-align: center;
	}

	#vehicleSafety input {
		margin-left: 20px;
	}

	#vehicleInterior input {
		margin-left: 20px;
	}

	#vehicleExterior input {
		margin-left: 20px;
	}

	#vehicleComfort input {
		margin-left: 20px;
	}

	#vehicleOther input {
		margin-left: 20px;
	}
</style>



	<div id="content_container">

        <div id="content">
			<h2>Update Vehicle</h2>
			<div class="spacer"></div>
            <form id="vehicle_form" method="POST" action="<?php echo URL; ?>/admin/vehicles/updateVehicle">
                <?php
                    foreach($this->vehicleResult as $vehicle) {
						?>
						<input type="hidden" name="vehicleID" value="<?php echo $vehicle['vehicle_id']; ?>" />
						<table id="vehicleTable">
							<tr><td colspan="2"><b>Basic Search Fields</b></td></tr>
							<tr><td>Vehicle Registration:</td><td><input type="text" value="<?php echo $vehicle['vehicle_registration']; ?>" id="vehicleRegistration" name="vehicleRegistration"></td></tr>
							<tr><td>Vehicle Make:</td><td><input type="text" value="<?php echo $vehicle['vehicle_make']; ?>" id="vehicleMake" name="vehicleMake"></td></tr>
							<tr><td>Vehicle Model:</td><td><input type="text" value="<?php echo $vehicle['vehicle_model']; ?>" id="vehicleModel" name="vehicleModel"></td></tr>
							<tr><td>Vehicle Fuel:</td><td><input type="text" value="<?php echo $vehicle['vehicle_fuel']; ?>" id="vehicleFuel" name="vehicleFuel"></td></tr>
							<tr><td>Vehicle Transmission:</td><td><input type="text" value="<?php echo $vehicle['vehicle_transmission']; ?>" id="vehicleTransmission" name="vehicleTransmission"></td></tr>
							<tr><td>Vehicle Engine Size:</td><td><input type="text" value="<?php echo $vehicle['vehicle_engine_size']; ?>" id="vehicleEngineSize" name="vehicleEngineSize"></td></tr>
							<tr><td>Vehicle Doors:</td><td><input type="text" value="<?php echo $vehicle['vehicle_doors']; ?>" id="vehicleDoors" name="vehicleDoors"></td></tr>
							<tr><td>Vehicle Year:</td><td><input type="text" value="<?php echo $vehicle['vehicle_year']; ?>" id="vehicleYear" name="vehicleYear"></td></tr>
							<tr><td>Vehicle Mileage:</td><td><input type="text" value="<?php echo $vehicle['vehicle_mileage']; ?>" name="vehicleMileage"></td></tr>
					
							<tr><td colspan="2"><b>Additional Fields</b></td></tr>
							<tr><td>Body Style:</td><td><input type="text" value="<?php echo $vehicle['vehicle_body_style']; ?>" id="vehicleBodyStyle" name="vehicleBodyStyle"></td></tr>
							<tr><td>Variant:</td><td><input type="text" value="<?php echo $vehicle['vehicle_variant']; ?>" id="vehicleVariant" name="vehicleVariant"></td></tr>
							<tr><td>Seats:</td><td><input type="text" value="<?php echo $vehicle['vehicle_seats']; ?>" id="vehicleSeats" name="vehicleSeats"></td></tr>
							<tr><td>Colour:</td><td><input type="text" value="<?php echo $vehicle['vehicle_colour']; ?>" id="vehicleColour" name="vehicleColour"></td></tr>
							<tr><td>Gears:</td><td><input type="text" value="<?php echo $vehicle['vehicle_gears']; ?>" id="vehicleGears" name="vehicleGears"></td></tr>
							<tr><td>Previous Owners:</td><td><input type="text" value="<?php echo $vehicle['vehicle_owners']; ?>" id="vehicleOwners" name="vehicleOwners"></td></tr>
							<tr><td>Fuel Consumption (Urban):</td><td><input type="text" value="<?php echo $vehicle['vehicle_fuel_urban']; ?>" id="vehicleFuelUrban" name="vehicleFuelUrban"></td></tr>
							<tr><td>Fuel Consumption(Extra Urban):</td><td><input type="text" value="<?php echo $vehicle['vehicle_fuel_extra_urban']; ?>" id="vehicleFuelExtraUrban" name="vehicleFuelExtraUrban"></td></tr>
							<tr><td>Fuel Consumption (Combined):</td><td><input type="text" value="<?php echo $vehicle['vehicle_fuel_combined']; ?>" id="vehicleFuelCombined" name="vehicleFuelCombined"></td></tr>
							<tr><td>Fuel Tank:</td><td><input type="text" value="<?php echo $vehicle['vehicle_fuel_tank']; ?>" id="vehicleFuelTank" name="vehicleFuelTank"></td></tr>
							<tr><td>Road Tax Band:</td><td><input type="text" value="<?php echo $vehicle['vehicle_road_tax']; ?>" id="vehicleRoadTax" name="vehicleRoadTax"></td></tr>
							<tr><td>Road Tax (6 Months):</td><td><input type="text" value="<?php echo $vehicle['vehicle_road_tax_6']; ?>" id="vehicleRoadTax6" name="vehicleRoadTax6"></td></tr>
							<tr><td>Road Tax (12 Months):</td><td><input type="text" value="<?php echo $vehicle['vehicle_road_tax_12']; ?>" id="vehicleRoadTax12" name="vehicleRoadTax12"></td></tr>
							<tr><td>Vehicle Insurance Group:</td><td><input type="text" value="<?php echo $vehicle['vehicle_insurance_group']; ?>" id="vehicleInsuranceGroup" name="vehicleInsuranceGroup"></td></tr>
							<tr><td>Engine BHP:</td><td><input type="text" value="<?php echo $vehicle['vehicle_bhp']; ?>" id="vehicleBHP" name="vehicleBHP"></td></tr>
							<tr><td>Engine Torque:</td><td><input type="text" value="<?php echo $vehicle['vehicle_torque']; ?>" id="vehicleTorque" name="vehicleTorque"></td></tr>
							<tr><td>Engine Max Speed:</td><td><input type="text" value="<?php echo $vehicle['vehicle_max_speed']; ?>" id="vehicleMaxSpeed" name="vehicleMaxSpeed"></td></tr>

							<tr><td colspan="2"><b>Safety Features</b></td></tr>
							<tr><td id="vehicleSafety" colspan="2">
								<?php 
									foreach(json_decode(stripslashes($vehicle['vehicle_safety'])) as $key => $value) {
										//echo $key . " - " . $value . "<br />";
										if($value) {
											echo "<input type=\"checkbox\" name=\"vehicleSafety[]\" value=\"" . $key . "\" checked>  <span class=\"featureLabel\">" . $key . "</span>" . "<br />";
										} else {
											echo "<input type=\"checkbox\" name=\"vehicleSafety[]\" value=\"" . $key . "\">  <span class=\"featureLabel\">" . $key . "</span>" . "<br />";
										}
									}
								?>
							</td></tr>
							<tr><td colspan="2"><b>Interior Features</b></td></tr>
							<tr><td id="vehicleInterior" colspan="2">
								<?php 
									foreach(json_decode(stripslashes($vehicle['vehicle_interior'])) as $key => $value) {
										//echo $key . " - " . $value . "<br />";
										if($value) {
											echo "<input type=\"checkbox\" name=\"vehicleInterior[]\" value=\"" . $key . "\" checked>  <span class=\"featureLabel\">" . $key . "</span>" . "<br />";
										} else {
											echo "<input type=\"checkbox\" name=\"vehicleInterior[]\" value=\"" . $key . "\">  <span class=\"featureLabel\">" . $key . "</span>" . "<br />";
										}
									}
								?>
							</td></tr>
							<tr><td colspan="2"><b>Exterior Features</b></td></tr>
							<tr><td id="vehicleExterior" colspan="2">
								<?php 
									foreach(json_decode(stripslashes($vehicle['vehicle_exterior'])) as $key => $value) {
										//echo $key . " - " . $value . "<br />";
										if($value) {
											echo "<input type=\"checkbox\" name=\"vehicleExterior[]\" value=\"" . $key . "\" checked>  <span class=\"featureLabel\">" . $key . "</span>" . "<br />";
										} else {
											echo "<input type=\"checkbox\" name=\"vehicleExterior[]\" value=\"" . $key . "\">  <span class=\"featureLabel\">" . $key . "</span>" . "<br />";
										}
									}
								?>
							</td></tr>
							<tr><td colspan="2"><b>Comfort Features</b></td></tr>
							<tr><td id="vehicleComfort" colspan="2">
								<?php 
									foreach(json_decode(stripslashes($vehicle['vehicle_comfort'])) as $key => $value) {
										//echo $key . " - " . $value . "<br />";
										if($value) {
											echo "<input type=\"checkbox\" name=\"vehicleComfort[]\" value=\"" . $key . "\" checked>  <span class=\"featureLabel\">" . $key . "</span>" . "<br />";
										} else {
											echo "<input type=\"checkbox\" name=\"vehicleComfort[]\" value=\"" . $key . "\">  <span class=\"featureLabel\">" . $key . "</span>" . "<br />";
										}
									}
								?>
							</td></tr>
							<tr><td colspan="2"><b>Other Features</b></td></tr>
							<tr><td id="vehicleOther" colspan="2">
								<?php 
									foreach(json_decode(stripslashes($vehicle['vehicle_other'])) as $key => $value) {
										//echo $key . " - " . $value . "<br />";
										if($value) {
											echo "<input type=\"checkbox\" name=\"vehicleOther[]\" value=\"" . $key . "\" checked>  <span class=\"featureLabel\">" . $key . "</span>" . "<br />";
										} else {
											echo "<input type=\"checkbox\" name=\"vehicleOther[]\" value=\"" . $key . "\">  <span class=\"featureLabel\">" . $key . "</span>" . "<br />";
										}
									}
								?>
							</td></tr>
							
							
							<tr><td colspan="2"><b>Extra Features</b></td></tr>
							<tr><td colspan="2"><textarea rows="10" cols="30" style="height: 200px; width: 100%; border: 1px solid #c0c0c0;" value="
								<?php 
									foreach(json_decode($vehicle['vehicle_extras']) as $item) {
										echo $item . "<br />";
									}
								?>
							
							" name="vehicleExtras"></textarea></td></tr>
						</table>
				
				<center>
				<input class="button" type="submit" value="Update Vehicle Details">
				</center>

            </form>
			
			<h3>Vehicle Images</h3>

            <form id="vehicleImageForm" method="POST" action="<?php echo URL; ?>/admin/vehicles/updateVehicleImages">
			<?php 
			echo "<input type=\"hidden\" name=\"vehicleID\" value=\"" . $vehicle['vehicle_id'] . "\" />";
			echo "<input type=\"hidden\" name=\"vehicleRegistration\" value=\"" . $vehicle['vehicle_registration'] . "\" />";
            echo "<table id=\"vehicleImageTable\">";
            echo "<tr><th>Image</th><th>Priority</th><th>Cover Image</th><th>Action</th></tr>";
            foreach($this->vehicleImages as $image) {
				$imageSalt = base64_encode($image['vehicle_make'] . "/" . $image['vehicle_model'] . "/" . $image['vehicle_registration'] . "/" . $image['vehicle_image_url']);
				echo "<tr class=\"vehicleImage\">";
				echo "<input type=\"hidden\" name=\"imageID[]\" value=\"" . $image['vehicle_image_id'] . "\">";
                echo "<td><img class=\"vehicleImages\" src=\"" . URL . "/media/media.jpg?id=" . $imageSalt ."\" style=\"width: 300px; margin: 0px auto;\" /></td>";
                echo "<td style=\"width: 100px;\"><input name=\"imagePriority[]\" type=\"text\" value=\"" . $image['vehicle_image_priority'] . "\" /></td>";
				if($image['vehicle_cover_image'] == 1) {
					echo "<td><input type=\"checkbox\" class=\"radio\" value=\""  . $imageSalt . "\" checked name=\"coverImage[]\" /></td>";
				} else {
					echo "<td><input type=\"checkbox\" class=\"radio\" value=\""  . $imageSalt . "\" name=\"coverImage[]\" /></td>";
				}
				echo "<td><a class=\"removeVehicleImage\" href=\"" . URL . "/admin/vehicles/removeVehicleImage/" . $imageSalt . "\">Remove Image</a></td>";
				echo "</tr>";
            }
            echo "</table>";
			?>
			
			<center>
				<input class="button" style="padding: 20px;" type="submit" value="Update Vehicle Images">
			</center>
			</form>
		<?php } ?>

			<div class="spacer"></div>
			<h3>Upload Images</h3>
   
			<form id="vehicleImageUploadForm" method="POST" action="<?php echo URL; ?>/admin/vehicles/addVehicleImage/<?php echo $vehicle['vehicle_registration']; ?>" enctype="multipart/form-data">
			<table id="vehicleImageTable">
					<tr><th>Image Number</th><th>Filename</th><th>Image</th><th>Cover Image</th></tr>
					<tr><td>Vehicle Image #1:</td><td><input id="image1" type="file" value="" name="vehicleImages[]" onchange="readImage(this);"></td><td><img id="image1_preview" src="#" alt="" /></td><td><input type="checkbox" class="radio" value="0" name="coverImage[]" /></td></tr>
					<tr><td>Vehicle Image #2:</td><td><input id="image2" type="file" value="" name="vehicleImages[]" onchange="readImage(this);"></td><td><img id="image2_preview" src="#" alt="" /></td><td><input type="checkbox" class="radio" value="1" name="coverImage[]" /></td></tr>
					<tr><td>Vehicle Image #3:</td><td><input id="image3" type="file" value="" name="vehicleImages[]" onchange="readImage(this);"></td><td><img id="image3_preview" src="#" alt="" /></td><td><input type="checkbox" class="radio" value="2" name="coverImage[]" /></td></tr>
					<tr><td>Vehicle Image #4:</td><td><input id="image4" type="file" value="" name="vehicleImages[]" onchange="readImage(this);"></td><td><img id="image4_preview" src="#" alt="" /></td><td><input type="checkbox" class="radio" value="3" name="coverImage[]" /></td></tr>
					<tr><td>Vehicle Image #5:</td><td><input id="image5" type="file" value="" name="vehicleImages[]" onchange="readImage(this);"></td><td><img id="image5_preview" src="#" alt="" /></td><td><input type="checkbox" class="radio" value="4" name="coverImage[]" /></td></tr>
					<tr><td>Vehicle Image #6:</td><td><input id="image6" type="file" value="" name="vehicleImages[]" onchange="readImage(this);"></td><td><img id="image6_preview" src="#" alt="" /></td><td><input type="checkbox" class="radio" value="5" name="coverImage[]" /></td></tr>
					<tr><td>Vehicle Image #7:</td><td><input id="image7" type="file" value="" name="vehicleImages[]" onchange="readImage(this);"></td><td><img id="image7_preview" src="#" alt="" /></td><td><input type="checkbox" class="radio" value="6" name="coverImage[]" /></td></tr>
					<tr><td>Vehicle Image #8:</td><td><input id="image8" type="file" value="" name="vehicleImages[]" onchange="readImage(this);"></td><td><img id="image8_preview" src="#" alt="" /></td><td><input type="checkbox" class="radio" value="7" name="coverImage[]" /></td></tr>
					<tr><td>Vehicle Image #9:</td><td><input id="image9" type="file" value="" name="vehicleImages[]" onchange="readImage(this);"></td><td><img id="image9_preview" src="#" alt="" /></td><td><input type="checkbox" class="radio" value="8" name="coverImage[]" /></td></tr>
					<tr><td>Vehicle Image #10:</td><td><input id="image10" type="file" value="" name="vehicleImages[]" onchange="readImage(this);"></td><td><img id="image10_preview" src="#" alt="" /></td><td><input type="checkbox" class="radio" value="9" name="coverImage[]" /></td></tr>

				</table>
				
				
				<center>
				<input class="button" type="submit" value="Upload New Images">
				</center>


		<div style="clear: both"></div>
		</div>
	</div>

	<script>
	function readImage(input) {
		let inputID = input.id;
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#' + inputID + '_preview')
					.attr('src', e.target.result)
					.width(300)
					.height(200);
			};

			reader.readAsDataURL(input.files[0]);
		}
	}
	
	$(document).ready(function() {

		$("#vehicle_form").submit(function( event ) {
			event.preventDefault();

			var $vehicleSafety = {};
			$("#vehicleSafety input:checkbox").each(function(){
				$vehicleSafety[this.value] = this.checked;
			});

			var $vehicleInterior = {};
			$("#vehicleInterior input:checkbox").each(function(){
				$vehicleInterior[this.value] = this.checked;
			});

			var $vehicleExterior = {};
			$("#vehicleExterior input:checkbox").each(function(){
				$vehicleExterior[this.value] = this.checked;
			});

			var $vehicleComfort = {};
			$("#vehicleComfort input:checkbox").each(function(){
				$vehicleComfort[this.value] = this.checked;
			});

			var $vehicleOther = {};
			$("#vehicleOther input:checkbox").each(function(){
				$vehicleOther[this.value] = this.checked;
			});

			$formData = new FormData(this);

			$formData.set('vehicleSafety', JSON.stringify($vehicleSafety));
			$formData.set('vehicleInterior', JSON.stringify($vehicleInterior));
			$formData.set('vehicleExterior', JSON.stringify($vehicleExterior));
			$formData.set('vehicleComfort', JSON.stringify($vehicleComfort));
			$formData.set('vehicleOther', JSON.stringify($vehicleOther));

			$.ajax({
				url: "/admin/vehicles/updateVehicle", // Url to which the request is send
				type: "POST",             // Type of request to be send, called as method
				data: $formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
				contentType: false,       // The content type used when sending data to the server.
				cache: false,             // To unable request pages to be cached
				processData:false,        // To send DOMDocument or non processed data file it is set to false
				success: function(data)   // A function to be called if request succeeds
				{
					if (data.indexOf("success") >= 0) {
						alert("Vehicle updated successfully");
					} else {
						alert(data);
					}
					
				}
			});


			//$('#vehicle_form').submit();

			console.log($vehicleSafety)

		});

		$("#vehicleImageTable input:checkbox").on('click', function() {
			// in the handler, 'this' refers to the box clicked on
			var $box = $(this);
			if ($box.is(":checked")) {
				// the name of the box is retrieved using the .attr() method
				// as it is assumed and expected to be immutable
				var group = "input:checkbox[name='" + $box.attr("name") + "']";
				// the checked state of the group/box on the other hand will change
				// and the current value is retrieved using .prop() method
				$(group).prop("checked", false);
				$box.prop("checked", true);
			} else {
				$box.prop("checked", false);
			}
		});




		$("#vehicleImageTable").on('click', '.removeVehicleImage', function(e) {
			e.preventDefault();
			//alert($(this).attr("href"));
			let currentElement = $(this);
			if (confirm('Do you wish to delete this image?')) {
				$.ajax({
					url: this.href,
					type: 'POST',
					data: { deleteConfirm: 1 } ,
					success: function (response) {
						if(response) {
							currentElement.closest("tr").remove();
						};
					},
					error: function () {
						alert("error");
					}
				}); 
			} 

		});
	});
</script>