<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tribe as Tribe;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Invitation as Invitation;
use App\User as User;

class InvitationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invitations = Invitation::where('invitee_id', Auth::user()->id)->get();

        return view('invitations.index', ['invitations' => $invitations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('invitations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        If a user does not exist create an incomplete user record (email & tribe_id columns filled out) and send an 
        email requesting invited user to sign up with a link which would find the record and complete the user 
        record & update the invitation record with the timestamp for the accepted_at column.
         
         or
         
        If an existing email address in user table create invitation record which should also 
        create invitation notification.
        */
        $userCheck = User::where('email', $request->email)->get(); // check if count of records is 0 or not
        dd($userCheck);

        $invitation = new Invitation;

        $invitation->user_id = Auth::user()->id;
        $invitation->invitee_id = $request->invitee_id;
        $invitation->post_id = $request->post_id;

        $invitation->save();

        return redirect()->action('InvitationController@index');
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
