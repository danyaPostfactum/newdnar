
			<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/jquery-1.11.1.min.js"><\/script>')</script>
		<script src="<?php echo BASE_URL; ?>js/bootstrap.min.js"></script>
		<script src="<?php echo BASE_URL; ?>js/handlebars-v1.3.0.js"></script>
		<script src="<?php echo BASE_URL; ?>js/punycode.min.js"></script>
		<script src="<?php echo BASE_URL; ?>js/dnar-ui-stuff.js"></script>
		<!-- <script src="js/jquery-ui-1.10.4.custom.min.js"></script> -->
		<?php if (isset($page_name) && $page_name == 'hostings') { ?>
			<script src="<?php echo BASE_URL; ?>js/jquery.mixitup.js"></script>
			<script src="<?php echo BASE_URL; ?>js/multi-dimensional-filter.js"></script>
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
						  alert('Ничего не найдено. Попробуйте изменить параметры.');
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
		<script src="<?php echo BASE_URL; ?>js/whois.js"></script>
		<?php } ?>
		
		<?php if (isset($need_form) && $need_form) { ?>
			<script src="<?php echo BASE_URL; ?>js/sendform.js"></script>
			<!-- // <script src="js/dropzone.js"></script> -->
		<?php } ?>
		<?php if (isset($need_calc)) { ?>

			<script src="<?php echo BASE_URL; ?>js/calc.js"></script>

		<?php } ?>
		<script type="text/javascript" src="//yandex.st/share/share.js"
		charset="utf-8"></script>
