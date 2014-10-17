<?php 
$page_name = 'check';
$page_title = 'Анализ сайтов';
require_once('config.php');
require_once('functions.php');

use True\Punycode;

// Use UTF-8 as the encoding
mb_internal_encoding('utf-8');

function output($output) {
	echo json_encode($output);
	die();
}

if (isXHR() && isset($_GET['get']) && isset($_GET['url'])) {
	header('Content-Type: application/json');

	$url = trim($_GET['url']);
	$scheme = parse_url($url, PHP_URL_SCHEME);
	if (!$scheme) {
		$scheme = 'http';
		$url = $scheme . '://' . $url;
	}
	if (!in_array($scheme, array('http', 'https'))) {
		// wrong scheme
		output(array('error' => 'Вы допустили ошибку при вводе (неверный протокол)'));
	}
	$host = parse_url($url, PHP_URL_HOST);
	if (!$host /*|| !is_valid_domain_name( strtolower($host) )*/) {
		// no host
		output(array('error' => 'Введен некорректный домен'));
	}

	$punycode = new Punycode();
	$unicodeHost = $host;
	$host = $punycode->encode($host);

	$url = http_build_url($url, array('host' => $host));

	switch ($_GET['get']) {
		case 'whois':
			$host = findMainHost($host);
			if (!$host) {
				output(array('error' => 'Неизвестная доменная зона'));
			}
			$result = phpWhois($host);
			if ($result['regrinfo']['registered'] == 'no') {
				output(array('error' => 'Домен не загеристрирован'));
			}
			$result['domain'] = $unicodeHost;
			break;
		case 'pagespeed':
			$result = pageSpeed($url);
			break;
		case 'dns':
			$result = getDnsRecords($host);
			break;
		case 'http':
			$result = getHttpInfo($url);
			break;
	}
	output($result);
}

include("views/check.tmpl.php");
