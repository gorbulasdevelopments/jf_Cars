	$(document).ready(function() {
		let getUrlParameter = function getUrlParameter(sParam) {
			let sPageURL = decodeURIComponent(window.location.search.substring(1)),
				sURLletiables = sPageURL.split('&'),
				sParameterName,
				i;

			for (i = 0; i < sURLletiables.length; i++) {
				sParameterName = sURLletiables[i].split('=');

				if (sParameterName[0] === sParam) {
					return sParameterName[1] === undefined ? true : sParameterName[1];
				}
			}
		};

		
		//let $vehicleMake = getUrlParameter("make");
		//let $vehicleModel = getUrlParameter("model");
		let $vehicleFuelType = getUrlParameter("fuel");
		let $vehicleTransmission = getUrlParameter("transmission");
		let $vehicleEngine = getUrlParameter("engine");
		let $vehicleDoors = getUrlParameter("doors");
		let $vehicleAge = getUrlParameter("age");
		let $vehicleMileage = getUrlParameter("mileage");
		
		
		//Get All Makes
		//populateMakes(getUrlParameter("make"));
		//populateModels(getUrlParameter("make"), getUrlParameter("model"));

		//Only get model if make is set
		if (typeof $vehicleMake !== 'undefined' && $vehicleMake != 'any') {	
			//populateModels(getUrlParameter("make"), getUrlParameter("model"));
		}
		
		
		
		function populateMakes($vehicleMake) {
			//Populate all makes
			console.log("Populate Makes");
			$.ajax({
				type: "POST",
				url: "http://zion/showroom/getVehicleMakes",
				dataType: 'json',
				success: function(response)	{
					let $len = response.length;
					if($vehicleMake == 'any') {
						$("#make").append("<option selected value=\"any\">Make (Any)</option>");
					} else {
						$("#make").append("<option value=\"any\">Make (Any)</option>");
					}
					for( let $i = 0; $i < $len; $i++){
						let $id = response[$i]['id'];
						let $name = response[$i]['name'];
						if($id == $vehicleMake) {
							$("#make").append("<option value='" + $id + "' selected>" + $name + "</option>");
						} else {
							$("#make").append("<option value='" + $id + "'>" + $name + "</option>");
						}
					}
					
				}
			});
		}
		
		function populateModels($vehicleMake, $vehicleModel) {
			//Convert URI to String
			if (typeof $vehicleMake !== 'undefined') {
				$vehicleModel = $vehicleModel.replace(/\+/g, ' ');
			
				console.log("Populate Models");
				$.ajax({
					type: "POST",
					url: "http://zion/showroom/getVehicleModels",
					data: {'make':$vehicleMake},
					dataType: 'json',
					success: function($response) {
						console.log($response); 
						$("#model").empty();
						if($vehicleModel == 'any') {
							$("#model").append("<option selected value=\"any\">Model (Any)</option>");
						} else {
							$("#model").append("<option value=\"any\">Model (Any)</option>");
						}
						let $len = $response.length;
						for( let $i = 0; $i < $len; $i++){
							let $id = $response[$i]['id'];
							let $name = $response[$i]['name'];
							if($id == $vehicleModel) {
								$("#model").append("<option value='" + $id + "' selected>" + $name + "</option>");
							} else {
								$("#model").append("<option value='" + $id + "'>" + $name + "</option>");
							}
							
						}
						filterResults();
					}
				});
			}
			
		}
		
		function resetForm() {
			
			console.log("form Reset");
			$(".filter").hide();
			$("#search_form select").show();
			
			$("#make").empty();
			$("#make").append("<option selected value=\"any\">Make (Any)</option>");
			
			//Reset Model Options
			$("#model").empty();
			$("#model").append("<option selected value=\"any\">Model (Any)</option>");
			$("#model").append("<option value=\"any\">Please select make</option>");

			$("#fuel").empty();
			$("#fuel").append("<option selected value=\"any\">Fuel (Any)</option>");
			$("#fuel").append("<option value=\"PETROL\">PETROL</option>");
			$("#fuel").append("<option value=\"DIESEL\">DIESEL</option>");
			
			$("#transmission").empty();
			$("#transmission").append("<option selected value=\"any\">Transmission (Any)</option>");
			$("#transmission").append("<option value=\"MANUAL\">MANUAL</option>");
			$("#transmission").append("<option value=\"AUTOMATIC\">AUTOMATIC</option>");
			
			$("#engine").empty();
			$("#engine").append("<option selected value=\"any\">Engine (Any)</option>");

			$("#doors").empty();
			$("#doors").append("<option selected value=\"any\">Doors (Any)</option>");

			$("#age").empty();
			$("#age").append("<option selected value=\"any\">Age (Any)</option>");

			$("#mileage").empty();
			$("#mileage").append("<option selected value=\"any\">Mileage (Any)</option>");		

			filterResults();			
		}
		
		function filterResults($element = '') {
			$object = $element.id;
			$filter = JSON.stringify($("#search_form").serializeArray());
				
			$.ajax({
				type: "POST",
				url: "http://zion/showroom/filterResults",
				data: {source:$object, filter:$filter},
				dataType: 'json',
				success: function($response)	{
					console.log($response);
					$.each($response, function($optionField, $value) {
						$optionValue = $("#" + $optionField +"").val();
							if($optionField == 'model' && $optionValue == 'any') {
								if($('#make').val() == 'any') {
									$("#model").empty();
									$("#model").append("<option selected value=\"any\">Model (Any)</option>");
									$("#model").append("<option value=\"any\">Please select make</option>");
									return true;
								}
							} 
							$("#" + $optionField +"").empty();
							$("#" + $optionField +"").append("<option value='any'>" + $optionField.charAt(0).toUpperCase() + $optionField.slice(1).toLowerCase() + " (Any)</option>");
							$.each($value, function($element, $foo) {
								console.log($foo);
								if($optionField == 'age') {
									if($foo == $optionValue) {
									$("#" + $optionField +"").append("<option value='" + $foo + "' selected>Less than " + $foo + " years</option>");
									} else {
										$("#" + $optionField +"").append("<option value='" + $foo + "'>Less than " + $foo + " years</option>");
									}
								} else {
									
									if($foo == $optionValue) {
										$("#" + $optionField +"").append("<option value='" + $foo + "' selected>" + $foo + "</option>");
									} else {
										$("#" + $optionField +"").append("<option value='" + $foo + "'>" + $foo + "</option>");
									}
								}
							});
					});
				}
			});
		}
		
		
;

		$( "#search_form" ).submit(function( event ) {
		  //console.log( $( this ).serializeArray() );
		});
		
		$( "#resetFilters" ).click(function( event ) {
		  //console.log( $( this ).serializeArray() );
		  resetForm();
		  event.preventDefault();
		});
		
		$("#search_form select").change(function() {
			if(this.value != 'any') {
				$(this).hide();
				if(this.id == 'age') { 
					$("#" + this.id + "_filter .label").html("Less than " + this.value + " years");
					$("#" + this.id + "_filter").show();
				} else {
					$("#" + this.id + "_filter .label").html(this.value);
					$("#" + this.id + "_filter").show();
				}
			}
			filterResults()
		});	
		
		$("#search_form .filter .close").click(function() {
			console.log($(this).parent().attr('id') + " - " + $(this).parent().attr('id').indexOf("model")) ;
			$(this).parent().prev().show();
			$(this).parent().prev().prop("selectedIndex", 0);
			$(this).parent().hide();
			filterResults();
		});

	});