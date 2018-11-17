<div id="search_bar">
			<form id="search_form" method="GET" action="<?php echo URL; ?>/showroom/search">
				<div>

					<select id="make" name="make" <?php echo $this->make != 'any' ? "style=\"display: none\"" : ""; ?>>
						<?php
							if($this->make == 'any') {
								echo "<option selected value=\"any\">Make (Any)</option>";
							} else {
								echo "<option value=\"any\">Make (Any)</option>";
							}
						
							foreach($this->filterResults['make'] as $key => $value) {
								if(strtoupper($value) == strtoupper($this->make)) {
									echo "<option selected value=\"" . $value . "\">" . $value . "</option>";
								} else {
									echo "<option value=\"" . $value . "\">" . $value . "</option>";
								}
							}
						?>
					</select>
					<div id="make_filter" class="filter" <?php echo $this->make != 'any' ? "style=\"display: block\"" : ""; ?>>
						<span class="label"><?php echo $this->make != 'any' ? $this->make : ""; ?></span>
						<span class="close">X</span>
					</div>
					<select id="model" name="model" <?php echo $this->model != 'any' ? "style=\"display: none\"" : ""; ?>>
						<?php
							if($this->make != 'any') {
					
								if($this->model == 'any') {
									echo "<option selected value=\"any\">Model (Any)</option>";
								} else {
									echo "<option value=\"any\">Model (Any)</option>";
								}
							
								foreach($this->filterResults['model'] as $key => $value) {
									if(strtoupper($value) == strtoupper($this->model)) {
										echo "<option selected value=\"" . $value . "\">" . $value . "</option>";
									} else {
										echo "<option value=\"" . $value . "\">" . $value . "</option>";
									}
								}
							} else {
								echo "<option selected hidden value=\"any\">Model (Any)</option>";
								echo "<option value=\"any\">Please select make</option>";
							}
						?>
						
					</select>
					<div id="model_filter" class="filter" <?php echo $this->model != 'any' ? "style=\"display: block\"" : ""; ?>>
						<span class="label"><?php echo $this->model != 'any' ? $this->model : ""; ?></span>
						<span class="close">X</span>
					</div>
					
					<select id="fuel" name="fuel" <?php echo $this->fuel != 'any' ? "style=\"display: none\"" : ""; ?>>
						<?php
							if($this->fuel == 'any') {
								echo "<option selected value=\"any\">Fuel (Any)</option>";
							} else {
								echo "<option value=\"any\">Fuel (Any)</option>";
								
							}
						
							foreach($this->filterResults['fuel'] as $key => $value) {
								if(strtoupper($value) == strtoupper($this->fuel)) {
									echo "<option selected value=\"" . $value . "\">" . $value . "</option>";
								} else {
									echo "<option value=\"" . $value . "\">" . $value . "</option>";
								}
							}
						?>
						
					</select>
					<div id="fuel_filter" class="filter" <?php echo $this->fuel != 'any' ? "style=\"display: block\"" : ""; ?>>
						<span class="label"> <?php echo $this->fuel != 'any' ? $this->fuel : ""; ?></span>
						<span class="close">X</span>
					</div>
					
					<select id="transmission" name="transmission" <?php echo $this->transmission != 'any' ? "style=\"display: none\"" : ""; ?>>
						<?php
							if($this->transmission == 'any') {
								echo "<option selected value=\"any\">Transmission (Any)</option>";
							} else {
								echo "<option value=\"any\">Transmission (Any)</option>";
								
							}
						
							foreach($this->filterResults['transmission'] as $key => $value) {
								if(strtoupper($value) == strtoupper($this->transmission)) {
									echo "<option selected value=\"" . $value . "\">" . $value . "</option>";
								} else {
									echo "<option value=\"" . $value . "\">" . $value . "</option>";
								}
							}
						?>
					</select>
					<div id="transmission_filter" class="filter" <?php echo $this->transmission != 'any' ? "style=\"display: block\"" : ""; ?>>
						<span class="label"><?php echo $this->transmission != 'any' ? $this->transmission : ""; ?></span>
						<span class="close">X</span>
					</div>
					<select id="engine" name="engine" <?php echo $this->engine != 'any' ? "style=\"display: none\"" : ""; ?>>
						<?php
							if($this->engine == 'any') {
								echo "<option selected value=\"any\">Engine (Any)</option>";
							} else {
								echo "<option value=\"any\">Engine (Any)</option>";
								
							}
						
							foreach($this->filterResults['engine'] as $key => $value) {
								if(strtoupper($value) == strtoupper($this->engine)) {
									echo "<option selected value=\"" . $value . "\">" . $value . "</option>";
								} else {
									echo "<option value=\"" . $value . "\">" . $value . "</option>";
								}
							}
						?>
					</select>
					<div id="engine_filter" class="filter" <?php echo $this->engine != 'any' ? "style=\"display: block\"" : ""; ?>>
						<span class="label"><?php echo $this->engine != 'any' ? $this->engine : ""; ?></span>
						<span class="close">X</span>
					</div>
					
					<select id="doors" name="doors" <?php echo $this->doors != 'any' ? "style=\"display: none\"" : ""; ?>>
						<?php
							if($this->doors == 'any') {
								echo "<option selected value=\"any\">Doors (Any)</option>";
							} else {
								echo "<option value=\"any\">Doors (Any)</option>";
								
							}
						
							foreach($this->filterResults['doors'] as $key => $value) {
								if(strtoupper($value) == strtoupper($this->doors)) {
									echo "<option selected value=\"" . $value . "\">" . $value . "</option>";
								} else {
									echo "<option value=\"" . $value . "\">" . $value . "</option>";
								}
							}
						?>
					</select>
					<div id="doors_filter" class="filter" <?php echo $this->doors != 'any' ? "style=\"display: block\"" : ""; ?>>
						<span class="label"><?php echo $this->doors != 'any' ? $this->doors : ""; ?></span>
						<span class="close">X</span>
					</div>
					
					<select id="age" name="age" <?php echo $this->age != 'any' ? "style=\"display: none\"" : ""; ?>>
						<?php
							if($this->age == 'any') {
								echo "<option selected value=\"any\">Age (Any)</option>";
							} else {
								echo "<option value=\"any\">Age (Any)</option>";
								
							}
						
							foreach($this->filterResults['age'] as $key => $value) {
								if(strtoupper($value) == strtoupper($this->age)) {
									echo "<option selected value=\"" . $value . "\">Less than " . $value . " years</option>";
								} else {
									echo "<option value=\"" . $value . "\">Less than " . $value . " years</option>";
								}
							}
						?>
					</select>
					<div id="age_filter" class="filter" <?php echo $this->age != 'any' ? "style=\"display: block\"" : ""; ?>>
						<span class="label"><?php echo $this->age != 'any' ? "Less than " . $this->age . " years" : ""; ?></span>
						<span class="close">X</span>
					</div>
					
					<select id="mileage" name="mileage" <?php echo $this->mileage != 'any' ? "style=\"display: none\"" : ""; ?>>
						<?php
							if($this->mileage == 'any') {
								echo "<option selected value=\"any\">Mileage (Any)</option>";
							} else {
								echo "<option value=\"any\">Mileage (Any)</option>";
								
							}
						
							foreach($this->filterResults['mileage'] as $key => $value) {
								if(strtoupper($value) == strtoupper($this->mileage)) {
									echo "<option selected value=\"" . $value . "\">" . $value . "</option>";
								} else {
									echo "<option value=\"" . $value . "\">" . $value . "</option>";
								}
							}
						?>
					</select>
					<div id="mileage_filter" class="filter" <?php echo $this->mileage != 'any' ? "style=\"display: block\"" : ""; ?>>
						<span class="label"><?php echo $this->mileage != 'any' ? $this->mileage : ""; ?></span>
						<span class="close">X</span>
					</div>
				<div id="search_buttons">
					<input class="button" type="submit" value="Search">
					
					<input class="button" id="resetFilters" type="submit" value="Reset Filters">
				</div>
			</form>
		</div>
	</div>