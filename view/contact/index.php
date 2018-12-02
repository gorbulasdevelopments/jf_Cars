<style type="text/css">



</style>

<!-- Content Start -->
<div id="content_container">
			<?php 
			
				//include ROOT_DIR . "/view/searchBar.php";
			
			?>
    <div id="content">
		<h2>Contact JF Cars</h2>


		<p>
		At JF Car Sales, we pride ourselves by stocking a range range of used cars at great prices.
		</p>
		<p>
		If what we have in stock is not what you are looking for, please contact us and we will be happy to help you find the right car.
		</p>	
		<div class="spacer"></div>
		<div id="openingTimes">
			<h3>Contact Info</h3>
			<div class="openingTimeContainer">
				<div class="openingDay" style="line-height: 1.5;">
					<b style="margin-bottom: 10px;">JF CAR SALES</b><br />
					5 RUSSELL CLOSE<br />
					KING'S LYNN<br />
					NORFOLK<br />
					PE30 4NQ <br /><br />
					07979 492760<br /> <br />
					SALES@JFCARS.CO.UK
				</div>
			</div>
			
			<div class="spacer"></div>
		</div>
		
		<div id="openingTimes">
			<h3>Opening Times</h3>
			<div class="openingTimeContainer">
				<div class="openingDay">
					Monday
				</div>
				<div class="openingTime">
					08:30 - 17:30
				</div>
			</div>
			<div class="openingTimeContainer">
				<div class="openingDay">
					Tuesday
				</div>
				<div class="openingTime">
					08:30 - 17:30
				</div>
			</div>
			<div class="openingTimeContainer">
				<div class="openingDay">
					Wednesday
				</div>
				<div class="openingTime">
					08:30 - 17:30
				</div>
			</div>
			<div class="openingTimeContainer">
				<div class="openingDay">
					Thursday
				</div>
				<div class="openingTime">
					08:30 - 17:30
				</div>
			</div>
			<div class="openingTimeContainer">
				<div class="openingDay">
					Friday
				</div>
				<div class="openingTime">
					08:30 - 17:30
				</div>
			</div>
			<div class="openingTimeContainer">
				<div class="openingDay">
					Saturday
				</div>
				<div class="openingTime">
					08:30 - 17:30
				</div>
			</div>
			<div class="openingTimeContainer">
				<div class="openingDay">
					Sunday
				</div>
				<div class="openingTime">
					10:00 - 16:00
				</div>
			</div>
			<div style="clear: both"></div>
		</div>
		<div class="spacer"></div>
		<form id="contactForm">

			<div class="contactFieldContainer">
				<div class="contactLabel">
					<p>Name <span>(Required)</span></p>
				</div>
				<div class="contactField">
					<input type="text" name="customerName" />
				</div>
			</div>

			<div class="contactFieldContainer">
				<div class="contactLabel">
					<p>Email Address <span>(Required)</span></p>
				</div>
				<div class="contactField">
					<input type="email" name="customerEmail" />
				</div>
			</div>

			<div class="contactFieldContainer">
				<div class="contactLabel">
					<p>Telephone Number <span>(Required)</span></p>
				</div>
				<div class="contactField">
					<input type="tel" name="customerTelephone" />
				</div>
			</div>

			<div class="contactFieldContainer">
				<div class="contactLabel">
					<p>Additional Information <span>(Required)</span></p>
				</div>
				<div class="contactField">
					<textarea type="text" name="customerMessage"></textarea>
				</div>
			</div>
			<div class="spacer"></div>
			<div class="contactFormSubmit">
				<input type="submit" class="button" value="Submit" />
			</div>

		</form>

		<div id="mapLocation" style="width: 50%; float: left;">
			<div style="width: 90%; margin-top: 0; margin-left: 5%; height: 440px; float: left; overflow: hidden;">
				<div id="map"></div>
				<script>
					var map;
					function initMap() {
						var myLatLng = {lat: 52.746322, lng: 0.431628};

						map = new google.maps.Map(document.getElementById('map'), {
							center: myLatLng,
							zoom: 12
						});

						var marker = new google.maps.Marker({
							position: myLatLng,
							map: map,
							title: 'JF Car Sales'
						});

					}
				</script>
				<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-zi7VCfJ7FjHX36w1-CRXGFRE2M60jaY&callback=initMap" async defer></script>

			
				
			</div>
		</div>

		<div class="spacer"></div>
    </div>
</div>