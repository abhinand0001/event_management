<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded  =  [];

    public function forUser(){
        return $this->belongsTo(User::class,'for_user');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
