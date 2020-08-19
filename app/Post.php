<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

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

    public function getPosts()
    {
        return DB::table('posts')
            ->LeftJoin('users', 'posts.user_id', '=', 'users.id')
            ->select(
                'posts.id as post_id',
                'posts.start_time',
                'posts.end_time',
                'posts.in_home',
                'posts.name as post_name',
                'posts.date',
                'posts.notes',
                'posts.created_at',
                'users.first_name as user_first_name',
                'users.last_name as user_last_name',
                'users.email as user_email',
                'users.user_type as user_type',
            )->where(
              'posts.deleted_at', null
            )->get();
    }
}
