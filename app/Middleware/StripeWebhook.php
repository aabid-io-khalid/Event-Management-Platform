<?php

require_once 'vendor/autoload.php';

class StripeWebhook {
    public function handleWebhook() {
        \Stripe\Stripe::setApiKey('your_secret_key');

        $endpoint_secret = 'your_webhook_secret';

        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $event = null;

        try {
            $event = \Stripe\Webhook::constructEvent($payload, $sig_header, $endpoint_secret);
        } catch (\Exception $e) {
            http_response_code(400);
            exit();
        }

        if ($event->type == 'checkout.session.completed') {
            $session = $event->data->object;
            Transaction::save($session->customer_email, $session->amount_total / 100, 'paid');
        }

        http_response_code(200);
    }
}
?>
