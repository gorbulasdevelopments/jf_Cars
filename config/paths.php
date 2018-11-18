<?php

define('URL', (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]");

define('ROOT_DIR', realpath(__DIR__ . '/..')); 
