<?php

namespace App\Integrations\SWApi\Client;

use GuzzleHttp\Exception\GuzzleException;

trait SWApiHasPeople
{
    /**
     * @throws GuzzleException
     */
    public function getPeople($data) : self
    {
        $this->handleRequest('GET', "people/?" . http_build_query($data));
        
        return $this;
    }
    
    /**
     * @throws GuzzleException
     */
    public function getPerson($id) : self
    {
        $this->handleRequest('GET', "people/{$id}");
        
        return $this;
    }
}