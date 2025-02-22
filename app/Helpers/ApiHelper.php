<?php

function callApi($url, $data = [])
{
    $client = \Config\Services::curlrequest();

    $options = [
        'http_errors' => false, // Prevent exceptions on non-200 responses
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept'       => 'application/json',
        ],
    ];

    if (!empty($data)) {
        $options['json'] = $data;
    }

    $method = "POST";

    $response = $client->request($method, "https://impactadvisoryservices.com/" . $url, $options);
    return json_decode($response->getBody(), true);
}
