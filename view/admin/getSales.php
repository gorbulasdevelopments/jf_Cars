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

	<div id="content_container">

        <div id="content">

            <h2>List Sales</h2>
			<div class="spacer"></div>
            <table id="vehicleTable">
                <tr>
                    <th>Registration</th>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Variant</th>
                    <th>Colour</th>
                    <th>Sale Price</th>
                    <th>Author</th>
                    <th colspan="3">Actions</th>

                </tr>
                <?php
                    foreach($this->sales as $sale) {
                        echo "<tr>";
                        echo "<td>" . $sale['vehicle_registration'] . "</td>";
                        echo "<td>" . $sale['vehicle_make'] . "</td>";
                        echo "<td>" . $sale['vehicle_model'] . "</td>";
                        echo "<td>" . $sale['vehicle_variant'] . "</td>";
                        echo "<td>" . $sale['vehicle_colour'] . "</td>";
                        echo "<td>£" . $sale['sale_price'] . "</td>";
                        echo "<td>" . $sale['sale_author'] . "</td>";
                        echo "<td><a href=\"" . URL . "/admin/sales/updateSale/" . $sale['vehicle_registration'] . "\">Update</a></td>";
                        echo "<td><a href=\"" . URL . "/admin/sales/removeSale/" . $sale['vehicle_registration'] . "\">Remove</a></td>";
                        echo "<td><a href=\"" . URL . "/admin/sales/shareSale/" . $sale['vehicle_registration'] . "\">Share</a></td>";
                        
                        echo "</tr>";
                    }
                ?>

            </table>
			
			<h3><a href="<?php echo URL . "/admin/sales/addSale/"; ?>">Add Sale</a></h3>

		<div style="clear: both"></div>
		</div>
	</div>