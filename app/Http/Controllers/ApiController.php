<?php
# @Date:   2019-11-12T19:03:11+00:00
# @Last modified time: 2020-01-06T18:13:42+00:00




namespace App\Http\Controllers;
use App\Api;
use App\Ingredient;
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

public function show($id)
{



  $client = new Client();

  $response =$client->request('GET', 'https://dev.tescolabs.com/product/?id='.$id.'', [
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

public function create($id)
{



  $client = new Client();

  $response =$client->request('GET', 'https://dev.tescolabs.com/product/?id='.$id.'', [
      'headers' => [
          'Ocp-Apim-Subscription-Key'=>'a3c51c289be148ac9492336f4b6dadff'
          //env('API_KEY')

      ]
  ]);

  $response=$response->getBody();
  $response = json_decode($response, true);
  $response = $response->paginate(1);
  //dd($response);
//  return $response;


           return view('calories.create')->with([
             'response'=>$response]);


}

public function store(Request $request)
{
    $storeProduct = new Ingredient();
    $products = $request->get('array');

    for($i = 0; $i < count($product); $i++) {
      $storeProduct->id = $product[$i];
      $storeProduct->name = "Test";
      $storeProduct->api_id = 51148744;
      $storeProduct->unit = kg;
      $storeProduct->energy_kJ = 100;
      $storeProduct->energy_kcal = 20;
      $storeProduct->protein = 5;
      $storeProduct->carbs = 4;
      $storeProduct->sugar = 3;
      $storeProduct->fat = 2;
      $storeProduct->saturated_fat = 1;
      $storeProduct->fiber = 0;
      $storeProduct->is_product = 1;

      $storeProduct->save();
    }
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
