
			<a href="http://help.dnar.ru" target="_blank" class="btn btn-default scroll-top absolutely scroll-btn">Задать вопрос</a>
			<div class="scroll-top">
				<span class="scroll-top-item"><span class="glyphicon glyphicon-chevron-up"></span></span>
			</div>
		<?php if ($page_name == 'domains')  { ?>
			<div class="row payment-icons-row-wrapper">
				<div class="col-sm-12">
					<div class="payment-icons-row">
						<span class="payment-icons-row-desc">Принимаем к оплате</span>
						<span class="payment-icons-row-img">	
							<img src="dist/assets/img/payment/visa_logo.png" height="18px" alt="">
							<img src="dist/assets/img/payment/mastercard_logo.png" height="27px" alt="">
							<img src="dist/assets/img/payment/sberbank_logo.png" height="29px" alt="">
							<img src="dist/assets/img/payment/yandex-money.png" alt="">
							<img src="dist/assets/img/payment/webmoney.png" alt="">
							<img src="dist/assets/img/payment/qiwi.png" style="margin-top:2px;" alt="">
							<img src="dist/assets/img/payment/rbk_logo.png" height="29px" alt="">
							<img src="dist/assets/img/payment/bank-icon.png" height="29px" alt="">
						</span>	
						<span class="payment-icons-row-link"><a href="<?php echo BASE_URL; ?>/#payment">Все способы оплаты</a></span>
					</div>
				</div>
			</div>
		<?php } ?>
			<hr class="footer-line">

			<footer>
				<div class="">
					<p>&copy; 2008-<?php echo date('Y'); ?> Dnar.Ru<br>
					<img style="margin: -3px 2px 0px -3px; border: 0;" src="http://www.gemagency.ru/rubin.png" alt="Креативное агентство Джем" /><a href="http://www.gemagency.ru/" target="_blank">Проект креативного агентства Джем</a></p>
				</div>
				<div class="col-sm-9">
					<p class="">
					


					</p>
				</div>
			</footer>
		</div> <!-- /container -->

     <?php include(ROOT_PATH . '_partials/js.php') ?>

	</body>
</html>
