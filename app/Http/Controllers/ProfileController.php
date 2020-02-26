<?php

namespace App\Http\Controllers;
use App\User;
use Auth;
use App\Weight;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::findOrFail(Auth::id());
        $weights = $user->weight()->get();

        return view('profile.index')->with([
            'weights' => $weights,
            'user' => $user

            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('profile.index')->with([
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
      $user_id = Auth::id();
      $user = User::findOrFail(Auth::id());
      return view('profile.edit')->with([
      'user_id' => $user_id,
      'user' => $user
      ]);
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
      $user = User::findOrFail($id);

      $request->validate([
        'username' => 'required',
        'email' => 'required|email',
        'name' => 'required',
        'dob' => 'required',
        'gender' => 'required',
        'country' => 'required',
        'height' => 'required',
        'start_weight' => 'required',
        'goal_weight' => 'required',
        'activity_level' => 'required',
        'profile_info' => 'required'
      ]);

      $user->username = $request->input('username');
      $user->email = $request->input('email');
      $user->name = $request->input('name');
      $user->dob = $request->input('dob');
      $user->gender = $request->input('gender');
      $user->country = $request->input('country');
      $user->height = $request->input('height');
      $user->start_weight = $request->input('start_weight');
      $user->goal_weight = $request->input('goal_weight');
      $user->activity_level = $request->input('activity_level');
      $user->profile_info = $request->input('profile_info');
      $user->save();

      return redirect()->route('profile.index');
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
