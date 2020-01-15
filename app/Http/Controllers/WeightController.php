<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Weight;
use App\User;


class WeightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $weights = Weight::all();

      return view('weights.index')->with([
        'weights' => $weights
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('weights.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'date' => 'required|date',
        'value' => 'required|max:5',
        'user_id' => 'required|alpha_num|max:3'
      ]);

      $weight = new Weight();
      $weight->date = $request->input('date');
      $weight->value = $request->input('value');
      $weight->user_id = $request->input('user_id');
      $weight->save();

      return redirect()->route('weights.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Weight  $weight
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $weight = Weight::findOrFail($id);
      return view('weights.show')->with([
        'weight' => $weight
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Weight  $weight
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $weight = Weight::findOrFail($id);
      return view('weights.edit')->with([
        'weight' => $weight
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Weight  $weight
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $weight = Weight::findOrFail($id);

      $request->validate([
        'date' => 'required|date',
        'value' => 'required|max:5',
        'user_id' => 'required|alpha_num|max:3'
      ]);

      $weight->date = $request->input('date');
      $weight->value = $request->input('value');
      $weight->user_id = $request->input('user_id');
      $weight->save();

      return redirect()->route('weights.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Weight  $weight
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $weight = Weight::findOrFail($id);
      $weight->delete();
      return redirect()->route('weights.index');
    }
}
