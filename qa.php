<?php
$page_name = 'qa';
require_once('config.php');
require('functions.php');

require("modx/api.php");

$resourceId = $modx->findResource($_GET['alias']);
if (is_numeric($resourceId)) {
	$resource = $modx->getObject('modResource', array('id' => $resourceId, 'published' => true));
}
if (is_null($resource)) {
	include('404.php');
	exit();
}

include("views/qa.tmpl.php");