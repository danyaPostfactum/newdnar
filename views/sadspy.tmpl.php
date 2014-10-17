<?php 
	$title = 'Анализ конкурентов';
	$description = 'test1';
	$keywords = 'test2';
	include(ROOT_PATH . '_partials/header.php') 
?>
<?php
	$need_calc = true;
?>
<div class="jumbotron">
	<div class="container">
		<div class="row">
            <div class="col-sm-8">
                <h1>Анализ конкурентов</h1>
				<p>Узнай всё о своих конкурентах в контекстной рекламе и поиске</p>
            </div>
            <div class="hidden-xs col-sm-4">
						<img src="<?php echo BASE_URL; ?>dist/assets/img/support/adspy.png" class="pull-right" alt="">
            </div>			
		</div>
		
	</div>
</div>
<div class="adspy">
    
   <!-- <div class="container">
        <div id="baseUrl" class="invisible"><?php echo BASE_URL; ?></div>
        <div class="row advantages-section">
            <div class="col-sm-6 big-img"><img src="<?php echo BASE_URL; ?>dist/assets/img/tagcloud_transp.png" alt="Облако тегов"></div>
            <div class="col-sm-6">
                <ul class="advantages">
                    <li><span>Их</span> ключевые слова</li>
                    <li><span>Тексты</span> их объявлений и позиции</li>
                    <li><span>Позиции</span> и сниппеты в выдаче</li>
                    <li><span>Оценка</span> трафика и бюджета</li>
                    <li><span>Данные</span> по Яндекс, Google и Вконтакте</li>
                </ul>
                <button class="btn btn-default" id="scrollToCalc">Узнать стоимость</button>
            </div>
        </div>
    </div>-->
    
    <div class="container">
        <div class="row info-section">
            <div class="col-sm-12">
                <h1>Для чего это нужно</h1>
                <p>Детальная информация о ваших конкурентах по их контекстным кампаниям и позициям в органическом поиске поможет вам:</p>
                <ul>
                    <li>Проанализировать конкурентов на рынке</li>
                    <li>Проанализировать ниши для бизнеса</li>
                    <li>Найти подниши для вашего бизнеса</li>
                    <li>Подобрать запросы для рекламных кампаний</li>
                    <li>Проверить подрядчика по рекламе</li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="container reports">
        <h1>Что содержит отчет</h1>
        <div class="row info-section">
            <div class="col-sm-5 col-sm-offset-2">
                <h4>Контекстная реклама:</h4>
                <ul>
                    <li>Запросы в контексте</li>
                    <li>Позиции и тексты объявлений</li>
                    <li>Оценка бюджета контекста</li>
                    <li>Оценка трафика с контекста</li>
                </ul>
            </div>
            <div class="col-sm-5">
                <h4>Поисковые системы:</h4>
                <ul>
                    <li>Запросы в поиске</li>
                    <li>Позиции в поиске</li>
                    <li>Сниппеты и url страниц</li>
                    <li>Оценка трафика с поиска</li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-sm-7">
                <h3>Мы знаем, что делаем</h3>
                <p>Мы — специалисты с огромным опытом, которые трудятся в сфере интернет‐маркетинга вот уже порядка 5-и лет. За это время мы провели множество аудитов, помогли наладить бизнес в онлайне десяткам компаний и создали сотни успешных проектов. У вас появилась возможность использовать наш опыт.</p>
            </div>
            <div class="col-sm-5">
                <section class="counter wrapper">
                  <section class="clock">
                    <figure class="flipper">
                      <span class="icon">0</span>
                    </figure>
                    <figure class="flipper">
                      <span>8</span>
                    </figure>
                    <figure class="flipper">
                      <span>4</span>
                    </figure>
                  </section>
                <p class="counter-info">Количество довольных клиентов</p>
                </section>
            </div>
        </div>
        <?php /*<div class="row">
            <div class="col-sm-12">
                <h1>Нам доверяют</h1>
                <div class="clients-panel-container">
                    <div class="clients-panel">
                        <a class="clients-panel-cvm" href="#"><span></span></a>
                        <a class="clients-panel-manzana" href="#"><span></span></a>
                        <a class="clients-panel-bmp" href="#"><span></span></a>
                        <a class="clients-panel-ventart" href="#"><span></span></a>
                    </div>
                </div>
            </div>
        </div> */?>
    </div>
    
    <div class="container">
                    <div class="row">
                        <!-- <a name="calcAnchor"></a> -->
                        <h1 class="calc-header" name="calcAnchor">Рассчитать стоимость</h1>
                        <div class="col-sm-12 calculator-section">
                            <h4>У нас нет готовых тарифов, стоимость услуги подбирается для каждого клиента в отдельности. Платите только за то, что нужно вам.</h4>
                            <h2>Выберите, что вам нужно узнать</h2>
                            <form class="analyze" id="servicesCalc">
    
                                <div class="chk-inline">
                                    <input form="orderForm" type="checkbox" class="chbx-hide" name="analyze[top50Yand]" id="top50Yand" value="Запросы, по которым конкуренты в Топ 50 в поисковой системе Яндекс, а также сниппеты и url страниц">
                                    <label class="inline-label ch-bx" for="top50Yand">Запросы, по которым конкуренты в Топ 50 в поисковой системе Яндекс, а также сниппеты и url страниц</label>
                                </div>
                                <div class="chk-inline sublevel">
                                    <input form="orderForm" type="checkbox" class="chbx-hide" name="analyze[top10Yand]" id="top10Yand" value="Рассчитать потенциальный трафик запросов из Топ 10 для Яндекс">
                                    <label class="inline-label ch-bx" for="top10Yand">Рассчитать потенциальный трафик запросов из Топ 10 для Яндекс</label>
                                </div>
                                <div class="chk-inline sublevel">
                                    <input form="orderForm" type="checkbox" class="chbx-hide" name="analyze[yandPos]" id="yandPos" value="Снять точные позиции конкурентов по запросам на день проведения аудита">
                                    <label class="inline-label ch-bx" for="yandPos">Снять точные позиции конкурентов по запросам на день проведения аудита</label>
                                </div>
    
                                <div class="chk-inline">
                                    <input form="orderForm" type="checkbox" class="chbx-hide" name="analyze[top50Google]" id="top50Google" value="Запросы, по которым конкуренты в Топ 50 в поисковой системе Google, а также сниппеты и url страниц">
                                    <label class="inline-label ch-bx" for="top50Google">Запросы, по которым конкуренты в Топ 50 в поисковой системе Google, а также сниппеты и url страниц</label>
                                </div>
                                <div class="chk-inline sublevel">
                                    <input form="orderForm" type="checkbox" class="chbx-hide" name="analyze[top10Google]" id="top10Google" value="Рассчитать потенциальный трафик запросов из Топ 10 для Google">
                                    <label class="inline-label ch-bx" for="top10Google">Рассчитать потенциальный трафик запросов из Топ 10 для Google</label>
                                </div>
                                <div class="chk-inline sublevel">
                                    <input form="orderForm" type="checkbox" class="chbx-hide" name="analyze[googlePos]" id="googlePos" value="Снять точные позиции конкурентов по запросам на день проведения аудита">
                                    <label class="inline-label ch-bx" for="googlePos">Снять точные позиции конкурентов по запросам на день проведения аудита</label>
                                </div>
    
                                <div class="chk-inline">
                                    <input form="orderForm" type="checkbox" class="chbx-hide" name="analyze[queryYandDirect]" id="queryYandDirect" value="Запросы, по которым конкуренты дают рекламу в Яндекс Директ, а также позиции и тексты объявлений">
                                    <label class="inline-label ch-bx" for="queryYandDirect">Запросы, по которым конкуренты дают рекламу в Яндекс Директ, а также позиции и тексты объявлений</label>
                                </div>
                                <div class="chk-inline sublevel">
                                    <input form="orderForm" type="checkbox" class="chbx-hide" name="analyze[calcBudgetYand]" id="calcBudgetYand" value="Рассчитать примерные бюджеты конкурентов в Яндекс Директ">
                                    <label class="inline-label ch-bx" for="calcBudgetYand">Рассчитать примерные бюджеты конкурентов в Яндекс Директ</label>
                                </div>
    
                                <div class="chk-inline">
                                    <input form="orderForm" type="checkbox" class="chbx-hide" name="analyze[contextAdwordsBox]" id="contextAdwordsBox" value="Запросы, по которым конкуренты дают рекламу в Google Adwords, а также позиции и тексты объявлений">
                                    <label class="inline-label ch-bx" for="contextAdwordsBox">Запросы, по которым конкуренты дают рекламу в Google Adwords, а также позиции и тексты объявлений</label>
                                </div>
                                <div class="chk-inline sublevel">
                                    <input form="orderForm" type="checkbox" class="chbx-hide" name="analyze[calcBudgetGoogle]" id="calcBudgetGoogle" value="Рассчитать примерные бюджеты конкурентов в Google Adwords">
                                    <label class="inline-label ch-bx" for="calcBudgetGoogle">Рассчитать примерные бюджеты конкурентов в Google Adwords</label>
                                </div>
    
                                <div class="chk-inline">
                                    <input form="orderForm" type="checkbox" class="chbx-hide" name="analyze[contextVKBox]" id="contextVKBox" value="Какие объявления дают конкуренты в ВКонтакте, а также количество показов и на какую аудиторию">
                                    <label class="inline-label ch-bx" for="contextVKBox">Какие объявления дают конкуренты в ВКонтакте, а также количество показов и на какую аудиторию</label>
                                </div>
                                
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="compAmount">Количество конкурентов</label> <input form="orderForm" type="text" class="num-input" name="compAmount" id="compAmount" value="10">
                                        <span class="increase glyphicon glyphicon-arrow-up"></span>
                                        <span class="increase glyphicon glyphicon-arrow-down"></span>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="final-sum">Итого: 
                                            <output form="orderForm" name="price" style="display:inline">0</output> <i class="icon-ruble"></i>
                                        </p>
                                    </div>
                                </div>
                                <p class="submit-row">
                                    <span class="min-price-show">Минимальная сумма заказа <span class="min-price-value"></span> <i class="icon-ruble"></i></span>
                                    <button type="button" name="services-submit" class="btn btn-default order-box" data-toggle="modal" data-target="#orderModal">Заказать</button></p>
                            </form>
                        </div>
                    </div>
                </div>
    
    <div class="container reports">
        <div class="row">
            <div class="col-sm-6">
                <h3>Как срочно выполняется аудит?</h3>
                <p>Аудит выполняется в течение 5-и рабочих дней.</p>
                <h3>Как узнать о том, что аудит выполнен?</h3>
                <p>На указанную вами электронную почту придет уведомление о том, что аудит завершен.</p>
            </div>
            <div class="col-sm-6">
                <h3>Как можно оплатить аудит?</h3>
                <p>Вы можете оплатить аудит с помощью банковских карт, электронной валюты (Webmoney, Яндекс.Деньги) и сервисов мобильной коммерции (МТС, Мегафон, Билайн), посредством интернет‐банкинга, через банкоматы и терминалы мгновенной оплаты. Также мы работаем по безналичному расчету с юридическими лицами из Российской Федерации. Счет на оплату будет выставлен после уточнения деталей заказа.</p>
            </div>
        </div>
    </div>
    
    <!-- Modal -->
    <div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog calculator-response-dialog">
          <div class="modal-content">
            <div class="modal-body">
              <p></p>
            </div>
          </div>
        </div>
      <div class="modal-dialog calculator-submit-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <span data-dismiss="modal" class="modal-close"><span class="glyphicon glyphicon-remove"></span></span>
            <h3 class="modal-title" id="myModalLabel">ОТПРАВЬТЕ ЗАЯВКУ<!--  НА ПОЛУЧЕНИЕ КОММЕРЧЕСКОГО ПРЕДЛОЖЕНИЯ И УСЛОВИЙ РАБОТЫ --></h3>
          </div>
          <div class="modal-body">
            <form name="orderForm" id="orderForm" action="" method="POST">
                <div class="form-group">
                    <input class="form-control" type="text" name="name" placeholder="Как вас зовут?" required="" />
                </div>
                <div class="form-group">
                    <input class="form-control" type="email" name="email" placeholder="Введите email для связи" required="" />
                </div>
                <div class="form-group">
                    <input class="form-control" type="tel" name="phone" placeholder="Введите номер телефона" required="" />
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="website" placeholder="Ваш сайт" />
                </div>
                <div class="form-group">
                    <label><input class="radio-btn" type="radio" name="payMethod" value="bankCard">Оплата банковской картой или электронными деньгами</label>
                    <label><input class="radio-btn" type="radio" name="payMethod" value="cashless">Безналичный расчёт</label>
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="comments" placeholder="Список ваших конкурентов. Также вы можете оставить дополнительные вопросы"></textarea>
                </div>
                <section class="submit-section">
                    <button type="submit" class="btn btn-default">Отправить заявку</button>
                    <p class="assure">Ваши данные в безопасности и не будут переданы третьим лицам</p>
                </section>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
<div class="container">
<?php include(ROOT_PATH . "_partials/footer.php") ?>

