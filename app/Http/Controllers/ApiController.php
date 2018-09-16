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


# GET user balance

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


# GET user history

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

# POST user balance

    public function postBalance(Request $request){

        $data = $request->json()->all();

        $accNo = $data['accnumber'];

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

# POST user history

    public function postHistory(Request $request){

        $data = $request->all();
        $accNo = $data['accnumber'];

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


# OPTION user balance

    public function testOption($accNo){
        return $accNo;
    }


# DELETE user balance

    public function deleteBalance($accNo){

        return response()->json([
            'acc_number' => $accNo,
            'message' => 'successfully deleted',
        ], 200)
        ->header('Content-Type', 'application/json');

    }


# PUT user balance

    public function putBalance(Request $request){

        $data = $request->json()->all();
        $accNo = $data['accnumber'];

        return response()->json([
            'acc_number' => $accNo,
            'message' => 'successfully created',
        ], 200)
            ->header('Content-Type', 'application/json');

    }

# PATCH patchBalance

    public function patchBalance(Request $request){

        $data = $request->json()->all();
        $accNo = $data['accnumber'];

        return response()->json([
            'acc_number' => $accNo,
            'message' => 'field acc_number successfully updated',
        ], 200)
            ->header('Content-Type', 'application/json');

    }



}