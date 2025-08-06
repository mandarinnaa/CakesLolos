<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensaje de Contacto</title>
</head>
<body>
    <h2>Nuevo mensaje de contacto</h2>
    <p><strong>Nombre:</strong> {{ $contactData['name'] }}</p>
    <p><strong>Asunto:</strong> {{ $contactData['subject'] }}</p>
    <p><strong>Correo:</strong> {{ $contactData['email'] }}</p>
    <p><strong>Mensaje:</strong></p>
    <p>{{ $contactData['message'] }}</p>
</body>
</html>
