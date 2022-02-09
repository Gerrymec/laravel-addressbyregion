<?php

namespace App\Http\Controllers;

use App\Models\Userlist;
use Illuminate\Http\Request;

class UserlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $userlists = Userlist::latest()->paginate(5);

      return view('userlists.index',compact('userlists'))
          ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('userlists.create');
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
            'name' => 'required',
        ]);

        Userlist::create($request->all());

        return redirect()->route('userlists.index')
                        ->with('success','User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Userlist  $userlist
     * @return \Illuminate\Http\Response
     */
    public function show(Userlist $userlist)
    {
        return view('userlists.show',compact('userlist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Userlist  $userlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Userlist $userlist)
    {
        return view('userlists.edit',compact('userlist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Userlist  $userlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Userlist $userlist)
    {
      $request->validate([
          'name' => 'required',
      ]);

      $userlist->update($request->all());

      return redirect()->route('userlists.index')
                      ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Userlist  $userlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Userlist $userlist)
    {
      $userlist->delete();

      return redirect()->route('userlists.index')
                      ->with('success','User deleted successfully');
    }
}
