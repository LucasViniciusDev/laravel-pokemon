<?php

namespace App\Helpers;

use GuzzleHttp\Client;

class HttpClient
{
    private static $instance;
    private static $client;

    public function __construct()
    {
        self::$client = new Client([ 'base_uri' => \config('pokemon.url') ]);
    }

    public static function getInstance()
    {
        if(!self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public static function Get($url)
    {
        $response = self::$client->request('GET', $url);
        return $response->getBody()->getContents();
    }
}
