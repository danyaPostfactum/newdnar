<?php 
	$title = 'Хостинг';
	$description = 'test1';
	$keywords = 'test2';
	include(ROOT_PATH . '_partials/header.php') 
?>

<div class="jumbotron">
	<div class="container">
		<div class="row">
			<div class="col-sm-7">
                <h1>Хостинг DNAR</h1>
				<p>Можешь этим заняться )</p>
            </div>
            <div class="hidden-xs col-sm-5">
						<img src="<?php echo BASE_URL; ?>dist/assets/img/hostings.png"class="pull-right" alt="">
            </div>
		</div>
		
	</div>
</div>

<div class="container">

    <h4>Преимущества хостинга DNAR</h4>
<ul>
    <li>Более 6 лет успешной работы на рынке хостинга сайтов и регистрации доменов ru. Гарантия качества хостинга!</li>
    <li>Функциональная, постоянно развивающаяся панель управления хостингом</li>
    <li>Круглосуточная техподдержка 24х7</li>
    <li>В качестве серверных операционных систем используется FreeBSD. Невосприимчивость unix-систем к вирусным атакам делает хостинг DNAR более качественным, стабильным и надёжным.</li>
    <li>Большое количество способов оплаты: через электронные платежные системы (Webmoney, Яндекс.Деньги и др.), через кредитные карты, наличными через терминалы QIWI, со счета сотового телефона, безналичный расчет, наличными в московском офисе или через Сбербанк.</li>
    <li>Использование собственных широкополосных каналов связи и непрерывный мониторинг предоставляемых сервисов службой технической поддержки.</li>
    <li>Мы не отключаем неоплаченный хостинг в выходные и праздничные дни. Отдыхайте спокойно!</li>
</ul>

<table class="table dhost">
    <thead>
       <tr>
        <th>&nbsp;</th>
        <th>Мини</th>
        <th>Макси</th>
        <th>Ультра</th>
      </tr>
    </thead>
<tr>
<td class="dhfirst">Диск</td>
<td>3 Гб</td>
<td>7 Гб</td>
<td>12 Гб</td>
</tr>
<tr>
<td class="dhfirst">Сайтов</td>
<td>до 6</td>
<td>до 12</td>
<td>до 24</td>
</tr>
<tr>
<td class="dhfirst">PHP, Perl, Mysql</td>
<td>-</td>
<td>+</td>
<td>+</td>
</tr>
<tr>
<td class="dhfirst">Выделенная память, МБ</td>
<td>64</td>
<td>128</td>
<td>192</td>
</tr>
<tr>
<td class="dhfirst">Число процессов</td>
<td>16</td>
<td>32</td>
<td>64</td>
</tr>
<tr>
<td class="dhfirst">Выделенный IP, SSL</td>
<td>-</td>
<td>-</td>
<td>+</td>
</tr>
<tr>
<td class="dhfirst">Цена при оплате на 1&nbsp;мес.</td>
<td><s>210 руб.</s><br>201.6 руб.</td>
<td><s>330 руб.</s><br>316.8 руб.</td>
<td><s>510 руб.</s><br>489.6 руб.</td>
</tr>
<tr>
<td class="dhfirst">Цена при оплате на 1&nbsp;год</td>
<td><s>1950 руб.</s><br>1872 руб.</td>
<td ><s>3150 руб.</s><br>3024 руб.</td>
<td><s>4890  руб.</s><br>4694.4 руб.</td>
</tr>
<tr>
<td class="dhfirst">О тарифе</td>
<td>Для простого сайта без динамических страниц</td>
<td>Оптимальный вариант для сайта с&nbsp;динамическими страницами без большой посещаемости</td>
<td>Тариф, предназначенный для сложных сайтов, рассчитанных на&nbsp;большую посещаемость</td>
</tr>
<tr>
<td class="dhfirst">Платформа</td>
<td colspan=4>UNIX</td>
</tr>

<tr>
<td class="dhfirst">Тестовый период</td>
<td>+</td>
<td>+</td>
<td>+</td>
</tr>

<tr>
<td></td>
<td><button type="button" class="btn btn-default" data-toggle="modal" data-target="#dnarLoginModal">Зарегистрировать</button></td>
<td><button type="button" class="btn btn-default" data-toggle="modal" data-target="#dnarLoginModal">Зарегистрировать</button></td>
<td><button type="button" class="btn btn-default" data-toggle="modal" data-target="#dnarLoginModal">Зарегистрировать</button></td>
</tr>

</table>



    <h4>Тестовый хостинг</h4>
Вы можете ознакомиться с хостингом DNAR до того, как произведете оплату. Вам может быть предоставлен бесплатный тестовый период продолжительностью 10 дней. Тестовый хостинг доступен абонентам DNAR с проверенной информацией по договору у которых еще нет хостинга в DNAR. Для того, чтобы воспользоваться услугой тестового хостинга, необходимо в личном кабинете DNAR в разделе Хостинг выбрать в панели инструментов Тестовый хостинг. На тестовом хостинге есть возможность разместить 1 действующий сайт. 



<?php include("_partials/footer.php") ?>

