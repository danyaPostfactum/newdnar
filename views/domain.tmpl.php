<?php 
	$title = 'Информация о доменном имени';
	$description = 'test1';
	$keywords = 'test2';
	include(ROOT_PATH . '_partials/header.php') 
?>

<div class="jumbotron <?php if ($page_title == 'domains') { echo 'jumbotron-brand'; } ?>">
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
				<h1>Доменная зона<br/> <?php echo $domains_info[$domain_id]['name']; ?></h1>
				<p><?php echo $domains_info[$domain_id]['description']; ?></p>
			</div>
		</div>
		
	</div>
</div>

<div class="container">
	

<?php include("_partials/footer.php") ?>

