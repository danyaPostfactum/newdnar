<?php 
	$title = $resource->get('pagetitle') . ' / ' . 'Вопросы и ответы';
	$description = 'test1';
	$keywords = 'test2';
	include(ROOT_PATH . '_partials/header.php') 
?>

<div class="jumbotron">
	<div class="container">
		<div class="row">
            <div class="col-sm-8">
                <h1><?= $resource->get('pagetitle') ?></h1>
            </div>
            <div class="hidden-xs col-sm-4">
						<img src="<?php echo BASE_URL; ?>dist/assets/img/qanda.png" class="pull-right" alt="">
            </div>			
		</div>
		
	</div>
</div>

<div class="container justify">
<?= $resource->get('content') ?>


<?php include("_partials/footer.php") ?>

