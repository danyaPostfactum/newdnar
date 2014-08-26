<?php
	$title = 'Подбор выгодного хостинга';
	$description = 'test1';
	$keywords = 'test2';
 	include(ROOT_PATH . '_partials/header.php') 
?>

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
			//'ddos_safe' => false,
			'webspace' => 12,
			'domain_amount' => 24,
			'databases_amount' => 10,
			'test_period' => false,
			'scripts_available' => false,
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
			//'ddos_safe' => true,
			'webspace' => 4,
			'domain_amount' => 7,
			'databases_amount' => 6,
			'test_period' => false,
			'scripts_available' => false,
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
			//'ddos_safe' => true,
			'webspace' => 5,
			'domain_amount' => 10,
			'databases_amount' => 0,
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
			//'ddos_safe' => false,
			'webspace' => 2,
			'domain_amount' => 9,
			'databases_amount' => 3,
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
	<div class="row controls-row">
		<div class="col-sm-8">
			<h4 class="setting-name">Упорядочить по</h4>
			<a class="sort" href="#" data-sort="priceorder:asc">Цене</a>
			<a class="sort" href="#" data-sort="webspace:desc">Дисковому пространству</a>
			<a class="sort" href="#" data-sort="domainamount:desc">Количеству доменов</a>
			<a class="sort" href="#" data-sort="databases:desc">Количеству баз данных</a>
		</div>

		<div class="col-sm-4">
			<h4>
				<div class="yashare-auto-init yand-sharing-hostings" data-yashareL10n="ru" 
											   data-yashareQuickServices="yaru,vkontakte,facebook,twitter,gplus" 
											   data-yashareTheme="counter"></div>
			</h4>
		</div>
		
	</div>
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
				$domain_amount = $pricing_option['features']['domain_amount'];
				$databases_amount = $pricing_option['features']['databases_amount'];

				$hostingOS = $pricing_option['features']['OS'];
				//$ddos_safe = $pricing_option['features']['ddos_safe']; // boolean
				$test_period = $pricing_option['features']['test_period']; // boolean 
				$scripts_available = $pricing_option['features']['scripts_available']; // boolean
				?>
				<div class="card-wrapper 
							hosting-card 
							mix 
							<?php echo 'filter-' . $hostingOS; ?> 
							<?php foreach ($pricing_option['features'] as $key => $feature) {
								if ($feature === true) {
									echo strtolower('filter-' . $key . ' ');
								} else {
									if ($feature === false) {
										echo strtolower('filter-' . 'no-' . $key . ' ');
									}
										
								}
							} ?>" 
							data-priceorder='<?php echo $price ?>' 
							data-webspace='<?php echo $webspace; ?>' 
							data-domainamount='<?php echo $domain_amount; ?>'
							data-databases='<?php echo $databases_amount; ?>'>
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
						<div class="col-sm-12 tarif-features-section">
							<div class="row">
								<div class="col-sm-6 specs-table-wrapper">
									<table class="table tarif-specs-table">
										<tr class="tarif-spec-item">
											<td>Хранилище:</td>
											<td><?php echo $webspace ?> Gb</td>
										</tr>
										<!-- <tr class="tarif-spec-item <?php if ( !$ddos_safe ) { echo "unavailable"; } ?>">
											<td>Защита от DDOS:</td>
											<?php if ( $ddos_safe ) { ?>
												<td>Есть</td>
											<?php } else { ?>
												<td>Нет</td>
											<?php } ?>
										</tr> -->
										<tr class="tarif-spec-item">
											<td>Количество сайтов:</td>
											<td><?php echo $domain_amount; ?></td>
										</tr>
										<tr class="tarif-spec-item <?php if ( $databases_amount === 0 ) { echo "unavailable"; } ?>">
											<td>Количество баз:</td>
											<td><?php echo $databases_amount; ?></td>
										</tr>
									</table>
								</div>
								<div class="col-sm-6 specs-table-wrapper">
									<table class="table tarif-specs-table">
										<tr class="tarif-spec-item <?php if ( !$test_period ) { echo "unavailable"; } ?>">
											<td>Тестовый период:</td>
											<?php if ( $test_period ) { ?>
												<td>Есть</td>
											<?php } else { ?>
												<td>Нет</td>
											<?php } ?>
										</tr>
										<tr class="tarif-spec-item <?php if ( !$scripts_available ) { echo "unavailable"; } ?>">
											<td>Скрипты php/perl/python:&nbsp;</td>
											<?php if ( $scripts_available ) { ?>
												<td>Есть</td>
											<?php } else { ?>
												<td>Нет</td>
											<?php } ?>
										</tr>
										<tr class="tarif-spec-item">
											<td>Операционная система:</td>
											<td><?php echo $hostingOS; ?></td>
										</tr>
									</table>
								</div>
							</div>

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
		<aside class="col-sm-4 filter-column-wrapper">
			<div class="filter-column">
				<!-- <section class="card-wrapper settings-card">
					<h3 class="order-settings-header">Параметры</h3>

				</section> -->

				<section class="card-wrapper settings-card range-filter" data-filtername="priceorder">
					<h4 class="order-settings-header">Ежемесячная плата</h4>
					от <input class="interval-input lower-range" type="text"> до
					<input class="interval-input upper-range" type="text"> <i class="icon-ruble"></i>
				</section>
				<section class="card-wrapper settings-card range-filter" data-filtername="webspace">
					<h4 class="order-settings-header">Дисковое пространство</h4>
					от <input class="interval-input lower-range" type="text"> до
					<input class="interval-input upper-range" type="text"> Гб
				</section>
				<section class="card-wrapper settings-card range-filter" data-filtername="domainamount">
					<h4 class="order-settings-header">Количество сайтов</h4>
					от <input class="interval-input lower-range" type="text"> до
					<input class="interval-input upper-range" type="text"> шт.
				</section>
				<section class="card-wrapper settings-card range-filter" data-filtername="databases">
					<h4 class="order-settings-header">Количество баз данных</h4>
					от <input class="interval-input lower-range" type="text"> до
					<input class="interval-input upper-range" type="text"> шт.
				</section>


				<form id="Filters" class="card-wrapper">
					<?php foreach (array(
										 // 'ddos_safe' => 'Защита от DDOS', 
										 'test_period' => "Наличие тестового периода", 
										 'scripts_available' => "Скрипты php/perl/python") as $filter_key => $filter_name) { ?>
						<fieldset>
							<h4 class="category-name"><?php echo $filter_name; ?></h4>
							<select>
							    <option value="">Неважно</option>
							    <option value=".<?php echo strtolower('filter-' . $filter_key); ?>">Да</option>
							    <option value=".<?php echo strtolower('filter-' . 'no-' . $filter_key); ?>">Нет</option>
							</select>
							<!-- <button type="button" class="btn btn-default filter" data-filter=".<?php echo strtolower('filter-' . $filter_key); ?>">
								<?php echo "Да"; ?>
							</button>
							<button type="button" class="btn btn-default filter" data-filter=".<?php echo strtolower('filter-' . 'no-' . $filter_key); ?>">
								<?php echo "Нет";  ?>
							</button> -->

						</fieldset>
							
					<?php } ?>

					<fieldset>
						<h4 class="category-name">Операционная система</h4>
						<!-- <button type="button" class="btn btn-default filter" data-filter=".filter-Windows">
							Windows
						</button>
						<button type="button" class="btn btn-default filter" data-filter=".filter-Unix">
							Unix
						</button> -->
						<select>
							<option value="">Неважно</option>
							<option value=".filter-Unix">Unix</option>							
							<option value=".filter-Window">Windows</option>							
						</select>

					</fieldset>

				</form>
				
			</div>


			<div class="hostings-description">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo, obcaecati voluptatum porro optio dicta quasi assumenda illum labore sequi impedit eius, tenetur minus neque aliquid placeat nam deserunt accusamus veritatis. Aut similique eligendi eos quae, mollitia earum consectetur, expedita odit sit omnis autem quasi natus id? Excepturi dolores tempore illo magni impedit natus quidem soluta, quasi pariatur deserunt a, cum.</p>

				<p><a href="#" class="show-more">Подробнее</a></p>

				<p class="show-more-content">Lmollitia quam velit rerum dolorum eum neque atque ut fuga accusantium odio, blanditiis ea. Voluptas nihil laborum, modi fugit repellat nesciunt molestias earum accusantium, fuga facilis consequuntur quod quaerat saepe? Nesciunt blanditiis id eaque voluptates explicabo, voluptate fugit quos maiores culp</p>
			</div>
				

		</aside>
	</div>


<?php include("_partials/footer.php") ?>