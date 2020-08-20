<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostUser extends Model
{
    use SoftDeletes;
    protected $guarded = [];
}
