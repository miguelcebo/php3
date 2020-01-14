<?php
class Correo {

    /**
     * sendMail: Gestiona el envio de correo.
     */

    public static function sendMail($datos) {

    //instancio un objeto de la clase PHPMailer
        
        $mail = new PHPMailer();
        $mail->CharSet = 'UTF-8';
    //Defino el cuerpo del mensaje en una variable $body
    //Se trae el contenido de un archivo de texto
    //Tambien podríamos hacer $body="contenido....";

    //Definimos el email y nombre del remitente del mensaje 
        $mail->SetFrom('email@remitente.com', 'Nombre completo');
        $body="<html><body>Los datos del usuario son: \r\n".$datos['cuerpo']."</body></html>";

    //Defino la dirección de email de reply a la que responder los mensajes,es recomendable 
    //dejar la misma direccion que el from para no caer en spam
        $mail->AddReplyTo("email@remitente.com","Nombre Completo");

    //Defino la dirección de correo a la que se envía el mensaje
        $address = " admin1@mispruebas.com";

    // Añadimos la dirección a la clase, indicando el nombre del destinatario
        $mail->AddAddress($address, "Nombre completo");

    // Añadimos un asunto al mensaje
        $mail->Subject = "Datos del usuario";

    //Puedo definir un cuerpo alternativo del mensaje,que contenga solo texto
        $mail->AltBody="Datos del usuario: ".$datos['cuerpo'];

    // Añadimos el destinatario de copia visible
        $mail->addCC('admin2@mispruebas.com');

    // Añadimos el destinatario de copia oculta
        $mail->addBCC('admin3@mispruebas.com');
        $mail->MsgHTML($body);
    //asigno un archivo adjunto al mensaje

        $mail->AddAttachment("fotos/${datos['foto']}");

    // Enviamos el mensaje, comprobando si se envió correctamente

    if(!$mail->Send()) {

        echo "Error al enviar el mensaje: " . $mail->ErrorInfo;
    }
        
    else {

        echo "Mensaje enviado!!";

    }

    }

}