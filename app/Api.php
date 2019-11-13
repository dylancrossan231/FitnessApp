<?php
# @Date:   2019-11-13T15:46:25+00:00
# @Last modified time: 2019-11-13T16:00:32+00:00




namespace App;

use Illuminate\Database\Eloquent\Model;

class Api extends Model
{
// public function viewData(){
//           //This line creates a new Client from guzzle -> This client is basically a http request
//           $client = new Client();
//
//           //This part querys a url that I have hardcoded, you will want to make this a variable in yours
//
//           //The headers part is a header that is attached to your http request - The tesco api expects a subscription key
//           $response =$client->request('GET', 'https://dev.tescolabs.com/product/?tpnc=268231759', [
//               'headers' => [
//                   'Ocp-Apim-Subscription-Key' => $apikey
//               ]
//           ]);
//
//           //This function runs your request
//           $response=$response->getBody();
//           //This line turns the returned json into an array -> you need to do this so laravel can understand the json object
//           $response = json_decode($response, true);
//           // dd($response);
//
//           return $response;
//         }
//

}
