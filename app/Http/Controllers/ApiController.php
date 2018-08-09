<?php


namespace App\Http\Controllers;


use GuzzleHttp\Client;

class ApiController{

    public function getBalance($accNo){

        $client = new Client([
            'base_uri' => 'http://dki.herokuapp.com'
        ]);

        $response = $client->get('api');

        echo '<pre>'; dd($response);

        echo $accNo;
    }

    public function getHistory($accNo){
        echo $accNo;
    }


}