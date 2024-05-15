<?php

namespace App\Integrations\SWApi\Client;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Psr\Http\Message\ResponseInterface;

class SWApiClient
{
    use SWApiHasFilms,
        SWApiHasPeople;
    
    const API_ENDPOINT = 'https://swapi.dev/api/';
    public Client $client;
    public object $response;
    
    public function __construct()
    {
        $this->initClient();
    }
    
    /**
     * Initiate and set Guzzle client.
     * @return void
     */
    public function initClient()
    {
        $this->client = new Client([
            'base_uri' => self::API_ENDPOINT,
            'timeout'  => 30,
        ]);
    }
    
    /**
     * @param $method
     * @param $uri
     * @param array $options
     * @return ResponseInterface
     * @throws GuzzleException
     */
    protected function handleRequest($method, $uri, array $options = []) : ResponseInterface
    {
        try {
            $this->response = $this->client->request($method, $uri, $options);
        } catch (GuzzleException $exception) {
            //
            throw $exception;
        }
        
        return $this->response;
    }
    
    /**
     * Get the response's data.
     * @param string|null $key
     * @param mixed|null  $default
     * @return Collection|mixed
     */
    public function data(string $key = null, mixed $default = null) : mixed
    {
        $data = [];
        
        if($this->response) {
            $data = json_decode($this->response->getBody(), true);
        }
        
        if($key) {
            return Arr::get($data, $key, $default);
        }
        
        return collect($data);
    }
}