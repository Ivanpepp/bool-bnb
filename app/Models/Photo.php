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

<<<<<<< HEAD
    public function getImagePrefix(){
        if (str_starts_with($this->image_thumb, "apartments/images")){
            return asset('storage/'); 
        }
=======
    public function getImageUrl(){
     
        if(str_starts_with($this->image_thumb,  '/images/'))
        {
            
            return asset('storage') . '/';
        }
        
>>>>>>> 4e767bebd83de920688807a121ee150620506e89
    }
}
