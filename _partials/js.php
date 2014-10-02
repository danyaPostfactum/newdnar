
			<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="<?php echo BASE_URL; ?>js/bootstrap.min.js"></script>
		<script src="<?php echo BASE_URL; ?>js/handlebars-v1.3.0.js"></script>
		<script src="<?php echo BASE_URL; ?>js/punycode.min.js"></script>
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
<script>
	// polifyll for input[form=abc]
	$("#orderForm").submit(function() {
		var form = this;
		var $external = $('[form=' + this.name + ']');
		$external.each(function() {
			if (this.type == 'checkbox' && !this.checked)
				return;
			var atts = {type: hidden, name: this.name, value: this.value};
			$('<input>', atts).appendTo(form);
		});
	});

	$(".increase").on('click', function() {
		var clicked = $(this);
		var numericInput = clicked.closest('div').find("input");
		var currentInputVal = parseInt(numericInput.val());
		if (isNaN(currentInputVal)) {
			currentInputVal = 1;
		}
		if (clicked.attr("class").indexOf("arrow-up") != -1) {
			numericInput.val(currentInputVal + 1);
		} else {
			numericInput.val(currentInputVal - 1);
		}
		if (parseInt(numericInput.val()) < 1) {
			numericInput.val(0);
		}
		compAmount.trigger('keyup');
	});

	var minPrice = "undefined";
	var defaultPrice = 1500; // цена по умолчанию
	var defaultDiscount = 0.5; // скидка по умолчанию (50%)

	var minPrice = 5000; // Минимальная цена, эту строчку можно закомментировать, чтобы её отключить



	var compAmount = $("#compAmount");

	var prices = {};
	$("#servicesCalc").find('.chk-inline').each(function() {
		var $this = $(this);
		var $service = $this.find("input[type=checkbox]");
		
		$service.prop('checked', false); // clear checkboxes

		var $service_id = $service.attr('id');
		prices[$service_id] = {'price': defaultPrice, 'discount': defaultDiscount}
		
		if ($this.attr('class').indexOf('sublevel') != -1) { // hide sublevel elements
			$this.hide(); 
		}

	});

	var enableButton = function(price) {
		if ( minPrice != "undefined" ) {
			if (price >= minPrice) {
				orderButton.removeAttr('disabled');
			} else {
				if (!orderButton.attr('disabled')) {
					orderButton.attr('disabled', 'disabled');
				}
			}
		}
	}

	// Если нужно задать свою цену или скидку какой-либо позиции, нужно 
	// знать её id (который в index.html файле у input-элемента)
	// после этого комментария написать подобную строчку:
	// prices.название-id-элемента.price = 8000 
	// prices.название-id-элемента.discount = 0.3

	prices.top10Google.price = 1500 
	prices.top10Google.discount = 0

	prices.googlePos.price = 1000 
	prices.googlePos.discount = 0
	
	prices.calcBudgetYand.price = 1000 
	prices.calcBudgetYand.discount = 0
	
	prices.top10Yand.price = 1500 
	prices.top10Yand.discount = 0
	
	prices.yandPos.price = 1000 
	prices.yandPos.discount = 0

	prices.calcBudgetGoogle.price = 1000 
	prices.calcBudgetGoogle.discount = 0

	prices.contextVKBox.price = 1500 
	prices.contextVKBox.discount = 0

	// То есть, например, если я хочу изменить цену 
	// позиции "Рассчитать потенциальный трафик запросов из Топ 10 для Яндекс" 
	// и сделать её 9 500 рублей, то я напишу вот так:
	
	// prices.calcQueryYandBox.price = 9500

	
	
	var chosenServices = 0;
	var sumOutput = $(".final-sum").find('span');

	// Min-price stuff
	var orderButton = $(".order-box");

	enableButton(0);
	if ( minPrice != "undefined" ) {
		$(".min-price-show").show().find(".min-price-value").text(minPrice);
	}


	// Make calculator object
	function CalculateServices(baseOutput) {
		this.totalPrice = baseOutput;
		this.compsAmount = 10;
		this.totalPriceComps = this.totalPrice;
		
	}
	CalculateServices.prototype.calculate = function(service, action) {
		if (action == "add") { // checking -> addition
			this.totalPrice += prices[service].price;
			if (chosenServices > 1) {
				this.totalPrice -= prices[service].price * prices[service].discount; // Цена со скидкой
			} 
		} else { // unchecking -> subtraction
			this.totalPrice -= prices[service].price;
			if (chosenServices >= 1) {
				this.totalPrice += prices[service].price * prices[service].discount; // Учитываем скидку при вычитании
			}
		}

		if (this.compsAmount > 10) {
			console.log('called');
			this.competitors(this.compsAmount);
		} else {
			printOutputPrice(this.totalPrice)
		}
	}
	CalculateServices.prototype.competitors = function(comps) {
		if (comps > 10) {
			this.totalPriceComps = Math.round(this.totalPrice * ((comps - 10) / 10 + 1));
		} else {
			this.totalPriceComps = this.totalPrice;
		}
		printOutputPrice(this.totalPriceComps);
	}

	var printOutputPrice = function(price) {
		sumOutput.text(price + ' ').append($("<i></i>").addClass('icon-ruble'));
		enableButton(price);
	};


	var makeCalc = new CalculateServices(0);

	$("#servicesCalc").find("input[type=checkbox]").on("click", function() {
		var $this = $(this);
		var clickedService = $this.attr('id');
		if (clickedService in prices) {
			action = $this.prop('checked') ? "add" : "subtract";

			var parentDiv = $this.closest('div');
			if (parentDiv.attr('class').indexOf('sublevel') == -1 && 
				parentDiv.next().attr('class').indexOf('sublevel') != -1) {
				while (parentDiv.next().attr('class').indexOf('sublevel') != -1) {
					var additionalElement = parentDiv.next();
					var additionalInput = additionalElement.find("input[type=checkbox]");
					if (additionalElement.is(":visible") && additionalInput.prop('checked')) {
						additionalInput.trigger("click");
					}
					additionalElement.slideToggle();

					parentDiv = additionalElement;
				}
			}
			

			chosenServices = $this.prop('checked') ? chosenServices + 1 : chosenServices - 1;
		} else {
			event.preventDefault();
		}

		makeCalc.calculate(clickedService, action);
	});

	compAmount.change(function() {
		compAmount.trigger('keyup');
	});
	compAmount.keyup(function() {
		var enteredData = parseInt($(this).val().trim());
		if (enteredData >= 10) {
			makeCalc.compsAmount = enteredData;
			makeCalc.competitors(enteredData);
		}
	});
</script>
		<?php } ?>
		<script>
			(function() {
				// tabs behavior (jquery-ui) ======================================
				// main page
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

				// support 
				$("#supportTabs").find('a').click(function(e) {
					e.preventDefault();
					console.log('tab');
					$(this).tab('show');
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
        