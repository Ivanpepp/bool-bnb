<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function messages(){
        return $this->hasMany('App\Models\Message');
    }
    public function visits(){
        return $this->hasMany('App\Models\Visit');
    }
    public function photos(){
        return $this->hasMany('App\Models\Photo');
    }
}
