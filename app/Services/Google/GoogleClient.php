<?php

namespace App\Services\Google;

use Google\Client as Client;
use Google\Service\Sheets as GoogleServiceSheets;

class GoogleClient
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
        $this->client->setApplicationName('plataforma');
        $jsonKey = json_decode(file_get_contents(base_path('credentials.json')), true);

        $this->client->setAuthConfig($jsonKey);
        
    }

    public function getClient($scope)
    {
        $this->client->setScopes($scope);
        return $this->client;
    }
  

    
}