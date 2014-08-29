			<a href="http://help.dnar.ru" target="_blank" class="btn btn-default scroll-top absolutely scroll-btn">Задать вопрос</a>
			<div class="scroll-top">
				<span class="scroll-top-item"><span class="glyphicon glyphicon-chevron-up"></span></span>
			</div>
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


		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/handlebars-v1.3.0.js"></script>
		<script src="js/punycode.min.js"></script>
		<!-- <script src="js/jquery-ui-1.10.4.custom.min.js"></script> -->
		<?php if (isset($page_name) && $page_name == 'hostings') { ?>
			<script src="js/jquery.mixitup.js"></script>
			<script src="js/multi-dimensional-filter.js"></script>
			<script>
				$(function(){
					    
					// Initialize buttonFilter code
					dropdownFilter.init();
					// buttonFilter.init();
					// Instantiate MixItUp
					    
					// $('#Container').mixItUp();
					$('#Container').mixItUp({
					  controls: {
					    enable: false // we won't be needing these
					  },
					  // load: {
					  // 	filter: false
					  // },
					  callbacks: {
					    onMixFail: function(){
					      alert('No items were found matching the selected filters.');
					    }
					  }
					}); 

					$(".sort").on('click', function(e) {
						e.preventDefault();
						var $clicked = $(this);

						// $clicked.hasClass('active') ? $clicked.removeClass('active') : 
						$clicked.addClass('active').siblings('.sort').removeClass('active');

						var sortCategory = $clicked.data('sort');
						$('#Container').mixItUp('sort', sortCategory);
					});

					var $mix = $(".mix");
					var rangeFilter = function() {
						console.log('keyup!');
						var wrapper = $(this);
						var minValue = parseInt(wrapper.find(".lower-range").val(), 10) || 0;
						var maxValue = parseInt(wrapper.find(".upper-range").val(), 10) || 0;
						var filterName = wrapper.data().filtername;
						$.each($mix, function(index, element) {
							var elem = $(element);
							elem.show();
							if (parseInt(elem.data()[filterName], 10) < minValue) {
								elem.hide();
							} else {
								if (maxValue > minValue && parseInt(elem.data()[filterName], 10) > maxValue) {
									elem.hide();
								}
							}

						});
					};
					$(".range-filter").on('keyup', rangeFilter);
				});
			</script>
		<?php } ?>

		<?php if (isset($page_name) && $page_name == 'domains') { ?>
		<script src="js/whois.js"></script>
		<?php } ?>
		
		<?php if (isset($need_form) && $need_form) { ?>
			<script src="js/sendform.js"></script>
			<!-- // <script src="js/dropzone.js"></script> -->
		<?php } ?>
		<script>
			(function() {
				// tabs behavior (jquery-ui) ======================================
				$tabsNav = $('#mainTabs');
				var hash = window.location.hash;
				if (hash) {
					var $anchor = $tabsNav.find('a[href=' + hash + ']');
					$anchor.tab('show');
				}
				$tabsNav.find('a').click(function (e) {
				  // e.preventDefault();
				  var $tab = $(this);
				  // set window location
				  window.location.hash = $tab.attr('href');
				  console.log($tab.attr('href'));
				  $tab.tab('show');
				});
			})();

			(function() {
				// dynamic change on scroll events ================================
				var $scrollElement = $('.scroll-top-item');
				var $scrollQuestion = $('.scroll-btn');
				var $navbar = $("#navbar");
				var $jumbotron = $('.jumbotron')

				var navbarHeight = $navbar.height();
				var jumbotronHeight = $jumbotron.height() + parseInt($jumbotron.css('padding-top')) + parseInt($jumbotron.css('padding-bottom'));
				var scrollQuestionOffset = navbarHeight + jumbotronHeight + 120;
				$scrollQuestion.css({ 'top': scrollQuestionOffset });
				console.log('heights', navbarHeight, jumbotronHeight);

				$(window).scroll(function () {
					var windowEl = $(this);
					if (windowEl.scrollTop() > 50) {
						$navbar.addClass('lower-shadow');
					} else {
						$navbar.removeClass('lower-shadow');
					}
					if (windowEl.scrollTop() > 100) {
						$scrollElement.fadeIn().css('display', 'inline-block');
					} else {
						$scrollElement.fadeOut();
					}

					if (windowEl.scrollTop() > 70) {
						$scrollQuestion.removeClass('absolutely').css({'bottom': 100, "top": ""});
					} else {
						$scrollQuestion.addClass('absolutely').css({ 'top': scrollQuestionOffset, "bottom": "" });
					}
				});

				$scrollElement.click(function () {
					$("html, body").animate({
						scrollTop: 0
					}, 300);
					return false;
				});

				// Toggle payment information ====================================
				$('.payment-type-switch').find('input').on('click', function() {
					console.log('clicked');
					if ( $(this).is(":checked") ) {
						var showPayment = $(this).val();
						$(".payment-type").hide();
						$('#' + showPayment).show();	
					}
					
				});

				// position modal to be vertically centered ======================
				$("button[data-toggle='modal']").on('click', function() {
					var $modal = $(".modal-dialog");
					var winHeight = ($(window).height());
					var offsetDist = (winHeight / 2) - 180; // 180 is approximately half the height of the modal
					offsetDist = (offsetDist < 10) ? 20 : offsetDist;
					$modal.css({
						'margin-top': offsetDist,
						'margin-left': 'auto',
						'margin-right': 'auto'
					});
					console.log('opening modal');
				});

				// show-more links ===============================================
				$(".show-more").on('click', function(e) {
					e.preventDefault();
					$(this).parent().next().slideToggle('fast');
				});
			})();
		</script>
		<script type="text/javascript" src="//yandex.st/share/share.js"
		charset="utf-8"></script>
	</body>
</html>
