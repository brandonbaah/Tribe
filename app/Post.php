<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function getPosts()
    {
        return DB::table('posts')
            ->select(
                'id',
                'start_time',
                'end_time',
                'in_home',
                'date',
                'notes',
                'created_at'
            )->where(
              'deleted_at', null
            )->get();
    }
}
