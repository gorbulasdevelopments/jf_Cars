<?php



echo "<pre>";
//print_r($this->vehicleResult);
echo "</pre>";
?>

<style type="text/css">
    #vehicleTable {
        border: 1px solid #c0c0c0;
        font-size: 10px;
        margin: 0px auto;
    }

    #vehicleTable tr {

    }

    #vehicleTable th {
        padding: 5px;
        text-align: center;
        border: 1px solid #c0c0c0;
    }

    #vehicleTable td {
        padding: 10px;
        text-align: center;
        border: 1px solid #c0c0c0;
    }

</style>

<script>
	
	$(document).ready(function() {

		$(".removeVehicleButton").click(function( event ) {
			event.preventDefault();

			 let $vehicleRegistration = $(this).closest('tr').find('.vehicleRegistration').html()
			
			if(!confirm("Are you sure you want to remove " + $vehicleRegistration + "?")) {
				return false;
			};
			
			//alert($(this).closest('tr').find('.vehicleRegistration').html());
			let parentRow = $(this).closest('tr');
			
			var $vehicleData = $.post($(this).attr('href'), {'vehicleRegistration' : $vehicleRegistration}, function(removeResponse) {
				console.log(removeResponse);
				if(removeResponse.vehiclesFound == 1) {
					if(removeResponse.vehiclesDeleted == 1) {
						//alert(removeResponse.vehicleRegistration + " has been deleted");
						parentRow.remove();
					} else {
						alert("Unable to remove " + removeResponse.vehicleRegistration);
					}
				} else {
					alert("No vehicles found");
				}


			}, 'json');


			$vehicleData.done(function( result ) {
			});

			$vehicleData.fail(function( xhr, status, error ) {
				alert(xhr + " : " + status + " : " + error);
			});

			$vehicleData.always(function( result ) {
				//alert("Finished");
			});
		});


	});
</script>

	<div id="content_container">

        <div id="content">

            <h2>List Vehicles</h2>
			<div class="spacer"></div>
            <table id="vehicleTable">
                <tr>
                    <th>Registration</th>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Variant</th>
                    <th>Images</th>
                    <th colspan=2>Actions</th>

                </tr>
                <?php
                    foreach($this->vehicleResult as $vehicle) {
                        echo "<tr>";
                        echo "<td class=\"vehicleRegistration\">" . $vehicle['vehicle_registration'] . "</td>";
                        echo "<td>" . $vehicle['vehicle_make'] . "</td>";
                        echo "<td>" . $vehicle['vehicle_model'] . "</td>";
                        echo "<td>" . $vehicle['vehicle_variant'] . "</td>";
                        echo "<td>" . $vehicle['vehicle_image_count'] . "</td>";
                        echo "<td><a href=\"" . URL . "/admin/vehicles/updateVehicle/" . $vehicle['vehicle_registration'] . "\">Edit</a></td>";
                        echo "<td><a class=\"removeVehicleButton\" href=\"" . URL . "/admin/vehicles/removeVehicle/" . $vehicle['vehicle_registration'] . "\">Delete</a></td>";
                        
                        echo "</tr>";
                    }
                ?>

            </table>

		<div style="clear: both"></div>
		</div>
	</div>