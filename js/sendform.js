(function($) {
	var $phoneEmailInp = $("#phone_email"),
		$messageInp = $("#message");
	$phoneEmailInp
		.on('focus', function() {
			$phoneEmailInp.attr("placeholder", "8-000-000-00-00 // example@email.com");
		})
		.blur(function() {
			$phoneEmailInp.attr("placeholder", "Ваш телефон или e-mail");
		});

	function validatePhoneEmail(input) { 
		var input = input.trim();
		var phoneRe = /^\+?\d?[-\s\.]?\(?\s?\d{3}[-\s\.]?\)?\s?\d{3}[-\s\.]?\d\d[-\s\.]?\d\d$/;

		// http://stackoverflow.com/a/46181/11236
		var emailRe = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

		return emailRe.test(input) || phoneRe.test(input);
	}

	function messageEmpty() {
		return ($messageInp.val().trim().length < 4);
	}
	$("#supportForm").on("submit", function(e) {
		e.preventDefault();
		var phoneEmailValue = $phoneEmailInp.val();
		if (messageEmpty() || !validatePhoneEmail(phoneEmailValue)) {
			if (messageEmpty()) {
				$messageInp.addClass('error').attr('placeholder', "Слишком мало символов").focus;
			}
			if (!validatePhoneEmail(phoneEmailValue)) {
				$phoneEmailInp.addClass('error').attr('placeholder', "Неверный номер или e-mail");
			}
		} else {
			var $this = $(this);
			var $successOverlay = $this.find(".form-success-text");
			var callformData = $this.serialize();
			$.post('sendform.php', callformData, function(data) {
				var $success = $(".success-contact").fadeIn();
				// $this.css('visibility', 'hidden');
				$successOverlay.fadeIn('fast');
				$successOverlay.find("p").html(data);
				setTimeout(function() {
					$successOverlay.fadeOut('fast');
				}, 3000);
				$messageInp.val('');
				$messageInp.attr('placeholder', "Сообщение")
				// $success.find("button").on("click", function() {
				// 	$success.find("p").html("");
				// 	$success.hide();
				// 	$this.css('visibility', 'visible');
				// })
			});
		}

		$phoneEmailInp.on('focus keyup', function() {
			$(this).removeClass('error');
		});
		$messageInp.focus(function() {
			$(this).removeClass('error');
		});			

	});
})(jQuery);