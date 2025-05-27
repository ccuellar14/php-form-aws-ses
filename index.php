<?php

require 'vendor/autoload.php'; // Asegúrate de que el autoload está correctamente configurado

use Aws\Ses\SesClient;
use Aws\Exception\AwsException;

// Configuración de SES (actualiza con tus credenciales de AWS)
$sesClient = new SesClient([
    'version' => '2010-12-01',
    'region'  => 'eu-west-3',  // Cambia la región si es necesario
]);

// Comprobar si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoger datos del formulario
    $from = $_POST['from'];
    $to = $_POST['to'];
    $subject = $_POST['subject'];
    $body = $_POST['body'];

    // Enviar correo utilizando SES
    try {
        $result = $sesClient->sendEmail([
            'Destination' => [
                'ToAddresses' => [$to],
            ],
            'Message' => [
                'Body' => [
                    'Text' => [
                        'Charset' => 'UTF-8',
                        'Data' => $body,
                    ],
                ],
                'Subject' => [
                    'Charset' => 'UTF-8',
                    'Data' => $subject,
                ],
            ],
            'Source' => $from,
        ]);
        echo "Correo enviado correctamente! ID del mensaje: " . $result['MessageId'];
    } catch (AwsException $e) {
        echo "Error al enviar el correo: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar Correo con SES</title>
</head>
<body>
    <h2>Formulario para Enviar Correo</h2>
    <form action="index.php" method="POST">
        <label for="from">De (Correo Verificado):</label><br>
        <input type="email" name="from" id="from" required><br><br>

        <label for="to">Para (Correo Destinatario):</label><br>
        <input type="email" name="to" id="to" required><br><br>

        <label for="subject">Asunto:</label><br>
        <input type="text" name="subject" id="subject" required><br><br>

        <label for="body">Cuerpo del Mensaje:</label><br>
        <textarea name="body" id="body" rows="5" cols="40" required></textarea><br><br>

        <button type="submit">Enviar Correo</button>
    </form>
</body>
</html>
