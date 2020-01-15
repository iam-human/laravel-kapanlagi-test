<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registrant extends Model
{
    protected $fillable = ['id','nama','email','tgl_lahir','phone','gender','foto','txt'];
}
