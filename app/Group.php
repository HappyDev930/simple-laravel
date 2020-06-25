<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //
    protected $fillable = [
        'code', 'name', 'maximum_students', 'status', 'description'
    ];

    protected $table = "groups";
}
