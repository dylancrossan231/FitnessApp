<?php
# @Date:   2019-10-29T14:03:53+00:00
# @Last modified time: 2019-11-08T17:57:10+00:00




use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get("/","Tesco@index");
Route::post("/","Tesco@insert");
//
//
// require_once 'HTTP/Request2.php';
//
// $request = new Http_Request2('https://dev.tescolabs.com/product/');
// $url = $request->getUrl();
//
// $headers = array(
// // Request headers
// 'Ocp-Apim-Subscription-Key' => '{a3c51c289be148ac9492336f4b6dadff}',
// );
//
// $request->setHeader($headers);
//
// $parameters = array(
// // Request parameters
// 'gtin' => '{05052320395255}',
// 'tpnb' => '{051148744}',
// 'tpnc' => '{268231759}',
// 'catid' => '{string}',
// );
//
// $url->setQueryVariables($parameters);
//
// $request->setMethod(HTTP_Request2::METHOD_GET);
//
// // Request body
// $request->setBody("{body}");
//
// try
// {
// $response = $request->send();
// echo $response->getBody();
// }
// catch (HttpException $ex)
// {
// echo $ex;
//   }
