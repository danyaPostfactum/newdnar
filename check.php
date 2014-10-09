<?php 
$page_name = 'check';
$page_title = 'Анализ сайтов';
require_once('config.php');
include('functions.php');

if (isXHR() && isset($_GET['get']) && isset($_GET['url'])) {
	$host = $_GET['url'];
	$path = '/';
	$protocol = 'http://';

	switch ($_GET['get']) {
		case 'whois':
			$result = phpWhois($host);
			$result['rawdata'] = implode("\n", $result['rawdata']);
			break;
		case 'pagespeed':
			$result = pageSpeed($protocol . $host . $path);
			$result->screenshot->data = str_replace(array('_', '-'), array('/', '+'), $result->screenshot->data);
			break;
		case 'dns':
			$dnsRecords = dns_get_record($host, DNS_A + DNS_MX + DNS_NS);
			$result = array();
			foreach ($dnsRecords as $record) {
				$result[$record['type']][] = $record;
			}
			break;
		case 'http':
			$result = getHttpInfo($protocol . $host . $path);
			$result['favicon'] = $protocol . $host . '/favicon.ico';
			break;
	}

	header('Content-Type: application/json');
	echo json_encode($result);
	return;
}

include("views/check.tmpl.php");
