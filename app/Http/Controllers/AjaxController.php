<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;


class AjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function autoComplete(Request $request) {
        $query = $request->get('term','');
        // $products=Product::where('name','LIKE','%'.$query.'%')->get();

        $client = new Client();
        $response =$client->request('GET', 'https://dev.tescolabs.com/grocery/products/?query='.$query.'&offset=0&limit=5', [
            'headers' => [
                'Ocp-Apim-Subscription-Key'=>'a3c51c289be148ac9492336f4b6dadff'

            ]
        ]);
        $response = json_decode($response->getBody(), true);

        $data = array();

  foreach($response ['uk']['ghs']['products']['results'] as $product){

    $data[] = array('value'=>$product);


  }
    if(count($data))

        return $data;
    else

    return null;
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



}
