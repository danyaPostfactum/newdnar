<?php 
$page_name = 'domains_info';
$page_title = 'Домены';
require_once('config.php');
require('functions.php');


$domains_info = array(
		'ru' => array(
				'name' => 'ru',
				'description' => 'Домен .RU является официальным доменом России. Использование домена .RU рекомендуется для сайтов относящихся к России или содержащих подобную информацию, для компаний и частных лиц которые находятся в России, выходят на ее рынок и, естественно, всем кому подходит данная доменная зона.',
				'restrictions' => 'Ограничения на регистрацию и использование доменного имени в зоне .RU отсутствуют' // лучше просто задать None или false
			),
		'com' => array(
				'name' => 'com',
				'description' => "Домен .COM международный домен верхнего уровня. Рекомендуется для организаций и частных лиц занимающихся коммерческой деятельностью.",
				'restrictions' => false
			),
		'su' => array(
				'name' => 'su',
				'description' => "Домен .SU является официальным доменом бывшего СССР. Использование домена .SU рекомендуется для сайтов относящихся к республикам бывшего СССР или содержащих подобную информацию, для компаний и частных лиц которые находятся на территории бывшего СССР, выходят на их рынок и, естественно, всем кому подходит данная доменная зона.",
				'restrictions' => false
			),

		'org' => array(
				'name' => 'org',
				'description' => "Домен .ORG международный домен верхнего уровня. Рекомендуется для сайтов организаций и частных лиц занимающихся общественной деятельностью",
				'restrictions' => false
			),
		'net' => array(
				'name' => 'net',
				'description' => "Домен .NET международный домен верхнего уровня. Рекомендуется для телекоммуникационных компаний, а также для организаций и частных лиц имеющих отношение к сетевым технологиям.",
				'restrictions' => false
			),
		'info' => array(
				'name' => 'info',
				'description' => "Домен .INFO международный домен верхнего уровня. Рекомендуется для всех, кто желает разместить в Интернете информацию о себе, своем предприятиии, товаре или услуге.",
				'restrictions' => false
			),
		'me' => array(
				'name' => 'me',
				'description' => "Доменная зона .me принадлежит Черногории и была создана 24 сентября 2007 года. Администратором доменной зоны .me является Центр информационных систем университета Черногории (Centre of Information Systems, University of Montenegro)",
				'restrictions' => false
			),
		'605' => array(
				'name' => 'some domain',
				'description' => "No description yet",
				'restrictions' => false
			),
		'606' => array(
				'name' => 'some domain',
				'description' => "No description yet",
				'restrictions' => false
			),
		'607' => array(
				'name' => 'some domain',
				'description' => "No description yet",
				'restrictions' => false
			),
		'608' => array(
				'name' => 'some domain',
				'description' => "No description yet",
				'restrictions' => false
			)
	);

if ( isset($_GET['name']) ) {
	$have_domain = true;
	$domain_name = $_GET['name'];
} else {
	$have_domain = false;
}

include("views/domain.tmpl.php");

