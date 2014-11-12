<?php 
	$title = 'Карта сайта';
	$description = 'test1';
	$keywords = 'test2';
	include(ROOT_PATH . '_partials/header.php') 
?>

<div class="jumbotron">
	<div class="container">
		<div class="row">
            <div class="col-sm-8">
                <h1>Карта сайта</h1>
				<p></p>
            </div>
            <div class="hidden-xs col-sm-4">
						<img src="<?php echo BASE_URL; ?>dist/assets/img/map.png" class="pull-right" width="200px" height="200px" alt="Карта сайта">
            </div>			
		</div>
		
	</div>
</div>

<div class="container">
	
<ul>
   	<li <?php if ($page_name == 'domains') { ?>class="active"<?php } ?>><a href="<?php echo BASE_URL; ?>">Домены</a></li>
    <!--<li <?php if ($page_name == 'ssl') { ?>class="active"<?php } ?>><a href="<?php echo BASE_URL; ?>ssl">SSL сертификаты</a></li>-->
    <li <?php if ($page_name == 'hostings') { ?>class="active"<?php } ?>><a href="<?php echo BASE_URL; ?>hostings">Подбор хостинга</a></li>
    <li <?php if ($page_name == 'analyze') { ?>class="active"<?php } ?>><a href="<?php echo BASE_URL; ?>check">Анализ сайтов</a></li>
    <li <?php if ($page_name == 'garant') { ?>class="active"<?php } ?>><a href="<?php echo BASE_URL; ?>garant">Гарант сделок</a></li>
    <li <?php if ($page_name == 'support') { ?>class="active"<?php } ?>><a href="<?php echo BASE_URL; ?>support">Поддержка сайтов</a></li>
        <ul>
           <li><a href="<?php echo BASE_URL; ?>support/adspy">Анализ конкурентов</a></li>
           <li><a href="<?php echo BASE_URL; ?>support/ppc">Контекстная реклама</a></li>
           <li><a href="<?php echo BASE_URL; ?>support/seo">Поисковая оптимизация и продвижение сайтов</a></li>
           <li><a href="<?php echo BASE_URL; ?>support/support">Поддержка и сопровождение сайтов</a></li>
           <li><a href="<?php echo BASE_URL; ?>support/virus">Поиск и удаление вирусов на сайте</a></li>
           <li><a href="<?php echo BASE_URL; ?>support/site">Разработка сайта</a></li>
           
        </ul>
        


        
</ul>
	


<?php include(ROOT_PATH . "_partials/footer.php") ?>
