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
        $posts = DB::table('posts')
            ->LeftJoin('users', 'posts.user_id', '=', 'users.id')
            ->distinct()
            ->leftJoin('post_users', function($join)
            {
                $join->on('post_users.user_id', '=', 'users.id');
                $join->on('post_users.post_id', '=', 'posts.id');
            })
            ->whereNull('posts.deleted_at')
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
                'post_users.user_id as post_user_user_id',
                'post_users.post_id as post_user_post_id',
                'post_users.deleted_at as post_user_deleted_time',
                DB::raw('CASE WHEN post_users.deleted_at = NULL THEN "Attending" ELSE "Not Attending" END AS attending_event')
                // DB Raw needs to be fixed: Outputtiing "Attending" indefinitely.
            )
            ->get();

            foreach ($posts as $post)
            {
                if($post->post_user_deleted_time == NULL && ($post->post_user_user_id != NULL && $post->post_user_post_id != NULL)){
                    $post->attending_event = "Attending";
                }else{
                    $post->attending_event = "Not Attending";
                }
            }

            return $posts;

    }

    
}
