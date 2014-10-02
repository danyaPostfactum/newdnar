	<!-- FAQ -->
	<article id="questions-and-answers" class="row tab-pane">
		<div class="col-sm-12 center-block q-and-a">
            <table class="faq-table">
<? $qaChapterRows = array_chunk($qaChapters, 2)?>
<? foreach ($qaChapterRows as $row) { ?>
                <tr>
    <? foreach (array_pad($row, 2, null)  as $qaChapter) { ?>
                   <td>
        <? if ($qaChapter) { ?>
                        <h3><?= $qaChapter->get('pagetitle') ?></h3>
            <? $qaSubchapters = $qaChapter->getMany('Children'); ?>
            <? foreach ($qaSubchapters as $subchapter) { ?>
                        <h4 class="show-more-question"><a href="#" class="show-more"><?= $subchapter->get('pagetitle') ?></a></h4>
                        <div class="show-more-content show-more-answer">
                            <ul>
                <? $links = $subchapter->getMany('Children'); ?>
                <? foreach ($links as $link) { ?>
                    <li><a href="<?= 'qa/' . $link->get('alias') ?>"><?= $link->get('pagetitle'); ?></a></li>
                <? } ?>
                            </ul>
                        </div>
            <? } ?>
        <? } ?>
                   </td>
    <? } ?>
                </tr>
<? } ?>
            <tr>
            <td>
			<h3>Домены</h3>
			<h4 class="show-more-question"><a href="#" class="show-more">Домены в зонах .RU, .SU и .РФ</a>
			</h4>
			<div class="show-more-content show-more-answer">
				<ul>
                    <li>Регистрация доменов</li>
                    <li>Продление доменов</li>
                    <li>Делегирование доменов</li>
                    <li>Смена Регистратора доменов</li>
                    <li>Смена Администратора доменов</li>
                    <li>Удаление доменов</li>
                    <li>Перенос доменов на другой договор</li>
                    <li>Изменение данных Администратора домена</li>
                    <li>Заявление о реализации преимущественного права на регистрацию домена по решению суда (RTF)</li>
                </ul>
			</div>
			<h4 class="show-more-question"><a href="#" class="show-more">Домены в международных зонах (.com .net и другие)</a>
			</h4>
			<div class="show-more-content show-more-answer">
				<ul>
                    <li>Регистрация международных доменов</li>
                    <li>Продление международных доменов</li>
                    <li>Подтверждение электронного адреса для международных доменов</li>
                    <li>Перенос международных доменов от другого Регистратора в R01</li>
                    <li>Перенос международных доменов от другого Регистратора в R01 с одновременной сменой Администратора</li>
                    <li>Перенос международных доменов от R01 к другому Регистратору</li>
                    <li>Статусы международных доменов</li>
                    <li>Домены в зоне .TEL</li>
                    <li>Краткое описание зон для международных доменов</li>
                    <li>Перенос международных доменов на другой договор внутри R01</li>
                    <li>Перенос международных доменов внутри Directi к/от R01</li>
                    <li>Делегирование международных доменов</li>
                    <li>Если вы хотите для домена test.com установить DNS-серверы, имеющие имена в зоне test.com</li>
                    <li>Если вы хотите для домена .COM установить DNS-серверы, имеющие имена в домене .RU</li>
                    <li>Снятие с делегирования и удаление непродленных международных доменов</li>
                    <li>Восстановление международных доменов</li>
                    <li>Жалобы в отношении международных доменных имен</li>
                </ul>
			</div>
			<h4 class="show-more-question"><a href="#" class="show-more">Дополнительные услуги</a>
			</h4>
			<div class="show-more-content show-more-answer">
				<ul>
				    <li>Яндекс.Вебмастер</li>
                    <li>Открытие персональных и контактных данных</li>
                    <li>Редактор DNS (бесплатно)</li>
                    <li>Подключение услуги «Бесплатный сайт (парковка домена)»</li>
                    <li>Перенаправление сайта — web forwarding (бесплатно)</li>
                    <li>Перенаправление почты — mail forwarding (бесплатно)</li>
                    <li>Установка R01.BAR</li>
                    <li>SMS-уведомления / SMS-подтверждения</li>
                    <li>Ограничение доступа к личному кабинету R01 по IP (бесплатно)</li>
				</ul>
			</div>
            </td><td>
			
            <h3>Хостинг DNAR</h3>
			<h4 class="show-more-question"><a href="#" class="show-more">Заказ и продление услуг</a>
			</h4>
			<div class="show-more-content show-more-answer">
				<ul>
                    <li>Как заказать новый хостинг?</li>
                    <li>Как продлить уже существующий хостинг?</li>
                    <li>Как поменять тариф на хостинг или купить дополнительное место?</li>
                    <li>Перенос хостинга в R01</li>
                    <li>Перенос услуги хостинга на другой договор</li>
                    <li>Быстрый старт или с чего начать?</li>
                    <li>Описание тарифных планов</li>
                    <li>Отказ от хостинга</li>
                </ul>
			</div>
			<h4 class="show-more-question"><a href="#" class="show-more">Виртуальный хостинг (панель R01)</a>
			</h4>
			<div class="show-more-content show-more-answer">
                <ul>
                    <li>Полезные советы для начинающих</li>
                    <li>Особенности использования и примеры</li>
                    <li>Настройки программ</li>  
                </ul>
			</div>
            
                </td></tr><tr><td>
            <h3>DNS</h3>
			<h4 class="show-more-question"><a href="#" class="show-more">Вопросы по DNS</a>
			</h4>
			<div class="show-more-content show-more-answer">
                <ul>
                    <li>Что такое DNS?</li>
                    <li>Как работает DNS?</li>
                    <li>Типы записей в DNS</li>
                    <li>Как сделать, чтобы домен ссылался на конкретный IP-адрес?</li>
                    <li>Краткая справка по команде nslookup</li>
                    <li>Дочерние DNS-серверы для test.ru</li>
                    <li>Домен не открывается с www. Как это исправить?</li>
                    <li>Возможно у вас зарегистрировать DNS-серверы в базе NSI-Registry?</li>
                    <li>Необходимо перенести обслуживание домена к другому хостеру. Как направить домен на новый хостинг?</li>   
                </ul>
			</div>
			<h4 class="show-more-question"><a href="#" class="show-more">Редактор DNS</a>
			</h4>
			<div class="show-more-content show-more-answer">
                <ul>
                    <li>Редактор DNS (бесплатно)</li>
                    <li>Как воспользоваться бесплатной услугой primary и secondary DNS (Редактор DNS)?</li>
                    <li>Как внести изменения в зону на DNS на серверах Регистратора?</li>
                    <li>Шаблоны DNS-записей в DNS-редакторе R01</li>
                    <li>Нет возможности удалить некоторые NS-записи. Почему?</li>
                    <li>Не получается добавить CNAME-запись вида test.ru. CNAME www.test1.ru. Почему?</li>
                    <li>Как организовать зону обратного просмотра DNS (PTR-запись)?</li>
                </ul>
			</div>
			
                </td><td>
            <h3>Информация для партнеров и реселлеров</h3>
			<h4 class="show-more-question"><a href="#" class="show-more">Подробнее</a>
			</h4>
			<div class="show-more-content show-more-answer">
                <ul>
                    <li>API</li>
                    <li>Реселлинг услуг</li>
                    <li>Настройки внешнего вида панели (интеграция панели в ваш сайт)</li>
                    <li>Настройка приема платежей (QIWI кошелек)</li>
                    <li>Настройка приема платежей (WebMoney Merchant)</li>
                    <li>Настройка приема платежей (Robokassa)</li>
                    <li>Заведение абонента</li>
                    <li>Конструктор тарифов</li>
                    <li>Назначение/изменение тарифа абоненту</li>
                    <li>Задание тарифов, которые будут назначаться абонентам по умолчанию.</li>
                    <li>Настройка «Обратной связи»</li>
                    <li>Реселлинг хостинга</li>
                    <li>API для абонентов Реселлера</li>  
                </ul>
			</div>
			
                </td></tr></table>
			
			
		</div>
	</article>