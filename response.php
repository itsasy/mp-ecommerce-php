<?php
require 'vendor/autoload.php';

$accessToken = 'APP_USR-8208253118659647-112521-dd670f3fd6aa9147df51117701a2082e-677408439';

MercadoPago\SDK::setAccessToken($accessToken);

$data = $_GET;

switch ($data['id']) {
    case 'failure':
        echo "<h2>El pago fue rechazado</h2>";
        break;
    case 'pending':
        echo "<h2>El pago está siendo procesado</h2>";
        break;
    case 'success':
        echo "<h2>El pago fue aprobado";
        echo "<hr>" . $data['id'];
        echo "<hr>preference_id: " . $data['preference_id'];
        echo "<hr>external_reference: " . $data['external_reference'] . "</h2>";
        break;
}