<?php

$cd = basename(dirname(__FILE__));

if ($cd == 'newdnar') {
   $directory = '/newdnar/';
} else {
   $directory = '/';
}

define("BASE_URL", "$directory");
define("ROOT_PATH", $_SERVER["DOCUMENT_ROOT"] . "$directory");
define("PAGESPEED_API_KEY", "xxxxxxxxxxxxxxxxxxxx-xxxxxxxxxxxxxxxxxx");
?>