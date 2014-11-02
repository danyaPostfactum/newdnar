
			<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="<?php echo BASE_URL; ?>js/jquery-1.11.1.min.js"><\/script>')</script>
		<script src="<?php echo BASE_URL; ?>js/bootstrap.min.js"></script>
		<script src="<?php echo BASE_URL; ?>js/handlebars-v1.3.0.js"></script>
		<script src="<?php echo BASE_URL; ?>js/punycode.min.js"></script>
		<script src="<?php echo BASE_URL; ?>js/dnar-ui-stuff.js"></script>
		<!-- <script src="js/jquery-ui-1.10.4.custom.min.js"></script> -->
		<?php if (isset($page_name) && $page_name == 'hostings') { ?>
			<script src="<?php echo BASE_URL; ?>js/jquery.mixitup.js"></script>
			<script src="<?php echo BASE_URL; ?>js/multi-dimensional-filter.js"></script>
			<script src="<?php echo BASE_URL; ?>js/hostings-filtering.js"></script>
		<?php } ?>

		<?php if (isset($page_name) && $page_name == 'domains') { ?>
		<script src="<?php echo BASE_URL; ?>js/whois.js"></script>
		<?php } ?>
		
		<?php if (isset($need_form) && $need_form) { ?>
			<script src="<?php echo BASE_URL; ?>js/sendform.js"></script>
			<!-- // <script src="js/dropzone.js"></script> -->
		<?php } ?>

		<?php if (isset($page_name) && $page_name == 'sadspy') { ?>
			<script src="<?php echo BASE_URL; ?>js/calc.js"></script>
		<?php } ?>

		<?php if (isset($page_name) && $page_name == 'check') { ?>
			<script src="<?php echo BASE_URL; ?>js/analyzer.js"></script>
		<?php } ?>

		<script type="text/javascript" src="//yandex.st/share/share.js"
		charset="utf-8"></script>
