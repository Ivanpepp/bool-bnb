<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public function apartment(){
        return $this->belongsTo('App\Models\Apartment');
    }
}
