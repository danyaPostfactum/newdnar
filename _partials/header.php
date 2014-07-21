<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="../../favicon.ico">

		<title>Jumbotron Template for Bootstrap</title>

		<!-- Bootstrap core CSS -->
		<link href="dist/css/main.css" rel="stylesheet">

		<!-- Fonts -->
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,700,500,900&subset=cyrillic-ext,latin' rel='stylesheet' type='text/css'>

		<!-- Icons -->
		<link rel="stylesheet" href="dist/assets/fonts/icomoons.css">

		<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
		<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
		<script src="dist/assets/js/ie-emulation-modes-warning.js"></script>

		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<script src="dist/assets/js/ie10-viewport-bug-workaround.js"></script>

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>

	<body>
		<!-- Modal -->
		<div class="modal fade" id="dnarLoginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-body">
				<form name="tjf" role="form" action="http://domain.dnar.ru" method="post">
					<input type=hidden name='wizard_domain2' value=''>
					<input type=hidden name='auid' value=''>
					<input type=hidden name='htid' value=''>
					<input type=hidden name=action value=1>
					<div class="form-group">
						<!-- <label for="name">Email address</label> -->
						<input name="login" type="text" class="form-control" id="name" placeholder="Логин">
					</div>
					<div class="form-group">
						<!-- <label for="passwd">Password</label> -->
						<input name="passwd" type="password" class="form-control" id="passwd" placeholder="Пароль">
					</div>

					<button type="submit" class="btn btn-default btn-wide">Войти на сайт</button>
				</form>

			  </div>
			  <div class="modal-footer">
			  	<a href="http://domain.dnar.ru/forgot.khtml" class="forgot-link">Забыли пароль?</a>
				<a href="http://domain.dnar.ru/OFFERTA/offerta_add_select_type.khtml" class="btn btn-default btn-full pull-right">Регистрация</a>
				<!-- <button type="button" class="btn btn-default modal-close" data-dismiss="modal">Close</button> -->
				<span data-dismiss="modal" class="modal-close"><span class="glyphicon glyphicon-remove"></span></span>
			  </div>
			</div>
		  </div>
		</div> <!-- End Modal -->

		<div class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Dnar.ru</a>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav">

						<li <?php if ($page_name == 'domains') { ?>class="active"<?php } ?>><a href="<?php echo BASE_URL; ?>">Домены</a></li>
						<li <?php if ($page_name == 'ssl') { ?>class="active"<?php } ?>><a href="#about">SSL сертификаты</a></li>
						<li <?php if ($page_name == 'hostings') { ?>class="active"<?php } ?>><a href="<?php echo BASE_URL; ?>hostings.php">Хостинги</a></li>
						<li <?php if ($page_name == 'analyze') { ?>class="active"<?php } ?>><a href="#about">Анализ сайтов</a></li>
						<li <?php if ($page_name == 'garant') { ?>class="active"<?php } ?>><a href="#about">Гарант сделок</a></li>
						<li <?php if ($page_name == 'support') { ?>class="active"<?php } ?>><a href="<?php echo BASE_URL; ?>support.php">Поддержка сайтов</a></li>

					</ul>
					<form class="navbar-form navbar-left pull-right" role="search">
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#dnarLoginModal">Войти</button>
					</form>
					

				</div><!--/.navbar-collapse -->
			</div>
		</div>