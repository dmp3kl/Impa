<?php
	// Las Variables
	// require("class.phpmailer.php");
	// require("class.smtp.php");

	$nombre = $_POST['nombre'];
	$correo = $_POST['correo'];
	$asunto = $_POST['asunto'];
	$cuerpo = $_POST['cuerpo'];

	printf("Nombre: %s, Correo: %s, Asunto: %s, Cuerpo: %s. </br>", $nombre, $correo, $asunto, $cuerpo);
	// Funciones
	function sendGmail($nombre, $correo, $cuerpo, $asunto){
		echo "entra </br>";

		printf(" Otra vez... Nombre: %s, Correo: %s, Asunto: %s, Cuerpo: %s. </br>", $nombre, $correo, $asunto, $cuerpo);


		$mail = new PHPMailer();
		$body = 'Buenas Tardes señor Gonzalez</br>';
			$body .= $cuerpo;

		$mail = IsSMTP();

		// Acá va el formato y puertos desde el correo que se va a enviar
		$mail->Host       = "smtp.gmail.com";
		$mail->Port       = 465;
		$mail->SMTPAuth   = true;
		$mail->SMTPSecure = "ssl";
		$mail->SMTPDebug  = 1;

		// Acá va los datos del correo desde donde se va a enviar
		$mail->From = "consultas.impanel@gmail.com";
		$mail->FromName = $nombre;
		$mail->Subject  = $asunto;
		$mail->MsgHTML($body);

		// Acá va la cuenta de destino...
		$mail->AddAddress('se.miranda86@gmail.com');
		$mail->SMTPAuth = true;

		// El correo y password de la cuenta que envía
		$mail->Username = "consultas.impanel@gmail.com";
		$mail->Password = "Consultasimpanel2017";

		printf("el if");
		// Se envía
		if($mail->Send()){
			printf("Correo enviado");
		}else{
			printf("Correo no enviado");
			return false;
			die();
		}
	}

	$html = sendGmail($nombre, $correo, $cuerpo, $asunto);

	printf($html);
	
?>