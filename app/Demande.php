<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    public function users(){
        return $this->belongsTo('App\User');
        
    }
}
