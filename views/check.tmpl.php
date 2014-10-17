<?php 
	$title = 'Анализ сайтов';
	$description = 'test1';
	$keywords = 'test2';
	include(ROOT_PATH . '_partials/header.php') 
?>

<div class="jumbotron">
	<div class="container">
		<div class="row">
			 <div class="col-sm-8">
				<h1>Анализ сайтов</h1>
				<p>Уникальный сервис диагностики сайта позволит в автоматическом режиме получить информацию по домену, работе сайта</p>
			</div>
			<div class="hidden-xs col-sm-4">
						<img src="<?php echo BASE_URL; ?>dist/assets/img/check.png" class="pull-right" alt="">
			</div>
		</div>
		
	</div>
</div>

<div class="container">

<div class="row">
	<div class="col-sm-12">
		<form action="javascript:" id="checkForm" class="form">
			<div class="form-group">
				<div class="input-group">
					<input type="text" class="form-control main-search-input" name="url" required="" placeholder="Введите домен для проверки, например dnar.ru" />
					<span class="input-group-btn">
						<button type="submit" class="btn btn-search progress-button">
							<span class="glyphicon glyphicon-search"></span>
						</button>
					</span>
				</div>
			</div>
		</form>
	</div>
</div>
<div id="check-alert" style="display:none">
	<div class="alert alert-danger"></div>
</div>
<div class="row">
	<div class="col-sm-4">
		<div class="card-wrapper hosting-card check-results clearfix" id="check-screenshot">
			<h4>Скриншот</h4>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="card-wrapper hosting-card check-results clearfix" id="check-whois-results">
			<h4>Данные whois</h4>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-6">
		<div class="card-wrapper hosting-card check-results clearfix" id="check-dns-results">
			<h4>Диагностика</h4>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="card-wrapper hosting-card check-results clearfix" id="check-http-results">
			<h4>Вебсервер</h4>
		</div>
	</div>
</div>
<div class="card-wrapper hosting-card check-results clearfix" id="check-pagespeed-results">
	<h4>Советы по отпимизации</h4>
</div>
<script type="text/x-handlebars-template" id="check-loading-template">
	<div style="float: left; margin-bottom: 15px; margin-right: 20px;">
		<div class="loading-ball"></div>
		<div class="loading-ball1"></div>
	</div>
	<p>Загрузка ...</p>
