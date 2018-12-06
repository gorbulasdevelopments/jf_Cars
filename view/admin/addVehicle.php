
<style type="text/css">

	#vehicle_form {
		margin: 0px auto;
		width: 806px;
		margin-bottom: 30px;
	}

    #vehicleTable, #vehicleImageTable {
        border: 1px solid #c0c0c0;
        font-size: 12px;		
		width: 100%;
		margin-bottom: 30px;
		border-collapse:collapse;
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

	/*#vehicleImageTable {
        border: 1px solid #c0c0c0;
		width: 100%;
        font-size: 10px;
		margin-top: 40px;
		margin-bottom: 40px;
		float: left;
		border-spacing: 0px;
    	border-collapse: collapse;
    }*/
	
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

}
</style>

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
				url: "/admin/vehicles/addVehicle", // Url to which the request is send
				type: "POST",             // Type of request to be send, called as method
				data: $formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
				contentType: false,       // The content type used when sending data to the server.
				cache: false,             // To unable request pages to be cached
				processData:false,        // To send DOMDocument or non processed data file it is set to false
				success: function(data)   // A function to be called if request succeeds
				{
					alert("Success");
				}
			});
		});




	$("input:checkbox").on('click', function() {
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

		$("#vehicle_search_form").submit(function( event ) {
			event.preventDefault();

			if(!confirm("Are you sure?")) {
				return false;
			};

			$('#vehicleSafety').empty()
			$('#vehicleInterior').empty()
			$('#vehicleExterior').empty()
			$('#vehicleComfort').empty()
			$('#vehicleOther').empty()
			
			//alert($("#vehicleSearchRegistration :selected").text());

			var $vehicleData = $.post('http://www.jfcars.co.uk/admin/vehicles/getVehicleDataResult', {'vehicleRegistration' : $("#vehicleSearchRegistration").val()}, function(vehicleDataResponse) {
				//console.log(vehicleDataResponse);

				var obj = vehicleDataResponse;

				$('#vehicleRegistration').val(obj.Response.DataItems.VehicleRegistration.Vrm);
				$('#vehicleMake').val(obj.Response.DataItems.SmmtDetails.Marque);
				$('#vehicleModel').val(obj.Response.DataItems.SmmtDetails.Range);
				$('#vehicleFuel').val(obj.Response.DataItems.SmmtDetails.FuelType);
				$('#vehicleTransmission').val(obj.Response.DataItems.SmmtDetails.Transmission);
				$('#vehicleEngineSize').val(obj.Response.DataItems.SmmtDetails.EngineCapacity);
				$('#vehicleDoors').val(obj.Response.DataItems.SmmtDetails.NumberOfDoors);
				$('#vehicleYear').val(obj.Response.DataItems.VehicleRegistration.YearOfManufacture);
				$('#vehicleMileage').val("0");


				$('#vehicleBodyStyle').val(obj.Response.DataItems.SmmtDetails.BodyStyle);
				$('#vehicleVariant').val(obj.Response.DataItems.SmmtDetails.ModelVariant);
				$('#vehicleSeats').val(obj.Response.DataItems.VehicleRegistration.SeatingCapacity);
				$('#vehicleColour').val(obj.Response.DataItems.VehicleRegistration.Colour);
				$('#vehicleGears').val(obj.Response.DataItems.SmmtDetails.NumberOfGears);
				$('#vehicleOwners').val(obj.Response.DataItems.VehicleHistory.NumberOfPreviousKeepers);
				$('#vehicleFuelUrban').val(obj.Response.DataItems.TechnicalDetails.Consumption.UrbanCold.Mpg);
				$('#vehicleFuelExtraUrban').val(obj.Response.DataItems.TechnicalDetails.Consumption.ExtraUrban.Mpg);
				$('#vehicleFuelCombined').val(obj.Response.DataItems.TechnicalDetails.Consumption.Combined.Mpg);
				$('#vehicleFuelTank').val(obj.Response.DataItems.TechnicalDetails.Dimensions.FuelTankCapacity);
				$('#vehicleRoadTax').val(obj.Response.DataItems.VehicleStatus.MotVed.VedCo2Band);
				$('#vehicleRoadTax6').val(obj.Response.DataItems.VehicleStatus.MotVed.VedRate.Standard.SixMonth);
				$('#vehicleRoadTax12').val(obj.Response.DataItems.VehicleStatus.MotVed.VedRate.Standard.TwelveMonth);
				$('#vehicleInsuranceGroup').val("0");
				$('#vehicleBHP').val(obj.Response.DataItems.TechnicalDetails.Performance.Power.Bhp);
				$('#vehicleTorque').val(obj.Response.DataItems.TechnicalDetails.Performance.Torque.FtLb);
				$('#vehicleMaxSpeed').val(obj.Response.DataItems.TechnicalDetails.Performance.MaxSpeed.Mph);

			}, 'json');


			$vehicleData.done(function( result ) {
			});

			$vehicleData.fail(function( xhr, status, error ) {
				alert(xhr + " : " + status + " : " + error);
			});

			$vehicleData.always(function( result ) {
				//alert("Finished");
			});

			var $vehicleSpecAndOptions = $.post('http://www.jfcars.co.uk/admin/vehicles/getVehicleSpecAndOptions', {'vehicleRegistration' : $("#vehicleSearchRegistration").val()}, function(response) {
				//console.log(response);

				var obj = response;

				$.each(obj.Response.DataItems.FactoryEquipmentList, function( key, value ) {
					//console.log(value);
					//console.log(value.Fitment + " - " + value.Name + " - " + value.Description + " - " + value.Category );
					//if((value.Description !== null ) && (value.Description.toLowerCase() !== "null")) {
						if(value.Category == "Safety and Security") {
							if(value.Fitment == "Option") {	
								if((value.Description !== null ) && (value.Description.toLowerCase() !== "null")) {
									$('#vehicleSafety').append("<input type=\"checkbox\" name=\"vehicleSafety[]\" value=\"" + value.Description + "\">  <span class=\"featureLabel\">" + value.Description + "</span>");
								} else {
									$('#vehicleSafety').append("<input type=\"checkbox\" name=\"vehicleSafety[]\" value=\"" + value.Name + "\">  <span class=\"featureLabel\">" + value.Name + "</span>");
								}
							} else {
								if((value.Description !== null ) && (value.Description.toLowerCase() !== "null")) {
									$('#vehicleSafety').append("<input type=\"checkbox\" name=\"vehicleSafety[]\" value=\"" + value.Description + "\" checked>  <span class=\"featureLabel\">" + value.Description + "</span>");
								} else {
									$('#vehicleSafety').append("<input type=\"checkbox\" name=\"vehicleSafety[]\" value=\"" + value.Name + "\" checked>  <span class=\"featureLabel\">" + value.Name + "</span>");
								}
							}
						};
						if(value.Category == "Interior") {
							if(value.Fitment == "Option") {	
								if((value.Description !== null ) && (value.Description.toLowerCase() !== "null")) {
									$('#vehicleInterior').append("<input type=\"checkbox\" name=\"vehicleInterior[]\" value=\"" + value.Description + "\">  <span class=\"featureLabel\">" + value.Description + "</span>");
								} else {
									$('#vehicleInterior').append("<input type=\"checkbox\" name=\"vehicleInterior[]\" value=\"" + value.Name + "\">  <span class=\"featureLabel\">" + value.Name + "</span>");
								}
							} else {
								if((value.Description !== null ) && (value.Description.toLowerCase() !== "null")) {
									$('#vehicleInterior').append("<input type=\"checkbox\" name=\"vehicleInterior[]\" value=\"" + value.Description + "\" checked>  <span class=\"featureLabel\">" + value.Description + "</span>");
								} else {
									$('#vehicleInterior').append("<input type=\"checkbox\" name=\"vehicleInterior[]\" value=\"" + value.Name + "\" checked>  <span class=\"featureLabel\">" + value.Name + "</span>");
								}
							}
						};
						if(value.Category == "Exterior") {
							if(value.Fitment == "Option") {	
								if((value.Description !== null ) && (value.Description.toLowerCase() !== "null")) {
									$('#vehicleExterior').append("<input type=\"checkbox\" name=\"vehicleExterior[]\" value=\"" + value.Description + "\">  <span class=\"featureLabel\">" + value.Description + "</span>");
								} else {
									$('#vehicleExterior').append("<input type=\"checkbox\" name=\"vehicleExterior[]\" value=\"" + value.Name + "\">  <span class=\"featureLabel\">" + value.Name + "</span>");
								}
							} else {
								if((value.Description !== null ) && (value.Description.toLowerCase() !== "null")) {
									$('#vehicleExterior').append("<input type=\"checkbox\" name=\"vehicleExterior[]\" value=\"" + value.Description + "\" checked>  <span class=\"featureLabel\">" + value.Description + "</span>");
								} else {
									$('#vehicleExterior').append("<input type=\"checkbox\" name=\"vehicleExterior[]\" value=\"" + value.Name + "\" checked>  <span class=\"featureLabel\">" + value.Name + "</span>");
								}
							}
						};
						if(value.Category == "Comfort") {
							if(value.Fitment == "Option") {	
								if((value.Description !== null ) && (value.Description.toLowerCase() !== "null")) {
									$('#vehicleComfort').append("<input type=\"checkbox\" name=\"vehicleComfort[]\" value=\"" + value.Description + "\">  <span class=\"featureLabel\">" + value.Description + "</span>");
								} else {
									$('#vehicleComfort').append("<input type=\"checkbox\" name=\"vehicleComfort[]\" value=\"" + value.Name + "\">  <span class=\"featureLabel\">" + value.Name + "</span>");
								}
							} else {
								if((value.Description !== null ) && (value.Description.toLowerCase() !== "null")) {
									$('#vehicleComfort').append("<input type=\"checkbox\" name=\"vehicleComfort[]\" value=\"" + value.Description + "\" checked>  <span class=\"featureLabel\">" + value.Description + "</span>");
								} else {
									$('#vehicleComfort').append("<input type=\"checkbox\" name=\"vehicleComfort[]\" value=\"" + value.Name + "\" checked>  <span class=\"featureLabel\">" + value.Name + "</span>");
								}
							}
						};
						if(value.Category == "Other") {
							if(value.Fitment == "Option") {	
								if((value.Description !== null ) && (value.Description.toLowerCase() !== "null")) {
									$('#vehicleOther').append("<input type=\"checkbox\" name=\"vehicleOther[]\" value=\"" + value.Description + "\">  <span class=\"featureLabel\">" + value.Description + "</span>");
								} else {
									$('#vehicleOther').append("<input type=\"checkbox\" name=\"vehicleOther[]\" value=\"" + value.Name + "\">  <span class=\"featureLabel\">" + value.Name + "</span>");
								}
							} else {
								if((value.Description !== null ) && (value.Description.toLowerCase() !== "null")) {
									$('#vehicleOther').append("<input type=\"checkbox\" name=\"vehicleOther[]\" value=\"" + value.Description + "\" checked>  <span class=\"featureLabel\">" + value.Description + "</span>");
								} else {
									$('#vehicleOther').append("<input type=\"checkbox\" name=\"vehicleOther[]\" value=\"" + value.Name + "\"checked>  <span class=\"featureLabel\">" + value.Name + "</span>");
								}
							}
						};
				//	}
					
				});

			}, 'json');


			$vehicleSpecAndOptions.done(function( result ) {
			});

			$vehicleSpecAndOptions.fail(function( xhr, status, error ) {
				alert(xhr + " : " + status + " : " + error);
			});

			$vehicleSpecAndOptions.always(function( result ) {
				//alert("Finished");
			});

			/*var $vehicleMOTHistory = $.post('http://www.jfcars.co.uk/admin/vehicles/getVehicleMOTHistory', {'vehicleRegistration' : $("#vehicleSearchRegistration").val()}, function(response) {
				//console.log(response);

				var obj = response;

			}, 'json');


			$vehicleMOTHistory.done(function( result ) {
			});

			$vehicleMOTHistory.fail(function( xhr, status, error ) {
				alert(xhr + " : " + status + " : " + error);
			});

			$vehicleMOTHistory.always(function( result ) {
				//alert("Finished");
			});
*/



		});
	});
