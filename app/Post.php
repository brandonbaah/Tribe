<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use SoftDeletes;
    protected $guarded = [];

     /**
     * The users that belong to the post.
     */

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function tribe()
    {
        return $this->belongsTo('App\Tribe');
    }

    public function getUser($id)
    {
        $user = DB::table('posts')
        ->LeftJoin('users', 'posts.user_id', '=', 'users.id')
        ->where('posts.user_id', $id)
        ->select(
            'users.name'
        )->distinct()->get();

        return $user[0]->name;
    }
    
}
