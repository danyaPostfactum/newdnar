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
            <div class="col-sm-7">
                <h1>Анализ конкурентов</h1>
				<p>Можешь этим заняться )</p>
            </div>
            <div class="hidden-xs col-sm-5">
						<img src="<?php echo BASE_URL; ?>dist/assets/img/support/big/adspy.png" class="pull-right" alt="">
            </div>			
		</div>
		
	</div>
</div>

<div class="container">

			<p>Lorem ipsum dolor sit amet, error sunt. Blanditiis unde assumenda explicabo voluptatem cumque iusto aspernatur a reiciendis repellendus laboriosam! Magnam molestias eos velit ullam, quos officia nulla odio, minima voluptate provident. Tempore, cum repellat. Ab quam, nam neque molestiae quasi ratione cupiditate similique eum non adipisci repudiandae id sunt, sapiente est at. Fugiat beatae, reprehenderit modi aliquam totam quidem deserunt cumque commodi expedita recusandae possimus sit, sunt laborum maiores assumenda doloremque, sint velit est alias repellendus, veritatis rem ducimus officia autem. Optio reprehenderit odit distinctio eum dolore. Odit mollitia odio, magni distinctio, iure officiis aliquid consequuntur dolores. Perferendis nisi ducimus possimus autem iure eveniet, magni assumenda totam deleniti esse voluptatibus, quod nam asperiores facere. Beatae.</p>

<div class="container">
                <div class="row">
                    <!-- <a name="calcAnchor"></a> -->
                    <h1 name="calcAnchor">Рассчитать стоимость</h1>
                    <div class="col-sm-12 calculator-section">
                        <h4>У нас нет готовых тарифов, стоимость услуги подбирается для каждого клиента в отдельности. Платите только за то, что нужно вам.</h4>
                        <h2>Выберите, что вам нужно узнать</h2>
                        <form class="analyze" id="servicesCalc">

                            <div class="chk-inline">
                                <input form="orderForm" type="checkbox" class="chbx-hide" name="top50Yand" id="top50Yand">
                                <label class="inline-label ch-bx" for="top50Yand">Запросы, по которым конкуренты в Топ 50 в поисковой системе Яндекс, а также сниппеты и url страниц</label>
                            </div>
                            <div class="chk-inline sublevel">
                                <input form="orderForm" type="checkbox" class="chbx-hide" name="top10Yand" id="top10Yand">
                                <label class="inline-label ch-bx" for="top10Yand">Рассчитать потенциальный трафик запросов из Топ 10 для Яндекс</label>
                            </div>
                            <div class="chk-inline sublevel">
                                <input form="orderForm" type="checkbox" class="chbx-hide" name="yandPos" id="yandPos">
                                <label class="inline-label ch-bx" for="yandPos">Снять точные позиции конкурентов по запросам на день проведения аудита</label>
                            </div>

                            <div class="chk-inline">
                                <input form="orderForm" type="checkbox" class="chbx-hide" name="top50Google" id="top50Google">
                                <label class="inline-label ch-bx" for="top50Google">Запросы, по которым конкуренты в Топ 50 в поисковой системе Google, а также сниппеты и url страниц</label>
                            </div>
                            <div class="chk-inline sublevel">
                                <input form="orderForm" type="checkbox" class="chbx-hide" name="top10Google" id="top10Google">
                                <label class="inline-label ch-bx" for="top10Google">Рассчитать потенциальный трафик запросов из Топ 10 для Google</label>
                            </div>
                            <div class="chk-inline sublevel">
                                <input form="orderForm" type="checkbox" class="chbx-hide" name="googlePos" id="googlePos">
                                <label class="inline-label ch-bx" for="googlePos">Снять точные позиции конкурентов по запросам на день проведения аудита</label>
                            </div>

                            <div class="chk-inline">
                                <input form="orderForm" type="checkbox" class="chbx-hide" name="queryYandDirect" id="queryYandDirect">
                                <label class="inline-label ch-bx" for="queryYandDirect">Запросы, по которым конкуренты дают рекламу в Яндекс Директ, а также позиции и тексты объявлений</label>
                            </div>
                            <div class="chk-inline sublevel">
                                <input form="orderForm" type="checkbox" class="chbx-hide" name="calcBudgetYand" id="calcBudgetYand">
                                <label class="inline-label ch-bx" for="calcBudgetYand">Рассчитать примерные бюджеты конкурентов в Яндекс Директ</label>
                            </div>

                            <div class="chk-inline">
                                <input form="orderForm" type="checkbox" class="chbx-hide" name="contextAdwordsBox" id="contextAdwordsBox">
                                <label class="inline-label ch-bx" for="contextAdwordsBox">Запросы, по которым конкуренты дают рекламу в Google Adwords, а также позиции и тексты объявлений</label>
                            </div>
                            <div class="chk-inline sublevel">
                                <input form="orderForm" type="checkbox" class="chbx-hide" name="calcBudgetGoogle" id="calcBudgetGoogle">
                                <label class="inline-label ch-bx" for="calcBudgetGoogle">Рассчитать примерные бюджеты конкурентов в Google Adwords</label>
                            </div>

                            <div class="chk-inline">
                                <input form="orderForm" type="checkbox" class="chbx-hide" name="contextVKBox" id="contextVKBox">
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
                                        <span>0 <i class="icon-ruble"></i></span>
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
<!-- Modal -->
<div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <span data-dismiss="modal" class="modal-close"><span class="glyphicon glyphicon-remove"></span></span>
        <h4 class="modal-title" id="myModalLabel">ОТПРАВЬТЕ ЗАЯВКУ<!--  НА ПОЛУЧЕНИЕ КОММЕРЧЕСКОГО ПРЕДЛОЖЕНИЯ И УСЛОВИЙ РАБОТЫ --></h4>
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
                <label><input type="radio" name="payMethod" value="bankCard">Оплата банковской картой или электронными деньгами</label>
                <label><input type="radio" name="payMethod" value="cashless">Безналичный расчёт</label>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="website" placeholder="Ваш сайт" />
                <textarea name="comments" placeholder="Список ваших конкурентов. Также вы можете оставить дополнительные вопросы"></textarea>
            </div>
            <button type="submit" class="btn btn-default">Отправить заявку</button>
            <p class="assure">Ваши данные в безопасности и не будут переданы третьим лицам</p>
        </form>
      </div>
    </div>
  </div>
</div>
			
<?php include("_partials/footer.php") ?>

