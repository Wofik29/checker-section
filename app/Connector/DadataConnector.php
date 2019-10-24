<?php


namespace App\Connector;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class DadataConnector
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://suggestions.dadata.ru',
            'headers' => [
                'Authorization' => 'Token ' . env('DADATA_TOKEN'),
                "Accept" => "application/json",
            ]
        ]);
    }

    public function getCity($query)
    {
        try {
            $response = $this->client->get('/suggestions/api/4_1/rs/suggest/address', [
                'query' => [
                    "locations" => [
                        'city' => 'Пермь'
                    ],
                    'query' => $query,
                    'from_bound' => ['value' => 'street'],
                    'to_bound' => ['value' => 'street'],
                    'count' => 1,
                ]
            ]);

            return json_decode($response->getBody()->getContents(), true)['suggestions'];
        } catch (ClientException $ex) {
            throw new HttpException(300, $ex->getResponse()->getBody()->getContents());
        }
    }
}
