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

<table class="support-table">
    <tr><th>Рекламные услуги</th></tr>
    <tr>
        <td><a href="<?php echo BASE_URL; ?>support/adspy"><img src="<?php echo BASE_URL; ?>dist/assets/img/support/adspy.png" alt="Анализ конкурентов"><br><br>Анализ конкурентов</a></td>
       	<td><a href="<?php echo BASE_URL; ?>support/ppc"><img src="<?php echo BASE_URL; ?>dist/assets/img/support/ppc.png" alt="Контекстная реклама"><br><br>Контекстная реклама</a></td>
        <td><a href="<?php echo BASE_URL; ?>support/seo"><img src="<?php echo BASE_URL; ?>dist/assets/img/support/seo.png" alt="Поисковая оптимизация и продвижение сайтов"><br><br>Поисковая оптимизация и продвижение сайтов</a></td>
        <td><a href="<?php echo BASE_URL; ?>support/usability"><img src="<?php echo BASE_URL; ?>dist/assets/img/support/usability.png" alt="Улучшение юзабилити (оптимизация навигации по сайту)"><br><br>Улучшение юзабилити (оптимизация навигации по сайту)</a></td>
    </tr>
    <tr><th>Техническая поддержка</th></tr>
    <tr>
       	<td><a href="<?php echo BASE_URL; ?>support/support"><img src="<?php echo BASE_URL; ?>dist/assets/img/support/support.png" alt="Поддержка сайтов"><br><br>Поддержка сайтов</a></td>
        <td><a href="<?php echo BASE_URL; ?>support/virus"><img src="<?php echo BASE_URL; ?>dist/assets/img/support/virus.png" alt="Удаление вирусов"><br><br>Удаление вирусов</a></td>
        <td><a href="<?php echo BASE_URL; ?>support/text"><img src="<?php echo BASE_URL; ?>dist/assets/img/support/text.png" alt="Написание текстов для сайта"><br><br>Написание текстов для сайта</a></td>
        <td></td>
    </tr>

</table>


<?php include("_partials/footer.php") ?>

