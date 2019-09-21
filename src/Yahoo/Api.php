<?php

namespace Yoshikyoto\Weather\Yahoo;

class Api
{
    /**
     * @var \GuzzleHttp\Client
     */
    private $client;
    
    public function __construct(
        string $appId
    ){
        $this->client = new \GuzzleHttp\Client([
            'base_uri' => 'https://weather-ydn-yql.media.yahoo.com',
            'headers' => [
            ],
        ]);
    }
    
    public function get()
    {
        $this->client->get('/forecastrss');
    }
}
