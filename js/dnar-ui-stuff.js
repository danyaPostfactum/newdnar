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
		e.preventDefault();
		var $tab = $(this);
		// set window location
		if(history.pushState) {
			history.pushState(null, null, $tab.attr('href'));
		} else {
			// older browsers support
			location.hash = $tab.attr('href');
		}
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