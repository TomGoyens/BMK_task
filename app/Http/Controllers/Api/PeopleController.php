<?php

namespace App\Http\Controllers\Api;

use App\Integrations\SWApi\SWApiIntegration;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PeopleController
{
    /**
     * Return a listing of the resources queried from SWApi
     * @return JsonResponse
     * @throws GuzzleException
     */
    public function index() : JsonResponse
    {
        $integration = new SWApiIntegration();
        
        return response()->json($integration->client->getPeople([
            'page' => request('page'),
            'search' => request('search'),
        ])->data());
    }
    
    /**
     * Return a resource queried from SWApi
     * @param Request $request
     * @param         $id
     * @return JsonResponse
     * @throws GuzzleException
     */
    public function show(Request $request, $id) : JsonResponse
    {
        $integration = new SWApiIntegration();
        
        return response()->json($integration->client->getPerson($id)->data());
    }
}