<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $fillable =['user_id','title', 'description', 'city', 'address','latitude','longitude', 'price','type','total_room', 'total_guest','total_bathroom','mq','is_visible'];


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

    public function sponsorships(){
        return $this->belongsToMany('App\Models\Sponsorship');
    }

    public function features(){
        return $this->belongsToMany('App\Models\Feature');
    }

 

}
