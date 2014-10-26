<?php 
$hosters = array();
$hosters['timeweb'] = array(
	'name' => 'TimeWeb',
	'img' => 'dist/assets/img/hostings/timeweb.ico',
	'url' => 'http://timeweb.com/ru/services/hosting/?i=3591&a=0006'
);
$hosters['dnar'] = array(
	'name' => 'DNAR',
	'img' => 'dist/assets/img/hostings/dnar.png',
	'url' => 'http://dnar.ru/hostings/dnar'
);
$hosters['nic.ru'] = array(
	'name' => 'Nic',
	'img' => 'http://placehold.it/16x16',
	'url' => 'http://nic.ru'
);
$hosters['R01'] = array(
	'name' => 'R01 Регистратор',
	'img' => 'http://placehold.it/16x16',
	'url' => 'http://hosting.r01.ru'
);

$pricing_options = array(
	array(
		'name' => 'Мини',
		'features' => array(
			//'ddos_safe' => false,
			'webspace' => 3,
			'domain_amount' => 6,
			'databases_amount' => 0,
			'test_period' => true,
			'scripts_available' => false,
			'OS' => 'Unix'
			),
		'price' => 201.6, 
		'url' => 'dnar',
		'description' => '',
		'hoster' => $hosters['dnar']
	),
	array(
		'name' => 'Макси',
		'features' => array(
			//'ddos_safe' => true,
			'webspace' => 7,
			'domain_amount' => 12,
			'databases_amount' => INF,
			'test_period' => true,
			'scripts_available' => true,
			'OS' => 'Unix'
			),
		'price' => 316.8, 
		'url' => 'dnar',
		'description' => '',
		'hoster' => $hosters['dnar']
	),
	array(
		'name' => 'Ультра',
		'features' => array(
			//'ddos_safe' => true,
			'webspace' => 12,
			'domain_amount' => 24,
			'databases_amount' => INF,
			'test_period' => true,
			'scripts_available' => true,
			'OS' => 'Unix'
			),
		'price' => 489.6, 
		'url' => 'dnar',
		'description' => '',
		'hoster' => $hosters['dnar']
	),
	array(
		'name' => 'Year',
		'features' => array(
			//'ddos_safe' => false,
			'webspace' => 2,
			'domain_amount' => 2,
			'databases_amount' => 2,
			'test_period' => true,
			'scripts_available' => true,
			'OS' => 'Unix'
			),
		'price' => 120, 
		'url' => 'timeweb',
		'description' => '',
		'hoster' => $hosters['timeweb']
	),
	array(
		'name' => 'Optimo',
		'features' => array(
			//'ddos_safe' => false,
			'webspace' => 4,
			'domain_amount' => 5,
			'databases_amount' => 5,
			'test_period' => true,
			'scripts_available' => true,
			'OS' => 'Unix'
			),
		'price' => 175, 
		'url' => 'timeweb',
		'description' => '',
		'hoster' => $hosters['timeweb']
	),
	array(
		'name' => 'Century',
		'features' => array(
			//'ddos_safe' => false,
			'webspace' => 6.4,
			'domain_amount' => 10,
			'databases_amount' => INF,
			'test_period' => true,
			'scripts_available' => true,
			'OS' => 'Unix'
			),
		'price' => 265, 
		'url' => 'timeweb',
		'description' => '',
		'hoster' => $hosters['timeweb']
	),
	array(
		'name' => 'Millennium',
		'features' => array(
			//'ddos_safe' => false,
			'webspace' => 12,
			'domain_amount' => 20,
			'databases_amount' => INF,
			'test_period' => true,
			'scripts_available' => true,
			'OS' => 'Unix'
			),
		'price' => 410, 
		'url' => 'timeweb',
		'description' => '',
		'hoster' => $hosters['timeweb']
		)
);

 ?>