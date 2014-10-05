$("#scrollToCalc").on("click", function() {
	var land = $("[name=calcAnchor]");
	$('html, body').animate({scrollTop: land.offset().top}, 'slow');
});

// polifyll for input[form=abc]
$("#orderForm").submit(function(e) {
	e.preventDefault();
	var form = this;
	var $external = $('[form=' + this.getAttribute('name') + ']');
	$.ajax({
		type: 'post',
		data : $(this).add($external).serialize() + '&price=' + $external.filter('[name="price"]').text(),
		url: '/call.php',
		success: function(response) {
			alert(response.message);
			if (response.success) {
				$('#orderModal').modal('hide');
			}
		},
		dataType: 'json'
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
var sumOutput = $(".final-sum").find('output');

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
	sumOutput.text(price);
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