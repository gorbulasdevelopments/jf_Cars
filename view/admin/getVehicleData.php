
<style type="text/css">

	#vehicle_form {
		margin: 0px auto;
		width: 806px;
		margin-bottom: 30px;
	}

    #vehicleTable {
        border: 1px solid #c0c0c0;
        font-size: 12px;
        margin: 0px auto;
		margin-left: 20px;
		margin-right: 20px;
		
		width: 600px;
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
		height: 20px;
		line-height: 15px;
		display: block;
		float: left;
		width: 90%;
		padding-left: 10px;
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

    #vehicleImageTable td {
		padding: 5px;
		border-bottom: 1px solid #c0c0c0;
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

			$('#vehicleSafety').empty()
			$('#vehicleInterior').empty()
			$('#vehicleExterior').empty()
			$('#vehicleComfort').empty()
			$('#vehicleOther').empty()
			
			//alert($("#vehicleSearchRegistration :selected").text());

			var $vehicleData = $.post('http://zion/admin/vehicles/getVehicleDataResult', {'vehicleRegistration' : $("#vehicleSearchRegistration").val()}, function(vehicleDataResponse) {
				console.log(vehicleDataResponse);

				var obj = vehicleDataResponse;

				$('#vehicleRegistration').val(obj.Response.DataItems.VehicleRegistration.Vrm);
				$('#vehicleMake').val(obj.Response.DataItems.SmmtDetails.Marque);
				$('#vehicleModel').val(obj.Response.DataItems.SmmtDetails.Range);
				$('#vehicleFuel').val(obj.Response.DataItems.SmmtDetails.FuelType);
				$('#vehicleTransmission').val(obj.Response.DataItems.SmmtDetails.Transmission);
				$('#vehicleEngineSize').val(obj.Response.DataItems.SmmtDetails.EngineCapacity);
				$('#vehicleDoors').val(obj.Response.DataItems.SmmtDetails.NumberOfDoors);
				$('#vehicleYear').val(obj.Response.DataItems.VehicleRegistration.YearOfManufacture);


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
				$('#vehicleInsuranceGroup').val("TBC");
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

			var $vehicleSpecAndOptions = $.post('http://zion/admin/vehicles/getVehicleSpecAndOptions', {'vehicleRegistration' : $("#vehicleSearchRegistration").val()}, function(response) {
				console.log(response);

				var obj = response;

				$.each(obj.Response.DataItems.FactoryEquipmentList, function( key, value ) {
					//console.log(value);
					if(value.Fitment == "Option") {
						console.log(value.Name + " - " + value.Description + " - " + value.Category );
						if((value.Description !== null ) && (value.Description.toLowerCase() !== "null")) {
							if(value.Category == "Safety and Security") {
								$('#vehicleSafety').append("<input type=\"checkbox\" name=\"vehicleSafety[]\" value=\"" + value.Description + "\">  <span class=\"featureLabel\">" + value.Description + "</span>");
							};
							if(value.Category == "Interior") {
								$('#vehicleInterior').append("<input type=\"checkbox\" name=\"vehicleInterior[]\" value=\"" + value.Description + "\">  <span class=\"featureLabel\">" + value.Description + "</span>");
							};
							if(value.Category == "Exterior") {
								$('#vehicleExterior').append("<input type=\"checkbox\" name=\"vehicleExterior[]\" value=\"" + value.Description + "\">  <span class=\"featureLabel\">" + value.Description + "</span>");
							};
							if(value.Category == "Comfort") {
								$('#vehicleComfort').append("<input type=\"checkbox\" name=\"vehicleComfort[]\" value=\"" + value.Description + "\">  <span class=\"featureLabel\">" + value.Description + "</span>");
							};
							if(value.Category == "Other") {
								$('#vehicleOther').append("<input type=\"checkbox\" name=\"vehicleOther[]\" value=\"" + value.Description + "\">  <span class=\"featureLabel\">" + value.Description + "</span>");
							};
						}
					}
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

			var $vehicleMOTHistory = $.post('http://zion/admin/vehicles/getVehicleMOTHistory', {'vehicleRegistration' : $("#vehicleSearchRegistration").val()}, function(response) {
				console.log(response);

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
					<tr><td>Vehicle Mileage:</td><td><input type="text" value="" name="vehicleMileage"></td></tr>
			
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
					
					
					<tr><td>Vehicle Extras:</td><td><textarea rows="10" cols="30" style="height: 200px; width: 250px; border: 1px solid #c0c0c0;" value="" name="vehicleExtras"></textarea></td></tr>
				</table>

				<div id="vehicleExtras"></div>
				
				<div style="clear: both"></div>
				
				<table id="vehicleImageTable">
					<tr><th style="width: 120px">Image Number</th><th style="width: 265px">Filename</th><th style="width: 325px">Image</th><th style="width: 90px">Cover Image</th></tr>
					<tr><td>Vehicle Image #1:</td><td><input id="image1" type="file" value="" name="vehicleImages[]" onchange="readImage(this);"></td><td><img id="image1_preview" src="#" alt="" /></td><td><input type="checkbox" class="radio" value="0" name="coverImage[]" /></td></tr>
					<tr><td>Vehicle Image #2:</td><td><input id="image2" type="file" value="" name="vehicleImages[]" onchange="readImage(this);"></td><td><img id="image2_preview" src="#" alt="" /></td><td><input type="checkbox" class="radio" value="1" name="coverImage[]" /></td></tr>
					<tr><td>Vehicle Image #3:</td><td><input id="image3" type="file" value="" name="vehicleImages[]" onchange="readImage(this);"></td><td><img id="image3_preview" src="#" alt="" /></td><td><input type="checkbox" class="radio" value="2" name="coverImage[]" /></td></tr>
					<tr><td>Vehicle Image #4:</td><td><input id="image4" type="file" value="" name="vehicleImages[]" onchange="readImage(this);"></td><td><img id="image4_preview" src="#" alt="" /></td><td><input type="checkbox" class="radio" value="3" name="coverImage[]" /></td></tr>
					<tr><td>Vehicle Image #5:</td><td><input id="image5" type="file" value="" name="vehicleImages[]" onchange="readImage(this);"></td><td><img id="image5_preview" src="#" alt="" /></td><td><input type="checkbox" class="radio" value="4" name="coverImage[]" /></td></tr>

				</table>
				
				<center>
				<input style="padding: 20px;" type="submit">
				</center>

            </form>

		<div style="clear: both"></div>
		</div>
	</div>