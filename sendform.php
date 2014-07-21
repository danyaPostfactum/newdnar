<?php 	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$name = trim($_POST["name"]);
		$phoneEmail = trim($_POST["phone-email"]);
		$message = trim($_POST["message"]);

		$error_message = array();

		if (! $phoneEmail OR !$message) {
			array_push($error_message, "Пожалуйста, укажите данные для связи и заполните текст сообщения.");
		}


		// Валидация email'а --- отключена!

		// Copyright © Michael Rushton 2009-10
	    // http://squiloople.com/
	    // Feel free to use and redistribute this code. But please keep this copyright notice.

		// $pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';
		// $emailaddress = $email;

		// if (preg_match($pattern, $emailaddress) !== 1) {
		//     array_push($error_message, "Неправильный адрес электронной почты.");
		// }


		foreach( $_POST as $value ) {
			if( stripos($value,'Content-Type:') !== FALSE ){
				array_push($error_message, "There was a problem with the information you entered.");
			}
		}

		if ($_POST["address"]) {
			array_push($error_message, "При заполнении формы произошла ошибка ввода.");
		}

		// require_once("phpmailer/class.phpmailer.php");
		// $mail = new PHPMailer();

		//if (!$mail->ValidateAddress($email)) {
		//	array_push($error_message, "You must specify a valid e-mail address.");
		//}

		if (!$error_message) {
			$email_body = "";
			$email_body = $email_body . "<b>" . "Имя: " . "</b>" . $name . "<br />";
			$email_body = $email_body . "<b>" . "Email: " . "</b>" . $phoneEmail . "<br />";
			$email_body = $email_body . "<b>" . "Комментарий: " . "</b>" . "<p>" . $message . "</p>";

			// Send Email
			// $emailaddress = "hello@gemagency.ru";
			$emailaddress = "everdimension@gmail.com";
			$to      = $emailaddress;
			$subject = "DNAR Техподдержка | " . $name;
			$email_message = $email_body;
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			//$headers .= 'To: ' . $emailaddress . "\r\n";
			$headers .= 'From: ' . "Форма на Dnar.ru" . "\r\n";

			//mail($to, $subject, $email_message, $headers);

			//echo $email_body;
			if (@mail($to, $subject, $email_message, $headers)) {
				echo "Спасибо за заявку, мы ответим вам в течение рабочего дня";

			} else {
				echo "Произошла ошибка отправки данных";
			}

		} else {
			echo "Произошла ошибка при заполнении формы", $error_message;
		}
	}
 ?>
