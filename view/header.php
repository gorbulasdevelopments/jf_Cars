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
			if(isset($this->ogURL)) {
				echo "<meta property=\"og:url\" content=\"" . $this->ogURL . "\" />";
			}
			
			if(isset($this->ogType)) {
				echo "<meta property=\"og:type\" content=\"" . $this->ogType . "\" />";
			}
			
			if(isset($this->ogTitle)) {
				echo "<meta property=\"og:title\" content=\"" . $this->ogTitle . "\" />";
			}
			if(isset($this->ogDescription)) {
				echo "<meta property=\"og:description\" content=\"" . $this->ogDescription . "\" />";
			}
			
			if(isset($this->ogImage)) {
				echo "<meta property=\"og:image\" content=\"" . $this->ogImage . "\" />";
			}
			
			if(isset($this->appID)) {
				echo "<meta property=\"fb:app_id\" content=\"" . $this->appID . "\" />";
			}
		
			if(isset($this->pageTitle)) {
				echo "<title>" . $this->pageTitle . "</title>";
			} else {
				echo "<title>JF Cars</title>";
			}
			
			if(isset($this->canocial)) {
				echo "<link rel=\"canonical\" href=\"" . $this->canocial . "\">";
			} 
			

    ?>

	
	<!--<link href="<?php echo URL; ?>/view/public/layout.css" rel="stylesheet" type="text/css">-->
	<link href="<?php echo URL; ?>/view/public/layout_320.css" media="screen and (min-width: 320px) and (max-width: 479px)" rel="stylesheet" type="text/css">
	<link href="<?php echo URL; ?>/view/public/layout_320.css" media="screen and (min-width: 480px) and (max-width: 767px)" rel="stylesheet" type="text/css">
	<link href="<?php echo URL; ?>/view/public/layout_320.css" media="screen and (min-width: 768px) and (max-width: 991px)" rel="stylesheet" type="text/css">
	<link href="<?php echo URL; ?>/view/public/layout_992.css" media="screen and (min-width: 992px) and (max-width: 1199px)" rel="stylesheet" type="text/css">
	<link href="<?php echo URL; ?>/view/public/layout_1200.css" media="screen and (min-width: 1200px)" rel="stylesheet" type="text/css">
	<link href="<?php echo URL; ?>/view/public/style.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat|Abel|Raleway" rel="stylesheet">
	<script src="HTTPs://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo URL; ?>/view/public/functions.js"></script>
	<?php 
		if(isset($this->localJavascript)) {
			echo "<script type=\"text/javascript\" src=\"" . URL . $this->localJavascript . "\"></script>";
		}
	?>
	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
  </head>

  <body>
    <!-- Header Start -->
	<div id="header_container">
		<div id="header_top_border"></div>
		<div id="header">
			<div id="logo">
			</div>
			<div class="navigation_burger_container">
					<a class="navigation_burger" href="#"><img style="width: 50px;" src="/view/asset/images/burger.bmp"></img></a>
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
						<li><a <?php echo $this->navTitle == "home" ? "class=\"selectedNav\"" : ""; ?> href="/">HOME</a></li>
						<li><a <?php echo $this->navTitle == "showroom" ? "class=\"selectedNav\"" : ""; ?> href="/showroom">SHOWROOM</a></li>
						<li><a <?php echo $this->navTitle == "warranty" ? "class=\"selectedNav\"" : ""; ?> href="/warranty">WARRANTY</a></li>
						<li><a <?php echo $this->navTitle == "finance" ? "class=\"selectedNav\"" : ""; ?> href="/finance">FINANCE</a></li>
						<li><a <?php echo $this->navTitle == "about" ? "class=\"selectedNav\"" : ""; ?> href="/about">ABOUT US</a></li>
						<li><a <?php echo $this->navTitle == "contact" ? "class=\"selectedNav\"" : ""; ?> href="/contact">CONTACT US</a></li>
					<?php } ?>
				</ul>
			</div>
			<div id="navigation_mini">		
					<div class="navigation_burger_container">
						<a class="navigation_burger" href="#"><img style="width: 30px; margin-top: 0px; margin-left: 0px;" src="/view/asset/images/close.png"></img></a> 
					</div>
				
					<div style="margin: 0px auto; display: table; width: 100%;">
						<ul>
							<?php 
							if(Session::get('loggedIn')) { 
								echo "<li><a href=\"" . URL . "/admin\">HOME</a></li>";
								echo "<li><a href=\"" . URL . "/admin/vehicles\">VEHICLES</a></li>";
								echo "<li><a href=\"" . URL . "/admin/sales\">SALES</a></li>";
								echo "<li><a href=\"" . URL . "/admin/logout\">LOGOUT</a></li>";
							} else { ?>
								<li><a <?php echo $this->navTitle == "home" ? "class=\"selectedNav\"" : ""; ?> href="/">HOME</a></li>
								<li><a <?php echo $this->navTitle == "showroom" ? "class=\"selectedNav\"" : ""; ?> href="/showroom">SHOWROOM</a></li>
								<li><a <?php echo $this->navTitle == "warranty" ? "class=\"selectedNav\"" : ""; ?> href="/warranty">WARRANTY</a></li>
								<li><a <?php echo $this->navTitle == "about" ? "class=\"selectedNav\"" : ""; ?> href="/about">ABOUT US</a></li>
								<li><a <?php echo $this->navTitle == "contact" ? "class=\"selectedNav\"" : ""; ?> href="/contact">CONTACT US</a></li>
							<?php } ?>
						</ul> 
					</div>
				</div>
			
		</div>
	</div>
    <!-- Header End -->