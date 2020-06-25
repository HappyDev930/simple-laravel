<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $fillable = [
        'first_name' ,'last_name', 'class', 'date_of_birth'
    ];

    protected $table = "students";
}
