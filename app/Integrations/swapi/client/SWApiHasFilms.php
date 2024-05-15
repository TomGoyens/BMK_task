<?php

namespace App\Integrations\SWApi\Client;

use GuzzleHttp\Exception\GuzzleException;

trait SWApiHasFilms
{
    /**
     * @throws GuzzleException
     */
    public function getFilms($data) : self
    {
        $this->handleRequest('GET', "films/?" . http_build_query($data));
        
        return $this;
    }
}