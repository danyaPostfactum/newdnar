<?php 
	$title = 'Вопросы и ответы';
	$description = 'test1';
	$keywords = 'test2';
	include(ROOT_PATH . '_partials/header.php') 
?>

<div class="jumbotron">
	<div class="container">
		<div class="row">
            <div class="col-sm-7">
                <h1>Гарант сделок</h1>
				<p>Можешь этим заняться )</p>
            </div>
            <div class="hidden-xs col-sm-5">
						<img src="<?php echo BASE_URL; ?>dist/assets/img/garant.png" class="pull-right" alt="">
            </div>			
		</div>
		
	</div>
</div>

<div class="container">
<?= $resource->get('content') ?>


<?php include("_partials/footer.php") ?>

