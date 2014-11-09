			<a href="http://help.dnar.ru" target="_blank" class="btn btn-default scroll-top absolutely scroll-btn">Задать вопрос</a>
			<div class="scroll-top">
				<span class="scroll-top-item"><span class="glyphicon glyphicon-chevron-up"></span></span>
			</div>
		<?php if ($page_name == 'domains' or $page_name == 'dhost' or $page_name == 'domains_info')  { ?>

			<div class="row payment-icons-row-wrapper">
				<div class="col-sm-12">
					<div class="payment-icons-row">
						<div class="col-sm-3">
							<p class="payment-icons-row-desc">Принимаем к оплате</p>
						</div>
						<div class="col-sm-6">
							<p class="payment-icons-row-img row-justified">	
								<a class="justified-item" href="#"><img src="<?php echo BASE_URL; ?>dist/assets/img/payment/visa_logo2.png" alt="Visa" title="Visa"></a>
								<a class="justified-item" href="#"><img src="<?php echo BASE_URL; ?>dist/assets/img/payment/mastercard_logo2.png" alt="MasterCard" title="MasterCard"></a>
								<a class="justified-item" href="#"><img src="<?php echo BASE_URL; ?>dist/assets/img/payment/sberbank_logo2.png" alt="Сбербанк" title="Сбербанк"></a>
								<a class="justified-item" href="https://money.yandex.ru" target="_blank" rel="nofollow"><img src="<?php echo BASE_URL; ?>dist/assets/img/payment/yandex-money.png" alt="Я принимаю Яндекс.Деньги" title="Я принимаю Яндекс.Деньги"></a>
								<a class="justified-item" href="http://www.megastock.ru/" target="_blank" rel="nofollow"><img src="<?php echo BASE_URL; ?>dist/assets/img/payment/webmoney.png" alt="WebMoney" title="WebMoney"></a>
								<a class="justified-item" href=""><img src="<?php echo BASE_URL; ?>dist/assets/img/payment/qiwi.png" style="margin-top:2px;" alt="Qiwi" title="Qiwi"></a>
								<a class="justified-item" href=""><img src="<?php echo BASE_URL; ?>dist/assets/img/payment/rbk_logo2.png" alt="RBK Money" title="RBK Money"></a>
								<a class="justified-item" href=""><img src="<?php echo BASE_URL; ?>dist/assets/img/payment/bank-icon2.png" alt="Безналичный расчет" title="Безналичный расчет"></a>
							</p>	
						</div>
						<div class="col-sm-3">
							<p class="payment-icons-row-desc payment-icons-row-link"><a href="../#payment">Все способы оплаты</a></p>	
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		
		
		
			<hr class="footer-line">

			<footer>
				<div class="col-sm-6">
					<p>&copy; 2008-<?php echo date('Y'); ?> Dnar.Ru<br>
					<img style="margin: -3px 2px 0px -3px; border: 0;" src="http://www.gemagency.ru/rubin.png" alt="Креативное агентство Джем" /><a href="http://www.gemagency.ru/" target="_blank">Проект креативного агентства Джем</a></p>
				</div>
				<div class="col-sm-6">
					<p style="float:right;">
                        <a href="<?php echo BASE_URL; ?>offer">Публичная оферта</a><br>
                        <a href="<?php echo BASE_URL; ?>map">Карта сайта</a>
					</p>
				</div>
			</footer>
		</div> <!-- /container -->

     <?php include(ROOT_PATH . '_partials/js.php') ?>
     
     
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter22284320 = new Ya.Metrika({id:22284320,
                    webvisor:true,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true});
        } catch(e) { }
    });

    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f, false);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/22284320" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
     

	</body>
</html>
