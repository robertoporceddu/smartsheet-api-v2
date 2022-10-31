<?php

namespace SmartsheetApiV2;

use GuzzleHttp\Client as GuzzleClient;

class Client {

    private $http;

    private $apiToken;
    private $baseUrl;
    private $headers;

    public function __construct($api_token = null)
    {
        $this->apiToken = (isset($api_token)) ? $api_token : $_ENV['SMARTSHEET_API_TOKEN'];
        $this->baseUrl = 'https://api.smartsheet.com/2.0/';

        $this->headers = [
            'Authorization' => "Bearer {$this->apiToken}",
            'Content-Type' => 'application/json'
        ];
    }

    public function call($method, $resource, $data = [])
    {
        $this->http = new GuzzleClient();

        $request = $this->http->request($method, $this->baseUrl.$resource, [
            'headers' => $this->headers,
            'body' => json_encode($data),
            'debug' => false
        ]);

        return json_decode($request->getBody()->getContents());
    }
}