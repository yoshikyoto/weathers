<?php

namespace Yoshikyoto\Weather\Yahoo;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

class Api
{
    /**
     * @var \GuzzleHttp\Client
     */
    private $client;
    
    /**
     * @var string Client ID が Consumery Key のこと
     */
    private $consumerKey;
    
    private $oauth;
    
    public function __construct(
        string $appId,
        string $consumerKey,
        string $consumerSecret
    ){
        $oauth = new Oauth1([
            'consumer_key' => $consumerKey,
            'soncumer_secret' => $consumerSecret,
            'signature_method' => Oauth1::SIGNATURE_METHOD_HMAC,
        ]);
        
        $handlerStack = HandlerStack::create();
        $handlerStack->push($oauth);
        
        $this->client = new Client([
            'base_uri' => 'https://weather-ydn-yql.media.yahoo.com',
            'headers' => [
                'X-Yahoo-App-Id' => $appId,
            ],
            'handler' => $handlerStack,
            'debug' => true,
        ]);
    }
    
    public function get()
    {
        $this->client->get('/forecastrss', [
            'auth' => 'oauth',
            'query' => [
                'format' => 'json',
            ],
        ]);
    }
}
