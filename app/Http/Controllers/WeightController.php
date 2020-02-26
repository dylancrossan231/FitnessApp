<?php



namespace App\Http\Controllers;
use Auth;
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
      $user = User::FindOrFail(Auth::id());
      $weights = $user->weight()->get();
      return view('profile.index')->with([
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
      $user_id = Auth::id();
        return view('weights.create')->with([
          'user_id' => $user_id
        ]);
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

      return redirect()->route('profile.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Weight  $weight
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Weight  $weight
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $user_id = Auth::id();
      $weight = Weight::findOrFail($id);
      return view('weights.edit')->with([
        'weight' => $weight,
        'user_id' => $user_id
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

      return redirect()->route('profile.index');
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
      return redirect()->route('profile.index');
    }
}
