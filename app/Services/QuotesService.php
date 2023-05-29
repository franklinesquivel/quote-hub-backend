<?php

namespace App\Services;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;

class QuotesService
{
    private PendingRequest $client;

    public function __construct()
    {
        $this->client = Http::acceptJson()->withHeaders([
            'X-Api-Key' => config('services.api_ninjas.api_key')
        ])->baseUrl(config('services.api_ninjas.quotes'));
    }

    /**
     * @throws RequestException
     */
    public function getQuote(string $category = null)
    {
        $response = $this->client->get('', [
            'limit' => 1,
            'category' => $category ?? ''
        ]);

        return $response->throw()->json()[0];
    }
}