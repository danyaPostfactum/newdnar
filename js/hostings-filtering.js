$(function(){
		
	// Initialize buttonFilter code
	dropdownFilter.init({
		defaultFilter: '.filter-not-outofrange'
	});
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
	var $ranges = $('.range-filter');
	var rangeFilter = function() {
		$.each($mix, function(index, element) {
			var elem = $(element);
			elem.removeClass('filter-outofrange');
			elem.addClass('filter-not-outofrange');
		});
		$.each($ranges, function(index, element) {
			var wrapper = $(element);
			var minValue = parseInt(wrapper.find(".lower-range").val(), 10) || 0;
			var maxValue = parseInt(wrapper.find(".upper-range").val(), 10) || 0;
			var filterName = wrapper.data().filtername;
			$.each($mix, function(index, element) {
				var elem = $(element);
				// elem.show();
				if (parseInt(elem.data()[filterName], 10) < minValue) {
					// $('#Container').mixItUp('filter', '.filter-test_quality')
					elem.addClass('filter-outofrange');
					elem.removeClass('filter-not-outofrange');
					// elem.hide();
				} else {
					if (maxValue > minValue && parseInt(elem.data()[filterName], 10) > maxValue) {
						// $('#Container').mixItUp('filter', '.filter-test_quality')
						elem.addClass('filter-outofrange');
						elem.removeClass('filter-not-outofrange');
						// elem.hide();
					}
				}
			});
		});
		dropdownFilter.parseFilters();
	};

	$ranges.on('keyup', function() {
		delay(rangeFilter, 500);
		// setTimeout(rangeFilter, 500);
	});
});