card-wrapper<?php 
	$title = 'Поддержка сайтов';
	$description = 'test1';
	$keywords = 'test2';
	include(ROOT_PATH . '_partials/header.php') 
?>

<div class="jumbotron <?php if ($page_title == 'domains') { echo 'jumbotron-brand'; } ?>">
	<div class="container">
		<div class="row">		
            <div class="col-sm-7">
	            <h1>Поддержка сайтов</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus amet inventore maiores magni provident tenetur rem, eum ratione qui eveniet alias, molestias ex, quo quidem doloremque. Necessitatibus delectus rem quibusdam et, atque voluptatum cumque aspernatur, unde modi praesentium porro consequatur velit sint nemo rerum laborum beatae amet minus, vitae doloremque, quisquam aliquam. Laborum, tempora dolor odit quidem, cum, tempore eum mollitia sint ad reiciendis numquam labore minus perferendis libero commodi.</p>
            </div>
            <div class="hidden-xs col-sm-5">
						<img src="<?php echo BASE_URL; ?>dist/assets/img/support.png"class="pull-right" alt="">
            </div>
		</div>
		
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<ul class="tabs-row" id="supportTabs">
				<li class="tabs-row-item active"><a role="tab" data-toggle="tab" href="#one"><span class="icon-spades"></span></a></li>
				<li class="tabs-row-item"><a role="tab" data-toggle="tab" href="#two"><span class="icon-pacman"></span></a></li>
				<li class="tabs-row-item"><a role="tab" data-toggle="tab" href="#three"><span class="icon-spades"></span></a></li>
				<li class="tabs-row-item"><a role="tab" data-toggle="tab" href="#four"><span class="icon-tag"></span></a></li>
				<li class="tabs-row-item"><a role="tab" data-toggle="tab" href="#five"><span class="icon-busy"></span></a></li>
				<li class="tabs-row-item"><a role="tab" data-toggle="tab" href="#six"><span class="icon-library"></span></a></li>
			</ul>
		</div>
	</div>
	<div class="row main-tab-content">
		<article class="col-sm-12 tab-pane active" id="one">
			<h3>Стоимость техподдержки сайта</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi aliquam natus, atque accusamus vel iure odio obcaecati quaerat officiis! Maiores amet est esse error, quis tenetur doloremque. Eum voluptatem repellat aliquid omnis aperiam amet nihil, praesentium a aut laboriosam? Adipisci voluptates vero incidunt perferendis nulla illum, natus sed tempore officia inventore. Veniam vel cum officia voluptatum! Molestias pariatur dignissimos nesciunt, aliquid nulla ipsam nostrum. Quisquam cum, omnis obcaecati corrupti illum possimus similique illo consectetur, voluptatum molestiae quae deleniti, dolorum mollitia ab, assumenda dolor ipsum hic fuga id laborum atque quis. Sequi nemo voluptatum natus illo explicabo magnam consequatur, velit voluptatibus magni perspiciatis esse possimus, similique deleniti praesentium dicta dolore saepe facere eveniet, laboriosam quod cumque? Aperiam eum, deserunt consectetur ducimus nobis ad neque quaerat id tempora, recusandae natus ut quo porro, perspiciatis voluptate molestiae? Vel, sapiente placeat perspiciatis, magni ratione nihil, animi cupiditate maxime aperiam quia atque esse reiciendis natus illum ducimus maiores, deleniti doloremque mollitia dolorem. Temporibus consectetur cumque modi dignissimos saepe reiciendis repellendus beatae excepturi sequi voluptatem hic error, esse pariatur, reprehenderit nisi tenetur, nesciunt voluptate tempore facilis. Ipsum culpa blanditiis vel amet, adipisci illo tenetur a. Sed veritatis quas numquam sit in ut, tempora ea sint quaerat.</p>

			<h3>Варианты услуг</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae, quam odit itaque ad natus soluta officia maxime eaque, et accusantium, error sunt. Blanditiis unde assumenda explicabo voluptatem cumque iusto aspernatur a reiciendis repellendus laboriosam! Magnam molestias eos velit ullam, quos officia nulla odio, minima voluptate provident. Tempore, cum repellat. Ab quam, nam neque molestiae quasi ratione cupiditate similique eum non adipisci repudiandae id sunt, sapiente est at. Fugiat beatae, reprehenderit modi aliquam totam quidem deserunt cumque commodi expedita recusandae possimus sit, sunt laborum maiores assumenda doloremque, sint velit est alias repellendus, veritatis rem ducimus officia autem. Optio reprehenderit odit distinctio eum dolore. Odit mollitia odio, magni distinctio, iure officiis aliquid consequuntur dolores. Perferendis nisi ducimus possimus autem iure eveniet, magni assumenda totam deleniti esse voluptatibus, quod nam asperiores facere. Beatae.</p>

			<table class="table">
				<thead>
					<tr>
						<th>Значение</th>
						<th>Параметр</th>
						<th>Сумма</th>
					</tr>
				</thead>
				<tr>
					<td>Текст значения</td>
					<td>Частный параметр</td>
					<td><b>99 999 <i class="icon-ruble"></i></b></td>
				</tr>
				<tr>
					<td>Контент менеджмент</td>
					<td>Ежедневно</td>
					<td><b>50 000 <i class="icon-ruble"></i></b></td>
				</tr>
				<tr>
					<td>Настройка настроек</td>
					<td>Однажды</td>
					<td><b>9 333 <i class="icon-ruble"></i></b></td>
				</tr>

			</table>

			<form action="sendform.php" method="post" class="card-wrapper feedback-form" id="supportForm">
				<div class="form-group">
					<input name="name" type="text" class="form-control" id="name" placeholder="Как вас зовут?">
				</div>
				<div class="form-group">
					<input name="phone-email" type="text" class="form-control" id="phone_email" placeholder="Ваш телефон или e-mail">
				</div>
				<div class="form-group address-input">
					<input name="address" type="text" class="form-control" id="address" placeholder="Не заполняйте это поле">
				</div>
				<div class="form-group">
					<textarea name="message" class="form-control" id="message" placeholder="Сообщение"></textarea>
				</div>

				<button type="submit" class="btn btn-default btn-wide">Отправить сообщение</button>

				<!-- <span class="help-block help-block-attach small text-center"><a href="#">Можно прикрепить файл</a></span> -->

				<div class="form-success-text">
					<p>Stuff</p>
				</div>
			</form>
		</article>
		<article class="col-sm-12 tab-pane" id="two">
			<h3>Второй раздел</h3>
			<p>Lorem Maiores amet est esse error, quis tenetur doloremque. Eum voluptatem repellat aliquid omnis aperiam amet nihil, praesentium a aut laboriosam? Adipisci voluptates vero incidunt perferendis nulla illum, natus sed tempore officia inventore. Veniam vel cum officia voluptatum! Molestias pariatur dignissimos nesciunt, aliquid nulla ipsam nostrum. Quisquam cum, omnis obcaecati corrupti illum possimus similique illo consectetur, voluptatum molestiae quae deleniti, dolorum mollitia ab, assumenda dolor ipsum hic fuga id laborum atque quis. Sequi nemo voluptatum natus illo explicabo magnam consequatur, velit voluptatibus magni perspiciatis esse possimus, similique deleniti praesentium dicta dolore saepe facere eveniet, laboriosam quod cumque? Aperiam eum, deserunt consectetur ducimus nobis ad neque quaerat id tempora, recusandae natus ut quo porro, perspiciatis voluptate molestiae? Vel, sapiente placeat perspiciatis, magni ratione nihil, animi cupiditate maxime aperiam quia atque esse reiciendis natus illum ducimus maiores, deleniti doloremque mollitia dolorem. Temporibus consectetur cumque modi dignissimos saepe reiciendis repellendus beatae excepturi sequi voluptatem hic error, esse pariatur, reprehenderit nisi tenetur, nesciunt voluptate tempore facilis. Ipsum culpa blanditiis vel amet, adipisci illo tenetur a. Sed veritatis quas numquam sit in ut, tempora ea sint quaerat.</p>

			<h3>Варианты услуг</h3>
			<p>Lorem ipsum dolor sit amet, error sunt. Blanditiis unde assumenda explicabo voluptatem cumque iusto aspernatur a reiciendis repellendus laboriosam! Magnam molestias eos velit ullam, quos officia nulla odio, minima voluptate provident. Tempore, cum repellat. Ab quam, nam neque molestiae quasi ratione cupiditate similique eum non adipisci repudiandae id sunt, sapiente est at. Fugiat beatae, reprehenderit modi aliquam totam quidem deserunt cumque commodi expedita recusandae possimus sit, sunt laborum maiores assumenda doloremque, sint velit est alias repellendus, veritatis rem ducimus officia autem. Optio reprehenderit odit distinctio eum dolore. Odit mollitia odio, magni distinctio, iure officiis aliquid consequuntur dolores. Perferendis nisi ducimus possimus autem iure eveniet, magni assumenda totam deleniti esse voluptatibus, quod nam asperiores facere. Beatae.</p>

			<table class="table">
				<thead>
					<tr>
						<th>Значение</th>
						<th>Параметр</th>
						<th>Сумма</th>
					</tr>
				</thead>
				<tr>
					<td>Текст значения</td>
					<td>Частный параметр</td>
					<td><b>99 999 <i class="icon-ruble"></i></b></td>
				</tr>
				<tr>
					<td>Контент менеджмент</td>
					<td>Ежедневно</td>
					<td><b>50 000 <i class="icon-ruble"></i></b></td>
				</tr>
				<tr>
					<td>Настройка настроек</td>
					<td>Однажды</td>
					<td><b>9 333 <i class="icon-ruble"></i></b></td>
				</tr>

			</table>

			<form action="sendform.php" method="post" class="card-wrapper feedback-form" id="supportForm">
				<div class="form-group">
					<input name="name" type="text" class="form-control" id="name" placeholder="Как вас зовут?">
				</div>
				<div class="form-group">
					<input name="phone-email" type="text" class="form-control" id="phone_email" placeholder="Ваш телефон или e-mail">
				</div>
				<div class="form-group address-input">
					<input name="address" type="text" class="form-control" id="address" placeholder="Не заполняйте это поле">
				</div>
				<div class="form-group">
					<textarea name="message" class="form-control" id="message" placeholder="Сообщение"></textarea>
				</div>

				<button type="submit" class="btn btn-default btn-wide">Отправить сообщение</button>

				<!-- <span class="help-block help-block-attach small text-center"><a href="#">Можно прикрепить файл</a></span> -->

				<div class="form-success-text">
					<p>Stuff</p>
				</div>
			</form>
		</article>
		<article class="col-sm-12 tab-pane" id="three">
			<h3>АываыВаыв ылдваывлдоаыл</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi aliquam natus, atque accusamus vel iure odio obcaecati quaerat officiis! Maiores amet est esse error, quis tenetur doloremque. Eum voluptatem repellat aliquid omnis aperiam amet nihil, praesentium a aut laboriosam? Adipisci voluptates vero incidunt perferendis nulla illum, natus sed tempore officia inventore. Veniam vel cum officia voluptatum! Molestias pariatur dignissimos nesciunt, aliquid nulla ipsam nostrum. Quisquam cum, omnis obcaecati corrupti illum possimus similique illo consectetur, voluptatum molestiae quae deleniti, dolorum mollitia ab, assumenda dolor ipsum hic fuga id laborum atque quis. Sequi nemo voluptatum natus illo explicabo magnam consequatur, velit voluptatibus magni perspiciatis esse possimus, similique deleniti praesentium dicta dolore saepe facere eveniet, laboriosam quod cumque? Aperiam eum, deserunt consectetur ducimus nobis ad neque quaerat id tempora, recusandae natus ut quo porro, perspiciatis voluptate molestiae? Vel, sapiente placeat perspiciatis, magni ratione nihil, animi cupiditate maxime aperiam quia atque esse reiciendis natus illum ducimus maiores, deleniti doloremque mollitia dolorem. Temporibus consectetur cumque modi dignissimos saepe reiciendis repellendus beatae excepturi sequi voluptatem hic error, esse pariatur, reprehenderit nisi tenetur, nesciunt voluptate tempore facilis. Ipsum culpa blanditiis vel amet, adipisci illo tenetur a. Sed veritatis quas numquam sit in ut, tempora ea sint quaerat.</p>

			<h3>Ещё заголовок</h3>
			<p>Lorem ipsuma maxime eaque, et accusantium, error sunt. Blanditiis unde assumenda explicabo voluptatem cumque iusto aspernatur a reiciendis repellendus laboriosam! Magnam molestias eos velit ullam, quos officia nulla odio, minima voluptate provident. Tempore, cum repellat. Ab quam, nam neque molestiae quasi ratione cupiditate similique eum non adipisci repudiandae id sunt, sapiente est at. Fugiat beatae, reprehenderit modi aliquam totam quidem deserunt cumque commodi expedita recusandae possimus sit, sunt laborum maiores assumenda doloremque, sint velit est alias repellendus, veritatis rem ducimus officia autem. Optio reprehenderit odit distinctio eum dolore. Odit mollitia odio, magni distinctio, iure officiis aliquid consequuntur dolores. Perferendis nisi ducimus possimus autem iure eveniet, magni assumenda totam deleniti esse voluptatibus, quod nam asperiores facere. Beatae.</p>


			<form action="sendform.php" method="post" class="card-wrapper feedback-form" id="supportForm">
				<div class="form-group">
					<input name="name" type="text" class="form-control" id="name" placeholder="Как вас зовут?">
				</div>
				<div class="form-group">
					<input name="phone-email" type="text" class="form-control" id="phone_email" placeholder="Ваш телефон или e-mail">
				</div>
				<div class="form-group address-input">
					<input name="address" type="text" class="form-control" id="address" placeholder="Не заполняйте это поле">
				</div>
				<div class="form-group">
					<textarea name="message" class="form-control" id="message" placeholder="Сообщение"></textarea>
				</div>

				<button type="submit" class="btn btn-default btn-wide">Отправить сообщение</button>

				<!-- <span class="help-block help-block-attach small text-center"><a href="#">Можно прикрепить файл</a></span> -->

				<div class="form-success-text">
					<p>Stuff</p>
				</div>
			</form>
		</article>

		<!-- <aside class="col-sm-3">
			<article class="side-nav">
				<h4 class="subheader">Услуги</h4>
				<ul class="sidebar-link-group">
					<li class="active sidebar-link-item"><a href="">Техническая поддержка сайтов</a></li>
					<li class="sidebar-link-item"><a href="#">Администрирование, обслуживание, восстановление сайтов</a></li>
					<li class="sidebar-link-item"><a href="#">Доработка, изменения сайтов</a></li>
					<li class="sidebar-link-item"><a href="#">Контентная поддержка (обновление и наполнение сайтов, обновление информации на сайте)</a></li>
					<li class="sidebar-link-item"><a href="#">Улучшение юзабилити (оптимизация навигации по сайту)</a></li>
					<li class="sidebar-link-item"><a href="#">Поисковая оптимизация и продвижение сайтов</a></li>
					<li class="sidebar-link-item"><a href="#">Контекстная реклама (Яндекс, Google)</a></li>
					<li class="sidebar-link-item"><a href="#">Хостинг (физическое размещение сайтов)</a></li>
					<li class="sidebar-link-item"><a href="#">Личный кабинет, отчеты, бухгалтерские документы, персональынй менеджер, консультации по телефону</a></li>
				</ul>
			</article>
		</aside> -->
	</div>

<?php include(ROOT_PATH . "_partials/footer.php") ?>

