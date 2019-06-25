<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'booking';

    public function BuildingOwners(){
        return $this->belongsTo('App\BuildingOwners', 'id');
    }

    public function user(){
        return $this->belongsTo('App\Users', 'id');
    }
}
