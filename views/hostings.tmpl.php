<?php include(ROOT_PATH . '_partials/header.php') ?>

<!-- Количество баз данных, дисковое пространство, цена 
	тестовый период (t/f), скрипты php/perl/python (t/f), платформа (radio Unix, Windows) -->
<?php 
$hosters = array();
$hosters['timeweb'] = array(
	'name' => 'TimeWeb',
	'img' => 'http://placehold.it/16x16',
	'url' => 'http://timeweb.ru'
	);
$hosters['reg.ru'] = array(
	'name' => 'REG.RU',
	'img' => 'http://placehold.it/16x16',
	'url' => 'http://reg.ru'
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
		'name' => 'Ультра',
		'features' => array(
			'ddos_safe' => false,
			'webspace' => 12,
			'domain_amount' => 24,
			'test_period' => false,
			'scripts_available' => true,
			'OS' => 'Unix'
			),
		'price' => 407.5, 
		'url' => 'http://hosting.r01.ru',
		'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque animi optio molestias, ab dolor veritatis numquam. Qui dicta recusandae iste, quasi corporis excepturi.',
		'hoster' => $hosters['R01']
		),
	array(
		'name' => 'Something',
		'features' => array(
			'ddos_safe' => true,
			'webspace' => 4,
			'domain_amount' => 7,
			'test_period' => false,
			'scripts_available' => true,
			'OS' => 'Windows'
			),
		'price' => 410, 
		'url' => 'http://hosting.nic.ru',
		'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque animi optio molestias, ab dolor veritatis numquam. Qui dicta recusandae iste, quasi corporis excepturi.',
		'hoster' => $hosters['nic.ru']
		),
	array(
		'name' => 'Host-Lite',
		'features' => array(
			'ddos_safe' => true,
			'webspace' => 5,
			'domain_amount' => 10,
			'test_period' => false,
			'scripts_available' => true,
			'OS' => 'Windows'
			),
		'price' => 87, 
		'url' => 'https://hosting.reg.ru',
		'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, excepturi.',
		'hoster' => $hosters['timeweb']
		),
	array(
		'name' => 'Базовый',
		'features' => array(
			'ddos_safe' => false,
			'webspace' => 2,
			'domain_amount' => 9,
			'test_period' => false,
			'scripts_available' => true,
			'OS' => 'Unix'
			),
		'price' => 300, 
		'url' => 'http://timeweb.com/ru/services/hosting/',
		'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, excepturi. And something else.',
		'hoster' => $hosters['reg.ru']
		)
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
			<?php foreach ($pricing_options as $pricing_option) { 
				$price = $pricing_option['price'];
				$tarif_url = $pricing_option['url'];
				$tarif_name = $pricing_option['name'];
				$tarif_description = $pricing_option['description'];
				
				$hoster_url = $pricing_option['hoster']['url'];
				$hoster_name = $pricing_option['hoster']['name'];
				$hoster_img = $pricing_option['hoster']['img'];

				$webspace = $pricing_option['features']['webspace'];
				$ddos_safe = $pricing_option['features']['ddos_safe'];
				$domain_amount = $pricing_option['features']['domain_amount'];
				?>
				<div class="card-wrapper hosting-card mix" data-priceorder='<?php echo $price ?>' data-webspace='<?php echo $webspace; ?>' data-domainamount='<?php echo $domain_amount; ?>'>
					<!-- <div class="col-sm-3">
						<h3 class="hoster-name"><a href="<?php echo $hoster_url; ?>"><?php echo $hoster_name; ?></a></h3>
					</div> -->
					<div class="row">
						<div class="col-sm-12">
							<h4 class="tarif-name">
								<img class="hoster-icon" src="<?php echo $hoster_img; ?>" alt="">
								<a href="<?php echo $tarif_url; ?>"><?php echo $tarif_name; ?></a>
								<span class="tarif-price-label tarif-price">
									<?php echo $price; ?> <i class="icon-ruble"></i><span style="font-size: 13px;">/месяц</span>
								</span>
							</h4>
							
						</div>
					</div>

					<!-- Табличка параметров тарифа -->
					<div class="row">
						<div class="col-sm-7">
							<ul class="tarif-specs-list">
								<li class="tarif-spec-item">
									<table class="table tarif-spec-item-table">
										<tr>
											<td>Хранилище:</td>
											<td><?php echo $webspace ?> Gb</td>
										</tr>
									</table>
								</li>
								<li class="tarif-spec-item <?php if ( !$ddos_safe ) { echo "unavailable"; } ?>">
									<table class="table tarif-spec-item-table">
										<tbody>
											<tr>
												<td>Защита от DDoS:</td>
											<?php if ( $ddos_safe ) { ?>
												<td>Есть</td>
											<?php } else { ?>
												<td>Нет</td>
											<?php } ?>
											</tr>
										</tbody>
									</table>
								</li>
								
								<li class="tarif-spec-item">
									<table class="table tarif-spec-item-table">
										<tr>
											<td>Количество сайтов:</td>
											<td><?php echo $domain_amount; ?></td>
										</tr>
									</table>
								</li>
							</ul>
						</div>
					</div> <!-- Конец таблички параметров тарифа -->

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
				<h4 class="setting-name">Упорядочить по</h4>
				<button class="sort btn btn-default" data-sort="priceorder:asc">цене</button>
				<!-- <button class="sort btn btn-default" data-sort="priceorder:desc">По убыванию</button> -->
				
				<h4>Упорядочить по</h4>
				<!-- <button class="sort btn btn-default" data-sort="webspace:asc">По возрастанию</button> -->
				<button class="sort btn btn-default" data-sort="webspace:desc">дисковому пространству</button>

				<h4>Упорядочить по</h4>
				<!-- <button class="sort btn btn-default" data-sort="domainamount:asc">По возрастанию</button> -->
				<button class="sort btn btn-default" data-sort="domainamount:desc">количеству доменов</button>

			</section>

			<section class="card-wrapper settings-card">
				<h3 class="order-settings-header">Диапазон цен</h3>
				<input class="interval-input" type="text"> — <input class="interval-input" type="text">
			</section>

			

			
			
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


<?php include("_partials/footer.php") ?>

