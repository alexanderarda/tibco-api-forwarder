<?php


namespace App\Http\Controllers;


use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;

class ApiController{

    private $clientEndpoint;
    public function __construct()
    {
        $this->clientEndpoint = 'http://dki.herokuapp.com';
    }

    public function getBalance($accNo){


        try {
        $client = new Client([
            'base_uri' => $this->clientEndpoint
        ]);

        $response = $client->get($accNo);

            return response($response->getBody())
                ->header('Content-Type', 'application/json');

        } catch (RequestException $e) {

            if ($e->hasResponse()) {

                $err =  Psr7\str($e->getResponse());

                return response()->json([
                    'message' => $err,
                ], 404);

            }
        }



    }

    public function getHistory($accNo){


        try {
            $client = new Client([
                'base_uri' => $this->clientEndpoint
            ]);

            $response = $client->get($accNo);

            return response($response->getBody())
                ->header('Content-Type', 'application/json');

        } catch (RequestException $e) {
            //echo Psr7\str($e->getRequest());
            if ($e->hasResponse()) {
                $err =  Psr7\str($e->getResponse());

                return response()->json([
                    'message' => $err,
                ], 404);

            }
        }
    }


}