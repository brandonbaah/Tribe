<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostUser as PostUser;
use Illuminate\Database\Eloquent\SoftDeletes;

class ManagePostUser extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // dd($request->all());
        $PostUserRecord = PostUser::withTrashed()
                            ->where('post_id', $request->post_id)
                            ->where('user_id', $request->user_id)
                            ->get();
        // dd($PostUserRecord);
        if(count($PostUserRecord) == 0)
        {
            $newPostUserRecord = new PostUser;
            $newPostUserRecord->user_id = $request->user_id;
            $newPostUserRecord->post_id = $request->post_id;
            $newPostUserRecord->save();
        } else {

            if($PostUserRecord[0]->trashed())
            {
               $PostUserRecord[0]->restore(); 
            } else {
                $PostUserRecord[0]->delete();
            }
            
        }
    }
}
