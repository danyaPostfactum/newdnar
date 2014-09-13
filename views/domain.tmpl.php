<?php 
    if ($domains_info[$domain_name]['name'] == 'xn--p1ai') { 
        $domainname = 'рф'; 
    } 
    else { 
        $domainname = $domains_info[$domain_name]['name']; 
    };
	$title = 'Регистрация дешевых доменов в зоне .'. $domainname;
	$description = 'test1';
	$keywords = 'test2';
	include(ROOT_PATH . '_partials/header.php');
?>
<?php if ($have_domain) { ?>
<div class="jumbotron <?php if ($page_title == 'domains') { echo 'jumbotron-brand'; } ?>">
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
			<?php if (isset($domains_info[$domain_name])) { ?>

				<h1>Доменная зона .<?php echo $domainname; ?></h1>		
				

			<?php } else { ?>

				<h1>Описание доменной зоны не готово</h1>
				<p>Можешь этим заняться )</p>

			<?php } ?>

			</div>
		</div>
		
	</div>
</div>

<div class="container">
    <!--<div class="breadcrumb"><a href="<?php echo BASE_URL; ?>">Домены</a> / Доменная зона .<?php echo $domainname; ?></div>-->
	<?php if (isset($domains_info[$domain_name])) { ?>
    <p>
      <div class="domains-img"><img src="<?php echo BASE_URL; ?>dist/assets/img/domains/<?php echo $domains_info[$domain_name]['name']; ?>.png" alt="<?php echo $title; ?>" title="<?php echo $title; ?>"></div>
            
      <div class="domains-description"><?php echo $domains_info[$domain_name]['description']; ?></div>
            
      <div class="domains-cost"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#dnarLoginModal">Зарегистрировать за <?php
                    $tld = $domains_info[$domain_name]['name'];                               
                    echo $TLDprices[$tld]['price']; 
                    ?> руб.</button></div>
    </p>
		
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

