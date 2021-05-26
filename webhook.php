<?php
require 'vendor/autoload.php';

/* Token */
$accesToken = 'APP_USR-4335148005852522-052619-95473cc66defd01d3d128e8a87db7577-765170685';
MercadoPago\SDK::setAccessToken($accesToken);

/* Get and store response */
$body = @file_get_contents('php://input');
$data = json_decode($body);
file_put_contents('notifications/' . $data->id . ".json", $body);

switch ($data->type) {
    case 'payment':
        $payment = MercadoPago\Payment::find_by_id($data->data->id);
        http_response_code(201);
        break;
    case 'test':
        echo "ok";
        break;
    case 'plan':
        $plan = MercadoPago\Plan::find_by_id($_POST['id']);
        break;
    case 'subscription':
        $plan = MercadoPago\Subscription::find_by_id($_POST['id']);
        break;
    case 'invoice':
        $plan = MercadoPago\Invoice::find_by_id($_POST['id']);
        break;

}