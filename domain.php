<?php 
$page_name = 'domains_info';
$page_title = 'Домены';
require_once('config.php');
require('functions.php');


$domains_info = array(
		'ru' => array(
				'name' => 'ru',
				'description' => 'Домен .RU является официальным доменом России. Использование домена .RU рекомендуется для сайтов относящихся к России или содержащих подобную информацию, для компаний и частных лиц которые находятся в России, выходят на ее рынок и, естественно, всем кому подходит данная доменная зона.'
			),
		'com' => array(
				'name' => 'com',
				'description' => "Домен .COM международный домен верхнего уровня. Рекомендуется для организаций и частных лиц занимающихся коммерческой деятельностью."
			),
		'su' => array(
				'name' => 'su',
				'description' => "Домен .SU является официальным доменом бывшего СССР. Использование домена .SU рекомендуется для сайтов относящихся к республикам бывшего СССР или содержащих подобную информацию, для компаний и частных лиц которые находятся на территории бывшего СССР, выходят на их рынок и, естественно, всем кому подходит данная доменная зона."
			),

		'org' => array(
				'name' => 'org',
				'description' => "Домен .ORG международный домен верхнего уровня. Рекомендуется для сайтов организаций и частных лиц занимающихся общественной деятельностью"
			),
		'net' => array(
				'name' => 'net',
				'description' => "Домен .NET международный домен верхнего уровня. Рекомендуется для телекоммуникационных компаний, а также для организаций и частных лиц имеющих отношение к сетевым технологиям."
			),
		'info' => array(
				'name' => 'info',
				'description' => "Домен .INFO международный домен верхнего уровня. Рекомендуется для всех, кто желает разместить в Интернете информацию о себе, своем предприятиии, товаре или услуге."
			),
		'me' => array(
				'name' => 'me',
				'description' => "Доменная зона .me принадлежит Черногории и была создана 24 сентября 2007 года. Администратором доменной зоны .me является Центр информационных систем университета Черногории (Centre of Information Systems, University of Montenegro)",
				'restrictions' => false
			),
		'biz' => array(
				'name' => 'biz',
				'description' => "No description yet"
			),
		'mobi' => array(
				'name' => 'mobi',
				'description' => "No description yet"
			),
		'name' => array(
				'name' => 'name',
				'description' => "No description yet"
			),
        'in' => array(
				'name' => 'in',
				'description' => "No description yet"
			),
		'mn' => array(
				'name' => 'mn',
				'description' => "No description yet"
			),
        'cc' => array(
				'name' => 'cc',
				'description' => "No description yet"
			),
		'ws' => array(
				'name' => 'ws',
				'description' => "No description yet"
			),
		'bz' => array(
				'name' => 'bz',
				'description' => "No description yet"
			),
        'asia' => array(
				'name' => 'asia',
				'description' => "No description yet"
			),
		'us' => array(
				'name' => 'us',
				'description' => "No description yet"
			),
        'tel' => array(
				'name' => 'tel',
				'description' => "No description yet"
			),
		'kz' => array(
				'name' => 'kz',
				'description' => "No description yet"
			),
        'xn--p1ai' => array(
				'name' => 'xn--p1ai',
				'description' => "No description yet"
			),
		'tv' => array(
				'name' => 'tv',
				'description' => "No description yet"
			)
	);

if ( isset($_GET['name']) ) {
	$have_domain = true;
	$domain_name = $_GET['name'];
} else {
	$have_domain = false;
}

include("views/domain.tmpl.php");

