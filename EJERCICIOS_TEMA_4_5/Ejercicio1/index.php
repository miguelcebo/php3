<?php

// Incluimos la clase PHPMailer

    require_once('class.phpmailer.php');

// Instanciamos un objeto de la clase PHPMailer

    $mail = new PHPMailer();
    $mail->CharSet = 'UTF-8';

// Definimos el cuerpo del mensaje en una variable $body
// Almacenamos en una variable el contenido de un archivo de texto
// También podríamos hacer $body="contenido...";

    $body = file_get_contents('contenido.html');

// Definimos el email y nombre del remitente del mensaje

    $mail->SetFrom('email@remitente.com', 'Nombre completo');

// Definimos la dirección de email de "reply", a la que responder los mensajes

    $mail->AddReplyTo("email@remitente.com","Nombre Completo");

// Definimos la dirección de correo a la que se envía el mensaje

    $address = "email@destinatario.com";

// Añadimos la dirección a la clase, indicando el nombre del destinatario

    $mail->AddAddress($address, "Nombre completo");

// Añadimos un asunto al mensaje

    $mail->Subject = "Envío de email con PHPMailer en PHP";

// Añadimos el destinatario de copia visible

    $mail->addCC('perico@mispruebas.com');

// Añadimos el destinatario de copia oculta

    $mail->addBCC('andres@mispruebas.com');

// Insertamos el texto del mensaje en formato HTML
/* Si deseamos enviarlo en texto plano, haremos lo siguiente:
* $correo->IsHTML(false);
* $correo->Body = "Mi mensaje en Texto Plano";
*/

    $mail->MsgHTML($body);

// Asignamos un archivo adjunto al mensaje

    $mail->AddAttachment("avatar.jpg");

// Enviamos el mensaje, comprobando si se envió correctamente

if(!$mail->Send()) {

    echo "Error al enviar el mensaje: " . $mail>ErrorInfo;

}

else {

    echo "Mensaje enviado!!";

}

?>