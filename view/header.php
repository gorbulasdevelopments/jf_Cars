<?php 
$protocol = $_SERVER['HTTPS'] == '' ? 'http://' : 'https://';
$root_directory = $protocol . $_SERVER['HTTP_HOST'];

$web_directory = $root_directory . "";
$images_directory = $web_directory . "/view/asset/images";
$root_folder = $_SERVER['DOCUMENT_ROOT'] . "";

?>

<!DOCTYPE HTML>
<html>
  <head>
		<meta charset="UTF-8">
		<meta name="description" content="JF Cars, Used Car Sales in Kings Lynn, Norfolk.">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php 
			if(isset($this->pageTitle)) {
				echo "<title>" . $this->pageTitle . "</title>";
			} else {
				echo "<title>JF Cars</title>";
			}
    ?>
	
	<?php 
			if(isset($this->canocial)) {
				echo "<link rel=\"canonical\" href=\"" . $this->canocial . "\">";
			} 
    ?>

	
	<link href="<?php echo URL; ?>/view/public/layout.css" rel="stylesheet" type="text/css">
	<link href="<?php echo URL; ?>/view/public/style.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat|Abel|Raleway" rel="stylesheet">
	<script src="HTTPs://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo URL; ?>/view/public/functions.js"></script>
  </head>

  <body>
    <!-- Header Start -->
	<div id="header_container">
		<div id="header_top_border"></div>
		<div id="header">
			<div id="logo">
			</div>
			<div id="navigation">
				<ul>
					<?php 
					if(Session::get('loggedIn')) { 
						echo "<li><a href=\"" . URL . "/admin\">HOME</a></li>";
						echo "<li><a href=\"" . URL . "/admin/vehicles\">VEHICLES</a></li>";
						echo "<li><a href=\"" . URL . "/admin/sales\">SALES</a></li>";
						echo "<li><a href=\"" . URL . "/admin/logout\">LOGOUT</a></li>";
					} else { ?>
						<li><a href="/">HOME</a></li>
						<li><a href="/showroom">SHOWROOM</a></li>
						<li><a href="/warranty">WARRANTY</a></li>
						<li><a href="/about">ABOUT US</a></li>
						<li><a href="/contact">CONTACT US</a></li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
    <!-- Header End -->