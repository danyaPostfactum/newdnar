Handlebars.registerHelper('format', function(obj) {
	return obj.format.replace(new RegExp('\\$([0-9]+)', 'g'), function(match, number) {
		var arg = obj.args[number - 1];
		if (arg.type == 'URL') {
			return arg.value.link(arg.value);
		}
		return obj.args[number - 1].value;
	});
});
Handlebars.registerHelper('eq', function(a, b, options) {
	if (a == b) {
		return options.fn(this);
	} else {
		return options.inverse(this);
	}
});
Handlebars.registerHelper('scoreLabel', function(a) {
	if (a > 90)
		return 'success';
	if (a > 70)
		return 'warning';
	return 'danger';
});
(function() {
	var requests = [];
	$('#checkForm').submit(function(e) {
		var input = this.url.value;
		e.preventDefault();
		$.each(requests, function() {
			this.abort();
		});
		$('#check-alert').hide();
		$('.check-results').css({visibility: 'visible', opacity: 1}).html($('#check-loading-template').html());
		var whoisRequest = $.ajax({
			data: 'get=whois&url=' + input,
			success: function(response) {
				if (response.error) {
					$('.check-results').animate({opacity: 0});
					$('#check-alert').show().find('.alert').html(response.error);
				} else {
					var template = Handlebars.compile($('#check-whois-template').html());
					var html = template(response);
					$('#check-whois-results').html(html);
					var dnsRequest = $.ajax({
						data: 'get=dns&url=' + input,
						success: function(response) {
							var template = Handlebars.compile($('#check-dns-template').html());
							var html = template({dns: response});
							$('#check-dns-results').html(html);
						}
					});
					var httpRequest = $.ajax({
						data: 'get=http&url=' + input,
						success: function(response) {
							var template = Handlebars.compile($('#check-http-template').html());
							var html = template(response);
							$('#check-http-results').html(html);
							if (response.favicon)
								$('#favicon').prop('src', response.favicon).show();
						}
					});
					var pagespeedRequest = $.ajax({
						data: 'get=pagespeed&url=' + input,
						success: function(response) {
							var template = Handlebars.compile($('#check-pagespeed-template').html());
							var html = template(response);
							$('#check-pagespeed-results').html(html);
							$(".show-more").on('click', function(e) {
								e.preventDefault();
								$(this).parent().next().slideToggle('fast');
							});
							var template = Handlebars.compile($('#check-screenshot-template').html());
							if (response.screenshot) {
								var screenshot = {
									width: response.screenshot.width,
									height: response.screenshot.height,
									src: 'data:' + response.screenshot.mime_type + ';base64,' + response.screenshot.data
								};
							} else {
								var screenshot = {
									width: 256,
									height: 256,
									src: '/dist/assets/img/404.png'
								};
							}
							var html = template(screenshot);
							$('#check-screenshot').html(html);
						}
					});
					requests.push(dnsRequest, httpRequest, pagespeedRequest);
				}
			}
		});
		requests = [whoisRequest];
	});

})();