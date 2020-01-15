<?php
# @Date:   2019-11-12T19:03:11+00:00
# @Last modified time: 2020-01-06T18:19:22+00:00




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

  $response =$client->request('GET', 'https://dev.tescolabs.com/product/?tpnb='.$id.'', [
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

  $response =$client->request('GET', 'https://dev.tescolabs.com/product/?tpnb='.$id.'', [
      'headers' => [
          'Ocp-Apim-Subscription-Key'=>'a3c51c289be148ac9492336f4b6dadff'
          //env('API_KEY')

      ]
  ]);

  $response=$response->getBody();
  $response = json_decode($response, true);
  
  $product = $response['products'][0];
  
//  return $response;


           return view('calories.create')->with([
             'product'=>$product]);


}

public function store(Request $request)
{
 
  
  $ingredient = new Ingredient();
  $ingredient->name = $request->input("name");
  $ingredient->unit = $request->input("unit");
  $ingredient->energy_kj = $request->input("Energy(kJ)");
  $ingredient->energy_kcal = $request->input("Energy(kcal)");
  $ingredient->protein = $request->input("Protein(g)");
  $ingredient->carbs = $request->input("Carbohydrate(g)");
  $ingredient->sugar = $request->input("Sugars(g)");
  $ingredient->fat = $request->input("Fat(g)");
  $ingredient->saturated_fat = $request->input("Saturates(g)");
  $ingredient->fiber = $request->input("Fibre(g)");
  $ingredient->salt = $request->input("Salt(g)");

  $ingredient->save();

  return redirect()->route('ingredients.index');
    
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



