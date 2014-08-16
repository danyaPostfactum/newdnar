	<!-- Перенос доменов -->
	<article id="tabs-5" class="row tab-pane">
		<div class="col-sm-12 search-stuff-wrapper" id="moveDomainsWrapper">
			<h3 class="move-domain-heading">Перенос домена</h3>
			<p class="move-domain-intro">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus at, fugit assumenda laboriosam cupiditate tempora asperiores culpa ipsum temporibus, eveniet, debitis corporis fuga modi, provident.</p>
			<form action="index.php" method="GET" class="domain-form-wrapper">
				<div class="input-group domain-search">
					<input type="text" name="q" placeholder="Перенести домен"
						   value="<?php if ( isset($search_value) ) { echo htmlspecialchars($search_value); } ?>" 
						   class="form-control main-search-input" id="domainMove" />
					<span class="input-group-btn">

						<button type="submit" class="btn btn-search progress-button" data-style="bottom-line" data-horizontal id="checkDomainMoveBtn">
							<span class="glyphicon glyphicon-search"></span>
						</button>

						<!-- <button class="btn btn-primary main-search-btn" type="button">Go!</button> -->
					</span>
				</div><!-- /input-group -->
			</form>
			<div class="row tld-cards">
				<script type='text/template' id="error-move-template">
					<div class="col-sm-6 error-holder"></div>
				</script>
				<!-- wrapper while loading domain -->
				<script type="text/x-handlebars-template" id="tld-move-wrapper-template">
					{{#each domains}}
					<div class="col-sm-12" id="tldMove-{{this}}"> 
						<ul class="list-group">
							<li class="list-group-item domain-item">
								<div style="float: left; margin-bottom: 15px; margin-right: 20px;">
								  <div class="loading-ball"></div>
								  <div class="loading-ball1"></div>
							    </div>
							  	<p>Загрузка <b>{{../name}}.{{this}}</b></p>
							</li>
						</ul>
					</div>
					{{/each}}
				</script>	
				<!-- domain ready display -->			
				<script type="text/x-handlebars-template" id="tld-move-card-template">
					<ul class="list-group">
						{{#if_free regrinfo.registered}}
						<li class="list-group-item domain-item domain-item-free">
						{{else}}
						<li class="list-group-item domain-item domain-item-taken">
						{{/if_free}}
							<strong>{{parseRf regrinfo.domain.name}}</strong>
							{{#if_unknown regrinfo.registered}}
							<span class="domain-item-price pull-right">Unknown!!!</span>
							{{else}}
							<span class="domain-item-price pull-right">{{domain_price}} руб.</span>
							{{/if_unknown}}
							<p class="item-description">
								{{#if_free regrinfo.registered}}<a href="http://domain.dnar.ru">Зарегистрировать</a>
								{{else}}Домен зарегистрирован. <a href="#" class="more-whois-info">Перенести к нам</a>
								<div class="more-whois-content">
									<p>Регистратор домена: <strong><code style="color: #328bf4">{{regyinfo.registrar}}</code></strong>. Чтобы перенести домен к нам, нужно: <br>
									--- Инструкция ---</p>
								</div>
								{{/if_free}}</p>
						</li>
					</ul>
				</script>
			</div>
		</div>
	</article> <!-- End перенос доменов -->