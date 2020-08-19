<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //table name
    protected $table='student';
    //student table field name
    protected  $fillable = ['name', 'email', 'image', 'password'];
}
