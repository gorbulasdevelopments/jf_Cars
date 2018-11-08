<?php
$name = ROOT_DIR . "/" . $images_directory . "view/asset/images/vehicles/" . base64_decode($_GET['id']);

$fp = fopen($name, 'rb');

header("Content-Type: image/jpeg");
header("Content-Length: " . filesize($name));

fpassthru($fp);