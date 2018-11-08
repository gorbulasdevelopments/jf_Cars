
<style type="text/css">

	#vehicle_form {
		margin: 0px auto;
		width: 806px;
		margin-bottom: 30px;
	}

    #vehicleTable {
        border: 1px solid #c0c0c0;
        font-size: 10px;
        margin: 0px auto;
		margin-left: 20px;
		margin-right: 20px;
		float: left;
    }
	
    #vehicleTable tr {

    }

    #vehicleTable th {
		padding: 5px;
    }

    #vehicleTable td {
        padding: 5px;
    }
	
	#vehicleTable input {
        padding: 5px;
        text-align: center;
        border: 1px solid #c0c0c0;
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
	});
</script>

	<div id="content_container">

        <div id="content">
			<h2>Add Vehicle</h2>
			<div class="spacer"></div>
            <form id="vehicle_form" method="POST" action="<?php echo URL; ?>/admin/vehicles/addVehicle" enctype="multipart/form-data">
			
				<table id="vehicleTable">
					<tr><td>Vehicle Registration:</td><td><input type="text" value="" name="vehicleRegistration"></td></tr>
					<tr><td>Vehicle Make:</td><td><input type="text" value="" name="vehicleMake"></td></tr>
					<tr><td>Vehicle Model:</td><td><input type="text" value="" name="vehicleModel"></td></tr>
					<tr><td>Vehicle Variant:</td><td><input type="text" value="" name="vehicleVariant"></td></tr>
					<tr><td>Vehicle Engine Size:</td><td><input type="text" value="" name="vehicleEngineSize"></td></tr>
					<tr><td>Vehicle Doors:</td><td><input type="text" value="" name="vehicleDoors"></td></tr>
					<tr><td>Vehicle Colour:</td><td><input type="text" value="" name="vehicleColour"></td></tr>
					<tr><td>Vehicle Year:</td><td><input type="text" value="" name="vehicleYear"></td></tr>
				</table>
				<table id="vehicleTable">
					<tr><td>Vehicle Mileage:</td><td><input type="text" value="" name="vehicleMileage"></td></tr>
					<tr><td>Vehicle Fuel:</td><td><input type="text" value="" name="vehicleFuel"></td></tr>
					<tr><td>Vehicle Transmission:</td><td><input type="text" value="" name="vehicleTransmission"></td></tr>
					<tr><td>Vehicle MPG:</td><td><input type="text" value="" name="vehicleMPG"></td></tr>
					<tr><td>Vehicle Road Tax:</td><td><input type="text" value="" name="vehicleRoadTax"></td></tr>
					<tr><td>Vehicle Insurance Group:</td><td><input type="text" value="" name="vehicleInsuranceGroup"></td></tr>
					<tr><td>Vehicle Extras:</td><td><textarea rows="10" cols="30" style="height: 200px; width: 250px; border: 1px solid #c0c0c0;" value="" name="vehicleExtras"></textarea></td></tr>
				</table>
				
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