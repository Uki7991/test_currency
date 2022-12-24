<?php

namespace App\Services;

use GuzzleHttp\Client;

class ExchangeRateService
{
    public function __construct()
    {
        $this->client = new Client(['base_uri' => 'https://api.apilayer.com', 'headers' => ['apikey' => config('exchange.api_key')]]);
    }

    public function latest(string $baseCurrency, string $rateCurrency)
    {
        $response = $this->client->get('/exchangerates_data/latest', [
            'query' => [
                'symbols' => $rateCurrency,
                'base' => $baseCurrency,
            ]
        ]);

        return json_decode($response->getBody()->getContents());
    }
}
