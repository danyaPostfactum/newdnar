<?php
$page_name = 'qa';
$page_title = 'Вопросы и ответы';
require_once('config.php');
require('functions.php');

require("modx/api.php");

$resourceId = $modx->findResource($_GET['alias']);
if (is_numeric($resourceId)) {
	$resource = $modx->getObject('modResource', $resourceId);
}
if (!$resourse) {
	// FIXME show 404 page
}

include("views/qa.tmpl.php");