<?php

namespace App\Http\Controllers;

use App\Tribe;
use App\TribeUser;
use Illuminate\Http\Request;
use Auth;
use Session;

class TribeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $yourTribes = Auth::user()->tribes;

        return view('tribes.index', ['yourTribes' => $yourTribes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tribes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'description' => ['required', 'max:255']
        ]);

        $yourTribeNames = Auth::user()->tribes->pluck('name')->toArray();

        if(!in_array($request->name, $yourTribeNames)){

            $tribe = New Tribe;

            $tribe->name = $request->name;
            $tribe->description = $request->description;
            $tribe->user_id = Auth::user()->id;

            $saved = $tribe->save();

            if($saved){
                $tribeUserRecord = New TribeUser;

                $tribeUserRecord->user_id = Auth::user()->id;
                $tribeUserRecord->tribe_id = $tribe->id;
                
                $tribeUserRecord->save();
            }
            
            return redirect()->action('TribeController@index')->with('status', 'Tribe successfully created!');

        }else{

            return redirect()->action('TribeController@create')->with('status', 'Not Saved!');

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tribe  $tribe
     * @return \Illuminate\Http\Response
     */
    public function show(Tribe $tribe)
    {
        return view('tribes.show', ['tribe' => $tribe]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tribe  $tribe
     * @return \Illuminate\Http\Response
     */
    public function edit(Tribe $tribe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tribe  $tribe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tribe $tribe)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'description' => ['required', 'max:255']
        ]);

        $tribe->name = $request->name;
        $tribe->description = $request->description;

        $tribe->save();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tribe  $tribe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tribe $tribe)
    {
        $tribe->delete();

        redirect('/tribes');
    }
}
