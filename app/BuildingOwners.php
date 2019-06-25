<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BuildingOwners extends Model
{
    use SoftDeletes;
    protected $table = 'building_owners';
    protected $fillable = ['name', 'file', 'address', 'description', 'price'];

    public function users(){
        return $this->belongsTo('App\Users', 'owner_id');
    }

    public function Bookings(){
        return $this->hasMany('App\Bookings', 'building_id');
    }
}
