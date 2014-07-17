<?php include("_partials/header.php") ?>

<?php 
$hostings = array();
$hostings['timeweb'] = array(
	'name' => 'TimeWeb',
	'img' => 'http://placehold.it/16x16',
	'pricing options' => array(
		array(
			'name' => 'Базовый',
			'ddos_safe' => false,
			'webspace' => 2,
			'domain_amount' => 9,
			'price' => 300, 
			'url' => 'http://timeweb.com/ru/services/hosting/',
			'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, excepturi.'
			)
		),
	'url' => 'http://timeweb.ru'
	);
$hostings['reg.ru'] = array(
	'name' => 'REG.RU',
	'img' => 'http://placehold.it/16x16',
	'pricing options' => array(
		array(
			'name' => 'Host-Lite',
			'ddos_safe' => true,
			'webspace' => 5,
			'domain_amount' => 10,
			'price' => 87, 
			'url' => 'https://hosting.reg.ru',
			'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, excepturi.'
			)
		),
	'url' => 'http://reg.ru'
	);
$hostings['nic.ru'] = array(
	'name' => 'Nic',
	'img' => 'http://placehold.it/16x16',
	'pricing options' => array(
		array(
			'name' => 'Something',
			'ddos_safe' => true,
			'webspace' => 4,
			'domain_amount' => 7,
			'price' => 410, 
			'url' => 'http://hosting.nic.ru',
			'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque animi optio molestias, ab dolor veritatis numquam. Qui dicta recusandae iste, quasi corporis excepturi.'
			)
		),
	'url' => 'http://nic.ru'
	);
$hostings['R01'] = array(
	'name' => 'R01 Регистратор',
	'img' => 'http://placehold.it/16x16',
	'pricing options' => array(
		array(
			'name' => 'Ультра',
			'ddos_safe' => false,
			'webspace' => 12,
			'domain_amount' => 24,
			'price' => 407.5, 
			'url' => 'http://hosting.r01.ru',
			'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque animi optio molestias, ab dolor veritatis numquam. Qui dicta recusandae iste, quasi corporis excepturi.'
			)
		),
	'url' => 'http://hosting.r01.ru'
	);


 ?>

<div class="jumbotron <?php if ($page_title == 'domains') { echo 'jumbotron-brand'; } ?>">
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
				<h1>10 самых лучших<br/> хостингов рунета</h1>
				<p>Мы работаем уже более 6 лет. За это время 6 500 клиентов зарегистрировали более 20 000 доменов. Мы предоставляем самые низкие цены на покупку доменов, более 40 способов оплаты и техническую поддержку ваших сайтов. Список наших услуг продолжает расти.</p>
			</div>
		</div>
		
	</div>
</div>

<div class="container">
	<div class="row">
		<article class="col-sm-8" id="Container">
			<?php foreach ($hostings as $hosting) { 
				$price = $hosting['pricing options'][0]['price'];
				$hoster_url = $hosting['url'];
				$hoster_name = $hosting['name'];
				$tarif_url = $hosting['pricing options'][0]['url'];
				$tarif_name = $hosting['pricing options'][0]['name'];
				$tarif_description = $hosting['pricing options'][0]['description'];
				$webspace = $hosting['pricing options'][0]['webspace'];
				$ddos_safe = $hosting['pricing options'][0]['ddos_safe'];
				$domain_amount = $hosting['pricing options'][0]['domain_amount'];
				?>
				<div class="card-wrapper hosting-card mix" data-priceorder='<?php echo $price ?>' data-webspace='<?php echo $webspace; ?>' data-domainamount='<?php echo $domain_amount; ?>'>
					<!-- <div class="col-sm-3">
						<h3 class="hoster-name"><a href="<?php echo $hoster_url; ?>"><?php echo $hoster_name; ?></a></h3>
					</div> -->
					<div class="row">
						<div class="col-sm-12">
							<h4 class="tarif-name">
								<img class="hoster-icon" src="<?php echo $hosting['img']; ?>" alt="">
								<a href="<?php echo $tarif_url; ?>"><?php echo $tarif_name; ?></a>
								<span class="tarif-price-label tarif-price">
									<?php echo $price; ?> <span style="font-size: 13px;">руб/месяц</span>
								</span>
							</h4>
							
						</div>
					</div>
					<div class="row">
						<div class="col-sm-9">
							<ul class="tarif-specs-list">
								<li class="tarif-spec-item"><strong>Хранилище:</strong><?php echo $webspace ?> Gb</li>
								<?php if ( $ddos_safe ) { ?>
								<li class="tarif-spec-item"><strong>Защита от DDoS:</strong> Есть</li>
								<?php } else { ?>
								<li class="tarif-spec-item unavailable"><strong>Защита от DDoS:</strong> Нет</li>
								<?php } ?>
								<li class="tarif-spec-item"><strong>Количество сайтов: </strong><?php echo $domain_amount; ?></li>
							</ul>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<p class="hosting-specs"><?php echo $tarif_description; ?></p>
						</div>
					</div>

				</div>
			<?php } ?>


		</article>
		<aside class="col-sm-3 col-sm-offset-1">
			<section class="card-wrapper settings-card">
				<h3 class="order-settings-header">Параметры</h3>
				<h4 class="setting-name">Упорядочить по цене:</h4>
				<button class="sort btn btn-default" data-sort="priceorder:asc">По возрастанию</button>
				<button class="sort btn btn-default" data-sort="priceorder:desc">По убыванию</button>
			</section>

			<section class="card-wrapper settings-card">
				<h3 class="order-settings-header">Диапазон цен</h3>
				<input class="interval-input" type="text"> — <input class="interval-input" type="text">
			</section>

			<h4>Упорядочить по дисковому пространству:</h4>
			<button class="sort btn btn-default" data-sort="webspace:asc">По возрастанию</button>
			<button class="sort btn btn-default" data-sort="webspace:desc">По убыванию</button>

			<h4>Упорядочить по количеству доменов:</h4>
			<button class="sort btn btn-default" data-sort="domainamount:asc">По возрастанию</button>
			<button class="sort btn btn-default" data-sort="domainamount:desc">По убыванию</button>
			
			<br>
			<br>
			<br>
			<br>
			<ul class="hosting-options" >
				<p><i>TODO:</i></p>
				<li><span class="option"><a href="">Кол-во баз данных</a></span></li>
			</ul>
		</aside>
	</div>
</div>

<!-- container is closed in the footer.php -->

<?php include("_partials/footer.php") ?>

