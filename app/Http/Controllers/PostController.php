<?php

namespace App\Http\Controllers;

use App\Post as Post;
use App\Time as Time;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd('Post');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $times = Time::all();
        $daysOfWeek = config('constants.options.days_of_week');
        $inHome = [1,2];
        return view('posts.create', ['times' => $times, 'daysOfWeek' => $daysOfWeek, 'inHome' => $inHome]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;

        $post->start_time = $request->start_time;
        $post->end_time = $request->end_time;
        $post->date = date('Y-m-d H:i:s',strtotime($request->requested_day));
        $post->in_home = $request->in_home;

        // Going to need to implement actual date time structure

        $post->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {


        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $times = Time::all();
        $daysOfWeek = config('constants.options.days_of_week');
        $inHome = config('constants.options.in_home');

        return view('posts.edit', [
            'post' => $post,
            'times' => $times,
            'daysOfWeek' => $daysOfWeek,
            'inHome' => $inHome
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->start_time = $request->start_time;
        $post->end_time = $request->end_time;
        $post->date = date('Y-m-d H:i:s',strtotime($request->requested_day));
        $post->in_home = $request->in_home;

        $post->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {

        $post->delete();

        redirect('/posts');
    }
}
