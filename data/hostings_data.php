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
$hosters['hts'] = array(
	'name' => 'HTS',
	'img' => 'dist/assets/img/hostings/hts.png',
	'url' => 'http://www.hts.ru/ru/service/tariffs/?affid=61625'
);
$hosters['beget'] = array(
	'name' => 'Beget',
	'img' => 'dist/assets/img/hostings/beget.png',
	'url' => 'http://beget.ru/host?id=147261'
);
$hosters['hostland'] = array(
	'name' => 'hostland',
	'img' => 'dist/assets/img/hostings/hostland.ico',
	'url' => 'http://www.hostland.ru/order/hosting/?r=123b24b3'
);
$hosters['ihc'] = array(
	'name' => 'ihc',
	'img' => 'dist/assets/img/hostings/ihc.ico',
	'url' => 'http://www.ihc.ru/hosting.html?ref=148849'
);

$hosters['fullspace'] = array(
	'name' => 'fullspace',
	'img' => 'dist/assets/img/hostings/fullspace.ico',
	'url' => 'http://fullspace.ru/services/hosting/?pnum=7050'
);

$hosters['sprinthost'] = array(
	'name' => 'sprinthost',
	'img' => 'dist/assets/img/hostings/sprinthost.ico',
	'url' => 'http://sprinthost.ru/s9727/tariffs/'
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
		),
    
 	array(
		'name' => 'Blog',
		'features' => array(
			//'ddos_safe' => false,
			'webspace' => 1,
			'domain_amount' => 2,
			'databases_amount' => INF,
			'test_period' => true,
			'scripts_available' => true,
			'OS' => 'Unix'
			),
		'price' => 100, 
		'url' => 'beget',
		'description' => '',
		'hoster' => $hosters['beget']
		),   
 	array(
		'name' => 'Start',
		'features' => array(
			//'ddos_safe' => false,
			'webspace' => 2,
			'domain_amount' => 5,
			'databases_amount' => INF,
			'test_period' => true,
			'scripts_available' => true,
			'OS' => 'Unix'
			),
		'price' => 125, 
		'url' => 'beget',
		'description' => '',
		'hoster' => $hosters['beget']
		),   
    array(
		'name' => 'Noble',
		'features' => array(
			//'ddos_safe' => false,
			'webspace' => 4,
			'domain_amount' => 10,
			'databases_amount' => INF,
			'test_period' => true,
			'scripts_available' => true,
			'OS' => 'Unix'
			),
		'price' => 235, 
		'url' => 'beget',
		'description' => '',
		'hoster' => $hosters['beget']
		),   
    array(
		'name' => 'Great',
		'features' => array(
			//'ddos_safe' => false,
			'webspace' => 10,
			'domain_amount' => 25,
			'databases_amount' => INF,
			'test_period' => true,
			'scripts_available' => true,
			'OS' => 'Unix'
			),
		'price' => 385, 
		'url' => 'beget',
		'description' => '',
		'hoster' => $hosters['beget']
		),
    
    array(
		'name' => 'Анлим 1',
		'features' => array(
			//'ddos_safe' => false,
			'webspace' => 1,
			'domain_amount' => INF,
			'databases_amount' => INF,
			'test_period' => true,
			'scripts_available' => true,
			'OS' => 'Unix'
			),
		'price' => 100, 
		'url' => 'hts',
		'description' => '',
		'hoster' => $hosters['hts']
		),    
     array(
		'name' => 'Анлим 2',
		'features' => array(
			//'ddos_safe' => false,
			'webspace' => 2,
			'domain_amount' => INF,
			'databases_amount' => INF,
			'test_period' => true,
			'scripts_available' => true,
			'OS' => 'Unix'
			),
		'price' => 170, 
		'url' => 'hts',
		'description' => '',
		'hoster' => $hosters['hts']
		),  
    array(
		'name' => 'Анлим 3',
		'features' => array(
			//'ddos_safe' => false,
			'webspace' => 3,
			'domain_amount' => INF,
			'databases_amount' => INF,
			'test_period' => true,
			'scripts_available' => true,
			'OS' => 'Unix'
			),
		'price' => 250, 
		'url' => 'hts',
		'description' => '',
		'hoster' => $hosters['hts']
		),  
    array(
		'name' => 'Анлим 4',
		'features' => array(
			//'ddos_safe' => false,
			'webspace' => 10,
			'domain_amount' => INF,
			'databases_amount' => INF,
			'test_period' => true,
			'scripts_available' => true,
			'OS' => 'Unix'
			),
		'price' => 750, 
		'url' => 'hts',
		'description' => '',
		'hoster' => $hosters['hts']
		),
    array(
		'name' => 'Простор 1',
		'features' => array(
			//'ddos_safe' => false,
			'webspace' => 2,
			'domain_amount' => INF,
			'databases_amount' => INF,
			'test_period' => true,
			'scripts_available' => true,
			'OS' => 'Unix'
			),
		'price' => 119, 
		'url' => 'hostland',
		'description' => '',
		'hoster' => $hosters['hostland']
		),    
     array(
		'name' => 'Простор 2',
		'features' => array(
			//'ddos_safe' => false,
			'webspace' => 5,
			'domain_amount' => INF,
			'databases_amount' => INF,
			'test_period' => true,
			'scripts_available' => true,
			'OS' => 'Unix'
			),
		'price' => 159, 
		'url' => 'hostland',
		'description' => '',
		'hoster' => $hosters['hostland']
		),  
    array(
		'name' => 'Простор 3',
		'features' => array(
			//'ddos_safe' => false,
			'webspace' => 10,
			'domain_amount' => INF,
			'databases_amount' => INF,
			'test_period' => true,
			'scripts_available' => true,
			'OS' => 'Unix'
			),
		'price' => 259, 
		'url' => 'hostland',
		'description' => '',
		'hoster' => $hosters['hostland']
		),  
    array(
		'name' => 'Простор 4',
		'features' => array(
			//'ddos_safe' => false,
			'webspace' => 20,
			'domain_amount' => INF,
			'databases_amount' => INF,
			'test_period' => true,
			'scripts_available' => true,
			'OS' => 'Unix'
			),
		'price' => 399, 
		'url' => 'hostland',
		'description' => '',
		'hoster' => $hosters['hostland']
		),
   array(
		'name' => 'Лёгкий',
		'features' => array(
			//'ddos_safe' => false,
			'webspace' => 1,
			'domain_amount' => 3,
			'databases_amount' => INF,
			'test_period' => true,
			'scripts_available' => true,
			'OS' => 'Unix'
			),
		'price' => 119, 
		'url' => 'ihc',
		'description' => '',
		'hoster' => $hosters['ihc']
		),
    array(
		'name' => 'Оптимальный',
		'features' => array(
			//'ddos_safe' => false,
			'webspace' => 2,
			'domain_amount' => 7,
			'databases_amount' => INF,
			'test_period' => true,
			'scripts_available' => true,
			'OS' => 'Unix'
			),
		'price' => 169, 
		'url' => 'ihc',
		'description' => '',
		'hoster' => $hosters['ihc']
		),
    array(
		'name' => 'Крутой',
		'features' => array(
			//'ddos_safe' => false,
			'webspace' => 10,
			'domain_amount' => 25,
			'databases_amount' => INF,
			'test_period' => true,
			'scripts_available' => true,
			'OS' => 'Unix'
			),
		'price' => 399, 
		'url' => 'ihc',
		'description' => '',
		'hoster' => $hosters['ihc']
		),
     array(
		'name' => 'Premium-1',
		'features' => array(
			//'ddos_safe' => false,
			'webspace' => 200,
			'domain_amount' => INF,
			'databases_amount' => INF,
			'test_period' => true,
			'scripts_available' => true,
			'OS' => 'Unix'
			),
		'price' => 1000, 
		'url' => 'p_ihc',
		'description' => '',
		'hoster' => $hosters['ihc']
		),
   array(
		'name' => 'Single space',
		'features' => array(
			//'ddos_safe' => false,
			'webspace' => 2,
			'domain_amount' => 1,
			'databases_amount' => 1,
			'test_period' => true,
			'scripts_available' => true,
			'OS' => 'Unix'
			),
		'price' => 80, 
		'url' => 'fullspace',
		'description' => '',
		'hoster' => $hosters['fullspace']
		),
    array(
		'name' => 'Double space',
		'features' => array(
			//'ddos_safe' => false,
			'webspace' => 4,
			'domain_amount' => 4,
			'databases_amount' => 4,
			'test_period' => true,
			'scripts_available' => true,
			'OS' => 'Unix'
			),
		'price' => 160, 
		'url' => 'fullspace',
		'description' => '',
		'hoster' => $hosters['fullspace']
		),
    array(
		'name' => 'Quadro space',
		'features' => array(
			//'ddos_safe' => false,
			'webspace' => 8,
			'domain_amount' => 10,
			'databases_amount' => 10,
			'test_period' => true,
			'scripts_available' => true,
			'OS' => 'Unix'
			),
		'price' => 260, 
		'url' => 'fullspace',
		'description' => '',
		'hoster' => $hosters['fullspace']
		),
    array(
		'name' => 'Full space',
		'features' => array(
			//'ddos_safe' => false,
			'webspace' => 10,
			'domain_amount' => 20,
			'databases_amount' => 20,
			'test_period' => true,
			'scripts_available' => true,
			'OS' => 'Unix'
			),
		'price' => 400, 
		'url' => 'fullspace',
		'description' => '',
		'hoster' => $hosters['fullspace']
		),
    
        array(
		'name' => 'Максимум',
		'features' => array(
			//'ddos_safe' => false,
			'webspace' => 13,
			'domain_amount' => INF,
			'databases_amount' => INF,
			'test_period' => true,
			'scripts_available' => true,
			'OS' => 'Unix'
			),
		'price' => 549, 
		'url' => 'sprinthost',
		'description' => '',
		'hoster' => $hosters['sprinthost']
		),
        array(
		'name' => 'Оптимум',
		'features' => array(
			//'ddos_safe' => false,
			'webspace' => 9,
			'domain_amount' => 18,
			'databases_amount' => INF,
			'test_period' => true,
			'scripts_available' => true,
			'OS' => 'Unix'
			),
		'price' => 349, 
		'url' => 'sprinthost',
		'description' => '',
		'hoster' => $hosters['sprinthost']
		),
        array(
		'name' => 'VIP-1',
		'features' => array(
			//'ddos_safe' => false,
			'webspace' => 8,
			'domain_amount' => INF,
			'databases_amount' => INF,
			'test_period' => true,
			'scripts_available' => true,
			'OS' => 'Unix'
			),
		'price' => 800, 
		'url' => 'p_sprinthost',
		'description' => '',
		'hoster' => $hosters['sprinthost']
		),
        array(
		'name' => 'VIP-2',
		'features' => array(
			//'ddos_safe' => false,
			'webspace' => 16,
			'domain_amount' => INF,
			'databases_amount' => INF,
			'test_period' => true,
			'scripts_available' => true,
			'OS' => 'Unix'
			),
		'price' => 1760, 
		'url' => 'p_sprinthost',
		'description' => '',
		'hoster' => $hosters['sprinthost']
		),
        array(
		'name' => 'VIP-3',
		'features' => array(
			//'ddos_safe' => false,
			'webspace' => 24,
			'domain_amount' => INF,
			'databases_amount' => INF,
			'test_period' => true,
			'scripts_available' => true,
			'OS' => 'Unix'
			),
		'price' => 3520, 
		'url' => 'p_sprinthost',
		'description' => '',
		'hoster' => $hosters['sprinthost']
		),
    
    
            array(
		'name' => 'Апгрейд 2',
		'features' => array(
			//'ddos_safe' => false,
			'webspace' => 2,
			'domain_amount' => 2,
			'databases_amount' => 2,
			'test_period' => true,
			'scripts_available' => true,
			'OS' => 'Unix'
			),
		'price' => 89, 
		'url' => 'sprinthost',
		'description' => '',
		'hoster' => $hosters['sprinthost']
		),
        array(
		'name' => 'Апгрейд 3',
		'features' => array(
			//'ddos_safe' => false,
			'webspace' => 3,
			'domain_amount' => 3,
			'databases_amount' => 3,
			'test_period' => true,
			'scripts_available' => true,
			'OS' => 'Unix'
			),
		'price' => 124, 
		'url' => 'sprinthost',
		'description' => '',
		'hoster' => $hosters['sprinthost']
		),
                array(
		'name' => 'Апгрейд 5',
		'features' => array(
			//'ddos_safe' => false,
			'webspace' => 5,
			'domain_amount' => 5,
			'databases_amount' => 5,
			'test_period' => true,
			'scripts_available' => true,
			'OS' => 'Unix'
			),
		'price' => 194, 
		'url' => 'sprinthost',
		'description' => '',
		'hoster' => $hosters['sprinthost']
		),
        array(
		'name' => 'Апгрейд 7',
		'features' => array(
			//'ddos_safe' => false,
			'webspace' => 7,
			'domain_amount' => 7,
			'databases_amount' => 7,
			'test_period' => true,
			'scripts_available' => true,
			'OS' => 'Unix'
			),
		'price' => 264, 
		'url' => 'sprinthost',
		'description' => '',
		'hoster' => $hosters['sprinthost']
		)
    
    
);

 ?>