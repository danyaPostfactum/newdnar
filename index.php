<?php 
$page_title = 'domains';
$page_name = 'Домены';
require_once('config.php');
require('functions.php');

if ( isset($_GET['q']) ) {
	$search_value = trim($_GET['q']);
	$domain_error_message = '';

	// check if domain name is valid with regex
	$valid_domain = is_valid_domain_name( strtolower($search_value) );

	if ( !$valid_domain ) {
		$domain_error_message .= "Недопустимое доменное имя";
		if ( isXHR() ) {
			echo json_encode($domain_error_message);
			return;
		}
	} else {
		// using phpwhois
		$domainResults = array();
		// $whoisResult = array();
		$domainQueryArray = structure_domain_name($search_value);

		if ( isXHR() ) {
			echo json_encode($domainQueryArray);
			return;
		}
	}
}

if ( isXHR() && isset($_GET['domain_name']) ) {
	$whoisArray = getDomainInfo($_GET['domain_name']);
	echo json_encode($whoisArray);
	return;
}

include("views/index.tmpl.php");

