<?php 
	$title = '404 - Страница не найдера';
	$description = 'test1';
	$keywords = 'test2';
	include(ROOT_PATH . '_partials/header.php') 
?>

<div class="jumbotron">
	<div class="container">
		<div class="row">
            <div class="col-sm-8">
                <h1>404 ошибка</h1>
				<p>Cтраница не существует</p>
            </div>
            <div class="hidden-xs col-sm-4">
						<img src="<?php echo BASE_URL; ?>dist/assets/img/404.png" class="pull-right" width="200px" height="200px" alt="404 ошибка">
            </div>			
		</div>
		
	</div>
</div>

<div class="container">
	
<ul>
   	<li <?php if ($page_name == 'domains') { ?>class="active"<?php } ?>><a href="<?php echo BASE_URL; ?>">Домены</a></li>
    <li <?php if ($page_name == 'ssl') { ?>class="active"<?php } ?>><a href="<?php echo BASE_URL; ?>ssl">SSL сертификаты</a></li>
    <li <?php if ($page_name == 'hostings') { ?>class="active"<?php } ?>><a href="<?php echo BASE_URL; ?>hostings">Хостинги</a></li>
    <li <?php if ($page_name == 'analyze') { ?>class="active"<?php } ?>><a href="<?php echo BASE_URL; ?>check">Анализ сайтов</a></li>
    <li <?php if ($page_name == 'garant') { ?>class="active"<?php } ?>><a href="<?php echo BASE_URL; ?>garant">Гарант сделок</a></li>
    <li <?php if ($page_name == 'support') { ?>class="active"<?php } ?>><a href="<?php echo BASE_URL; ?>support">Поддержка сайтов</a></li>
   
</ul>
	


<?php include("_partials/footer.php") ?>

