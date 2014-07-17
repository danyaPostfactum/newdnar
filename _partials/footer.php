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
		<?php if (isset($page_title) && $page_title == 'hostings') { ?>
		<script src="js/jquery.mixitup.min.js"></script>
		<script>
			$(function(){
				// Instantiate MixItUp:
				$('#Container').mixItUp();
			});
		</script>
		<?php } ?>
		<script src="js/whois.js"></script>
		<script>
			$('#mainTabs').find('a').click(function (e) {
			  e.preventDefault();
			  $(this).tab('show');
			})
		</script>
	</body>
</html>