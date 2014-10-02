<?php

$tstart= microtime(true);

define('MODX_API_MODE', true);

/* this can be used to disable caching in MODX absolutely */
$modx_cache_disabled= false;

/* include custom core config and define core path */
@include(dirname(__FILE__) . '/config.core.php');
if (!defined('MODX_CORE_PATH')) define('MODX_CORE_PATH', dirname(__FILE__) . '/core/');

/* include the modX class */
if (@include_once (MODX_CORE_PATH . "model/modx/modx.class.php")) {

	/* start output buffering */
	ob_start();

	/* Create an instance of the modX class */
	$modx= new modX();

	/* Set the actual start time */
	$modx->startTime= $tstart;

	/* Initialize the default 'web' context */
	$modx->initialize('web');
}