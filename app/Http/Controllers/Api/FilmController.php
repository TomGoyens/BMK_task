<?php

namespace App\Http\Controllers\Api;

use App\Integrations\SWApi\SWApiIntegration;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FilmController
{
    /**
     * Return a listing of the resources queried from SWApi
     * @return JsonResponse
     * @throws GuzzleException
     */
    public function index() : JsonResponse
    {
        $integration = new SWApiIntegration();
        
        return response()->json($integration->client->getFilms([
            'page' => request('page'),
            'search' => request('search'),
        ])->data());
    }
    
    /**
     * Return a resource queried from SWApi
     * TODO
     * @param Request $request
     * @param         $id
     * @return JsonResponse
     * @throws GuzzleException
     */
    public function show(Request $request, $id)
    {
//        $integration = new SWApiIntegration();
//
//        return response()->json($integration->client->getFilms($id)->data());
    }
}