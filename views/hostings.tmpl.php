<?php
	$title = 'Подбор выгодного хостинга';
	$description = 'test1';
	$keywords = 'test2';
	include(ROOT_PATH . '_partials/header.php') 
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
			<a class="sort" href="#" data-sort="domainamount:desc">Количеству сайтов</a>
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
							filter-not-outofrange
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

				<form id="Filters">
					<section class="card-wrapper settings-card range-filter" data-filtername="priceorder">
						<h4 class="order-settings-header">Ежемесячная плата</h4>
						<p class="range-line">
							от <input class="interval-input lower-range" type="text"> до
							<input class="interval-input upper-range" type="text"> <i class="icon-ruble"></i>
						</p>
					</section>
					<section class="card-wrapper settings-card range-filter" data-filtername="webspace">
						<h4 class="order-settings-header">Дисковое пространство</h4>
						<p class="range-line">
							от <input class="interval-input lower-range" type="text"> до
							<input class="interval-input upper-range" type="text"> Гб
						</p>
					</section>
					<section class="card-wrapper settings-card range-filter" data-filtername="domainamount">
						<h4 class="order-settings-header">Количество сайтов</h4>
						<p class="range-line">
							от <input class="interval-input lower-range" type="text"> до
							<input class="interval-input upper-range" type="text"> шт.
						</p>
					</section>
					<section class="card-wrapper settings-card range-filter" data-filtername="databases">
						<h4 class="order-settings-header">Количество баз данных</h4>
						<p class="range-line">
							от <input class="interval-input lower-range" type="text"> до
							<input class="interval-input upper-range" type="text"> шт.
						</p>
					</section>


					<?php foreach (array(
										 // 'ddos_safe' => 'Защита от DDOS', 
										 'test_period' => "Наличие тестового периода", 
										 'scripts_available' => "Скрипты php/perl/python") as $filter_key => $filter_name) { ?>
					<fieldset class="card-wrapper settings-card">
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
					<strong>Выбор хостинга в 7 простых шагов</strong><br><br>
					Чтобы выбрать оптимальный хостинг достаточно последовательно заполнить 7 полей:
				</p>
				<ol class="aligned-list advice-list">
					<li><strong>Цена</strong> – устанавливаем ежемесячный бюджет на хостинг.</li>
					<li><strong>Место на диске</strong> – выбираем максимальный объем хранимой информации. Всегда берите с запасом!</li>
					<li><strong>Количество сайтов</strong> – устанавливаем необходимое количество сайтов.  Не забывайте о возможности открытия новых проектов.</li>
					<li><strong>Количество БД</strong> – в зависимости от специфики ресурсов выбираем количество необходимых баз данных.</li>
					<li><strong>Тестовый период</strong> – многие провайдеры предоставляют 7 и более дней "на пробу" – отличный способ проверить качество услуг.</li>
					<li><strong>Скрипты</strong> – отсутствие их поддержки снижает стоимость, но не один серьезный проект не сможет без них функционировать.</li>
					<li><strong>Операционная система</strong> – Unix = PHP+MySQL, Windows = ASP+MS SQL.</li>
				</ol>
				<p><a href="#" class="show-more">7 признаков надежного хостинга</a></p>

				<div class="show-more-content">
					<ul class="aligned-list">
						<li>Открытая информация о стране, в которой зарегистрирована компания. Наличие лицензии.</li>
						<li>Информативный сайт с нешаблонным дизайном.</li>
						<li>Положительные отзывы со стороны реальных клиентов.</li>
						<li>Наличие offline-офиса и support'a по телефону.</li>
						<li>Большое количество способов оплаты.</li>
						<li>Наличие тестового периода.</li>
						<li>Система скидок для постоянных клиентов.</li>
					</ul>
				</div>

			</div>

		</aside>
	</div>


<?php include("_partials/footer.php") ?>