</script>
<script type="text/x-handlebars-template" id="check-dns-template">
	<h4>Диагностика</h4>
	<ul class="list-unstyled list-checks">
		{{#if dns}}
			<li><span class="glyphicon glyphicon-ok"></span> Информация DNS получена</li>
			<li>
				{{#if dns.A}}
					<div><span class="glyphicon glyphicon-ok"></span> A-записи получены:</div>
					<ul>
					{{#each dns.A}}
						<li>{{this.ip}}</li>
					{{/each}}
					</ul>
				{{else}}
					<div>A-записи не получены</div>
				{{/if}}
			</li>
			<li>
				{{#if dns.MX}}
					<div><span class="glyphicon glyphicon-ok"></span> MX-записи получены:</div>
					<ul>
					{{#each dns.MX}}
						<li>{{this.target}}</li>
					{{/each}}
					</ul>
				{{else}}
					<div><span class="glyphicon glyphicon-remove"></span> MX-записи не получены</div>
				{{/if}}
			</li>
		{{else}}
			<li><span class="glyphicon glyphicon-remove"></span> Информация DNS не получена</li>
		{{/if}}
	</ul>
</script>
<script type="text/x-handlebars-template" id="check-http-template">
	<h4>Веб-сервер</h4>
	<ul class="list-unstyled list-checks">
		{{#if status}}
			<li>
				<div><span class="glyphicon glyphicon-{{#eq status 200}}ok{{else}}remove{{/eq}}"></span> Код ответа веб-сервера: {{status}}</div>
			</li>
			{{#if headers.Server}}
				<li>
					<div>Сервер представляется как: {{headers.Server}}</div>
				</li>
			{{/if}}
			{{#if headers.X-Powered-By}}
				<li>
					<div>Страница генерируется с помощью: {{headers.X-Powered-By}}</div>
				</li>
			{{/if}}
		{{else}}
			<li><span class="glyphicon glyphicon-remove"></span> Сервер не отвечает</li>
		{{/if}}
	</ul>
</script>
<script type="text/x-handlebars-template" id="check-screenshot-template">
	<div class="check-screenshot-wrapper">
		<img src="{{src}}" width="{{width}}" height="{{height}}" alt="Скриншот" />
	</div>
</script>

<script type="text/x-handlebars-template" id="check-whois-template">
	<h4><img id="favicon" style="display:none;vertical-align:top" width="16" height="16" /> {{domain}}</h4>
	<dl class="dl-horizontal dl-properties">
		<dt>Регистратор</dt><dd>{{regrinfo.domain.registrar}}</dd>
		<dt>Дата регистрации</dt><dd>{{regrinfo.domain.created}}</dd>
		<dt>Зарегистрирован до</dt><dd>{{regrinfo.domain.expires}}</dd>
		<dt>Статус</dt><dd>{{regrinfo.domain.status}}</dd>
		<dt>DNS-серверы</dt><dd>{{#each regrinfo.domain.nserver}} {{@key}} {{/each}}</dd>
	</dl>
	<p><a href="javascript:" data-toggle="modal" data-target="#whoisModal">Вся информация WHOIS</a></p>

<div class="modal fade" id="whoisModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width:504px">
	<div class="modal-content">
	  <div class="modal-header">
		<span data-dismiss="modal" class="modal-close"><span class="glyphicon glyphicon-remove"></span></span>
		<h4 class="modal-title" id="myModalLabel">Данные WHOIS</h4>
	  </div>
	  <div class="modal-body"><pre>{{rawdata}}</pre></div>
	  <div class="modal-footer"><button class="btn btn-default" data-dismiss="modal">Закрыть</button>
	   </div>
	</div>
  </div>
</div>
</script>
<script type="text/x-handlebars-template" id="check-pagespeed-template">
	<h4>Советы по оптимизации</h4>
	<h5>Оценка сайта: <span class="label label-{{#scoreLabel score}}{{/scoreLabel}}">{{score}}</span> / 100</h5>
	<ul class="list-unstyled list-checks">
		{{#each formattedResults.ruleResults}}
		<li>
			{{#if this.ruleImpact}}
			<div><span class="glyphicon glyphicon-remove"></span> <a class="show-more" href="javascript:">{{this.localizedRuleName}}</a></div>
			<div style="display:none">
			{{#each this.urlBlocks}}
					<div>{{#format this.header}}{{/format}}</div>
					<ul>
						{{#each this.urls}}
							<li>{{#format this.result}}{{/format}}</li>
						{{/each}}
					</ul>
			{{/each}}
			</div>
			{{else}}
			<span class="glyphicon glyphicon-ok"></span> {{this.localizedRuleName}}
			{{/if}}
		</li>
		{{/each}}
	</ul>
</script>
<style>
.alert-danger {
	color: #a94442;
	background-color: #f2dede;
	border-color: #ebccd1;
}
.alert {
	padding: 15px;
	margin-bottom: 20px;
	border: 1px solid transparent;
	border-radius: 4px;
}
.check-screenshot-wrapper {
	text-align: center;
	margin: -5px -5px 0;
}
.check-screenshot-wrapper img{
	max-width: 100%;
	margin-bottom: 10px;
}
.check-results{
	min-height: 200px;
}
.list-checks{
	padding-left: 1.5em;
}
.list-checks .glyphicon{
	margin-left: -1.5em;
	margin-right: 0.25em;
}
.list-checks .glyphicon-ok{
	color: #5cb85c;
}
.list-checks .glyphicon-remove{
	color: #d9534f;
}
.dl-properties dt{
	text-align: left;
	font-weight: normal;
	width: 130px;
}
.dl-properties dd{
	font-weight: bold;
	margin-left: 135px;
}
.label-danger {
	background-color: #d9534f;
}
.label-success {
	background-color: #5cb85c;
}
.label-warning {
	background-color: #f0ad4e;
}
.label {
	display: inline;
	padding: .2em .6em .3em;
	font-size: 75%;
	font-weight: 700;
	line-height: 1;
	color: #fff;
	text-align: center;
	white-space: nowrap;
	vertical-align: baseline;
	border-radius: .25em;
}
</style>
<script>
window.onload = function() {
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
		return 'error';
	});
	var requests = [];
	$('#checkForm').submit(function(e) {
		var input = this.url.value;
		e.preventDefault();
		$.each(requests, function() {
			this.abort();
		});
		$('#check-alert').hide();
		$('.check-results').css({opacity: 1}).html($('#check-loading-template').html());
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
};
</script>

<?php include("_partials/footer.php") ?>