</script>

	<div id="content_container">

        <div id="content">
			<h2>Add Vehicle</h2>
			<div class="spacer"></div>
			<form id="vehicle_search_form" method="post" action="">
				<select id="vehicleSearchRegistration" name="vehicleSearchRegistration">
					<option selected value="any">Select Registration</option>";
					<option value="KM14AKK">KM14AKK</option>";
					<option value="WV62EAA">WV62EAA</option>";
					<option value="RF65YAD">RF65YAD</option>";
					<option value="EA60PKD">EA60PKD</option>";
					<option value="DS57NAO">DS57NAO</option>";
					<option value="AF60TWG">AF60TWG</option>";
				</select>
				<input type="submit" value="submit" />
			</form>

			<div id="vehicleDataResponse"></div>

			<div class="spacer"></div>
            <form id="vehicle_form" method="POST" action="<?php echo URL; ?>/admin/vehicles/addVehicle" enctype="multipart/form-data">
			
				<table id="vehicleTable">
					<tr><td colspan="2"><b>Basic Search Fields</b></td></tr>
					<tr><td>Vehicle Registration:</td><td><input type="text" value="" id="vehicleRegistration" name="vehicleRegistration"></td></tr>
					<tr><td>Vehicle Make:</td><td><input type="text" value="" id="vehicleMake" name="vehicleMake"></td></tr>
					<tr><td>Vehicle Model:</td><td><input type="text" value="" id="vehicleModel" name="vehicleModel"></td></tr>
					<tr><td>Vehicle Fuel:</td><td><input type="text" value="" id="vehicleFuel" name="vehicleFuel"></td></tr>
					<tr><td>Vehicle Transmission:</td><td><input type="text" value="" id="vehicleTransmission" name="vehicleTransmission"></td></tr>
					<tr><td>Vehicle Engine Size:</td><td><input type="text" value="" id="vehicleEngineSize" name="vehicleEngineSize"></td></tr>
					<tr><td>Vehicle Doors:</td><td><input type="text" value="" id="vehicleDoors" name="vehicleDoors"></td></tr>
					<tr><td>Vehicle Year:</td><td><input type="text" value="" id="vehicleYear" name="vehicleYear"></td></tr>
					<tr><td>Vehicle Mileage:</td><td><input type="text" value="" id="vehicleMileage" name="vehicleMileage"></td></tr>
			
					<tr><td colspan="2"><b>Additional Fields</b></td></tr>
					<tr><td>Body Style:</td><td><input type="text" value="" id="vehicleBodyStyle" name="vehicleBodyStyle"></td></tr>
					<tr><td>Variant:</td><td><input type="text" value="" id="vehicleVariant" name="vehicleVariant"></td></tr>
					<tr><td>Seats:</td><td><input type="text" value="" id="vehicleSeats" name="vehicleSeats"></td></tr>
					<tr><td>Colour:</td><td><input type="text" value="" id="vehicleColour" name="vehicleColour"></td></tr>
					<tr><td>Gears:</td><td><input type="text" value="" id="vehicleGears" name="vehicleGears"></td></tr>
					<tr><td>Previous Owners:</td><td><input type="text" value="" id="vehicleOwners" name="vehicleOwners"></td></tr>
					<tr><td>Fuel Consumption (Urban):</td><td><input type="text" value="" id="vehicleFuelUrban" name="vehicleFuelUrban"></td></tr>
					<tr><td>Fuel Consumption(Extra Urban):</td><td><input type="text" value="" id="vehicleFuelExtraUrban" name="vehicleFuelExtraUrban"></td></tr>
					<tr><td>Fuel Consumption (Combined):</td><td><input type="text" value="" id="vehicleFuelCombined" name="vehicleFuelCombined"></td></tr>
					<tr><td>Fuel Tank:</td><td><input type="text" value="" id="vehicleFuelTank" name="vehicleFuelTank"></td></tr>
					<tr><td>Road Tax Band:</td><td><input type="text" value="" id="vehicleRoadTax" name="vehicleRoadTax"></td></tr>
					<tr><td>Road Tax (6 Months):</td><td><input type="text" value="" id="vehicleRoadTax6" name="vehicleRoadTax6"></td></tr>
					<tr><td>Road Tax (12 Months):</td><td><input type="text" value="" id="vehicleRoadTax12" name="vehicleRoadTax12"></td></tr>
					<tr><td>Vehicle Insurance Group:</td><td><input type="text" value="" id="vehicleInsuranceGroup" name="vehicleInsuranceGroup"></td></tr>
					<tr><td>Engine BHP:</td><td><input type="text" value="" id="vehicleBHP" name="vehicleBHP"></td></tr>
					<tr><td>Engine Torque:</td><td><input type="text" value="" id="vehicleTorque" name="vehicleTorque"></td></tr>
					<tr><td>Engine Max Speed:</td><td><input type="text" value="" id="vehicleMaxSpeed" name="vehicleMaxSpeed"></td></tr>

					<tr><td colspan="2"><b>Safety Features</b></td></tr>
					<tr><td id="vehicleSafety" colspan="2"></td></tr>
					<tr><td colspan="2"><b>Interior Features</b></td></tr>
					<tr><td id="vehicleInterior" colspan="2"></td></tr>
					<tr><td colspan="2"><b>Exterior Features</b></td></tr>
					<tr><td id="vehicleExterior" colspan="2"></td></tr>
					<tr><td colspan="2"><b>Comfort Features</b></td></tr>
					<tr><td id="vehicleComfort" colspan="2"></td></tr>
					<tr><td colspan="2"><b>Other Features</b></td></tr>
					<tr><td id="vehicleOther" colspan="2"></td></tr>
					
					
					<tr><td colspan="2"><b>Extra Features</b></td></tr>
					<tr><td colspan="2"><textarea rows="10" cols="30" style="height: 200px; width: 100%; border: 1px solid #c0c0c0;" value="" name="vehicleExtras"></textarea></td></tr>
				</table>
				
				<div style="clear: both"></div>
				
				<table id="vehicleImageTable">
					<tr><th style="width: 120px">Image Number</th><th style="width: 265px">Filename</th><th style="width: 325px">Image</th><th style="width: 90px">Cover Image</th></tr>
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
					<tr><td>Vehicle Image #11:</td><td><input id="image11" type="file" value="" name="vehicleImages[]" onchange="readImage(this);"></td><td><img id="image11_preview" src="#" alt="" /></td><td><input type="checkbox" class="radio" value="10" name="coverImage[]" /></td></tr>
					<tr><td>Vehicle Image #12:</td><td><input id="image12" type="file" value="" name="vehicleImages[]" onchange="readImage(this);"></td><td><img id="image12_preview" src="#" alt="" /></td><td><input type="checkbox" class="radio" value="11" name="coverImage[]" /></td></tr>

				</table>
				
				<center>
				<input style="padding: 20px;" type="submit">
				</center>

            </form>

		<div style="clear: both"></div>
		</div>
	</div>