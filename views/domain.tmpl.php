<?php 
	$title = 'Информация о доменном имени';
	$description = 'test1';
	$keywords = 'test2';
	include(ROOT_PATH . '_partials/header.php') 
?>
<?php if ($have_domain) { ?>
<div class="jumbotron <?php if ($page_title == 'domains') { echo 'jumbotron-brand'; } ?>">
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
			<?php if (isset($domains_info[$domain_name])) { ?>

				<h1>Доменная зона<br/> <?php echo $domains_info[$domain_name]['name']; ?></h1>
				<p><?php echo $domains_info[$domain_name]['description']; ?></p>

			<?php } else { ?>

				<h1>Описание доменной зоны не готово</h1>
				<p>Можешь этим заняться )</p>

			<?php } ?>

			</div>
		</div>
		
	</div>
</div>

<div class="container">
	<?php if (isset($domains_info[$domain_name])) { ?>
		<p><?php echo $domains_info[$domain_name]['description']; ?></p>
		<p><?php if ($domains_info[$domain_name]['restrictions'] === false) { echo 'Ограничения на регистрацию домена отсутствуют'; } ?></p>
	<?php } ?>
	
<?php } else { ?>

<div class="jumbotron <?php if ($page_title == 'domains') { echo 'jumbotron-brand'; } ?>">
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
				<h1>Доменная зона<br/> не найдена</h1>
			</div>
		</div>
		
	</div>
</div>

<div class="container">
	<p>No money, no domain.....</p>

<?php } ?>

<?php include("_partials/footer.php") ?>

