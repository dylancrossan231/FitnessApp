<?php
# @Date:   2019-11-12T19:03:11+00:00
# @Last modified time: 2019-11-13T17:21:56+00:00




namespace App\Http\Controllers;
use App\Api;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Http\Controllers\ApiController;

class ApiController extends Controller
{

  public function index()
  {
    $client = new Client();

    $response =$client->request('GET', 'https://dev.tescolabs.com/product/?tpnc=268231759', [
        'headers' => [
            'Ocp-Apim-Subscription-Key'=>'a3c51c289be148ac9492336f4b6dadff'
            //env('API_KEY')
            
        ]
    ]);
  
    $response=$response->getBody();
    $response = json_decode($response, true);
   // dd($response);
  //  return $response;

             return view('calories.apiview')->with([
               'response'=>$response]);
          
}

public function show($TPNB)
{
  
 

  $client = new Client();
  
  $response =$client->request('GET', 'https://dev.tescolabs.com/product/?tpnb='.$TPNB.'', [
      'headers' => [
          'Ocp-Apim-Subscription-Key'=>'a3c51c289be148ac9492336f4b6dadff'
          //env('API_KEY')
          
      ]
  ]);

  $response=$response->getBody();
  $response = json_decode($response, true);
 // dd($response);
//  return $response;

           return view('calories.apisearchshowproduct')->with([
             'response'=>$response]);
        
}






public function search(Request $request)
{
  $request->validate([
    'search' => 'required|max:191'
  ]);
  $query = $request->input('search');

  $client = new Client();

  $response =$client->request('GET', 'https://dev.tescolabs.com/grocery/products/?query='.$query.'&offset=0&limit=20', [
      'headers' => [
          'Ocp-Apim-Subscription-Key'=>'a3c51c289be148ac9492336f4b6dadff'
          
      ]
  ]);

  $response=$response->getBody();
  $response = json_decode($response, true);
 

 // dd($response);

return view('calories.searchcalories')->with([
  'response'=>$response,'query'=> $query]);
}


}

