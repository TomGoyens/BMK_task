<?php

namespace App\Integrations\SWApi;

use App\Integrations\SWApi\Client\SWApiClient;

class SWApiIntegration
{
    
    public SWApiClient $client;
    
    public function __construct()
    {
        $this->initClient();
    }
    
    /**
     * Initiate the SWApi client.
     * @return void
     */
    private function initClient() : void
    {
        $this->client = new SWApiClient();
    }
}