			<div class="scroll-top">
				<a href="http://help.dnar.ru" target="_blank" class="btn btn-default scroll-btn">Задать вопрос</a>
				<span class="scroll-top-item"><span class="glyphicon glyphicon-chevron-up"></span></span>
			</div>
			<hr class="footer-line">

			<footer>
				<div class="col-md-3">
					<p>&copy; 2008-2014 Dnar.Ru</p>
				</div>
				<div class="col-sm-9">
					<p class="payment-icons-row">
						<img src="dist/assets/img/payment/visa.png" alt="">
						<img src="dist/assets/img/payment/mastercard.png" alt="">
						<img src="dist/assets/img/payment/yandex-money.png" alt="">
						<img src="dist/assets/img/payment/webmoney.png" alt="">
						<img src="dist/assets/img/payment/robo.png" alt="">
						<img src="dist/assets/img/payment/qiwi.png" alt="">
						<img src="dist/assets/img/payment/paypal.png" alt="">
					</p>
				</div>
			</footer>
		</div> <!-- /container -->


		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/handlebars-v1.3.0.js"></script>
		<script src="js/punycode.min.js"></script>
		<!-- <script src="js/jquery-ui-1.10.4.custom.min.js"></script> -->
		<?php if (isset($page_name) && $page_name == 'hostings') { ?>
			<script src="js/jquery.mixitup.min.js"></script>
			<script>
				$(function(){
					// Instantiate MixItUp:
					$('#Container').mixItUp();
				});
			</script>
		<?php } ?>
		<script src="js/whois.js"></script>
		<?php if (isset($need_form) && $need_form) { ?>
			<script src="js/sendform.js"></script>
			<script src="js/dropzone.js"></script>
		<?php } ?>
		<script>
			$('#mainTabs').find('a').click(function (e) {
			  e.preventDefault();
			  $(this).tab('show');
			});

			// scroll-top
			(function() {
				var $scrollElement = $('.scroll-top-item');
				$(window).scroll(function () {
					if ($(this).scrollTop() > 100) {
						$scrollElement.fadeIn().css('display', 'inline-block');
					} else {
						$scrollElement.fadeOut();
					}
				});

				$scrollElement.click(function () {
					$("html, body").animate({
						scrollTop: 0
					}, 300);
					return false;
				});
			})();

			// Toggle payment information
			(function() {
				$('.payment-type-switch').find('input').on('click', function() {
					console.log('clicked');
					if ( $(this).is(":checked") ) {
						var showPayment = $(this).val();
						$(".payment-type").hide();
						$('#' + showPayment).show();	
					}
					
				});
			})();
		</script>
		<script type="text/javascript" src="//yandex.st/share/share.js"
		charset="utf-8"></script>
	</body>
</html>