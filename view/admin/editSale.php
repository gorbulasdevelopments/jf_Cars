<style type="text/css">

	#sale_form {
		margin: 0px auto;
		width: 500px;
		margin-bottom: 30px;
	}

    #sale_table {
        border: 1px solid #c0c0c0;
        font-size: 10px;
        margin: 0px auto;
		margin-left: 20px;
		margin-right: 20px;
		float: left;
    }
	
    #sale_table tr {

    }

    #sale_table th {
		padding: 5px;
    }

    #sale_table td {
        padding: 5px;
    }
	
	#sale_table input {
        padding: 5px;
        text-align: center;
        border: 1px solid #c0c0c0;
	}

	#sale_table select {
		width: 255px;
        padding: 5px;
        text-align: center;
        border: 1px solid #c0c0c0;
	}

</style>

<script>	
	$(document).ready(function() {

		$("#vehicleRegistrations").change(function() {
			let $registration = this.value;
			$("#vehicleRegistration").val($registration);
		});
	});
</script>

	<div id="content_container">
        <div id="content">
			<h2>Edit Sale</h2>
			<div class="spacer"></div>
			<?php foreach($this->saleDetails as $sale) { ?>
            <form id="sale_form" method="POST" action="/admin/sales/updateSale">
			<table id="sale_table">			
					<tr><td>Vehicle Registration:</td><td><input type="text" id="vehicleRegistration" value="<?php echo $sale['vehicle_registration']; ?>" name="vehicleRegistration"></td></tr>
					<tr><td>Sale Price:</td><td><input type="text" value="<?php echo $sale['sale_price']; ?>" name="salePrice"></td></tr>
					<tr><td>Sale Summary:</td><td><textarea rows="10" cols="30" style="height: 100px; width: 450px; border: 1px solid #c0c0c0;" name="saleSummary"><?php echo $sale['sale_summary']; ?></textarea></td></tr>
					<tr><td>Sale Description:</td><td><textarea rows="30" cols="80" style="height: 200px; width: 450px; border: 1px solid #c0c0c0;" name="saleDescription"><?php echo $sale['sale_description']; ?></textarea></td></tr>
					
					<tr>
					<td colspan="2">
						<center>
							<input style="padding: 20px;" type="submit" value="Add Sale">
						</center>
					</td>
					</tr>
				
				</table>
				<div style="clear: both"></div>
				


            </form>
			<?php } ?>
		<div style="clear: both"></div>
		</div>
	</div>