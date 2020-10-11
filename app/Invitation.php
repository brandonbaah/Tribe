<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    public function user()
    {
        belongsTo('App\User');
    }

    public function post()
    {
        belongsTo('App\Post');
    }
}
