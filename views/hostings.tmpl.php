<?php
	$title = 'Подбор выгодного хостинга';
	$description = 'test1';
	$keywords = 'test2';
 	include(ROOT_PATH . '_partials/header.php') 
?>

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

<div class="jumbotron <?php if ($page_title == 'domains') { echo 'jumbotron-brand'; } ?>">
	<div class="container">
		<div class="row">
			<div class="col-sm-8">
                <h1>Подбор лучшего хостинга</h1>
				<p>Наш сервис создан для сравнения тарифных планов хостинговых компаний под ваши нужды, что призвано помочь вам сократить время на поиск подходящего варианта, а также сэкономить деньги.</p>
            </div>
            <div class="hidden-xs col-sm-4">
						<img src="<?php echo BASE_URL; ?>dist/assets/img/hostings.png" class="pull-right" alt="">
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
							data-databases='<?php echo is_infinite($databases_amount) ? 'Infinity' : $databases_amount; ?>'>
					<!-- <div class="col-sm-3">
						<h3 class="hoster-name"><a href="<?php echo $hoster_url; ?>"><?php echo $hoster_name; ?></a></h3>
					</div> -->
					<div class="row">
						<div class="col-sm-12">
							<h4 class="tarif-name">
								<img class="hoster-icon" src="<?php echo BASE_URL; ?><?php echo $hoster_img; ?>" alt="">
								
								<a href="<?php echo BASE_URL; ?>go.php?<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'/'.$tarif_url; ?>" target="_blank" rel="nofollow"><?php echo $tarif_name; ?></a>
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
											<td><?php echo $webspace === 0 ? 'Нет' : (is_infinite($webspace) ? '∞' : $webspace) ?> Gb</td>
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
											<td><?php echo $domain_amount === 0 ? 'Нет' : (is_infinite($domain_amount) ? '∞' : $domain_amount) ?></td>
										</tr>
										<tr class="tarif-spec-item <?php if ( $databases_amount === 0 ) { echo "unavailable"; } ?>">
											<td>Количество баз:</td>
											<td><?php echo $databases_amount === 0 ? 'Нет' : (is_infinite($databases_amount) ? '∞' : $databases_amount) ?></td>
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


				<form id="Filters" class="">
					<?php foreach (array(
										 // 'ddos_safe' => 'Защита от DDOS', 
										 'test_period' => "Наличие тестового периода", 
										 'scripts_available' => "Скрипты php/perl/python") as $filter_key => $filter_name) { ?>
				    <fieldset class="card-wrapper settings-card range-filter">
							<h4 class="order-settings-header"><?php echo $filter_name; ?></h4>
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
                

					<fieldset class="card-wrapper settings-card">
						<h4 class="order-settings-header">Операционная система</h4>
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
				<p>
				Сначала описание фильтра с его возможностями<br><br>
				Далее приемущества
				
				10 признаков качественного хостинга:

1. Наличие лицензии на предоставление услуг хостинга (телематические услуги связи).

2. Наличие реального оффлайнового офиса.

3. Техническая поддержка по телефону.

4. Наличие бесплатного тестового периода.

5. Тарифные планы с адекватной ценой и характеристиками.

6. Удобная и функциональная панель управления.

7. Наличие среди клиентов крупных ресурсов и компаний.

8. Качественный нешаблонный дизайн сайта компании.

9. Широкий выбор методов оплаты.

10. Бонусы и скидки при долговременной оплате.
				
				<br><br>
				Воспользуйтесь специальным фильтром - это удобно!
				<br><br>
				Доступ абсолютно бесплатен, в сравнительные таблицы добавлены основные характеристики и по стоимости, и по производительности! В Интернете сегодня множество актуальных предложений от хостинговых компаний, и, когда необходимо разместить свой ресурс в Сети, важно выбрать оптимальное предложение с сочетанием высокого качества предоставляемых услуг и демократичной стоимостью.</p>

				<p><a href="#" class="show-more">Подробнее</a></p>

				<p class="show-more-content">Что можно сделать?
1. Можно лично организовать поиск информации, самостоятельно сравнивать и анализировать – тем не менее, на это вы потратите приличное количество времени. 
2. Можно просто выбрать первого попавшегося «хостера» - но всегда есть риск, что он не должным образом выполняет свои обязанности перед клиентами. 
3. А можно воспользоваться на 100% бесплатным сервисом по сравнению хостинговых компаний на нашем web-сайте. Это позволит решить все рабочие задачи в максимально сжатые сроки, плюс, получить «фору» в плане экономии, так как у некоторых компаний тарифы различаются значительно без существенной разницы в наборе оказываемых услуг и в уровне сервиса. 
Как выбрать хостинг-компанию?
Стоит ли обращать внимание только на стоимость? Однозначно, нет, есть и набор других, не менее важных, параметров, которые для веб-мастера жизненно необходимы.
Именно поэтому в сравнительных таблицах мы предлагаем вниманию пользователей не только тарифы, но и такие характеристики, как:
Дисковое пространство.
Максимальное количество сайтов и доменов на аккаунте.
Трафик.
Базы MySQL.
Наличие бесплатного тестового периода.
Суппорт и так далее.
Число довольных клиентов и их отзывов и так далее.
Ваш рабочий инструмент!
</p>
			</div>
				

		</aside>
	</div>


<?php include("_partials/footer.php") ?>