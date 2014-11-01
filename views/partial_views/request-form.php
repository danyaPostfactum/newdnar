<div class="row plane-form">
	<div class="col-sm-12">
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
	</div>
</div>