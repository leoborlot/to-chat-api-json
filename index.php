<?php

try {
    $data = [
        'phone' => $_GET['phone'],
        'body' => $_GET['body'],
    ];
    $token = $_GET['token'];
    $account = $_GET['account'];
    $instance = $_GET['instance'];
    $json = json_encode($data);
    $url = "https://$account/$instance/message?token=$token";
    $options = stream_context_create([
        'http' => [
            'method'  => 'POST',
            'header'  => 'Content-type: application/json',
            'content' => $json
        ]
    ]);
    $result = file_get_contents($url, false, $options);
    echo $result;
    http_response_code(200);
} catch (Throwable $t) {
    http_response_code(500);
}
