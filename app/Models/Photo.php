<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public function apartment(){
        return $this->belongsTo('App\Models\Apartment');
    }

    public function getImagePrefix(){
        if (str_starts_with($this->image_thumb, "apartments/images")){
            return asset('storage/'); 
        }
    }
}
