<?php
require 'vendor/autoload.php';

$accesToken = 'APP_USR-4335148005852522-052619-95473cc66defd01d3d128e8a87db7577-765170685';
//$accessToken = 'APP_USR-1159009372558727-072921-8d0b9980c7494985a5abd19fbe921a3d-617633181';

MercadoPago\SDK::setAccessToken($accesToken);

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
        echo "<hr>preference_id:" . $data['preference_id'];
        echo "<hr>external_reference" . $data['external_reference'] . "</h2>";
        break;
}