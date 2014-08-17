<?php
	$title = 'Регистрация доменных имен';
	$description = 'test1';
	$keywords = 'test2';
 	include(ROOT_PATH . '_partials/header.php') 
?>

		<!-- Main jumbotron for a primary marketing message or call to action -->
		<div class="jumbotron <?php if ($page_name == 'domains') { echo 'jumbotron-brand'; } ?>">
			<div class="container">
				<div class="row">
					<div class="col-sm-7">
						<h1>Регистрация<br/> доменных имен</h1>
						<p>Мы работаем уже более 6 лет. За это время 6 500 клиентов зарегистрировали более 20 000 доменов. Мы предоставляем самые низкие цены на покупку и продление доменов, более 40 способов оплаты, в том числе безналичный расчет для юридических лиц.</p>
						<p><a class="btn btn-primary" role="button" href="http://domain.dnar.ru/OFFERTA/offerta_add_select_type.khtml">Зарегистрироваться</a></p>
					</div>
					<div class="hidden-xs col-sm-5">
						<img src="dist/assets/img/earth_rocket.png"class="pull-right" alt="">
					</div>
				</div>
				
			</div>
		</div>

		<div class="container">
			<!-- Example row of columns -->
			<div class="row tabs-wrapper">
				<nav class="col-sm-12">
					<ul class="nav nav-pills nav-justified" id="mainTabs">
					  <li class="active"><a href="#tabs-1" role="tab" data-toggle="tab">Поиск и проверка домена</a></li>
					  <li><a href="#tabs-2" role="tab" data-toggle="tab">Как оплатить</a></li>
					  <li><a href="#tabs-3" role="tab" data-toggle="tab">Вопросы и ответы</a></li>
					  <li><a href="#tabs-4" role="tab" data-toggle="tab">Почему DNAR</a></li>
					  <li><a href="#tabs-5" role="tab" data-toggle="tab">Перенести домен к нам</a></li>
					</ul>
				</nav>
			</div>
			
			<div id="mainTabsContent" class="main-tab-content">
				<article id="tabs-1" class="tab-pane active">
					<div class="row search-stuff-wrapper">
						<div class="col-sm-12" id="searchWhoisWrapper">
							<form action="index.php" method="GET" id="checkDomainForm" class="domain-form-wrapper">
								<div class="input-group domain-search">
									<input type="text" name="q" placeholder="Введите название домена"
										   value="<?php if ( isset($search_value) ) { echo htmlspecialchars($search_value); } ?>" 
										   class="form-control main-search-input" id="domainSearch" />
									<span class="input-group-btn">

										<button type="submit" class="btn btn-search progress-button" data-style="bottom-line" data-horizontal id="checkDomainBtn">
											<span class="glyphicon glyphicon-search"></span>
										</button>

										<!-- <button class="btn btn-primary main-search-btn" type="button">Go!</button> -->
									</span>
								</div><!-- /input-group -->
							</form>
							<div class="row tld-cards">
								<script type='text/template' id="error-template">
									<div class="col-sm-6 error-holder"></div>
								</script>
								<!-- wrapper while loading domain -->
								<script type="text/x-handlebars-template" id="tld-wrapper-template">
									{{#each domains}}
									<div class="col-sm-6" id="tld-{{this}}"> 
										<ul class="list-group">
											<li class="list-group-item domain-item">
												<div style="float: left; margin-bottom: 15px; margin-right: 20px;">
												  <div class="loading-ball"></div>
												  <div class="loading-ball1"></div>
											    </div>
											  	<p>Загрузка <b>{{../name}}.{{this}}</b></p>
											</li>
										</ul>
									</div>
									{{/each}}
								</script>	
								<!-- domain ready display -->			
								<script type="text/x-handlebars-template" id="tld-card-template">
									<ul class="list-group">
										{{#if_free regrinfo.registered}}
										<li class="list-group-item domain-item domain-item-free">
											<strong>{{parseRf regrinfo.domain.name}}</strong>
											<span class="domain-item-price pull-right">{{domain_price}} руб.</span>
										{{else}}
										<li class="list-group-item domain-item domain-item-taken">
											<strong>{{parseRf regrinfo.domain.name}}</strong>
										{{/if_free}}
											<p>
												{{#if_free regrinfo.registered}}
													Свободен   <span style="float:right;"><a href="#" data-toggle="modal" data-target="#dnarLoginModal">Зарегистрировать</a></span>
												{{else}}
													Занят    <span style="float:right;"><a href="#" class="more-whois-info">Подробнее</a></span>
													<div class="more-whois-content">
														{{#if regyinfo.referrer}}
														<ul>
															<li>Referrer: {{regyinfo.referrer}}</li>
															<li>Registrar: {{regyinfo.registrar}}</li>
														</ul>
														{{else}}
														<ul>
															<li>Не удалось получить точную информацию</li>
														</ul>
														{{/if}}
													</div>
												{{/if_free}}
											</p>
										</li>
									</ul>
								</script>
							</div>
							<?php if ( isset($search_value) ) { ?>
								<?php if ( !empty($domain_error_message) ) { ?>
									<span class="help-block"><?php echo "err: " . $domain_error_message; ?></span>
								<?php } else { ?>
									<div class="row">
										<?php if ( isset($domainQueryArray) ) { 
											if ( $domainQueryArray["TLDisset"] ) {
												$whois = getDomainInfo($domainQueryArray["domain_name"] . $domainQueryArray["TLD"]); 
												echo echoWhoisHtmlSpecs($whois);
											} else {
												$everyWhois = getAllDomains($domainQueryArray["domain_name"]);
												$index = 0;
												foreach ($everyWhois as $one_whois) {
													$index = $index + 1;
													echo echoWhoisHtmlSpecs($one_whois);
													if ($index % 4 == 0) {
														echo "</div><div class='row'>";
													}
												}
											}
										}?>

									</div>
								<?php } ?>
							<?php } ?>
						</div>
					</div>

					<section class="main-section row" class="results-block">
						<div class="col-md-12 center-block">


							<div class="row">
								<div class="col-md-12">
									<h3 class="pricetable-heading">
										Тарифы 
										<div class="yashare-auto-init yandex-sharing-icons-row" data-yashareL10n="ru" 
																	   data-yashareQuickServices="yaru,vkontakte,facebook,twitter,gplus" 
																	   data-yashareTheme="counter"
																	   data-yasharetype="small"></div>
									</h3>
								</div>
							</div>

							<div class="show-more-content show-more-content-prices">
								<!-- pricelist "table" -->
								<div class="row">
									<?php 
									$index = 0;
									foreach ($TLDnames as $smth) { 
										if ($index % 4 == 0) { ?>
											<div class="col-md-2 col-sm-4 price-list-column">
											<?php foreach ( array_slice($TLDnames, $index, 4) as $tld ) { ?>
												<section class="price-list-item">
													<h4 style="display: inline-block;"><a class="price_tld" href="#">.<?php if ($tld == 'xn--p1ai') { echo 'рф'; } else { echo $tld; } ?></a></h4>
													<h4 class="price-list-price pull-right"><?php echo $TLDprices[$tld]['price']; ?> руб.</h4>
												</section>
											<?php } ?>
											</div>
										<?php } $index += 1; 
									} ?>
								</div>

							</div>

							<div class="row registration-rules heading-section">
								<div class="col-sm-6">
									<figure class="square-featurette">
										<span class="big-feature-icon"><span class="icon-ruble"></span></span>
										<h3 class="featurette-heading">Лучшие цены</h3>
										<p class="square-featurette-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit nulla veritatis aliquid dolor, impedit magnam.</p>
									</figure>
									<figure class="square-featurette">
										<span class="big-feature-icon"><span class="glyphicon glyphicon-tower"></span></span>
										<h3 class="featurette-heading">Надежно</h3>
										<p class="square-featurette-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit nulla veritatis aliquid dolor, impedit magnam.</p>
									</figure>

								</div>
								<div class="col-sm-6">
									<h3>Правила регистрации доменов</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea nihil eaque, a! Nobis architecto veritatis, harum asperiores ab soluta ducimus nemo est eius fugiat, adipisci ullam expedita totam nesciunt dolorum modi, fuga molestiae et repudiandae voluptatibus. Maxime voluptas, laudantium illum non, perspiciatis repellendus voluptatem ad dolorem ut a assumenda in voluptates</p>
									<p>Neque eaque repudiandae cupiditate quae eius fuga atque deserunt excepturi numquam recusandae! Doloribus consequatur voluptates, corrupti nam itaque autem in, totam, sint exercitationem, reiciendis ipsa obcaecati! Reprehenderit deleniti, aperiam! Numquam qui deserunt et quia.</p>
									<p><a href="#">Подробнее</a></p>
								</div>
							</div>
							

						</div>
						
					</section>
				</article>

				<?php include('views/partial_views/index.how-to-pay.php'); ?>
				<?php include('views/partial_views/index.q-and-a.php'); ?>
				<?php include('views/partial_views/index.advantages.php'); ?>
				<?php include('views/partial_views/index.move-domains.php'); ?>
			</div>


<?php include(ROOT_PATH . '_partials/footer.php') ?>