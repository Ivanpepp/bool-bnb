<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'photos';
    protected $fillable = ['image_thumb','apartment_id'];

    public function apartment(){
        return $this->belongsTo('App\Models\Apartment');
    }

    public function getImageUrl(){
     
        if(str_starts_with($this->image_thumb,  '/images/'))
        {
            
            return asset('storage') . '/';
        }
        
    }
}
