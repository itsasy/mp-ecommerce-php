<?php
require 'vendor/autoload.php';

/* Token */
$accessToken = 'APP_USR-8208253118659647-112521-dd670f3fd6aa9147df51117701a2082e-677408439';
MercadoPago\SDK::setAccessToken($accessToken);

/* Get and store response */
$body = @file_get_contents('php://input');
$data = json_decode($body);

file_put_contents("notifications/{$data->id}.json", $body);

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