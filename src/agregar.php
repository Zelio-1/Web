<?php

$apiUrl = 'https://web-backend-rlk1.onrender.com/api/comentarios'; // <-- cámbialo por el endpoint real

$data = [
    'texto' => $_POST['texto'] ?? ''
];

$ch = curl_init($apiUrl);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Accept: application/json'
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Error al enviar comentario: ' . curl_error($ch);
} else {
    echo 'Respuesta del servidor: ' . $response;
}

curl_close($ch);