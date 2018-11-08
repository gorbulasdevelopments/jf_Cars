<!-- Content Start -->
	<div id="content_container">
	

		
	<div id="content">
<?php	

	/*//print_r($this->salesResult);
	echo "<h1>Vehicles</h1>";
	if(sizeof($this->salesResult) > 0) {
		echo "<table border=\"2\" cellpadding=\"5\">";		
        foreach($this->salesResult as $record) {	
			//echo "<tr>";
			
			echo "<tr\"><td>" . implode("</td><td>",$record) . "</td></tr>";
			/*foreach($record as $value) {
				echo "<td>" . $value . "</td>";
			}
			//echo "</tr>";

        }		
		echo "</table>";
    } else {
		echo "No cars found";
	}
	
	echo "<br /><br />";
	
	if(sizeof($this->vehicleResult) > 0) {
		echo "<table border=\"1\">";		
        foreach($this->vehicleResult as $record) {	
			echo "<tr><td>" . implode("</td><td>",$record) . "</td></tr>";
        }		
		echo "</table>";
    } else {
		echo "No cars found";
	}*/
?>
	<br />
	<div style="margin-left: 30px;">
	<h1>Functions</h1>
	<h3>Vehicle Functions</h3>
	<ul style="margin-left: 40px;">
		<li style="color: red;"><a href="<?php echo URL; ?>/admin/vehicles/addVehicle">Add Vehicle</a></li>
		<li style="color: red;"><a href="<?php echo URL; ?>/admin/vehicles">List Vehicles</a></li>
	</ul>
		
	<h3>Sale Functions</h3>
	<ul style="margin-left: 40px;">
		<li style="color: red;"><a href="<?php echo URL; ?>/admin/sales/addSale">Add Sale</a></li>
		<li style="color: red;"><a href="<?php echo URL; ?>/admin/sales">List Sales</a></li>
	</ul>

	<h3>Account Functions</h3>
	<ul style="margin-left: 40px;">
		<li style="color: red;"><a href="admin/logout">Logout</a></li>
	</ul>
	</div>
		
		<!--<div id="vehicle_container">
			<div id="vehicle_description">
				<h2>2009(59) Renault Clio 1.5 EXPRESSION DCI 5 DR</h2>
				<h3>TINTED WINDOWS, 2 KEYS</h3>
			</div>
			<div id="vehicle_image">
				<img src="http://www.gorbulas.co.uk/projects/jf_cars/public/images/car_1.png" style="width: 100%; display: block;" />
				<div style="width: 100%; background-color: #444444; color: #ffffff; height: 30px; line-height: 30px; padding-left: 10px; box-sizing: border-box;">10 Images</div>
			</div>
			
			<div id="vehicle_details">
				<ul>
					<li>ENGINE SIZE: 1.6L</li>
					<li>MILEAGE: 20000</li>
					<li>FUEL TYPE: DIESEL</li>
					<li>YEAR: 2015</li>
					<li>TRANSMISSION: MANUAL</li>
					<li>INSURANCE GROUP: 17</li>
					<li>MPG: 60</li>
					<li>ROAD TAX: £30</li>
				</ul>
			</div>
			
			<div id="vehicle_price">
				<h1>£5,999</h1>
			</div>
		</div>
		
		<div id="vehicle_container">
			<div id="vehicle_description">
				<h2>2009(59) Renault Clio 1.5 EXPRESSION DCI 5 DR</h2>
				<h3>TINTED WINDOWS, 2 KEYS</h3>
			</div>
			<div id="vehicle_image">
				<img src="http://www.gorbulas.co.uk/projects/jf_cars/public/images/car_1.png" style="width: 100%; display: block;" />
				<div style="width: 100%; background-color: #444444; color: #ffffff; height: 30px; line-height: 30px; padding-left: 10px; box-sizing: border-box;">10 Images</div>
			</div>
			
			<div id="vehicle_details">
				<ul>
					<li>ENGINE SIZE: 1.6L</li>
					<li>MILEAGE: 20000</li>
					<li>FUEL TYPE: DIESEL</li>
					<li>YEAR: 2015</li>
					<li>TRANSMISSION: MANUAL</li>
					<li>INSURANCE GROUP: 17</li>
					<li>MPG: 60</li>
					<li>ROAD TAX: £30</li>
				</ul>
			</div>
			
			<div id="vehicle_price">
				<h1>£5,999</h1>
			</div>
		</div>
		
		<div id="vehicle_container">
			<h2>DESCRIPTION</h2>
			<h3>EXTRAS</h3>
		</div>-->
		
		<div style="clear: both"></div>
	</div>
    <!-- Content End -->