<?php

echo "<pre>";
//print_r($this->vehicleResult);
echo "</pre>";
?>

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
		margin-bottom: 40px;
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
		margin-top: 20px;
		margin-bottom: 20px;
		float: left;
		border-spacing: 0px;
    	border-collapse: collapse;
    }
	
	#vehicleImageTable th {
		padding: 5px;
		border-bottom: 1px solid #c0c0c0;
		text-align: center;
		height: 30px;
		font-size: 12px;
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



	<div id="content_container">

        <div id="content">
			<h2>Update Vehicle</h2>
			<div class="spacer"></div>
            <form id="vehicle_form" method="POST" action="<?php echo URL; ?>/admin/vehicles/updateVehicle">
                <?php
                    foreach($this->vehicleResult as $vehicle) {
						echo "<input type=\"hidden\" name=\"vehicleID\" value=\"" . $vehicle['vehicle_id'] . "\" />";
						echo "<table id=\"vehicleTable\">";
						echo "<tr><td>Vehicle Registration:</td><td><input type=\"text\" value=\"" . $vehicle['vehicle_registration'] . "\" name=\"vehicleRegistration\"></td></tr>";
						echo "<tr><td>Vehicle Make:</td><td><input type=\"text\" value=\"" . $vehicle['vehicle_make'] . "\" name=\"vehicleMake\"></td></tr>";
						echo "<tr><td>Vehicle Model:</td><td><input type=\"text\" value=\"" . $vehicle['vehicle_model'] . "\" name=\"vehicleModel\"></td></tr>";
						echo "<tr><td>Vehicle Variant:</td><td><input type=\"text\" value=\"" . $vehicle['vehicle_variant'] . "\" name=\"vehicleVariant\"></td></tr>";
						echo "<tr><td>Vehicle Engine Size:</td><td><input type=\"text\" value=\"" . $vehicle['vehicle_engine_size'] . "\" name=\"vehicleEngineSize\"></td></tr>";
						echo "<tr><td>Vehicle Doors:</td><td><input type=\"text\" value=\"" . $vehicle['vehicle_doors'] . "\" name=\"vehicleDoors\"></td></tr>";
						echo "<tr><td>Vehicle Colour:</td><td><input type=\"text\" value=\"" . $vehicle['vehicle_colour'] . "\" name=\"vehicleColour\"></td></tr>";
						echo "<tr><td>Vehicle Year:</td><td><input type=\"text\" value=\"" . $vehicle['vehicle_year'] . "\" name=\"vehicleYear\"></td></tr>";
						echo "</table>";
						echo "<table id=\"vehicleTable\">";
						echo "<tr><td>Vehicle Mileage:</td><td><input type=\"text\" value=\"" . $vehicle['vehicle_mileage'] . "\" name=\"vehicleMileage\"></td></tr>";
						echo "<tr><td>Vehicle Fuel:</td><td><input type=\"text\" value=\"" . $vehicle['vehicle_fuel'] . "\" name=\"vehicleFuel\"></td></tr>";
						echo "<tr><td>Vehicle Transmission:</td><td><input type=\"text\" value=\"" . $vehicle['vehicle_transmission'] . "\" name=\"vehicleTransmission\"></td></tr>";
						echo "<tr><td>Vehicle MPG:</td><td><input type=\"text\" value=\"" . $vehicle['vehicle_mpg'] . "\" name=\"vehicleMPG\"></td></tr>";
						echo "<tr><td>Vehicle Road Tax:</td><td><input type=\"text\" value=\"" . $vehicle['vehicle_road_tax'] . "\" name=\"vehicleRoadTax\"></td></tr>";
						echo "<tr><td>Vehicle Insurance Group:</td><td><input type=\"text\" value=\"" . $vehicle['vehicle_insurance_group'] . "\" name=\"vehicleInsuranceGroup\"></td></tr>";
						echo "<tr><td>Vehicle Extras:</td><td><textarea rows=\"10\" cols=\"30\" style=\"height: 200px; width: 250px; border: 1px solid #c0c0c0;\" value=\"" . $vehicle['vehicle_extras'] . "\" name=\"vehicleExtras\"></textarea></td></tr>";
						echo "</table>";
                    
				?>
				
				<center>
				<input style="padding: 20px;" type="submit" value="Update Vehicle Details">
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

				</table>
				
				
				<center>
				<input style="padding: 20px;" type="submit" value="Upload New Images">
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