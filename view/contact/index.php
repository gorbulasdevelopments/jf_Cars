<style type="text/css">

	#contactForm {
		width: 50%;
		float: left;
		background-color: #3c484d;
		padding-top: 20px;
		padding-bottom: 20px;
	}

	.contactFieldContainer {
		width: 100%;
		height: 60px;
	}

	.contactLabel {
		width: 40%;
		float: left;
	}

	.contactLabel p {
		line-height: 1.2;
		text-align: right;
		padding: 10px;
		float: right;
		color: #ffffff;
	}

	.contactLabel p span {
		width: 100%;
		font-size: 10px;
		float: right;
	}

	.contactField {
		text-align: left;
		width: 50%;
		float: left;
		padding-left: 20px;
	}

	.contactField input {
		text-align: left;
		width: 100%;
		float: left;
		height: 100%;
		border: 1px solid #c0c0c0;
		padding-top: 15px;
		padding-bottom: 15px;
		padding-left: 10px;
		padding-right: 10px;
	}

	.contactField textarea {
		width: 100%;
		padding: 10px;
		height: 100px;
		border: 1px solid #c0c0c0;
	}

	.contactFormSubmit {
    	text-align: center;
	}

	.contactFormSubmit input {
		margin: 0px auto;
		width: 120px;
		cursor: pointer;
		background-color: #ffffff;
		color: #3c484d;
	}

	#openingTimes {
		float: left;
		width: 50%;
		color: #6e6363;
	}

	#openingTimes h3 {
		padding-left: 30px;
		padding-top: 0px;
		margin-bottom: 10px;
	}

	#openingTimes .openingTimeContainer {
		margin-top: 15px;
		height: 20px;
	}

	#openingTimes .openingDay {
		float: left;
		padding-left: 50px;
		width: 250px;
	}

	#openingTimes .openingTime {
		float: left;
		padding-left: 20px;
		width: 100px;
	}

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
					07500 123456<br /> <br />
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
					08:30 - 17:30
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
			<div style="width: 90%; margin-top: 0; margin-left: 5%; height: 440px; background: yellow; float: left;"></div>
		</div>

		<div class="spacer"></div>
    </div>
</div>