<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class CaloriesService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('CALORIENINJAS_API_KEY');
    }

    public function getNutritionInfo($query)
    {
        try {
            $response = $this->client->request('GET', 'https://api.calorieninjas.com/v1/nutrition', [
                'headers' => [
                    'X-Api-Key' => $this->apiKey,
                ],
                'query' => [
                    'query' => $query,
                ],
            ]);

            if ($response->getStatusCode() === 200) {
                return json_decode($response->getBody(), true);
            }

            return null;
        } catch (GuzzleException $e) {
            // Log the error or handle it as needed
            // Log::error($e->getMessage());

            return [
                'error' => true,
                'message' => 'Failed to fetch nutrition information. Please try again later.'
            ];
        }
    }
}
