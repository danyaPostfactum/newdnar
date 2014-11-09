<?php 
	$title = 'Поддержка сайтов';
	$description = 'test1';
	$keywords = 'test2';
	include(ROOT_PATH . '_partials/header.php') 
?>

<div class="jumbotron <?php if ($page_title == 'domains') { echo 'jumbotron-brand'; } ?>">
	<div class="container">
		<div class="row">		
			<div class="col-sm-8">
				<h1>Поддержка сайтов</h1>
				<p>При заказе любой из услуг - продление домена обслуживающегося у нас - бесплатно!</p>
			</div>
			<div class="hidden-xs col-sm-4">
						<img src="<?php echo BASE_URL; ?>dist/assets/img/support.png" class="pull-right" alt="">
			</div>
		</div>
		
	</div>
</div>

<div class="container">

	<h2>Рекламные услуги</h2>
	<div class="row">
		<div class="col-sm-3 col-xs-6">
			<div class="thumbnail support-link-item">
				<a href="<?php echo BASE_URL; ?>support/adspy">
					<img src="<?php echo BASE_URL; ?>dist/assets/img/support/adspy.png" alt="Анализ конкурентов">
					<div class="caption">
						<p>Анализ конкурентов</p>
					</div>
				</a>
			</div>
		</div>
		<div class="col-sm-3 col-xs-6">
			<div class="thumbnail support-link-item">
				<a href="<?php echo BASE_URL; ?>support/ppc">
					<img src="<?php echo BASE_URL; ?>dist/assets/img/support/ppc.png" alt="Контекстная реклама">
					<div class="caption">
						<p>Контекстная реклама</p>
					</div>
				</a>
			</div>
		</div>
		<div class="col-sm-3 col-xs-6">
			<div class="thumbnail support-link-item">
				<a href="<?php echo BASE_URL; ?>support/seo">
					<img src="<?php echo BASE_URL; ?>dist/assets/img/support/seo.png" alt="Поисковая оптимизация и продвижение сайтов">
					<div class="caption">
						<p>Поисковая оптимизация и продвижение сайтов</p>
					</div>
				</a>
			</div>
		</div>
		<!--<div class="col-sm-3 col-xs-6">
			<div class="thumbnail support-link-item">
				<a href="<?php echo BASE_URL; ?>support/usability">
					<img src="<?php echo BASE_URL; ?>dist/assets/img/support/usability.png" alt="Улучшение юзабилити (оптимизация навигации по сайту)">
					<div class="caption">
						<p>Улучшение юзабилити (оптимизация навигации по сайту)</p>
					</div>
				</a>
			</div>
		</div>-->
	</div>

	<div class="row">
		<h2>Техническая поддержка</h2>
		<div class="col-sm-3 col-xs-6">
			<div class="thumbnail support-link-item">
				<a href="<?php echo BASE_URL; ?>support/support">
					<img src="<?php echo BASE_URL; ?>dist/assets/img/support/support.png" alt="Поддержка сайтов">
					<div class="caption">
						<p>Поддержка и сопровождение сайтов</p>
					</div>
				</a>
			</div>
		</div>
			
		<div class="col-sm-3 col-xs-6">
			<div class="thumbnail support-link-item">
				<a href="<?php echo BASE_URL; ?>support/virus">
					<img src="<?php echo BASE_URL; ?>dist/assets/img/support/virus.png" alt="Удаление вирусов">
					<div class="caption">
						<p>Поиск и удаление вирусов на сайте</p>
					</div>
				</a>
			</div>
		</div>


	</div>

	<div class="row">
		<h2>Разработка</h2>
		<div class="col-sm-3 col-xs-6">
			<div class="thumbnail support-link-item">
				<a href="<?php echo BASE_URL; ?>support/site">
					<img src="<?php echo BASE_URL; ?>dist/assets/img/support/site.png" alt="Разработка сайта">
					<div class="caption">
						<p>Разработка сайта</p>
					</div>
				</a>
			</div>
		</div>	
    </div>

<?php include(ROOT_PATH . "_partials/footer.php") ?>

