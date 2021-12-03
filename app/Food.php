<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{

    protected $fillable = ['user_id', 'name', 'image', 'description', 'allergens', 'price', 'visible', 'weight'];

    public function user() 
    {
        return $this->belongsTo("App\User");
    }
    
    public function orders () 
    {
        return $this->belongsToMany("App\Order");
    }
}
