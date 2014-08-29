<?php 
$page_name = 'domains';
$page_title = 'Домены';
require_once('config.php');
require('functions.php');


$domains_info = array(
		'598' => array(
				'name' => 'ru',
				'description' => 'Домен .RU является официальным доменом России. Использование домена .RU рекомендуется для сайтов относящихся к России или содержащих подобную информацию, для компаний и частных лиц которые находятся в России, выходят на ее рынок и, естественно, всем кому подходит данная доменная зона.'
			),
		'599' => array(
				'name' => 'com',
				'description' => "No description yet"
			),
		'600' => array(
				'name' => 'se',
				'description' => "No description yet"
			),

		'601' => array(
				'name' => 'org',
				'description' => "No description yet"
			),
		'602' => array(
				'name' => 'some domain',
				'description' => "No description yet"
			),
		'603' => array(
				'name' => 'some domain',
				'description' => "No description yet"
			),
		'604' => array(
				'name' => 'some domain',
				'description' => "No description yet"
			),
		'605' => array(
				'name' => 'some domain',
				'description' => "No description yet"
			),
		'606' => array(
				'name' => 'some domain',
				'description' => "No description yet"
			),
		'607' => array(
				'name' => 'some domain',
				'description' => "No description yet"
			),
		'608' => array(
				'name' => 'some domain',
				'description' => "No description yet"
			)
	);

if ( isset($_GET['id']) ) {
	$domain_id = $_GET['id'];
}

include("views/domain.tmpl.php");

