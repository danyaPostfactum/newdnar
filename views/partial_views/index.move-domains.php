	<!-- Перенос доменов -->
	<article id="move-domain" class="row tab-pane">
		<div class="col-sm-12 search-stuff-wrapper" id="moveDomainsWrapper">
			<h3 class="move-domain-heading">Перенос домена</h3>
            <p class="move-domain-intro">
            Инструкция по переносу домена:
            <ol>
               
                <li>У вас должен быть договор на DNAR.RU, если его еще нет - <a href="http://domain.dnar.ru/OFFERTA/offerta_add_select_type.khtml">зарегистрируйтесь</a>;</li>
                <li><b>ВАЖНО</b> - домен, который вы хотите перенести, должны быть зарегистрирован на теже данные, что и договор на DNAR.RU, в противном случае - воспользуйтесь <a href="http://help.dnar.ru">системой тикетов</a>;</li>
                <li>Для получения дальнейшей инструкции по переносу домена к DNAR.RU - введите ваш домен ниже:</li>
            </ol><br>
            </p>
			<form action="index.php" method="GET" class="domain-form-wrapper">
				<div class="input-group domain-search">
					<input type="text" name="q" placeholder="Введите домен для переноса"
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
						{{#if available}}
						<li class="list-group-item domain-item domain-item-free">
						{{else}}
						<li class="list-group-item domain-item domain-item-taken-move">
						{{/if}}
							<strong>{{parseRf domain.name}}</strong>
							{{#if_unknown available}}
							<span class="domain-item-price pull-right">Unknown!!!</span>
							{{else}}
							<span class="domain-item-price pull-right">{{domain_price}} руб.</span>
							{{/if_unknown}}
							<p class="item-description">
								{{#if available}}<a href="#" data-toggle="modal" data-target="#dnarLoginModal">Зарегистрировать</a><span style="float:right;">Домен свободен</span>
								{{else}}<span style="float:right;">Стоимость продления у нас</span>
								<div class="more-whois-content-move">
									{{#if_RuSuRf domain.tld}}
									<p><br>Текущий Регистратор Вашего домена: <strong><code style="color: #328bf4">{{regyinfo.registrar}}</code></strong><br><br>
									{{#if_R01 regyinfo.registrar}}
								Для переноса домена Вам достаточно написать письмо с контактного e-mail, который указан для домена на данный момент, на <a href="mailto:info@r01.ru">info@r01.ru</a> - "Прошу перенести домен ________ на договор A/___/___". и приложить копии страниц паспорта.</p>
                                        
                                        {{else}}
                                    
<b>Вам необходимо:</b>
<ul>
    <li><b>Уведомить текущего Регистратора</b>, осуществляющего поддержку вашего домена, о своем решении перенести поддержку домена (форма уведомления устанавливается текущим Регистратором).
    
     <br><br>

    <b>Наши идентификаторы:</b>
    <br>
    R01-RU (зона .RU);<br>
    R01-REG-FID (зона .SU);<br>
    R01-REG-RF (зона .РФ).<br><br>
</li>
<li><b>Для отправки заявки через личный кабинет</b> Администратору домена необходимо выполнить следующие действия:

<ol>
    <li><a href="#" data-toggle="modal" data-target="#dnarLoginModal">Авторизоваться в личном кабинете</a>, используя логин или nic-hdl Администратора домена.</li>
    <li>Зайти в раздел Домены → Принять от другого регистратора → Добавить домен(ы) на прием от другого регистратора.</li>
    <li>Указать названия доменов, которые следует перенести.</li>
    <li>Выбрать Администратора (по умолчанию владелец договора видит свой nic-hdl), проверить указанные данные.</li>
</ol><br>
<span class="glyphicon glyphicon-warning-sign move-info" style="top:9px;"></span>В случае совпадения данных Администратора, указанных в нашей базе, и данных Администратора домена у прежнего Регистратора, домен будет принят в базу <b>автоматически</b>. В противном случае заявка будет передана <b>на ручную обработку</b>, о результатах которой вы будете уведомлены по e-mail.

</li></ul> 
<br>
<b>Если вы переносите домен от другого Регистратора и при этом меняете Администратора</b>
<br><br>
Согласно <a href="http://www.cctld.ru/ru/docs/rules.php" rel="nofollow" target="_blank">Правилам регистрации доменных имен</a>, утвержденным Координационным Центром национального домена сети Интернет,  сменить Администратора домена возможно по истечении 30 дней после смены Регистратора. Таким образом, предоставлять необходимые документы на смену Администратора домена возможно только по истечении данного периода.
</p>
									{{/if_R01}}
                                    
									{{else}}
									<p>
    <b>Вам необходимо:</b>
<ol>
    <li><b>Обратиться к текущему Регистратору</b>, с просьбой снять статус блокировки с домена и предоставить код авторизации. Если данные по домену скрыты, их необходимо открыть.</li>
   <li><a href="<?php echo BASE_URL; ?>#payment">Произвести оплату в личном кабинете DNAR</a> на сумму не менее суммы продления домена, в соответствии с тарифами.</li>
   <li>Сообщить нам <b>кодовое слово</b> (его нужно узнать у текущего Регистратора).</li>
   <li>Получив на контактный e-mail автоматическое сообщение от Робота о необходимости <b>подтверждения запроса на смену Регистратора</b>, кликнуть в письме на соответствующую ссылку. Ссылка действительна для подтверждения в течение 5 дней.</li>
   <li>Далее запрос на передачу обслуживания домена должен подтвердить <b>текущий Регистратор</b> (также в течение 5 дней).</li>
</ol><br>
    <span class="glyphicon glyphicon-info-sign move-info"></span>Если в течение 10-ти дней перенос доменов не произойдет, задание аннулируется, а денежные средства разблокируются.<br>
</p>
									{{/if_RuSuRf}}
                                    
                                    <br>
                                    Если у вас остались вопросы - воспользуйтесь <a href="http://help.dnar.ru">системой тикетов</a>.
								</div>
								{{/if}}
                    
                    </p>
						</li>
					</ul>
				</script>
				
			</div>
			
		</div>
	</article> <!-- End перенос доменов -->