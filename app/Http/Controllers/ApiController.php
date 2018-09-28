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
        # Place your endpoint URL here
        $this->clientEndpoint = 'http://localhost:8889';
    }


# GET user balance

    public function getBalance($accNo){

        set_time_limit(500);

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

    public function postDummy(){

        return response()->json([
            'status' => 'OK',
            'message' => 'allow dumy method',
        ], 200)
            ->header('Content-Type', 'application/json');

    }

    public function postDummyInq(){

        return response()->json([
            'PAN' => '504948251030108422',
            'PROCESSING_CODE' => '740014',
            'TRANSMISSION_DATE_AND_TIME' => '0917182548',
            'SYSTEMS_TRACE_AUDIT_NUMBER' => '000066',
            'TIME_LOCAL_TRANSACTION' => '182548',
            'DATE_LOCAL_TRANSACTION' => '0917',
            'MERCHANT_TYPE' => '6017',
            'ACQUIRING_INSTITUTION_IDENTIFICATION_CODE' => '111',
            'FORWARDING_INSTITUTION_IDENTIFICATION_CODE' => '111',
            'RETRIEVAL_REFERENCE_NUMBER' => '180917000066',
            'RESPONSE_CODE' => '68',
            'CARD_ACCEPTOR_TERMINAL_IDENTIFICATION' => 'JAKONE',
            'ADDITIONAL_DATA' => '401201087061235',

        ], 200)
            ->header('Content-Type', 'application/json');

    }


# OPTION user balance

    public function optionsBalance($accNo){
        return response()->json([
            'acc_number' => $accNo,
            'message' => 'allow options method',
        ], 200)
            ->header('Content-Type', 'application/json');
    }

# HEAD user balance

    public function headBalance($accNo){
        return response()->json([
            'acc_number' => $accNo,
            'message' => 'allow options method',
        ], 200)
            ->header('Content-Type', 'application/json');
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