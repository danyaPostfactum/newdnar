<?php 	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$callform = $_POST;
		//parse_str($_POST["callform"], $callform);
		
		// $serviceform = array();
		// parse_str($_POST["serviceform"], $serviceform);

		// $labelDecode = json_decode($_POST["decipher"], true);


		$name = trim($callform["name"]);
		$email = trim($callform["email"]);
		$phone = trim($callform["phone"]);
		$website = trim($callform["website"]);
		$comments = trim($callform["comments"]);
		$paymentMethod = trim($callform["payMethod"]);

		$analyze = (array) $callform['analyze'];

		$competitors = $callform['compAmount'];
		$price = $callform['price'];

		//$firstForm = $_POST["queryYandDirect"];

		$error_message = array();

		if (!$name) {
			array_push($error_message, "Пожалуйста, представьтесь");
		}

		if (!$email) {
			array_push($error_message, "Укажите адрес электронной почты.");
		}

		if (!$phone) {
			array_push($error_message, "Укажите свой номер телефона.");
		}


		// Валидация email'а

		// Copyright © Michael Rushton 2009-10
	    // http://squiloople.com/
	    // Feel free to use and redistribute this code. But please keep this copyright notice.
		$pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';
		$emailaddress = $email;

		if ($email && preg_match($pattern, $emailaddress) !== 1) {
		    array_push($error_message, "Неправильный адрес электронной почты.");
		}


		//foreach( $callform as $value ) {
		//	if( stripos($value,'Content-Type:') !== FALSE ){
		//		array_push($error_message, "There was a problem with the information you entered.");
		//	}
		//}

		if (isset($callform["address"])) {
			array_push($error_message, "Your form submission has an error.");
		}

		// require_once("phpmailer/class.phpmailer.php");
		// $mail = new PHPMailer();

		//if (!$mail->ValidateAddress($email)) {
		//	array_push($error_message, "You must specify a valid e-mail address.");
		//}

		if (!$error_message) {
			$email_body = "";
			$email_body = $email_body . "<b>" . "Имя: " . "</b>" . $name . "<br />";
			$email_body = $email_body . "<b>" . "Email: " . "</b>" . $email . "<br />";
			$email_body = $email_body . "<b>" . "Телефон: " . "</b>" . $phone . "<br />";
			$email_body = $email_body . "<b>" . "Website: " . "</b>" . $website . "<br />";
			$email_body = $email_body . "<b>" . "Способ оплаты: " . "</b>" . $paymentMethod . "<br />";
			$email_body = $email_body . "<b>" . "Комментарий: " . "</b>" . "<p>" . $comments . "</p>";

			$email_body = $email_body . "<b>" . "Выбранные услуги:" . "</b><br />";
			$j = 1;
			foreach ($analyze as $key => $value) {
				$email_body = $email_body . $j . '. ' . $value . "<br />";
				$j++;
			}
			$email_body = $email_body . '<b>Конкурентов:</b> ' . $competitors . "<br />";
			$email_body = $email_body . '<b>Цена:</b> ' . $price;

			// Send Email
			$emailaddress = "hello@gemagency.ru";
			$to      = $emailaddress;
			$subject = "Анализ конкурентов | " . $name;
			$message = $email_body;
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			// $headers .= 'To: ' . $emailaddress . "\r\n";
			$headers .= 'From: ' . $email . "\r\n";

			mail($to, $subject, $message, $headers);

			//echo $email_body;
			if (@mail($to, $subject, $message, $headers)) {
				$response = array('success' => true, 'message' => "Спасибо за заявку, мы ответим вам в течение рабочего дня");

			} else {
				$response = array('success' => false, 'message' => "Произошла ошибка отправки данных. Попробуйте снова.");
			}

		} else {
				$response = array('success' => false, 'message' => "Возникли ошибки при заполнении формы: \n" . implode("\n", $error_message));
		}

		header('Content-Type: application/json');
		echo json_encode($response);
	} else {
		echo "not post method";
	}
 ?>
