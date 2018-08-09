<?php


namespace App\Http\Controllers;


use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\RequestOptions;
use Illuminate\Http\Request;

class ApiController{

    private $clientEndpoint;
    public function __construct()
    {
        $this->clientEndpoint = 'http://117.54.138.44:8889';
    }

    public function getBalance($accNo){


        try {

            $client = new Client();

            $response = $client->post($this->clientEndpoint.'/inquirybal', [
                RequestOptions::JSON => ['accnumber' => $accNo]
            ]);

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

            $client = new Client();

            $response = $client->post($this->clientEndpoint.'/inquirybal', [
                RequestOptions::JSON => ['accnumber' => $accNo]
            ]);

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


}